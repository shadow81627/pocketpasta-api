<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(
            \LaravelJsonApi\Exceptions\ExceptionParser::make()->renderable()
        );
    }

    public function report(Throwable $exception)
    {
        if (app()->bound('sentry') && $this->shouldReport($exception)) {
            $user = request()->user();
            if ($user) {
                \Sentry\configureScope(function (\Sentry\State\Scope $scope) use ($user): void {
                    $scope->setUser($user);
                });
            }
            app('sentry')->captureException($exception);
        }

        parent::report($exception);
    }
}
