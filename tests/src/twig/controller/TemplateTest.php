<?php

declare(strict_types=1);

namespace twig\controller;

use PHPUnit\Framework\TestCase;

final class TemplateTest extends TestCase
{
    public function test_general(): void
    {
        // cree un controleur de template twig
        $controller = new \twig\controller\Template(__DIR__);
        // teste le répertoire de template twig
        $this->assertSame($controller->getTemplateDir(), __DIR__);
        // teste les donnees de template twig
        $this->assertSame($controller->getTemplateData(), []);

        // cree un mock du controller de template twig
        $controller2 = $this->createMock(\twig\controller\Template::class);
        // définit les donnees de template twig
        $controller2->expects($this->once())
            ->method('getTemplateData')
            ->willReturn(['name' => 'ReadyDEV']);
        // teste les donnees de template twig
        $this->assertSame($controller2->getTemplateData(), ['name' => 'ReadyDEV']);
    }
}
