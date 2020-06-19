<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     */
    public function render( $request, Exception $exception )
    {
        if ($request->wantsJson())
        {
            return $this->handleApiException( $request, $exception );
        }
        else
        {
           return parent::render( $request, $exception );
        }
    }

    /**
     * API例外処理
     *
     * @param $request
     * @param Exception $exception
     * @return \Illuminate\Http\JsonResponse
     */
    private function handleApiException( $request, Exception $exception )
    {
        $exception = $this->prepareException( $exception );

        if ( $exception instanceof HttpResponseException )
        {
            $exception = $exception->getResponse();
        }

        if ( $exception instanceof AuthenticationException )
        {
            $exception = $this->unauthenticated( $request, $exception );
        }

        if ( $exception instanceof ValidationException )
        {
            $exception = $this->convertValidationExceptionToResponse( $exception, $request );
        }

        return $this->customApiResponse( $exception );
    }

    /**
     * エラーレスポンス生成
     *
     * @param $exception
     * @return \Illuminate\Http\JsonResponse
     */
    private function customApiResponse( $exception )
    {
        if ( method_exists($exception, 'getStatusCode') )
        {
            $statusCode = $exception->getStatusCode();
        }
        else
        {
            $statusCode = 500;
        }

        $response = [];

        switch ( $statusCode ) {
            case 400: //下記以外のクライアントエラーはこのコードで処理する
                $response['message'] = 'Bad Request';
                $response['code'] = 10 ;
                break;
            case 401:
                $response['message'] = 'Unauthorized';
                $response['code'] = 20 ;
                break;
            case 403:
                $response['message'] = 'Forbidden';
                $response['code'] = 30 ;
                break;
            case 404:
                $response['message'] = 'Not Found';
                $response['code'] = 40 ;
                break;
            case 405:
                $response['message'] = 'Method Not Allowed';
                $response['code'] = 50 ;
                break;
            case 422:
                $response['message'] = $exception->original['message'];
                $response['errors'] = $exception->original['errors'];
                $response['code'] = 60 ;
                break;
            default:
                $response['message'] = 'Internal Serve Error';
                $response['code'] = 70 ;
                break;
        }

        if (config('app.debug')) {
            $response['trace'] = $exception->getTrace();
        }

        return response()->json($response, $statusCode);
    }
}
