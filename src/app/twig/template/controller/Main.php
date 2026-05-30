<?php

declare(strict_types=1);

namespace app\twig\template\controller;

/**
 * Cree le controleur de la vue principale du site.
 * Permet de creer le controleur de la vue principale du site.
 * @package app\twig\template\controller
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Main extends \twig\controller\Template
{
    /**
     * Stocke le modele de la vue principale du site.
     * @var \app\php\model\Main
     */
    private \app\php\model\Main $model;

    /**
     * Construit le controleur de la vue principale du site.
     * Permet de construire le controleur de la vue principale du site.
     * @param string $p_in_template_dir Indique le chemin du repertoire des templates twig.
     */
    public function __construct(string $p_in_template_dir)
    {
        parent::__construct($p_in_template_dir);

        $controller = new \app\php\controller\Main();
        $model = new \app\php\model\Main();

        $model->siteName = $controller->getSiteName();
        $model->siteStartYear = $controller->getSiteStartYear();
        $model->currentYear = $controller->getCurrentYear();
        $model->siteVision = $controller->getSiteVision();

        $model->pageTitle = $controller->getPageTitle();
        $model->pageLanguage = $controller->getPageLanguage();
        $model->pageEncoding = $controller->getPageEncoding();
        $model->pageLogo = $controller->getPageLogo();
        $model->pageLogoMimeType = $controller->getPageLogoMimeType();
        $model->pageDescription = $controller->getPageDescription();

        $model->openGraphType = $controller->getOpenGraphType();
        $model->openGraphImage = $controller->getOpenGraphImage();
        $model->openGraphImageMimeType = $controller->getOpenGraphImageMimeType();
        $model->openGraphImageWidth = $controller->getOpenGraphImageWidth();
        $model->openGraphImageHeight = $controller->getOpenGraphImageHeight();
        $model->openGraphLocale = $controller->getOpenGraphLocale();
        $model->openGraphUrl = $controller->getPageUrl();
        $model->openGraphTitle = $controller->getPageTitle();
        $model->openGraphSiteName = $controller->getSiteName();
        $model->openGraphDescription = $controller->getPageDescription();

        $model->homePage = $controller->getHomePage();
        $model->pageId = $controller->getPageId();

        $model->headerMenuList = $controller->loadHeaderMenuList();
        $model->headerMenuCurrent = $model->headerMenuList->getMenuByLink($model->pageId);

        $model->viewTitle = $model->headerMenuCurrent->title;
        $model->pageView = $controller->getPageView();
        $model->facebookShareUrl = $controller->getFacebookShareUrl();
        $model->linkedInShareUrl = $controller->getLinkedInShareUrl();

        $this->model = $model;
    }

    public function getTemplateData(): array
    {
        return ['model' => $this->model];
    }
}
