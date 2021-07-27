<?php
    function create_connect(){
  //使用PDO連接SQL
    $dbms = 'mysql';
    $host = 'localhost';
    $dbName = 'demo_db';
    $username = 'root';
    $password = 'asus@rog14';  
    $dsn = "$dbms:host=$host;dbname=$dbName";
    try {
          $link = new PDO($dsn, $username, $password);
          return $link;
    } catch (PDOException $event) {
          echo "資料庫連線錯誤!";
          die();
    }
  }

?>