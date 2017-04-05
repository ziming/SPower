<?php

use PHPUnit\Framework\TestCase;

use App\PhoneKeyPad;

class PhoneKeyPadTest extends TestCase
{

    /** @test */
    function can_return_num_key_presses_from_word()
    {
        // Arrange
        $phoneKeyPad = new PhoneKeyPad;

        // Act
        $numPresses = $phoneKeyPad->getNumPressesFromWord('hello');

        // Assert
        $this->assertEquals(13, $numPresses);

    }

    /** @test */
    function can_return_number_that_the_word_could_represent() {

        // Arrange
        $phoneKeyPad = new PhoneKeyPad;

        // Act
        $numberRep = $phoneKeyPad->getNumberRepFromWord('hello');

        // Assert
        $this->assertEquals(43556, $numberRep);

    }

}