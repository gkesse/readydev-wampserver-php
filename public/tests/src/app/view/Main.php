<?php

declare(strict_types=1);

namespace app\view;

class Main
{
    private string $m_pageTitle;
    private string $m_pageLanguage;
    private string $m_pageEncoding;
    private string $m_pageLogo;
    private string $m_pageLogoMimeType;

    public function __construct()
    {
        $mainController = new \app\controller\Main();

        $this->m_pageTitle = $mainController->getPageTitle("QUnit Tests");
        $this->m_pageLanguage = $mainController->getPageLanguage();
        $this->m_pageEncoding = $mainController->getPageEncoding();
        $this->m_pageLogo = $mainController->getPageLogo();
        $this->m_pageLogoMimeType = $mainController->getPageLogoMimeType();
    }

    public function run(): void
    {
        $outputText = "";
        $outputText .= \sprintf("<!DOCTYPE html>\n");
        $outputText .= \sprintf("<html lang='%s'>\n", $this->m_pageLanguage);
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
        $p_out_text .= \sprintf("<title>%s</title>\n", $this->m_pageTitle);
        $p_out_text .= \sprintf("<meta charset='%s'/>\n", $this->m_pageEncoding);
        $p_out_text .= \sprintf("<link rel='shortcut icon' type='%s' href='%s'/>\n", $this->m_pageLogoMimeType, $this->m_pageLogo);
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
        $p_out_text .= \sprintf("<script src='/public/js/app/controller/Tools.js'></script>\n");
        $p_out_text .= \sprintf("<script src='/public/tests/js/app/view/MainTest.js'></script>\n");
    }
}
