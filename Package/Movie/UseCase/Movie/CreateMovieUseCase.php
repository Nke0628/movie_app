<?php

namespace Package\Movie\UseCase\Movie;

use App\Exceptions\UnexpectedValueException;
use Package\Movie\Domain\Movie\Movie;
use Package\Movie\Domain\Repository\MovieRepositoryInterface;
use Package\Movie\Domain\Factory\MovieFactory;

class CreateMovieUseCase
{
    /** @var MovieRepositoryInterface */
    private $movieRepository;

    public function __construct( MovieRepositoryInterface $movieRepository )
    {
        $this->movieRepository = $movieRepository;
    }

    /**
     * 映画を登録する
     *
     * @param array $pParam
     * @return Movie
     */
    public function exexute( array $pParam )
    {
        try
        {
            /**
            * step1.映画をエンティティ生成
            */
            $aMovie = MovieFactory::createMovieEntity(
                $pParam['movie_id'],
                $pParam['movie_name'],
                $pParam['start_date'],
                $pParam['end_date'],
                $pParam['description']
            );

            /**
            * step2.保存
            */
            $aResult = $this->movieRepository->save( $aMovie );
            if ( !$aResult )
            {
                throw new UnexpectedValueException('映画登録に失敗しました');
            }
            return $aResult;
        }
        catch ( UnexpectedValueException $e )
        {
            report( $e );
            abort(400 );
        }
        catch ( \Exception $e )
        {
            report( $e );
            abort(500 );
        }
    }
}
