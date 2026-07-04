<?php

declare(strict_types=1);

namespace twig\extension\global;

use PHPUnit\Framework\TestCase;

class HelloRuntime
{
    public function sayHello(string $p_in_name): string
    {
        return "Bonjour, {$p_in_name}";
    }
}

class HelloExtension extends \Twig\Extension\AbstractExtension
{
    public function getGlobals(): array
    {
        return [
            'hello' => new HelloRuntime(),
        ];
    }
}

final class HelloTest extends TestCase
{
    public function test_general(): void
    {
        // cree un mock de l'extension de template twig
        $extension = new HelloExtension();

        // crée un mock du controller de template twig
        $controller = $this->createMock(\twig\controller\Template::class);

        // définit le répertoire de template twig
        $controller->expects($this->once())
            ->method('getTemplateDir')
            ->willReturn(__DIR__ . "/res");

        // définit les données de template twig
        $controller->expects($this->once())
            ->method('getTemplateData')
            ->willReturn(['name' => 'ReadyDEV']);

        // ajoute les extensions de template twig
        $controller->expects($this->once())
            ->method('addExtension')
            ->willReturnCallback(function (\Twig\Environment $p_in_twig_environment) use ($extension) {
                $p_in_twig_environment->addExtension($extension);
            });

        // ajoute les variables globales de template twig
        $controller->expects($this->once())
            ->method('addGlobal')
            ->willReturnCallback(function (\Twig\Environment $p_in_twig_environment) {
                $p_in_twig_environment->addGlobal('hello', new HelloRuntime());
            });

        // crée le module de template twig
        $template = new \twig\module\Template($controller);

        // récupère le rendu du template twig
        $output = $template->render("test.extension.twig");

        // teste l'utilisation de l'extension de template twig
        $this->assertSame("<p>Bonjour, ReadyDEV</p>", $output);
    }
}
