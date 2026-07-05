<?php

declare(strict_types=1);

namespace twig\macro\include;

use PHPUnit\Framework\TestCase;

final class HelloTest extends TestCase
{
    public function test_general(): void
    {
        // crée un mock du controller de template twig
        $controller = $this->createMock(\twig\controller\Template::class);

        // définit le repertoire de template twig
        $controller->expects($this->once())
            ->method('getTemplateDir')
            ->willReturn(__DIR__ . "/res");

        // définit les données de template twig
        $controller->expects($this->once())
            ->method('getTemplateData')
            ->willReturn(['name' => 'ReadyDEV']);

        // crée le module de template twig
        $template = new \twig\module\Template($controller);
        // récupère le rendu du template twig
        $output = $template->render("test.module.twig");
        // teste le rendu du template twig
        $this->assertSame($output, "        <p>Bonjour,     READYDEV\n</p>\n");
    }
}
