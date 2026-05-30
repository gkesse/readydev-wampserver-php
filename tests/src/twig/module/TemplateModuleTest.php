<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class TemplateModuleTest extends TestCase
{
    public function test_Lecture_Ecriture(): void
    {
        // si on cree le controller de template
        $controller1 = new \twig\controller\Template(__DIR__);
        // si on cree le module de template
        $template1 = new \twig\module\Template($controller1);
        // si on recupere le rendu du template
        $output1 = $template1->render("test.module.twig");
        // on doit avoir cette egalite avec le rendu du template
        $this->assertStringContainsString("<p>Bonjour </p>", $output1);

        // si on cree un mock du controller de template
        $controller2 = $this->createMock(\twig\controller\Template::class);
        // si on définit le repertoire de template
        $controller2->expects($this->once())
            ->method('getTemplateDir')
            ->willReturn(__DIR__);
        // si on définit les données de template
        $controller2->expects($this->once())
            ->method('getTemplateData')
            ->willReturn(['name' => 'ReadyDEV']);
        // si on cree le module de template
        $template2 = new \twig\module\Template($controller2);
        // si on recupere le rendu du template
        $output2 = $template2->render("test.module.twig");
        // on doit avoir cette egalite avec le rendu du template
        $this->assertSame($output2, "<p>Bonjour ReadyDEV</p>");
    }
}
