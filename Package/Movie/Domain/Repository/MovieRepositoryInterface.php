<?php

namespace Package\Movie\Domain\Repository;

use Package\Movie\Domain\Movie\Movie;

interface MovieRepositoryInterface
{
    /**
     * @param Movie $movie
     * @return Movie|null
     */
    public function save( Movie $movie ): Movie;
}
