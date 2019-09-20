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
         * @TODO: Implementation
         */
        return 0;
    }

    /**
     * @param int $length
     * @return string
     */
    public function getDescriptionExcerpt(int $length = 10)
    {
        /**
         * @TODO: Implementation
         */
        return '';
    }
}