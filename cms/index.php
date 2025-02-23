<?php

require 'kirby/bootstrap.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo (new Kirby)->render();
