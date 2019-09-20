<?php

/**
 * Class ScheduleView
 */
class ScheduleView {
    /**
     * @var Schedule
     */
    private $schedule;

    /**
     * @param Schedule $schedule
     */
    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    /**
     * @return int
     */
    public function getNumberOfTimeslots()
    {
        /**
         * @DONE: Implementation
         */
        return $this->schedule->count();
    }

    /**
     * return int
     */
    public function getDurationInMinutes()
    {
        /**
         * @DONE: Implementation. Include breaks between timeslots in overall schedule duration.
         */
        if (!$this->schedule->count()) {
            return 0;
        }
        [$firstTimeslot, $lastTimeslot] = $this->schedule->getEdgeTimeslots();
        return (
            $lastTimeslot->getEndsAt()->getTimestamp()
            -
            $firstTimeslot->getStartsAt()->getTimestamp()
            ) / 60;
    }
}