<?php

declare(strict_types=1);

namespace app\twig\template\controller;

/**
 * Cree le controleur du template de la page principale.
 * Permet de creer le controleur du template de la page.
 * @package app\twig\template\controller
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Main extends \twig\controller\Template
{
    /**
     * Stocke les données du template twig.
     * @var array
     */
    private array $m_templateData;

    /**
     * Construit le controleur de la vue principale du site.
     * Permet de construire le controleur de la vue principale du site.
     * @param string $p_in_template_dir Indique le chemin du repertoire des templates twig.
     */
    public function __construct(string $p_in_template_dir)
    {
        parent::__construct($p_in_template_dir);

        $mainController = new \app\twig\controller\Main();
        $pageTemplateController = $mainController->getPageTemplateController();

        $this->m_templateData = [
            'main' => $mainController,
            'page' => $pageTemplateController
        ];
    }

    /**
     * Retourne les données du template twig.
     * Permet de retourner les données du template twig.
     * @return array Indique les données du template twig.
     */
    public function getTemplateData(): array
    {
        return $this->m_templateData;
    }
}
