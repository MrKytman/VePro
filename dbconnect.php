<?php
$host       = 'localhost';
$db         = 'vepro';
$user       = 'TopUser';
$pass       = 'usertop';
$charset    = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $exception) {
    throw new \PDOException($exception->getMessage(), (int)$exception->getCode());
}