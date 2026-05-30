<?php

declare(strict_types=1);

namespace app\twig\controller;

/**
 * Cree le controleur des pages du site.
 * Permet de creer le controleur des pages du site.
 * @package app\twig\controller
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Page
{
    /**
     * Stocke l'identifiant de la page par defaut.
     * @var string
     */
    private const string PARAM_DEFAULT_PAGE_ID = "/home";
    /**
     * Stocke la clé de l'identifiant de la page dans les paramètres de la requete.
     * @var string
     */
    private const string PARAM_PAGE_ID_KEY = "page-id";

    /**
     * Construit le controleur des pages du site.
     * Permet de construire le controleur des pages du site.
     */
    public function __construct() {}

    /**
     * Recupere l'identifiant de la page du site.
     * Permet de recuperer l'identifiant de la page du site.
     * @return string Indique l'identifiant de la page du site.
     */
    public function getPageId(): string
    {
        if (!isset($_GET[self::PARAM_PAGE_ID_KEY])) {
            return self::PARAM_DEFAULT_PAGE_ID;
        }

        $pageId = $_GET[self::PARAM_PAGE_ID_KEY];

        if (substr($pageId, -1) == "/") {
            $pageId = substr($pageId, 0, -1);
        }

        $pageId = \sprintf("/%s", $pageId);
        return $pageId;
    }
}
