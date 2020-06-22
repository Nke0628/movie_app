<?php

namespace App\Http\Controllers\Movie;

use App\Eloquent\Movie;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Package\Movie\Domain\FormRequest\MovieRequestInterface;
use Package\Movie\UseCase\Movie\CreateMovieUseCase;
use Webpatser\Uuid\Uuid;

class MovieController extends Controller
{
    /** @var CreateMovieUseCase */
    private $createMovieUseCase;

    public function __construct( CreateMovieUseCase $createMovieUseCase )
    {
        $this->createMovieUseCase = $createMovieUseCase;
    }

    /**
     * 映画を登録するc
     *
     * @param MovieRequestInterface $pRequest
     */
    public function createMovie()
    {
        $aRet = array();

//        $aParam = $this->_CreateContentParam( $pRequest );
//        $aParam = array(
//            'movie_id' => '55',
//            'movie_name' => 't',
//            'start_date' => '20200620',
//            'end_date' => '20200630',
//            'description' => '$pRequest->getDescription()'
//        );
//        $aResult = $this->createMovieUseCase->exexute( $aParam );

//        if ( $aResult )
//        {
//        }
        $aRet = Movie::all();
        return response()->json($aRet);
    }

    private function _CreateContentParam( MovieRequestInterface $pRequest )
    {
        return array(
            'movie_id' => Uuid::generate(),
            'movie_name' => $pRequest->getMovieName(),
            'start_date' => $pRequest->getStartDate(),
            'end_date' => $pRequest->getEndDate(),
            'description' => $pRequest->getDescription()
        );
    }
}
