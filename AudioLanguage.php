<?php
/**
 * Created by PhpStorm.
 * User: sugarfixx
 * Date: 14/08/2020
 * Time: 13:24
 */


use JsonSerializable;

class AudioLanguage implements JsonSerializable
{
    public $name;

    public $iso_639_1;

    public $iso_639_3;


    public function __construct($code = null)
    {
        if ($code) {
            $this->createObject($code);
        } else {
            $this->createObject('und');
        }
    }

    public function createObject($code)
    {
        $dictionary = new AudioLanguageDictionaries();
        $alpha2     = $dictionary->resolve($code);
        $this->setIso_639_1($alpha2);
        $this->setIso_639_3($dictionary->key_iso_639_1[$alpha2]);
        $this->setName($dictionary->nameFromKey[$alpha2]);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setIso_639_1($iso_1)
    {
        $this->iso_639_1 = $iso_1;
    }

    public function getIso_639_1()
    {
        return $this->iso_639_1;
    }

    public function setIso_639_3($iso_3)
    {
        $this->iso_639_3 = $iso_3;
    }

    public function getIso_639_3()
    {
        return $this->iso_639_3;
    }

    public function jsonSerialize()
    {
        return [
            'name'      => $this->name,
            'iso_639_1' => $this->iso_639_1,
            'iso_639_3' => $this->iso_639_3,
        ];
    }
}
