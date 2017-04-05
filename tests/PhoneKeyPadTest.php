<?php

use PHPUnit\Framework\TestCase;

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

}