<?php

/**
 * Class Artist
 */
class Artist {
    /**
     * @var string
     */
    private $name;

    /**
     * @param $name string
     * @throws InvalidArgumentException
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}