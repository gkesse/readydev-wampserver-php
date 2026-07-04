<?php

declare(strict_types=1);

namespace app\twig\view;

require "./vendor/autoload.php";

/**
 * Cree la page de la vue principale du site.
 * Permet de creer la page de la vue principale du site.
 * @package app\twig\view
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Main
{
    /**
     * Stocke le module de template twig.
     * @var \twig\module\Template
     */
    private \twig\module\Template $m_templateModule;

    /**
     * Stocke le fichier de template twig.
     * @var string
     */
    private string $m_templateFile;

    /**
     * Construit la page de la vue principale du site.
     * Permet de construire la page de la vue principale du site.
     */
    public function __construct()
    {
        $mainController = new \app\twig\controller\Main();
        $mainTemplateController = $mainController->getMainTemplateController();
        $this->m_templateModule = new \twig\module\Template($mainTemplateController);
        $this->m_templateFile = $mainController->getTemplateFile();
    }

    /**
     * Affiche la page de la vue principale du site.
     * Permet d'afficher la page de la vue principale du site.
     */
    public function run(): void
    {
        echo $this->m_templateModule->render($this->m_templateFile);
    }
}
