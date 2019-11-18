<?php 
    $dsn = 'mysql:dbname=realstate;host=127.0.0.1';
    $user = '';
    $password = '';

    try {
        $pdo = $dbh = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("ERROR: Could not connect ".$e->getMessage());
    } 