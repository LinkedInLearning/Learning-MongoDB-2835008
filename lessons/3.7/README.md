###Solution: How to write a query

Query 1

`db.recipes.find({}, {"title": 1}).sort({"rating_avg": -1}).limit(4);`

Query 2

`db.recipes.find({"tags" : "mexican"}, {"title": 1}).sort({"rating_avg": -1}).limit(4);`

Query 3

`db.recipes.find({"likes": { $all : [1] }}, {"title" : 1}).sort({"title": 1});`