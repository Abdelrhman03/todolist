<?php

use App\App;
use App\Database\DBConnection;
use App\Database\QueryBuilder;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require "vendor/autoload.php";

App::set("config", require "config.php"); // this function will return into $entries in app class the array in config.php 
// and will set the data on the static variable in App class with key called "config"
// The data will save as ["config" => Array(2)[somed data], [some data]]


$log = new Logger("PHP_BASICS");

$log->pushHandler(new StreamHandler("queries.log", Logger::INFO));


// DBConnection::make() will return the $pdo that hold (mysql::host:localhost::dbname,username,password)
// and will pass this result to QueryBuilder::make() and the variable will update it's value in class 

QueryBuilder::make(
    DBConnection::make(
        App::get("config")["database"]),$log
); // App :: get will return the data  from entires that we already saved it  at class in App::set , 
   // after this method we will get conifg["database"] // and will path the data of the website 
   // like host user passowrd ect, the reason we do this to can change the user , passowrd or host easily 
   // and don't need to go to many files and change it a lot of time 



// _init file this file is used to manage database from one file 
// in our project we need first to connect the database and after we need to select the data we
// want to use, to make easy and to not repeat the code we write all code that r
// elated with data base in sperarted file 
// this file is require "database/dataBaseConnection.php";
// require "database/QuerryBuilder.php";
