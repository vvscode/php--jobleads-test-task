<?php

namespace Tests\Basic;

/**
 * Class ArtistViewTest
 */
class ArtistViewTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $name
     * @param string $nameInitials
     * @param string $nameLowerCase
     * @dataProvider getArtistData
     */
    public function testInitialsAndLowercase(string $name, string $nameInitials, string $nameLowerCase)
    {
        $artist = new \Artist($name);
        $view = new \ArtistView($artist);

        $this->assertEquals($name, $artist->getName());
        $this->assertEquals($nameInitials, $view->getInitials());
        $this->assertEquals($nameLowerCase, $view->getLowerCase());
    }

    /**
     * @return array
     */
    public function getArtistData()
    {
        return array(
            array('Bruno', 'B', 'bruno')
        );
    }
}