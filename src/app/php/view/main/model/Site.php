<?php

declare(strict_types=1);

namespace app\php\view\main\model;

/**
 * Cree le modele de donnees pour le site.
 * Permet de creer le modele de donnees pour le site.
 * @package app\php\view\main\model
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Site
{
    /**
     * Stocke le nom du site.
     * @var string
     */
    public string $m_siteName;
    /**
     * Stocke l'année de début du site.
     * @var string
     */
    public string $m_siteStartYear;
    /**
     * Stocke l'année courante.
     * @var string
     */
    public string $m_currentYear;
    /**
     * Stocke la vision du site.
     * @var string
     */
    public string $m_siteVision;
}
