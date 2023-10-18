<?php

namespace Application\controllers;

use Pecee\SimpleRouter\SimpleRouter;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class HomeController extends AbstractViewController
{
    /**
     * @return void
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function homeAction(): void
    {
        echo $this->render(
            'home.twig',
            [
                'data'     => $this->getStorage()->get(),
                'clearURI' => SimpleRouter::getUrl('clearData')
            ]
        );
    }
}