<?php
namespace App;

class PhoneKeyPad
{

    private $numToLetterMap;
    private $phoneDict;

    public function __construct()
    {
        $this->numToLetterMap = [
            2 => ['a', 'b', 'c'],
            3 => ['d', 'e', 'f'],
            4 => ['g', 'h', 'i'],
            5 => ['j', 'k', 'l'],
            6 => ['m', 'n', 'o'],
            7 => ['p', 'q', 'r', 's'],
            8 => ['t', 'u', 'v'],
            9 => ['w', 'x', 'y', 'z']
        ];

        // Just to be explicit
        $this->phoneDict = null;

    }

    public function getNumPressesFromWord($word) {

        $letters = str_split($word);

        return collect($letters)->map(function($letter) {

            return $this->getNumPressesFromLetter($letter);

        })->sum();
    }

    private function getNumPressesFromLetter($letter) {
        // search array for letter
        foreach($this->numToLetterMap as $letterArray) {

            $indexFound = array_search($letter, $letterArray);
            if ($indexFound !== false) {
                return $indexFound + 1;
            }

        }

        return 0;
    }

}