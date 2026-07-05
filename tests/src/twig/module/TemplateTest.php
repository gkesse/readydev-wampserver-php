<?php

declare(strict_types=1);

namespace twig\module;

use PHPUnit\Framework\TestCase;

final class TemplateTest extends TestCase
{
    public function test_general(): void
    {
        // crée le controller de template twig
        $controller01 = new \twig\controller\Template(__DIR__ . "/res");
        // crée le module de template twig
        $template01 = new \twig\module\Template($controller01);
        // récupère le rendu du template twig
        $output01 = $template01->render("test.module.twig");
        // teste le rendu du template twig
        $this->assertSame("<p>Bonjour, </p>", $output01);

        // crée un mock du controller de template twig
        $controller02 = $this->createMock(\twig\controller\Template::class);

        // définit le repertoire de template twig
        $controller02->expects($this->once())
            ->method('getTemplateDir')
            ->willReturn(__DIR__ . "/res");

        // définit les données de template twig
        $controller02->expects($this->once())
            ->method('getTemplateData')
            ->willReturn(['name' => 'ReadyDEV']);

        // crée le module de template twig
        $template02 = new \twig\module\Template($controller02);
        // récupère le rendu du template twig
        $output02 = $template02->render("test.module.twig");
        // teste le rendu du template twig
        $this->assertSame($output02, "<p>Bonjour, ReadyDEV</p>");
    }
}
