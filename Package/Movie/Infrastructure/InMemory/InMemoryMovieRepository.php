<?php

namespace Package\Movie\Infrastructure\InMemory;

use Package\Movie\Domain\Factory\MovieFactory;
use Package\Movie\Domain\Movie\Movie;
use Package\Movie\Domain\Repository\MovieRepositoryInterface;

class InMemoryMovieRepository implements MovieRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function save( Movie $movie ): Movie
    {
        if ( !$movie instanceof Movie )
        {
            return null;
        }
        return MovieFactory::createMovieEntity(
            'movie_id',
            'movie_name',
            '20200620',
            '20200720',
            '映画の説明'
        );
    }
}
