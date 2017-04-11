<?php

class anibor{
    var $error_in_connection = 'Unable to connect to database at this time.';
    
    function db_connect(){
        try{
            // Establishes a database connection
            $dsn = 'mysql:host=localhost; dbname=anibor; charset=latin1';
            $username = 'root';
            $password = '';
            $connection = new PDO($dsn, $username, $password);

            return $connection;
        }
        catch(Exception $ex){ echo $error_in_connection; }
    } 
    //
    // CRUD functions...
    // Insert and update
    function tranzact($statement, $value = array()){
        // ...passes the sql statements and insert the value into the array
        // ... the function performs CRUD functions
        try {
            $db = $this->db_connect();
            $insert_data = $db->prepare($statement);
            for ($i = 1; $i <= count($value); $i++){
                $insert_data->bindValue($i, $value[$i-1]);
            }
            $insert_data->execute(); // Outside the loop to bind all the values so as to avoid database inconsistency
        }
        catch (Exception $ex) {
            echo $this->error_in_connection;
        }
    }
    // End insert and update

    // Retrieving a value   
    function retrieve($statement, $column){
        try{
            $db = $this->db_connect();

            foreach ($db->query($statement) as $row) return $row[$column]; 
        }
        catch(Exception $ex){}
    }
    // End retrieve

    // Delete
    function delete($statement){
        try{
            $db = $this->db_connect();
            return $db->query($statement);
        }
        catch(Exception $ex){}
    }             
    // End delete
    
    // Summing numerical value of columns
    function sum($statement, $column){
        try{
            $sum = 0;
            $db = $this->db_connect();
            foreach ($select = $db->query($statement) as $row) $sum+= $row[$column]; 
            return $sum; 
        }
        catch (Exception $ex){}
    } 
    // End sum
    
    // Getting rows
    function get_rows($statement){
        try{
            $db = $this->db_connect();
            $query = $db->query($statement);
            $row_count = $query->rowCount();

           return $row_count;
        }
        catch(Exception $ex){}
    }    
    // End get rows
    // End CRUD functions
}
