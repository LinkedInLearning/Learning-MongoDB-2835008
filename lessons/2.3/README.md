#What can we store in a Document?

MongoDB Documents can store a wide variety of data in a number of different formats, which often makes development easier. In this lesson, we will learn more about Documents—what they are and what they can store such as simple data types and arrays, which can house "tags" of meta data for recipes. 


##Links
- [Data Modeling](https://docs.mongodb.com/manual/core/data-modeling-introduction/)
- [Documents](https://docs.mongodb.com/manual/core/document/)


**directions.json**
```
{
  "title": "Apple Pie",
  "directions": [
    "Roll the pie crust",
    "Make the filling",
    "Bake"
  ]
}
```

**ingredients.json**
```
{
  "title": "Apple Pie",
  "directions": [
    "Roll the pie crust",
    "Make the filling",
    "Bake"
  ],
  "ingredients": [
     {
       "amount": {
         "quantity": 2,
           "unit": null
         },
        "name": "pie crusts"
    }, {
       "amount": {
         "quantity": 1,
           "unit": "tbsp"
        },
        "name": "cinnamon"
    }
  ]
}
```