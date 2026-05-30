<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class TemplateControllerTest extends TestCase
{
    public function test_Lecture_Ecriture(): void
    {
        // si on cree le controller de template
        // si on définit le repertoire de template
        $controller = new \twig\controller\Template(__DIR__);
        // on doit avoir cette egalite avec le repertoire de template
        $this->assertSame($controller->getTemplateDir(), __DIR__);
        // on doit avoir cette egalite avec les donnees de template
        $this->assertSame($controller->getTemplateData(), []);

        // si on cree un mock du controller de template
        $controller2 = $this->createMock(\twig\controller\Template::class);
        // si on définit les donnees de template
        $controller2->expects($this->once())
            ->method('getTemplateData')
            ->willReturn(['name' => 'ReadyDEV']);
        // on doit avoir cette egalite avec les donnees de template
        $this->assertSame($controller2->getTemplateData(), ['name' => 'ReadyDEV']);
    }
}
