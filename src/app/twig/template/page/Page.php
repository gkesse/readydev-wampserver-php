<?php

declare(strict_types=1);

namespace app\twig\template\page;

/**
 * Cree le controleur de template des pages.
 * Permet de creer le controleur de template des pages.
 * @package app\twig\template\page
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Page
{
    public function __construct() {}

    public function getTemplateFile(): string
    {
        return 'page/hello.page.twig';
    }
}
