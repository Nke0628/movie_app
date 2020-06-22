<?php

namespace App\Http\Controllers\Movie;

use App\Eloquent\Movie;
use App\Http\Controllers\Controller;
use Package\Movie\UseCase\Movie\CreateMovieUseCase;

class showScreeningMovieController extends Controller
{
    /** @var CreateMovieUseCase */
    private $createMovieUseCase;

    public function __construct( CreateMovieUseCase $createMovieUseCase )
    {
        $this->createMovieUseCase = $createMovieUseCase;
    }

    public function createMovie()
    {
        $aRet = Movie::all();
        return response()->json($aRet);
    }

}
