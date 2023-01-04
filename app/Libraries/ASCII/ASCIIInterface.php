<?php

declare(strict_types=1);

namespace App\Libraries\ASCII;

interface ASCIIInterface
{
    /**
     * Get character
     * 
     * @return string|null
     */
    public function getCharacter(): ?string;

    /**
     * Set character
     * 
     * @return ASCIIInterface
     */
    public function setCharacter(string $character): ASCIIInterface;

    /**
     * Get bytes
     * 
     * @return int
     */
    public function getBytes(): ?int;

    /**
     * Set Bytes
     * 
     * @return ASCIIInterface
     */
    public function setBytes(int $bytes): ASCIIInterface;
}
