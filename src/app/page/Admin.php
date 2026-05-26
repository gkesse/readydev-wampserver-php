<?php

declare(strict_types=1);

namespace app\page;

/**
 * Cree le contenu de la page d'administration.
 * Permet de creer le contenu de la page d'administration.
 * @package app\page
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Admin extends Page
{
    /**
     * Construit le contenu de la page d'administration.
     * Permet de construire le contenu de la page d'administration.
     */
    public function __construct() {}

    /**
     * Affiche le contenu de la page d'administration.
     * Permet d'afficher le contenu de la page d'administration.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    public function run(string &$p_out_text): void
    {
        $p_out_text .= \sprintf("<h1>Bienvenue sur la page d'administration!</h1>\n");
    }
}
