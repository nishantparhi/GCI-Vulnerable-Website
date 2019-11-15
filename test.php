<?php

require 'vendor/autoload.php';

 error_reporting(E_ALL | E_STRICT);
    ini_set("display_errors", 2);
    // Create a Mongo conenction
    $mongo = new MongoDB\Driver\Manager("mongodb://127.0.0.1:27017");
    
    print_r($mongo); die;
    //$mongo = new MongoClient("mongodb://127.0.0.1");
    // Choose the database and collection
    $db = $mongo->myproject;
    
    echo $db; die;
    
    $coll = $db->users;
    // Same a document to the collection
    $coll->save(array(
        "username" => "Jack",
        "password" => "jack"
    ));
    // Retrieve the document and display it
    $item = $coll->findOne();
    echo "My name is " . $item['username'] . ". I am " . $item['password'];
