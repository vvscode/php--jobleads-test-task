<?php

class TimeslotView {
    /**
     * @var Timeslot
     */
    private $timeslot;

    /**
     * @param Timeslot $timeslot
     */
    public function __construct(Timeslot $timeslot)
    {
        $this->timeslot = $timeslot;
    }

    /**
     * @return int
     */
    public function getDurationInMinutes()
    {
        /**
         * @DONE: Implementation
         */
        $startsAt =  $this->timeslot->getStartsAt();
        $endsAt = $this->timeslot->getEndsAt();
        return ($endsAt->getTimestamp() - $startsAt->getTimestamp()) / 60;
    }

    /**
     * @param int $length
     * @return string
     */
    public function getDescriptionExcerpt(int $length = 10)
    {
        /**
         * @DONE: Implementation
         */
        return substr($this->timeslot->getDescription(), 0, $length);
    }
}