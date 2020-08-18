#! /usr/bin/python

import pymongo

client = pymongo.MongoClient("localhost", 27017)

# set our database to "cooker"
db = client.cooker

for item in db.recipes.find().sort("title", pymongo.ASCENDING).limit(3):
    print(item["title"])
