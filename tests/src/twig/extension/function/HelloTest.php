<?php

declare(strict_types=1);

namespace twig\extension\function;

use PHPUnit\Framework\TestCase;

class HelloExtension extends \Twig\Extension\AbstractExtension
{
    public function sayHello(string $p_in_name): string
    {
        return "Bonjour, {$p_in_name}";
    }

    public function getFunctions(): array
    {
        return [
            new \Twig\TwigFunction('hello_say_hello', [$this, 'sayHello']),
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

        // crée le module de template twig
        $template = new \twig\module\Template($controller);

        // récupère le rendu du template twig
        $output = $template->render("test.extension.twig");

        // teste l'utilisation de l'extension de template twig
        $this->assertSame($output, "<p>Bonjour, ReadyDEV</p>");
    }
}
