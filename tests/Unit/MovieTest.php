<?php

namespace Tests\Unit;

use Package\Movie\Infrastructure\InMemory\InMemoryMovieRepository;
use Package\Movie\UseCase\Movie\CreateMovieUseCase;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tests\TestCase;

class MovieTest extends TestCase
{
    /** @var array  */
    private $db = [];

    /**
     * A basic unit test example.
     *
     * @test
     * @return void
     */
    public function 映画を登録する()
    {
        $aPostData= array(
            'movie_id' => 'id',
            'movie_name' => 'test',
            'start_date' => '20200620',
            'end_date' => '20200720',
            'description' => '映画の説明',
        );

        $aRepository = new InMemoryMovieRepository();
        $aUseCase = new CreateMovieUseCase( $aRepository );
        $aResult = $aUseCase->exexute( $aPostData );
        $this->assertEquals(  );
    }

    /**
     * @test
     * @expectedException \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function 不正パラメータを渡すと例外が発生すること()
    {
        $aPostData= array(
            'movie_name' => 'test',
            'start_date' => '20200620',
            'end_date' => '20200720',
            'description' => '映画の説明',
        );

        $aRepository = new InMemoryMovieRepository();
        $aUseCase = new CreateMovieUseCase( $aRepository );
        $aResult = $aUseCase->exexute( $aPostData );
    }
}
