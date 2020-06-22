<?php

namespace Package\Movie\Infrastructure\Eloquent;

use Package\Movie\Domain\Factory\MovieFactory;
use Package\Movie\Domain\Movie\Movie;
use Package\Movie\Domain\Repository\MovieRepositoryInterface;
use App\Eloquent\Movie as MovieModel;

class MovieRepository implements MovieRepositoryInterface
{
    /**
     * 映画を登録する
     *
     * @param Movie $movie 映画エンティティ
     * @return Movie | null
     */
    public function save( Movie $movie ): Movie
    {
        if ( !$movie instanceof Movie)
        {
            return null;
        }

        $aMovieModel = new MovieModel();
        $aMovieModel->movie_id = $movie->getMovieId();
        $aMovieModel->movie_name = $movie->getMovieName();
        $aMovieModel->start_date = $movie->getStartDate()->format('YYYYmmdd');
        $aMovieModel->end_date = $movie->getEndDate()->format('YYYYmmdd');
        $aMovieModel->description = $movie->getDescription();
        $aMovieModel->description = '11111';
        $aMovieModel->description = '11111';
        $aMovieModel->save();
        if( !$aMovieModel )
        {
            return null;
        }

        return MovieFactory::createMovieEntity(
            $aMovieModel->movie_id,
            $aMovieModel->movie_name,
            $aMovieModel->start_date,
            $aMovieModel->end_date,
            $aMovieModel->description
        );
    }
}
