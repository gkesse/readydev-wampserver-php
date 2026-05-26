<?php

declare(strict_types=1);

namespace app\page;

/**
 * Cree le contenu de la page du site.
 * Permet de creer le contenu de la page du site.
 * @package app\page
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Page
{
    /**
     * Construit le contenu de la page du site.
     * Permet de construire le contenu de la page du site.
     */
    public function __construct() {}

    /**
     * Affiche le contenu de la page du site.
     * Permet d'afficher le contenu de la page du site.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    public function run(string &$p_out_text): void
    {
        $p_out_text .= \sprintf("<h1>Bonjour tout le monde!</h1>\n");
    }
}
