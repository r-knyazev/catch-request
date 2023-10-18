<?php

namespace Application;

use Application\controllers\CatchController;
use Application\controllers\ClearController;
use Application\controllers\HomeController;
use Pecee\Http\Middleware\Exceptions\TokenMismatchException;
use Pecee\SimpleRouter\Exceptions\HttpException;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;

class Application
{
    /**
     * @return void
     * @throws TokenMismatchException
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function run(): void
    {
        SimpleRouter::get('/', [HomeController::class, 'homeAction'])->name('home');
        SimpleRouter::get('/clear/data', [ClearController::class, 'clearAction'])->name('clearData');
        SimpleRouter::all('/catch', [CatchController::class, 'catchAction'])->name('catch');

        SimpleRouter::start();
    }
}