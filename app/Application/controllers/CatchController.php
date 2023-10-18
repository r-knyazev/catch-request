<?php

namespace Application\controllers;

class CatchController extends AbstractController
{
    public function catchAction(): void
    {
        $this->getStorage()->set(
            json_encode(
                [
                    'method'    => $_SERVER['REQUEST_METHOD'],
                    'headers'   => json_encode(getallheaders()),
                    'server'    => json_encode($_SERVER),
                    'post'      => preg_replace(['/\r/', '/\n/'], '', json_encode($_POST)),
                    'get'       => json_encode($_GET),
                    'files'     => json_encode($_FILES),
                    'phpInput'  => json_encode(file_get_contents('php://input'))
                ]
            )
        );
    }
}