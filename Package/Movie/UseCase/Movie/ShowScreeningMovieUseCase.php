<?php

namespace Package\Movie\UseCase\Movie;

use App\Exceptions\UnexpectedValueException;
use Package\Movie\Domain\Movie\Movie;
use Package\Movie\Domain\Repository\MovieRepositoryInterface;
use Package\Movie\Domain\Factory\MovieFactory;

class ShowScreeningMovieUseCase
{
    /** @var MovieRepositoryInterface */
    private $movieRepository;

    public function __construct( MovieRepositoryInterface $movieRepository )
    {
        $this->movieRepository = $movieRepository;
    }

    /**
     * 上映中の映画一覧を表示する
     *
     * @param array $pParam
     * @return Movie
     */
    public function exexute( array $pParam )
    {
        /**
         * Step1 現在含め一週間の映画情報を取得
         */
        $this->movieRepository->getMovieList
    }
}
