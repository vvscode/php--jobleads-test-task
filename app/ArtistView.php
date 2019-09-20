<?php

/**
 * Class ArtistView
 */
class ArtistView {
    /**
     * @var Artist
     */
    private $artist;

    /**
     * @param Artist $artist
     */
    public function __construct(Artist $artist)
    {
        $this->artist = $artist;
    }

    /**
     * @return string
     */
    public function getInitials()
    {
        /**
         * @TODO: Implementation
         */
        return '';
    }

    /**
     * @return string
     */
    public function getLowerCase()
    {
        /**
         * @TODO: Implementation
         */
        return '';
    }
}