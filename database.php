<?php

class Database{ 

private $connection;


    public function __construct($config){

        $connection_string = "mysql:" .http_build_query($config, "",";");
        $this->connection = new PDO($connection_string);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function execute($query_string, $params){

        $query = $this->connection->prepare($query_string);

        $query->execute($params);

        return $query->fetchAll();
    }


public function registerUser($username, $email, $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password)";
        $params = array(
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashed_password
        );
        $this->execute($query, $params);
}

}