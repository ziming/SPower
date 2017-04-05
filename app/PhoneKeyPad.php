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

    public function getNumPressesFromWord($word)
    {

        $letters = str_split($word);

        return collect($letters)->map(function ($letter) {

            return $this->getNumPressesFromLetter($letter);

        })->sum();
    }

    private function getNumPressesFromLetter($letter)
    {
        // search array for letter
        foreach ($this->numToLetterMap as $letterArray) {

            $indexFound = array_search($letter, $letterArray);
            if ($indexFound !== false) {
                return $indexFound + 1;
            }

        }

        return 0;
    }

    public function getNumberRepFromWord($word)
    {
        $letters = str_split($word);

        $result = collect($letters)->map(function ($letter) {

            return $this->getKeyFromLetter($letter);

        })->implode('');

        return intval($result);
    }

    private function getKeyFromLetter($letter)
    {

        foreach ($this->numToLetterMap as $key => $letters) {

            if (in_array($letter, $letters)) {
                return $key;
            }
        }

        return -1;

    }

    public function getAllDictionaryWordsFromNumber($num)
    {

        $this->phoneDict = $this->loadDictionary();

        $possibleCombinations = $this->getAllLetterCombinationsFromNumber($num);

        $result = collect($possibleCombinations)->filter(function ($value, $key) {
            return in_array($value, $this->phoneDict);
        })->toArray();

        // resetting array keys for easier comparison in tests as without it u may get something like like 40 => 'abc
        return array_values($result);
    }

    private function loadDictionary()
    {

        // only populate dictionary when truly required.

        if ($this->phoneDict !== null) {
            return $this->phoneDict;
        }

        // if the dictionary is really huge, something like Java 8 streams will be really helpful here.
        // https://github.com/ziming/aa-assignment-4/blob/master/src/aa/Problem1Main.java

        // But this is small enough so let's just load it all into memory

        $contents = file_get_contents('Words.txt');

        return preg_split('/\s+/', $contents);

    }

    public function getAllLetterCombinationsFromNumber($num)
    {
        $numbers = array_map('intval', str_split($num));

        // Credits and Inspiration to:
        // https://codereview.stackexchange.com/questions/91645/letter-combinations-of-phone-dial-pad-number

        $results = [''];

        // [2, 3]
        foreach ($numbers as $number) {

            // 1st iter: ['a', 'b', 'c']
            // 2nd iter: ['d', 'e', 'f']
            $letters = $this->numToLetterMap[$number];

            for ($i = count($results); $i > 0; $i--) {
                // 1st iter: count(results) == 1

                // intermediateResult is a String
                // array shift pop the first element at the had
                $intermediateResult = array_shift($results);

                foreach ($letters as $letter) {
                    $results[] = $intermediateResult . $letter;
                }
            }
        }

        return $results;
    }
}