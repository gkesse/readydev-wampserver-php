<?php

declare(strict_types=1);

namespace app\php\controller;

/**
 * Cree le controleur de la vue principale du site.
 * Permet de creer le controleur de la vue principale du site.
 * @package app\php\controller
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Main
{
    /**
     * Construit le controleur de la vue principale de l'application.
     * Permet de construire le controleur de la vue principale de l'application.
     */
    public function __construct() {}

    /**
     * Recupere le nom du site.
     * Permet de recuperer le nom du site.
     * @return string Indique le nom du site.
     */
    public function getSiteName(): string
    {
        return "ReadyDEV";
    }

    /**
     * Recupere la date de debut du site.
     * Permet de recuperer la date de debut du site.
     * @return string Indique la date de debut du site.
     */
    public function getSiteStartYear()
    {
        return "2017";
    }

    /**
     * Recupere l'annee courante.
     * Permet de recuperer l'annee courante.
     * @return string Indique l'annee courante.
     */
    public function getCurrentYear()
    {
        return date("Y");
    }

    /**
     * Recupere la vision du site.
     * Permet de recuperer la vision du site.
     * @return string Indique la vision du site.
     */
    public function getSiteVision()
    {
        $outputText = <<<_EOF_
        Plateforme de Développement Continu<br/>
        Produit par <b>Gérard KESSE</b><br/>
        Polytech'Montpellier<br/>
        _EOF_;
        return $outputText;
    }

    /**
     * Recupere le titre de la page.
     * Permet de recuperer le titre de la page.
     * @param string $p_in_title Indique le titre de la page.
     * @return string Indique le titre de la page.
     */
    public function getPageTitle(string $p_in_title = ""): string
    {
        if ($p_in_title != "") {
            $p_in_title = (string)" | " . $p_in_title;
        }
        $titleText = $this->getSiteName() . $p_in_title;
        return $titleText;
    }

    /**
     * Recupere la langue de la page.
     * Permet de recuperer la langue de la page.
     * @return string Indique la langue de la page.
     */
    public function getPageLanguage(): string
    {
        return "fr";
    }

    /**
     * Recupere l'encodage de la page.
     * Permet de recuperer l'encodage de la page.
     * @return string Indique l'encodage de la page.
     */
    public function getPageEncoding(): string
    {
        return "UTF-8";
    }

    /**
     * Recupere le type MIME du logo de la page.
     * Permet de recuperer le type MIME du logo de la page.
     * @return string Indique le type MIME du logo de la page.
     */
    public function getPageLogoMimeType(): string
    {
        return "image/png";
    }

    /**
     * Recupere le logo de la page.
     * Permet de recuperer le logo de la page.
     * @return string Indique le chemin du logo de la page.
     */
    public function getPageLogo(): string
    {
        return "/public/data/img/logo.png";
    }

    /**
     * Recupere la description de la page.
     * Permet de recuperer la description de la page.
     * @return string Indique la description de la page.
     */
    public function getPageDescription(): string
    {
        $outputText = <<<_EOF_
        Avec ReadyDEV, apprenez en pratiquant grâce à des cours
        et tutoriels adaptés aux sciences de l'Ingénieur.
        ReadyDEV est une Plateforme de Développement en Continu.
        Produit par Gérard KESSE.
        _EOF_;
        return $outputText;
    }

    /**
     * Recupere l'URL de la page.
     * Permet de recuperer l'URL de la page.
     * @return string Indique l'URL de la page.
     */
    public function getPageUrl(): string
    {
        $urlText = "";
        $urlText .= "https://";
        $urlText .= $_SERVER['HTTP_HOST'];
        $urlText .=  $_SERVER['REQUEST_URI'];
        return $urlText;
    }

    /**
     * Recupere l'URL de la page d'accueil.
     * Permet de recuperer l'URL de la page d'accueil.
     * @return string Indique l'URL de la page d'accueil.
     */
    public function getHomePage(): string
    {
        return "/home";
    }

    /**
     * Recupere le type Open Graph de la page.
     * Permet de recuperer le type Open Graph de la page.
     * @return string Indique le type Open Graph de la page.
     */
    public function getOpenGraphType(): string
    {
        return "website";
    }

    /**
     * Recupere l'URL de l'image Open Graph de la page.
     * Permet de recuperer l'URL de l'image Open Graph de la page.
     * @return string Indique l'URL de l'image Open Graph de la page.
     */
    public function getOpenGraphImage(): string
    {
        return "https://raw.githubusercontent.com/gkesse/ReadyDev/2.0/data/img/defaults/b_readydev.png";
    }

    /**
     * Recupere le type MIME de l'image Open Graph de la page.
     * Permet de recuperer le type MIME de l'image Open Graph de la page.
     * @return string Indique le type MIME de l'image Open Graph de la page.
     */
    public function getOpenGraphImageMimeType(): string
    {
        return "image/png";
    }

    /**
     * Recupere la largeur de l'image Open Graph de la page.
     * Permet de recuperer la largeur de l'image Open Graph de la page.
     * @return int Indique la largeur de l'image Open Graph de la page.
     */
    public function getOpenGraphImageWidth(): int
    {
        return 440;
    }

    /**
     * Recupere la hauteur de l'image Open Graph de la page.
     * Permet de recuperer la hauteur de l'image Open Graph de la page.
     * @return int Indique la hauteur de l'image Open Graph de la page.
     */
    public function getOpenGraphImageHeight(): int
    {
        return 440;
    }

    /**
     * Recupere la langue Open Graph de la page.
     * Permet de recuperer la langue Open Graph de la page.
     * @return string Indique la langue Open Graph de la page.
     */
    public function getOpenGraphLocale(): string
    {
        return "fr_FR";
    }

    /**
     * Recupere l'ID de la page.
     * Permet de recuperer l'ID de la page.
     * @return string Indique l'ID de la page.
     */
    public function getPageId(): string
    {
        $pageController = new Page();
        return $pageController->getPageId();
    }

    /**
     * Recupere le nombre de vues de la page.
     * Permet de recuperer le nombre de vues de la page.
     * @return int Indique le nombre de vues de la page.
     */
    public function getViewCount(): int
    {
        $viewCount = 100;
        return $viewCount;
    }

    /**
     * Recupere l'URL de partage de la page sur Facebook.
     * Permet de recuperer l'URL de partage de la page sur Facebook.
     * @return string Indique l'URL de partage de la page sur Facebook.
     */
    public function getFacebookShareUrl()
    {
        $shareUrl = "http://www.facebook.com/sharer.php";
        $shareUrl = \sprintf("%s?u=%s", $shareUrl, $this->getPageUrl());
        return $shareUrl;
    }

    /**
     * Recupere l'URL de partage de la page sur Twitter.
     * Permet de recuperer l'URL de partage de la page sur Twitter.
     * @return string Indique l'URL de partage de la page sur Twitter.
     */
    public function getLinkedInShareUrl()
    {
        $shareUrl = "https://www.linkedin.com/shareArticle";
        $shareUrl = \sprintf("%s?mini=true&url=%s&title=%s&summary=%s", $shareUrl, $this->getPageUrl(), urlencode($this->getPageTitle()), urlencode($this->getPageDescription()));
        return $shareUrl;
    }

    /**
     * Charge la liste des menus de l'en-tête.
     * Permet de charger la liste des menus de l'en-tête.
     * @return \app\php\model\MenuList Indique la liste des menus de l'en-tête.
     */
    public function loadHeaderMenuList(): \app\php\model\MenuList
    {
        $menuList = new \app\php\model\MenuList();

        // home
        $menuList->addMenuByRoot("home", "Accueil", "Accueil", "", false);
        $menuList->addMenuByRoot("home", "Accueil", "Accueil", "/", false);
        $menuList->addMenuByRoot("home", "Accueil", "Accueil", "/home", false);

        // cv
        $menuObj1 = $menuList->addMenuByRoot("cv", "CV", "CV", "/home/cv", true);
        $menuList->addMenuByParentMenu($menuObj1, "cv", "Curriculum vitae", "Curriculum vitae", "/home/cv/simple", true);
        $menuList->addMenuByParentMenu($menuObj1, "cv", "Dossier Compétences", "Dossier Compétences", "/home/cv/full", true);

        // presentation
        $menuList->addMenuByRoot("presentation", "Présentation", "Présentation", "/home/presentation", true);

        // tutoriels
        $menuList->addMenuByRoot("tutoriels", "Tutoriels", "Tutoriels", "/home/tutoriels", true);

        // admin
        $menuList->addMenuByRoot("admin", "Admin", "Admin", "/home/admin", true);

        // tests
        $menuList->addMenuByRoot("tests", "Tests", "Tests", "/public/tests", true);

        // docs
        $menuList->addMenuByRoot("docs", "Documentation", "Documentation", "/public/docs", true);

        // connexion
        $menuList->addMenuByRoot("connexion", "Connexion", "Connexion", "/home/connexion", true);

        return $menuList;
    }
}
