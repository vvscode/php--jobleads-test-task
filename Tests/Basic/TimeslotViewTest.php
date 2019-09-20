<?php

namespace Tests\Basic;

use DateTime;

/**
 * Class TimeslotViewTest
 */
class TimeslotViewTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTimeslotDates
     * @param DateTime $startsAt
     * @param DateTime $endsAt
     * @param int $expectedDurationInMinutes
     */
    public function testDurationInMinutes(DateTime $startsAt, DateTime $endsAt, int $expectedDurationInMinutes)
    {
        $timeslot = new \MusicAct(
            new \Artist('Bruno Mars'),
            'description',
            $startsAt,
            $endsAt
        );
        $view = new \TimeslotView($timeslot);

        $this->assertEquals($expectedDurationInMinutes, $view->getDurationInMinutes());
    }

    /**
     * @dataProvider getTimeslotDescriptionExcerpts
     * @param string $description
     * @param int $length
     * @param string $expectedExcerpt
     */
    public function testDescriptionExcerpts(string $description, int $length, string $expectedExcerpt)
    {
        $timeslot = new \MusicAct(
            new \Artist('Bruno Mars'),
            $description,
            new \DateTime('2019-01-01 00:00:00'),
            new \DateTime('2019-01-01 00:59:00')
        );
        $view = new \TimeslotView($timeslot);

        $this->assertEquals($expectedExcerpt, $view->getDescriptionExcerpt($length));
    }


    /**
     * @return array
     */
    public function getTimeslotDates()
    {
        return array(
            array(new \DateTime('2019-01-01 00:00:00'), new \DateTime('2019-01-01 00:59:00'), 59)
        );
    }

    /**
     * @return array
     */
    public function getTimeslotDescriptionExcerpts()
    {
        return array(
            array('lorem ipsum dolor sit', 1, 'l')
        );
    }
}