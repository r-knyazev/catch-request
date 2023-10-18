<?php

namespace Application\controllers;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;

abstract class AbstractViewController extends AbstractController
{
    private ?Environment $view = null;

    /**
     * @param string $template
     * @param array $variables
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    protected function render(string $template, array $variables): string
    {
        return $this->getView()->render($template, $variables);
    }

    /**
     * @return Environment
     */
    private function getView(): Environment
    {
        if (!is_null($this->view)) {
            return $this->view;
        }

        $this->view = new Environment(
            new FilesystemLoader($_ENV['APP_BASE_PATH'] . '/Application/Templates')
        );

        $this->view->addFilter(new TwigFilter('json_decode', fn($arg) => json_decode($arg, true)));
        $this->view->addFilter(new TwigFilter('stripslashes', fn($arg) => stripslashes($arg)));

        return $this->view;
    }
}