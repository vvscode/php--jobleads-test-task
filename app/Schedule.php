<?php

/**
 * Class Schedule
 */
class Schedule implements Iterator, Countable {
    /**
     * @var array
     */
    private $timeslots;

    /**
     *
     */
    public function __construct()
    {
        $this->timeslots = array();
    }

    /**
     * @param Timeslot $timeslot
     * @return $this
     */
    public function addTimeslot(Timeslot $timeslot)
    {
        if (!$this->overlaps($timeslot)) {
            $this->timeslots[] = $timeslot;
        }

        $this->sortByStartTime();
    }

    /**
     * Sort slots by starting time
     */
    private function sortByStartTime()
    {
        usort($this->timeslots, function () {
            /**
             * @TODO: Implementation
             */
        });
    }

    /**
     * @param Timeslot $timeslot
     * @return bool
     */
    public function overlaps(Timeslot $timeslot)
    {
        foreach ($this->timeslots as $existingSlot) {
            if ($timeslot->overlaps($existingSlot)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return int
     */
    public function count()
    {
        /**
         * @TODO: Implementation
         */
    }

    /**
     * @return void
     */
    function rewind()
    {
        /**
         * @TODO: Implementation
         */
    }

    /**
     * @return mixed
     */
    function current()
    {
        /**
         * @TODO: Implementation
         */
    }

    /**
     * @return mixed
     */
    function key()
    {
        /**
         * @TODO: Implementation
         */
    }

    /**
     * @return void
     */
    function next()
    {
        /**
         * @TODO: Implementation
         */
    }

    /**
     * @return bool
     */
    function valid() {
        /**
         * @TODO: Implementation
         */
    }
}