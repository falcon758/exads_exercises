<?php

namespace Tests\Feature;

use App\Libraries\ASCII\ASCII;
use PHPUnit\Framework\TestCase;

class ASCIITest extends TestCase
{
    /**
     * Test character to bytes conversion
     *
     * @return void
     */
    public function test_character_to_bytes_conversion()
    {
        $ascii = new ASCII();
        $this->assertEquals(65, $ascii->setCharacter('A')->getBytes(), '[A] to bytes should be 65');
    }

    /**
     * Test bytes to character conversion
     *
     * @return void
     */
    public function test_bytes_to_character_conversion()
    {
        $ascii = new ASCII();
        $this->assertEquals('A', $ascii->setBytes(65)->getCharacter(), '65 to character should be A');
    }
}
