package main

import (
	"context"
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

	type Recipe struct {
		Title       string `bson:"title,omitempty"`
		CookTime    int32  `bson:"cook_time,omitempty"`
		Description string `bson:"desc,omitempty"`
	}

	collection := client.Database("cooker").Collection("recipes")

	// search document
	filter := bson.D{{"title", "Apple Pie"}}

	// query options
	opts := options.Find()

	opts.SetSort(bson.D{{"title", 1}})
	opts.SetLimit(3)

	cur, currErr := collection.Find(context, filter, opts)

	if currErr != nil {
		panic(currErr)
	}
	defer cur.Close(context)

	var recipes []Recipe

	if err = cur.All(context, &recipes); err != nil {
		panic(err)
	}

	fmt.Println(recipes)

}
