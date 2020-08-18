#! /usr/bin/python

import pymongo
import os

client = pymongo.MongoClient("localhost", 27017)

# set our database to "cooker"
db = client.cooker

print("What would you like to cook?:")
search = input()

os.system('clear')

print("-------------------------------")
print("Searching for ... \"{}\"".format(search))
print("-------------------------------")
print("")
print("We found the following recipes:\n")

# using a case insensitive "i" $regex search, but most normal find queries will also work.
query = {
    "title": {
        "$regex": search,
        "$options": "i"
    }
}

for item in db.recipes.find(query):

    # combine prep and cook times
    total_time = item["prep_time"]+item["cook_time"]

    output = "[{}]\n".format(item["title"])
    output += "DESCRIPTION: {}\n".format(item["desc"])
    output += "This recipe will take about {} minutes and be ".format(total_time)
    output += "~{} calories per serving\n".format(item["calories_per_serving"])

    print(output)
