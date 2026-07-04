<?php

declare(strict_types=1);

namespace app\php\view\main\model;

/**
 * Cree le modele de données pour les balises Open Graph.
 * Permet de creer le modele de données pour les balises Open Graph.
 * @package app\php\view\main\model
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class OpenGraph
{
    /**
     * Stocke le type d'Open Graph.
     * @var string
     */
    public string $m_type;
    /**
     * Stocke l'image d'Open Graph.
     * @var string
     */
    public string $m_image;
    /**
     * Stocke le type MIME de l'image d'Open Graph.
     * @var string
     */
    public string $m_imageMimeType;
    /**
     * Stocke la largeur de l'image d'Open Graph.
     * @var int
     */
    public int $m_imageWidth;
    /**
     * Stocke la hauteur de l'image d'Open Graph.
     * @var int
     */
    public int $m_imageHeight;
    /**
     * Stocke la langue d'Open Graph.
     * @var string
     */
    public string $m_locale;
    /**
     * Stocke l'URL d'Open Graph.
     * @var string
     */
    public string $m_url;
    /**
     * Stocke le titre d'Open Graph.
     * @var string
     */
    public string $m_title;
    /**
     * Stocke le nom du site d'Open Graph.
     * @var string
     */
    public string $m_siteName;
    /**
     * Stocke la description d'Open Graph.
     * @var string
     */
    public string $m_description;
}
