<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class HelloTest extends TestCase
{
    public function test_Lecture_Ecriture(): void
    {
        // si on cree un mock du controller de template
        $controller = $this->createMock(\twig\controller\Template::class);
        // si on définit le repertoire de template
        $controller->expects($this->once())
            ->method('getTemplateDir')
            ->willReturn(__DIR__);
        // si on définit les données de template
        $controller->expects($this->once())
            ->method('getTemplateData')
            ->willReturn(['name' => 'ReadyDEV']);
        // si on définit l'extension de template
        $controller->expects($this->once())
            ->method('addExtension')
            ->willReturnCallback(function (\Twig\Environment $twig) {
                $twig->addExtension(new \twig\extension\Hello());
            });
        // si on cree le module de template
        $template = new \twig\module\Template($controller);
        // si on recupere le rendu du template
        $output = $template->render("test.extension.twig");
        // on doit avoir cette egalite avec le rendu du template
        $this->assertSame($output, "<p>Bonjour ReadyDEV</p>");
    }
}
