<?php

declare(strict_types=1);

namespace twig\module;

/**
 * Cree le module de template twig.
 * Permet de creer le module de template twig.
 * @package twig\module
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Template
{
    /**
     * Stocke l'environnement de twig.
     * @var \Twig\Environment
     */
    private \Twig\Environment $twig;
    /**
     * Stocke le controller de template.
     * @var \twig\controller\Template
     */
    private \twig\controller\Template $controller;

    /**
     * Construit le module de template twig.
     * Permet de construire le module de template twig.
     * @param \twig\controller\Template $p_in_controller Indique le controller de template.
     */
    public function __construct(\twig\controller\Template $p_in_controller)
    {
        $this->controller = $p_in_controller;

        $loader = new \Twig\Loader\FilesystemLoader($this->controller->getTemplateDir());
        $debug = new \app\php\controller\Debug();

        $this->twig = new \Twig\Environment($loader, [
            'cache' => false,
            'debug' => $debug->isDebug()
        ]);

        if ($debug->isDebug()) {
            $this->twig->addExtension(new \Twig\Extension\DebugExtension());
        }

        $this->controller->addExtension($this->twig);
    }

    /**
     * Realise le rendu du template twig.
     * Permet de realiser le rendu du template twig.
     * @param string $p_in_view Indique la vue de template à rendre.
     * @return string Indique le rendu du template twig.
     */
    public function render(string $p_in_view): string
    {
        return $this->twig->render((string)$p_in_view, $this->controller->getTemplateData());
    }
}
