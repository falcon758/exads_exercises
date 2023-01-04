<?php

declare(strict_types=1);

namespace App\Libraries\ASCII;

class ASCII implements ASCIIInterface
{
    /**
     * Character
     * 
     * @var string
     */
    private string $character;

    /**
     * Get character
     * 
     * @return string|null
     */
    public function getCharacter(): ?string
    {
        return $this->character;
    }

    /**
     * Set character
     * 
     * @return ASCIIInterface
     */
    public function setCharacter(string $character): ASCIIInterface
    {
        $this->character = $character;

        return $this;
    }

    /**
     * Get bytes
     * 
     * @return int
     */
    public function getBytes(): ?int
    {
        $character = $this->getCharacter();

        return !empty($character) ? ord($character) : null;
    }

    /**
     * Set Bytes
     * 
     * @return ASCIIInterface
     */
    public function setBytes(int $bytes): ASCIIInterface
    {
        $this->setCharacter(chr($bytes));

        return $this;
    }
}
