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
        usort($this->timeslots, function ($task1, $task2) {
            /**
             * @DONE: Implementation
             */
            return $task1->getStartsAt() < $task2->getStartsAt() ? -1 : 1;
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
         * @DONE: Implementation
         */
        return count($this->timeslots);
    }

    /**
     * @return void
     */
    function rewind()
    {
        /**
         * @DONE: Implementation
         */
        $this->currentPosition = 0;
    }

    /**
     * @return mixed
     */
    function current()
    {
        /**
         * @DONE: Implementation
         */
        return $this->timeslots[$this->currentPosition];
    }

    /**
     * @return mixed
     */
    function key()
    {
        /**
         * @DONE: Implementation
         */
        return $this->currentPosition;
    }

    /**
     * @return void
     */
    function next()
    {
        /**
         * @DONE: Implementation
         */
        return $this->currentPosition;
    }

    /**
     * @return bool
     */
    function valid() {
        /**
         * @DONE: Implementation
         */
        return !!$this->timeslots[$this->currentPosition];
    }
}