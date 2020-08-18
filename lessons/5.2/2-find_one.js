const MongoClient = require('mongodb').MongoClient;

const uri = 'mongodb://localhost:27017';
const db = 'cooker';

(async function() {
  const client = new MongoClient(uri, { useUnifiedTopology: true});

  try {
    await client.connect();

    const database = client.db(db);

    const collection = database.collection('recipes');

    const recipe = await collection.findOne();

    console.log(recipe);

  } catch (err) {
    console.log(err.stack);
  }

  await client.close();
})();
