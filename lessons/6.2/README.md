###Replication

Replication of your data allows you to improve performance and reliability by scaling across multiple MongoDB servers. In this lesson, you will learn about Replica Sets, the mechanism MongoDB uses to easily and robustly replicate databases. 

- [Replication](https://docs.mongodb.com/manual/replication/index.html)
- [Replica Set Members](https://docs.mongodb.com/manual/core/replica-set-members/)
- [Replica Set Configuration](https://docs.mongodb.com/manual/reference/replica-configuration/index.html)
- [FAQ: Replication and Replica Sets](https://docs.mongodb.com/manual/faq/replica-sets/index.html)

####Commands to setup replicas

`mongod --replSet cookingSet --dbpath=/store/data/rs1 --port 27017 --smallfiles --oplogSize 200`
`mongod --replSet cookingSet --dbpath=/store/data/rs2 --port 27018 --smallfiles --oplogSize 200`
`mongod --replSet cookingSet --dbpath=/store/data/rs3 --port 27019 --smallfiles --oplogSize 200`

####Config Replica Set

```config = {
  _id: "cookingSet",
  "members": [
    {_id: 0, host: "localhost:27017"},
    {_id: 1, host: "localhost:27018"},
    {_id: 2, host: "localhost:27019"},
  ]
}```

####Initiate Replica Set

`rs.initiate(config)`

####Status of Replica Set

`rs.status()`

####Connect Replica Set

`mongo "mongodb://localhost:27017,localhost:27018,localhost:27019/?replicaSet=cookingSet"`



