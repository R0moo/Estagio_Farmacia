<?php

namespace Model;

use \PDO;
use \PDOException;

final class Database {

    private $connection;

    public function __construct() {
        try {
            $this->connection = new PDO("mysql:host=" . HOST . ";dbname=" . BASE, USER, PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Tratar erro de conexão
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function select($query, $binds = []) {
        $stmt = $this->connection->prepare($query);

        foreach($binds as $i => $bind) {
            $stmt->bindValue($i, $bind);
        }

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function execute($query, $binds = []) {
        $stmt = $this->connection->prepare($query);

        foreach($binds as $i => $bind) {
            $stmt->bindValue($i, $bind);
        }

        return $stmt->execute();
    }

    public function getLastInsertedId() {
        return $this->connection->lastInsertId();
    }

    public function __destruct() {
        $this->connection = null;
    }
}