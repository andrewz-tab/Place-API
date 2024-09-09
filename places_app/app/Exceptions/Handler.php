<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $exception)
    {
        if($request->is('api/*')){
            if($exception instanceof ModelNotFoundException){
                return response()->json([
                    'message' => 'Not Found'
                ], 404);
            }
            if ($exception instanceof ValidationException) {
                return response()->json([
                    'code' => $exception->status,
                    'message' => $exception->getMessage(),
                    'errors' => $exception->errors()
                ], $exception->status);
            }
            if($exception instanceof JWTException){
                return response()->json([
                    'message' => $exception->getMessage(),
                ], 401);
            }
            return parent::render($request, $exception);
        }
    }
}
