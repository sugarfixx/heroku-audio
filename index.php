<?php

require 'vendor/autoload.php';

use NepAudioLanguage\AudioLanguageDictionaries;


$library = new AudioLanguageDictionaries();
$data = $library->listIsoDashThree();
header('Content-Type: application/json');
echo json_encode($data);
