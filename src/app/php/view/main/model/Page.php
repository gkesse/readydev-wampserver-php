<?php

declare(strict_types=1);

namespace app\php\view\main\model;

/**
 * Cree le modele de donnees pour la page.
 * Permet de creer le modele de donnees pour la page.
 * @package app\php\view\main\model
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Page
{
    /**
     * Stocke le titre de la page.
     * @var string
     */
    public string $m_title;
    /**
     * Stocke la langue de la page.
     * @var string
     */
    public string $m_language;
    /**
     * Stocke l'encodage de la page.
     * @var string
     */
    public string $m_encoding;
    /**
     * Stocke le logo de la page.
     * @var string
     */
    public string $m_logo;
    /**
     * Stocke le type MIME du logo de la page.
     * @var string
     */
    public string $m_logoMimeType;
    /**
     * Stocke la description de la page.
     * @var string
     */
    public string $m_description;
    /**
     * Stocke la page d'accueil.
     * @var string
     */
    public string $m_home;
    /**
     * Stocke l'ID de la page.
     * @var string
     */
    public string $m_id;
    /**
     * Stocke le titre de la vue.
     * @var string
     */
    public string $m_viewTitle;
    /**
     * Stocke le nombre de vues de la page.
     * @var int
     */
    public int $m_viewCount;
}
