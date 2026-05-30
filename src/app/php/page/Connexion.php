<?php

declare(strict_types=1);

namespace app\php\page;

/**
 * Cree le contenu de la page de connexion.
 * Permet de creer le contenu de la page de connexion.
 * @package app\php\page
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Connexion extends Page
{
    /**
     * Construit le contenu de la page de connexion.
     * Permet de construire le contenu de la page de connexion.
     */
    public function __construct() {}

    /**
     * Affiche le contenu de la page de connexion.
     * Permet d'afficher le contenu de la page de connexion.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    public function run(string &$p_out_text): void
    {
        $p_out_text .= \sprintf("<h1>Bienvenue sur la page de connexion!</h1>\n");
    }
}
