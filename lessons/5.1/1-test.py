#! /usr/bin/python

import pymongo

print("Setting up mongo client")

client = pymongo.MongoClient("localhost", 27017)

print("Connecting to database ...")

# set our database to "cooker"
db = client.cooker

database_name = db.name

print("Connected Successfully!")

# output DB name
print("The database name is: {}".format(database_name))

