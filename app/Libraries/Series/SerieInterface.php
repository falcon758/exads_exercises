<?php

declare(strict_types=1);

namespace App\Libraries\Series;

interface SerieInterface
{
    /**
    * Get Title
    *
    * @return string
    */
    public function getTitle(): string;

    /**
    * Set title
    *
    * @param string $title Title
    *
    * @return IntervalInterface
    */
    public function setTitle(string $title): SerieInterface;

    /**
    * Get Channel
    *
    * @return int
    */
    public function getChannel(): int;

    /**
    * Set channel
    *
    * @param int $channel 
    *
    * @return IntervalInterface
    */
    public function setChannel(int $channel): SerieInterface;

    /**
    * Get gender
    *
    * @return string
    */
    public function getGender(): string;

    /**
    * Set gender
    *
    * @param string $gender 
    *
    * @return IntervalInterface
    */
    public function setGender(string $gender): SerieInterface;
}

?>