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
    private \Twig\Environment $m_twigEnvironment;
    /**
     * Stocke le controller de template.
     * @var \twig\controller\Template
     */
    private \twig\controller\Template $m_controller;

    /**
     * Construit le module de template twig.
     * Permet de construire le module de template twig.
     * @param \twig\controller\Template $p_in_controller Indique le controller de template.
     */
    public function __construct(\twig\controller\Template $p_in_controller)
    {
        $this->m_controller = $p_in_controller;

        $loader = new \Twig\Loader\FilesystemLoader($this->m_controller->getTemplateDir());
        $debug = new \app\php\controller\Debug();

        $this->m_twigEnvironment = new \Twig\Environment($loader, [
            'cache' => false,
            'debug' => $debug->isDebug(),
            'strict_variables' => $debug->isDebug()
        ]);

        if ($debug->isDebug()) {
            $this->m_twigEnvironment->addExtension(new \Twig\Extension\DebugExtension());
        }

        $this->m_controller->addGlobal($this->m_twigEnvironment);
        $this->m_controller->addRuntimeLoader($this->m_twigEnvironment);
        $this->m_controller->addExtension($this->m_twigEnvironment);
    }

    /**
     * Realise le rendu du template twig.
     * Permet de realiser le rendu du template twig.
     * @param string $p_in_view Indique la vue de template à rendre.
     * @return string Indique le rendu du template twig.
     */
    public function render(string $p_in_view): string
    {
        return $this->m_twigEnvironment->render((string)$p_in_view, $this->m_controller->getTemplateData());
    }
}
