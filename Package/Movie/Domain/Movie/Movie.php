<?php


namespace Package\Movie\Domain\Movie;

use Carbon\Carbon;

class Movie
{
    /** @var string */
    private $movieId;

    /** @var string */
    private $movieName;

    /** @var Carbon */
    private $startDate;

    /** @var Carbon */
    private $endDate;

    /** @var string */
    private $description;

    /**
     * Movie constructor.
     * @param string $movieId
     * @param string $movieName
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @param string $description
     */
    public function __construct(string $movieId, string $movieName, Carbon $startDate, Carbon $endDate, string $description)
    {
        $this->movieId = $movieId;
        $this->movieName = $movieName;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getMovieId(): string
    {
        return $this->movieId;
    }

    /**
     * @return string
     */
    public function getMovieName(): string
    {
        return $this->movieName;
    }

    /**
     * @return Carbon
     */
    public function getStartDate(): Carbon
    {
        return $this->startDate;
    }

    /**
     * @return Carbon
     */
    public function getEndDate(): Carbon
    {
        return $this->endDate;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}
