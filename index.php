<?php

// require 'vendor/autoload.php';
require 'AudioLanguageDictionaries.php';

$library = new AudioLanguageDictionaries();
$data = $library->listIsoDashThree();
header('Content-Type: application/json');
echo json_encode($data);
