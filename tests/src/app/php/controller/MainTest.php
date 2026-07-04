<?php

declare(strict_types=1);

namespace app\php\controller;

use PHPUnit\Framework\TestCase;

final class MainTest extends TestCase
{
    public function test_general(): void
    {
        // cree la description de la page
        $pageDescription = <<<_EOF_
        Avec ReadyDEV, apprenez en pratiquant grâce à des cours
        et tutoriels adaptés aux sciences de l'Ingénieur.
        ReadyDEV est une Plateforme de Développement en Continu.
        Produit par Gérard KESSE.
        _EOF_;

        // cree une requete HTTP
        $_SERVER['HTTP_HOST'] = "localhost";
        $_SERVER['REQUEST_URI'] = "/URI_DE_PAGE";

        // cree l'url de l'image Open Graph
        $openGraphImage = "https://raw.githubusercontent.com/gkesse/ReadyDev/2.0/data/img/defaults/b_readydev.png";

        // cree le controller de la page principale
        $controller = new \app\php\controller\Main();

        // teste le nom du site
        $this->assertSame($controller->getSiteName(), "ReadyDEV");
        // teste le titre de la page
        $this->assertSame($controller->getPageTitle(), "ReadyDEV");
        $this->assertSame($controller->getPageTitle("TITRE_DE_PAGE"), "ReadyDEV | TITRE_DE_PAGE");
        // teste la langue de la page
        $this->assertSame($controller->getPageLanguage(), "fr");
        // teste l'encodage de la page
        $this->assertSame($controller->getPageEncoding(), "UTF-8");
        // teste le logo de la page
        $this->assertSame($controller->getPageLogo(), "/public/data/img/logo.png");
        // teste le type MIME du logo de la page
        $this->assertSame($controller->getPageLogoMimeType(), "image/png");
        // teste la description de la page
        $this->assertSame($controller->getPageDescription(), $pageDescription);
        // teste l'url de la page
        $this->assertSame($controller->getPageUrl(), "https://localhost/URI_DE_PAGE");
        // teste le type Open Graph
        $this->assertSame($controller->getOpenGraphType(), "website");
        // teste l'image Open Graph
        $this->assertSame($controller->getOpenGraphImage(), $openGraphImage);
        // teste le type MIME de l'image Open Graph
        $this->assertSame($controller->getOpenGraphImageMimeType(), "image/png");
        // teste la largeur de l'image Open Graph
        $this->assertSame($controller->getOpenGraphImageWidth(), 440);
        // teste la hauteur de l'image Open Graph
        $this->assertSame($controller->getOpenGraphImageHeight(), 440);
        // teste la locale Open Graph
        $this->assertSame($controller->getOpenGraphLocale(), "fr_FR");
    }
}
