<?php

require 'AudioLanguage.php';
require 'AudioLanguageDictionaries.php';

if (isset($_GET['code'])) {
    $data = new AudioLanguage($_GET['code']);
}
else {
    $library = new AudioLanguageDictionaries();
    $data = $library->listIsoDashThree();
}


header('Content-Type: application/json');
echo json_encode($data);
