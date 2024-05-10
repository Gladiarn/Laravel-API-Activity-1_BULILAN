<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return response()->json([
                'message' => 'EXCUSE ME, YOU FORGOT SOMETHING.',
                'errors' => $exception->validator->getMessageBag()
            ], 422);
        }

        return parent::render($request, $exception);
    }
}
