const MongoClient = require('mongodb').MongoClient;

const uri = 'mongodb://localhost:27017';
const db = 'cooker';

(async function() {
  const client = new MongoClient(uri, { useUnifiedTopology: true});

  try {
    await client.connect();

    const database = client.db(db);

    const collection = database.collection('recipes');

    const recipes = collection.find();

    // iterate over the cursor
    while(await recipes.hasNext()) {
      const recipe = await recipes.next();
      console.dir(recipe.title);
    }

  } catch (err) {
    console.log(err.stack);
  }

  await client.close();
})();
