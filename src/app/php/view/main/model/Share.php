<?php

declare(strict_types=1);

namespace app\php\view\main\model;

/**
 * Cree le modele de donnees pour le partage.
 * Permet de creer le modele de donnees pour le partage.
 * @package app\php\view\main\model
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Share
{
    /**
     * Stocke l'URL de partage sur Facebook.
     * @var string
     */
    public string $m_facebookUrl;
    /**
     * Stocke l'URL de partage sur LinkedIn.
     * @var string
     */
    public string $m_linkedInUrl;
}
