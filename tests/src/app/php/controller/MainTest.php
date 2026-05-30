<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class MainTest extends TestCase
{
    public function test_Page_Accueil(): void
    {
        // si on cree la description de la page
        $pageDescription = "";
        $pageDescription .= sprintf("Avec ReadyDEV, apprenez en pratiquant grâce à des cours\n");
        $pageDescription .= sprintf("et tutoriels adaptés aux sciences de l'Ingénieur.\n");
        $pageDescription .= sprintf("ReadyDEV est une Plateforme de Développement en Continu.\n");
        $pageDescription .= sprintf("Produit par Gérard KESSE.");

        // si on simule une requete HTTP
        $_SERVER['HTTP_HOST'] = "localhost";
        $_SERVER['REQUEST_URI'] = "/URI_DE_PAGE";

        // si on cree l'url de l'image Open Graph
        $openGraphImage = "https://raw.githubusercontent.com/gkesse/ReadyDev/2.0/data/img/defaults/b_readydev.png";

        // si on cree le controller de la page
        $controller = new \app\php\controller\Main();
        // on doit avoir les noms de site egaux
        $this->assertSame($controller->getSiteName(), "ReadyDEV");
        // on doit avoir les titres de page egaux
        $this->assertSame($controller->getPageTitle(), "ReadyDEV");
        $this->assertSame($controller->getPageTitle("TITRE_DE_PAGE"), "ReadyDEV | TITRE_DE_PAGE");
        // on doit avoir les langues de page egaux
        $this->assertSame($controller->getPageLanguage(), "fr");
        // on doit avoir les encodages de page egaux
        $this->assertSame($controller->getPageEncoding(), "UTF-8");
        // on doit avoir les logos de page egaux
        $this->assertSame($controller->getPageLogo(), "/public/data/img/logo.png");
        // on doit avoir les types MIME des logos de page egaux
        $this->assertSame($controller->getPageLogoMimeType(), "image/png");
        // on doit avoir les descriptions de page egales
        $this->assertSame($controller->getPageDescription(), $pageDescription);
        // on doit avoir les urls de page egales
        $this->assertSame($controller->getPageUrl(), "https://localhost/URI_DE_PAGE");
        // on doit avoir les urls courantes de page egales
        // on doit avoir les types Open Graph egaux
        $this->assertSame($controller->getOpenGraphType(), "website");
        // on doit avoir les images Open Graph egales
        $this->assertSame($controller->getOpenGraphImage(), $openGraphImage);
        // on doit avoir les types MIME des images Open Graph egaux
        $this->assertSame($controller->getOpenGraphImageMimeType(), "image/png");
        // on doit avoir les largeurs des images Open Graph egales
        $this->assertSame($controller->getOpenGraphImageWidth(), 440);
        // on doit avoir les hauteurs des images Open Graph egales
        $this->assertSame($controller->getOpenGraphImageHeight(), 440);
        // on doit avoir les locales Open Graph egales
        $this->assertSame($controller->getOpenGraphLocale(), "fr_FR");
    }
}
