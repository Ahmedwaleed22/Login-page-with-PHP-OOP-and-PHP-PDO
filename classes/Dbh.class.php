<?php

class Dbh {
    private $host = 'YOUR DATABASE HOST ADDRESS';
    private $user = 'YOUR DATABASE USERNAME';
    private $password = 'YOUR DATABASE PASSWORD';
    private $dbName = 'YOUR DATABASE NAME';

    protected function connect() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }
}