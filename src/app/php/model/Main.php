<?php

declare(strict_types=1);

namespace app\php\model;

/**
 * Cree le modele de la vue principale du site.
 * Permet de creer le modele de la vue principale du site.
 * @package app\php\model
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Main
{
    /**
     * Stocke le nom du site.
     * @var string
     */
    public string $siteName;
    /**
     * Stocke l'année de début du site.
     * @var string
     */
    public string $siteStartYear;
    /**
     * Stocke l'année courante.
     * @var string
     */
    public string $currentYear;
    /**
     * Stocke la vision du site.
     * @var string
     */
    public string $siteVision;
    /**
     * Stocke le titre de la page.
     * @var string
     */
    public string $pageTitle;
    /**
     * Stocke la langue de la page.
     * @var string
     */
    public string $pageLanguage;
    /**
     * Stocke l'encodage de la page.
     * @var string
     */
    public string $pageEncoding;
    /**
     * Stocke le logo de la page.
     * @var string
     */
    public string $pageLogo;
    /**
     * Stocke le type MIME du logo de la page.
     * @var string
     */
    public string $pageLogoMimeType;
    /**
     * Stocke la description de la page.
     * @var string
     */
    public string $pageDescription;
    /**
     * Stocke le type d'Open Graph.
     * @var string
     */
    public string $openGraphType;
    /**
     * Stocke l'image d'Open Graph.
     * @var string
     */
    public string $openGraphImage;
    /**
     * Stocke le type MIME de l'image d'Open Graph.
     * @var string
     */
    public string $openGraphImageMimeType;
    /**
     * Stocke la largeur de l'image d'Open Graph.
     * @var int
     */
    public int $openGraphImageWidth;
    /**
     * Stocke la hauteur de l'image d'Open Graph.
     * @var int
     */
    public int $openGraphImageHeight;
    /**
     * Stocke la langue d'Open Graph.
     * @var string
     */
    public string $openGraphLocale;
    /**
     * Stocke l'URL d'Open Graph.
     * @var string
     */
    public string $openGraphUrl;
    /**
     * Stocke le titre d'Open Graph.
     * @var string
     */
    public string $openGraphTitle;
    /**
     * Stocke le nom du site d'Open Graph.
     * @var string
     */
    public string $openGraphSiteName;
    /**
     * Stocke la description d'Open Graph.
     * @var string
     */
    public string $openGraphDescription;
    /**
     * Stocke la page d'accueil.
     * @var string
     */
    public string $homePage;
    /**
     * Stocke l'ID de la page.
     * @var string
     */
    public string $pageId;
    /**
     * Stocke le titre de la vue.
     * @var string
     */
    public string $viewTitle;
    /**
     * Stocke la vue de la page.
     * @var int
     */
    public int $pageView;
    /**
     * Stocke l'URL de partage sur Facebook.
     * @var string
     */
    public string $facebookShareUrl;
    /**
     * Stocke l'URL de partage sur LinkedIn.
     * @var string
     */
    public string $linkedInShareUrl;
    /**
     * Stocke la liste des menus.
     * @var \app\php\model\MenuList
     */
    public \app\php\model\MenuList $headerMenuList;
    /**
     * Stocke le menu courant.
     * @var \app\php\model\Menu
     */
    public \app\php\model\Menu $headerMenuCurrent;
}
