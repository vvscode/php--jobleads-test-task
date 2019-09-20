<?php

namespace Tests\Basic;

/**
 * Class ScheduleTest
 */
class ScheduleTest extends \PHPUnit_Framework_TestCase
{
    public function testAddValidTimeslot()
    {
        $schedule = new \Schedule();
        $musicAct = new \MusicAct(
            new \Artist('Bruno Mars'),
            'description',
            new \DateTime('2019-01-01 00:00:00'),
            new \DateTime('2019-01-01 00:59:00')
        );

        $this->assertFalse($schedule->overlaps($musicAct));

        $schedule->addTimeslot($musicAct);

        $this->assertTrue($schedule->overlaps($musicAct));
    }

    public function testAddOverlappingTimeslots()
    {
        $schedule = new \Schedule();
        $musicAct = new \MusicAct(
            new \Artist('Bruno Mars'),
            'description',
            new \DateTime('2019-01-01 00:00:00'),
            new \DateTime('2019-01-01 00:59:00')
        );

        $comedyAct = new \ComedyAct(
            new \Artist('Mr Bean'),
            'description',
            new \DateTime('2019-01-01 00:30:00'),
            new \DateTime('2019-01-01 01:59:00')
        );

        $this->assertFalse($schedule->overlaps($musicAct));
        $this->assertFalse($schedule->overlaps($comedyAct));

        $schedule->addTimeslot($musicAct);

        $this->assertTrue($schedule->overlaps($musicAct));
        $this->assertTrue($schedule->overlaps($comedyAct));
    }
}