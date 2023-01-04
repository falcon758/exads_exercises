<?php

declare(strict_types=1);

namespace App\Libraries\Series;

class Serie implements SerieInterface
{
    /**
     * Title
     *
     * @var string
     */
    private string $title;

    /**
     * Channel
     *
     * @var int
     */
    private int $channel;
    
    /**
     * Gender
     *
     * @var string
     */
    private string $gender;

    /**
    * Constructor
    *
    * @param string $title   Title
    * @param int    $channel Channel
    * @param string $gender  Gender
    */
    function __construct(string $title, int $channel, string $gender)
    {
        $this->setTitle($title);
        $this->setChannel($channel);
        $this->setGender($gender);
    }

    /**
    * Get Title
    *
    * @return string
    */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
    * Set title
    *
    * @param string $title Title
    *
    * @return IntervalInterface
    */
    public function setTitle(string $title): SerieInterface
    {
        $this->title = $title;

        return $this;
    }

    /**
    * Get Channel
    *
    * @return int
    */
    public function getChannel(): int
    {
        return $this->channel;
    }

    /**
    * Set channel
    *
    * @param int $channel 
    *
    * @return IntervalInterface
    */
    public function setChannel(int $channel): SerieInterface
    {
        $this->channel = $channel;

        return $this;
    }

    /**
    * Get gender
    *
    * @return string
    */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
    * Set gender
    *
    * @param string $gender 
    *
    * @return IntervalInterface
    */
    public function setGender(string $gender): SerieInterface
    {
        $this->gender = $gender;

        return $this;
    }
}

?>