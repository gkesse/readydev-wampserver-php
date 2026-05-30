<?php

declare(strict_types=1);

namespace app\view;

class Main
{
    private string $pageTitle;
    private string $pageLanguage;
    private string $pageEncoding;
    private string $pageLogo;
    private string $pageLogoMimeType;

    public function __construct()
    {
        $mainController = new \app\controller\Main();

        $this->pageTitle = $mainController->getPageTitle("QUnit Tests");
        $this->pageLanguage = $mainController->getPageLanguage();
        $this->pageEncoding = $mainController->getPageEncoding();
        $this->pageLogo = $mainController->getPageLogo();
        $this->pageLogoMimeType = $mainController->getPageLogoMimeType();
    }

    public function run(): void
    {
        $outputText = "";
        $outputText .= \sprintf("<!DOCTYPE html>\n");
        $outputText .= \sprintf("<html lang='%s'>\n", $this->pageLanguage);
        $outputText .= \sprintf("<head>\n");
        $this->runHeader($outputText);
        $outputText .= \sprintf("</head>\n");
        $outputText .= \sprintf("<body>\n");
        $this->runBody($outputText);
        $outputText .= \sprintf("</body>\n");
        $outputText .= \sprintf("</html>\n");
        echo $outputText;
    }

    private function runHeader(string &$p_out_text): void
    {
        $p_out_text .= \sprintf("<title>%s</title>\n", $this->pageTitle);
        $p_out_text .= \sprintf("<meta charset='%s'/>\n", $this->pageEncoding);
        $p_out_text .= \sprintf("<link rel='shortcut icon' type='%s' href='%s'/>\n", $this->pageLogoMimeType, $this->pageLogo);
        $p_out_text .= \sprintf("<link rel='stylesheet' href='https://code.jquery.com/qunit/qunit-2.25.0.css'/>\n");
    }

    private function runBody(string &$p_out_text): void
    {
        $p_out_text .= \sprintf("<div id='qunit'></div>\n");
        $p_out_text .= \sprintf("<div id='qunit-fixture'></div>\n");
        $p_out_text .= \sprintf("<script src='https://code.jquery.com/qunit/qunit-2.25.0.js'></script>\n");
        $this->runScriptJs($p_out_text);
    }

    private function runScriptJs(string &$p_out_text): void
    {
        $p_out_text .= \sprintf("<script src='/public/tests/js/app/view/MainTest.js'></script>\n");
    }
}
