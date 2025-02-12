<?php

namespace App\Exceptions;

use App\Traits\ResponseMethodTrait;
use Exception;
use Illuminate\Http\JsonResponse;

class AuthorizationException extends Exception
{
    use ResponseMethodTrait;

    public function render($request): JsonResponse
    {
        return $this->sendError(errorMessages: __('Unauthorized. Sorry! you don`t have permission.'), result: [], code: 401);
    }
}
