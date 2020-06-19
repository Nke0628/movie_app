<?php

namespace App\Http\Controllers;

use App\Exceptions\UnexpectedValueException;

class TestController extends Controller
{
    /**
     * APIエラー処理生成サンプル
     */
    public function test()
    {
        try
        {
            throw new UnexpectedValueException('This is UnexpectedError');
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
