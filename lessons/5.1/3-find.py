#! /usr/bin/python

import pymongo

client = pymongo.MongoClient("localhost", 27017)

# set our database to "cooker"
db = client.cooker

for item in db.recipes.find():
    print(item["title"])
