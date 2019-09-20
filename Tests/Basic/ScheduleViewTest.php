<?php

namespace Tests\Basic;

/**
 * Class ScheduleViewTest
 */
class ScheduleViewTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTimeslotsForCountingTest
     * @param $timeslots
     * @param int $numberOfTimeslots
     */
    public function testCalculateNumberOfTimeslots($timeslots, int $numberOfTimeslots)
    {
        $schedule = new \Schedule();

        foreach ($timeslots as $timeslot) {
            $schedule->addTimeslot($timeslot);
        }

        $view = new \ScheduleView($schedule);

        $this->assertEquals($numberOfTimeslots, $view->getNumberOfTimeslots());
    }

    /**
     * @dataProvider getTimeslotsForDurationTest
     * @param $timeslots
     * @param int $durationInMinutes
     */
    public function testCalculateAgendaDuration($timeslots, int $durationInMinutes)
    {
        $schedule = new \Schedule();

        foreach ($timeslots as $timeslot) {
            $schedule->addTimeslot($timeslot);
        }

        $view = new \ScheduleView($schedule);

        $this->assertEquals($durationInMinutes, $view->getDurationInMinutes());
    }

    /**
     * @return array
     */
    public function getTimeslotsForCountingTest()
    {
        $musicAct = new \MusicAct(
            new \Artist('Bruno Mars'),
            'description',
            new \DateTime('2019-01-01 00:00:00'),
            new \DateTime('2019-01-01 00:59:00')
        );

        $comedyAct = new \ComedyAct(
            new \Artist('Mr Bean'),
            'description',
            new \DateTime('2019-01-01 02:00:00'),
            new \DateTime('2019-01-01 02:59:00')
        );

        return array(
            array(array(), 0,),
            array(array($musicAct), 1),
            array(array($musicAct, $musicAct), 1),
            array(array($musicAct, $comedyAct), 2),
        );
    }

    /**
     * @return array
     */
    public function getTimeslotsForDurationTest()
    {
        $musicAct = new \MusicAct(
            new \Artist('Bruno Mars'),
            'description',
            new \DateTime('2019-01-01 00:00:00'),
            new \DateTime('2019-01-01 00:59:00')
        );

        $comedyAct = new \ComedyAct(
            new \Artist('Mr Bean'),
            'description',
            new \DateTime('2019-01-01 02:00:00'),
            new \DateTime('2019-01-01 02:59:00')
        );

        return array(
            array(array(), 0,),
            array(array($musicAct), 59),
            array(array($musicAct, $musicAct), 59),
            array(array($musicAct, $comedyAct), 60 + 60 + 59),
            array(array($comedyAct, $musicAct), 60 + 60 + 59),
        );
    }
}