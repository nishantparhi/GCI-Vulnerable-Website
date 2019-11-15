 <?php
     
      error_reporting( E_ALL );
     
     ini_set('display_errors', 1);
     echo extension_loaded("mongod") ? "loaded\n" : "not loaded\n";

     
   
         /**
          * Requires:
          * - PHP MongoDB Extension (https://php.net/manual/en/set.mongodb.php)
          * - MongoDB Library (`composer require mongodb/mongodb`)
          */
         
         require 'vendor/autoload.php';
         
         use MongoDB\Client;
         
         // Created with Studio 3T, the IDE for MongoDB - https://studio3t.com/
         $client = new Client('mongodb://localhost:27017');
         $collection = $client->myproject->Users;
         
         $query = [];
         
         $options = [];
         
         $cursor = $collection->find($query, $options);
         
         foreach ($cursor as $document) {
             echo $document['_id'] . "\n";
         }
     


