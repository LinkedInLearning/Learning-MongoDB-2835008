#! /usr/bin/python

import pymongo
import pprint

client = pymongo.MongoClient("localhost", 27017)

# set our database to "cooker"
db = client.cooker

recipe = db.recipes.find_one()

pp = pprint.PrettyPrinter(compact=True)

pp.pprint(recipe)
