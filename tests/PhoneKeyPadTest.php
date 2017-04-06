<?php

use App\PhoneKeyPad;
use PHPUnit\Framework\TestCase;

class PhoneKeyPadTest extends TestCase
{

    /** @test */
    function can_return_num_key_presses_from_word()
    {
        // Arrange
        $phoneKeyPad = new PhoneKeyPad;

        // Act & Assert
        $this->assertEquals(13, $phoneKeyPad->getNumPressesFromWord('hello'));
        $this->assertEquals(56, $phoneKeyPad->getNumPressesFromWord('abcdefghijklmnopqrstuvwxyz'));

    }

    /** @test */
    function can_return_number_that_the_word_could_represent() {

        // Arrange
        $phoneKeyPad = new PhoneKeyPad;

        // Act & Assert
        $this->assertEquals(43556, $phoneKeyPad->getNumberRepFromWord('hello'));


    }

    /** @test */
    function can_return_all_possible_letter_combinations_number_could_represent() {

        // Arrange
        $phoneKeyPad = new PhoneKeyPad;

        // Act
        $letterCombinations = $phoneKeyPad->getAllLetterCombinationsFromNumber(23);

        // Assert
        $expectedResult = ['ad', 'ae', 'af', 'bd', 'be', 'bf', 'cd', 'ce', 'cf'];

        $this->assertSimilarArrays($expectedResult, $letterCombinations);
    }

    private function assertSimilarArrays($expectedArray, $actualArray)
    {

        // https://stackoverflow.com/questions/3838288/phpunit-assert-two-arrays-are-equal-but-order-of-elements-not-important
        // looks like php doesn't support named parameters yet
        return $this->assertEquals($expectedArray, $actualArray, 'Arrays not similar', $delta = 0.0, $maxDepth = 10, $canonicalize = true);
    }

    /** @test */
    function can_return_all_possible_word_combinations_from_dictionary_given_number()
    {

        // Arrange
        $phoneKeyPad = new PhoneKeyPad;

        // Act
        $wordArray1 = $phoneKeyPad->getAllDictionaryWordsFromNumber(2355);
        $wordArray2 = $phoneKeyPad->getAllDictionaryWordsFromNumber(4663);

        // Assert
        $this->assertSimilarArrays(['bell', 'cell'], $wordArray1);
        $this->assertSimilarArrays(['good', 'goof', 'gone', 'home', 'hone', 'hood', 'hoof'], $wordArray2);

    }

}