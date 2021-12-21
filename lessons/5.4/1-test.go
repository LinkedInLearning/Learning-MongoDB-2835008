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

	fmt.Println("Setting up mongo client")

	client, err := mongo.NewClient(options.Client().ApplyURI("mongodb://localhost:27017"))

	if err != nil {
		log.Fatal(err)
	}

	fmt.Println("Connecting to database ...")

	context, _ := context.WithTimeout(context.Background(), 10*time.Second)
	err = client.Connect(context)

	if err != nil {
		log.Fatal(err)
	}

	fmt.Println("Connected Successfully!")

	defer client.Disconnect(context)

	fmt.Println("List databases ...")

	databases, err := client.ListDatabaseNames(context, bson.M{})

	if err != nil {
		log.Fatal(err)
	}

	fmt.Println(databases)

}
