<?php

namespace Ghibli;

//L’objectif de cette classe abstraite sera de proposer à toutes les classes qui en hériteront d’exploiter 
//l’attribut protégé $connection afin d’interragir avec la base de données.

abstract class Manager {

    protected \PDO $connection;

    public function __construct() {
        //chemin vers le tableau qui conduit à la BDD
        $dbConfig = require './config/database.php';
        //Connection
        $db = new \PDO(
            "mysql:host=" . $dbConfig['host'] . ";port=" . $dbConfig['port'] . ";dbname=" . 
            $dbConfig['dbname'],
            $dbConfig['username'],
            $dbConfig['password']
        );
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
				$db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, FALSE);
        $db->exec('SET NAMES utf8');
        $this->connection = $db;
    }

}