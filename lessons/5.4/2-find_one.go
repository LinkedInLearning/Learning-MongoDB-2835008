package main

import (
	"context"
	"encoding/json"
	"fmt"
	"log"
	"time"

	"go.mongodb.org/mongo-driver/bson"
	"go.mongodb.org/mongo-driver/mongo"
	"go.mongodb.org/mongo-driver/mongo/options"
)

func main() {

	client, err := mongo.NewClient(options.Client().ApplyURI("mongodb://localhost:27017"))

	if err != nil {
		log.Fatal(err)
	}

	context, _ := context.WithTimeout(context.Background(), 10*time.Second)
	err = client.Connect(context)

	if err != nil {
		log.Fatal(err)
	}

	defer client.Disconnect(context)

	collection := client.Database("cooker").Collection("recipes")

	var result bson.M

	err = collection.FindOne(context, bson.D{}).Decode(&result)

	if err != nil {
		if err == mongo.ErrNoDocuments {
			// This error means your query did not match any documents.
			return
		}
		panic(err)
	}

	output, err := json.MarshalIndent(result, "", "    ")

	if err != nil {
		panic(err)
	}

	fmt.Printf("%s\n", output)

}
