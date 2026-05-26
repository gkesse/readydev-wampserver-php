<?php

declare(strict_types=1);

namespace app\controller;

class Main
{
    public function __construct() {}

    public function getSiteName(): string
    {
        return "ReadyDEV";
    }

    public function getPageTitle(string $p_in_title = ""): string
    {
        if ($p_in_title != "") {
            $p_in_title = " | " . $p_in_title;
        }
        $titleText = $this->getSiteName() . $p_in_title;
        return $titleText;
    }

    public function getPageLanguage(): string
    {
        return "fr";
    }

    public function getPageEncoding(): string
    {
        return "UTF-8";
    }

    public function getPageLogoMimeType(): string
    {
        return "image/png";
    }

    public function getPageLogo(): string
    {
        return "/public/data/img/logo.png";
    }
}
