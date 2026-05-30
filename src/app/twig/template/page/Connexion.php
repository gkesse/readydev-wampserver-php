<?php

declare(strict_types=1);

namespace app\twig\template\page;

/**
 * Cree le controleur du template de la page de connexion.
 * Permet de creer le controleur du template de la page de connexion.
 * @package app\twig\template\page
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Connexion extends Page
{
    /**
     * Construit le controleur du template de la page de connexion.
     * Permet de construire le controleur du template de la page de connexion.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retourne le chemin du template twig.
     * Permet de retourner le chemin du template twig.
     * @return string Indique le chemin du template twig.
     */
    public function getTemplateFile(): string
    {
        return 'page/connexion.page.twig';
    }
}
