<?php

    namespace App\Database;

    class QueryBuilder {

        private static $pdo; 
        private static $log;
        public static function make (\PDO $pdo,$log = null)   // make define $pdo this function will call dBConnection class take return value of the function as parameter
        {
            self::$pdo = $pdo ;
            self::$log = $log ;
        }

        public static function get ($table,$where = null)
        {
            if ($where)
            {
                $where = "WHERE ". implode(" " ,$where);
                $query = "SELECT * FROM {$table} $where";
                $query = self::Execute($query);
                return $query->fetchAll(\PDO::FETCH_OBJ);
            }

            $query = "SELECT * FROM {$table}"; // prepare data from data base
            $query = self::Execute($query); // ready it to send to user
            return $query->fetchAll(\PDO::FETCH_OBJ); // fetch it out to user  (PDO::FETCH_OBj) --> to insert data like array of dictionary 
        }

        public static function insert (String $table,Array $data)
        {
        
            $field = array_keys($data);                              // keys of list    
            $fieldStr = implode(',',$field);                        // keys of list + , between them
            $valuesStr = str_repeat("?," ,count($field) - 1) . "?";  // output  (?, ?, ?)

            $query = "INSERT INTO $table ($fieldStr) VALUES ($valuesStr)";
            self::Execute($query,$data);
            
        }

        public static function update ($table,$data,$id)
        {
            $field = array_keys($data);                               
            $fieldStr = implode('= ?,', $field) ." = ?";                        

            $query = "UPDATE $table SET $fieldStr WHERE id = $id";
            self::Execute($query,$data);

        }

        public static function delete ($table, $id, $column = "id"  , $operator = "=")
        {
            if(!$id)
            {
               echo "id isn't define";
            }
            echo $id;
            $query ="DELETE FROM $table WHERE $column $operator $id";
            self::Execute($query);
        }
        public static function Execute($query, $data =[])
        {
            if(self::$log)
            {
                self::$log->info($query);
            }
            $statment = self::$pdo->prepare($query);
            $statment->execute(array_values($data));
            return $statment;
        }
    }