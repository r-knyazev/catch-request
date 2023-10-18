<?php

namespace Application\controllers;

use Pecee\SimpleRouter\SimpleRouter;

class ClearController extends AbstractController
{
    public function clearAction(): void
    {
        $this->getStorage()->clear();

        SimpleRouter::response()->redirect(SimpleRouter::getUrl('home'));
    }
}