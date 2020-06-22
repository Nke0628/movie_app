<?php

namespace Package\Movie\Domain\Factory;

use Carbon\Carbon;
use Package\Movie\Domain\Movie\Movie as MovieEntity;

class MovieFactory
{
    /**
     * Movieエンティティ生成
     *
     * @param string $movieId
     * @param string $movieName
     * @param string $startDate
     * @param string $endDate
     * @param string $description
     * @return MovieEntity
     */
    public static function createMovieEntity(string $movieId, string $movieName, string $startDate, string $endDate, string $description)
    {
        return new MovieEntity(
            $movieId,
            $movieName,
            new Carbon($startDate),
            new Carbon($endDate),
            $description
        );
    }
}
