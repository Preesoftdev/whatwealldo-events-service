<?php

namespace App\Exceptions;

use App\Traits\ResponseMethodTrait;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ResponseMethodTrait;

    protected $levels = [
        //
    ];

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->renderable(function (NotFoundHttpException $exception, Request $request) {
            if ($request->is('api/*')) {
                if ($exception->getPrevious()) {
                    return $this->sendError(errorMessages: 'Data does not exist against the desire id.');
                } else {
                    return $this->sendError(errorMessages: 'Sorry route not found.');
                }
            }
        });

        $this->renderable(function (AuthenticationException $exception, Request $request) {
            if ($request->is('api/*')) {
                return $this->sendError(errorMessages: 'User is unauthenticated.', result: [], code: 401);
            }
        });

        $this->renderable(function (ValidationException $exception, Request $request) {
            if ($request->is('api/*')) {
                return $this->sendError(errorMessages: $exception->validator->errors(), result: [], code: 422);
            }
        });
    }
}
