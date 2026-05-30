<?php

declare(strict_types=1);

namespace app\twig\controller;

/**
 * Cree le controleur de la vue principale du site.
 * Permet de creer le controleur de la vue principale du site.
 * @package twig\controller
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Main
{
    public function __construct() {}

    public function getTemplateDir(): string
    {
        return __DIR__ . '/../template/view';
    }

    public function getTemplateFile(): string
    {
        return 'page/main.page.twig';
    }

    public function getTemplateController(): \twig\controller\Template
    {
        $controller = new \app\twig\template\controller\Main($this->getTemplateDir());
        return $controller;
    }
}
