<?php

declare(strict_types=1);

namespace app\php\view;

/**
 * Cree la page principale du site.
 * Permet de creer la page principale du site.
 * @package app\php\view
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Main
{
    /**
     * Stocke le nom du site.
     * @var string
     */
    private string $siteName;
    /**
     * Stocke l'année de début du site.
     * @var string
     */
    private string $siteStartYear;
    /**
     * Stocke l'année courante.
     * @var string
     */
    private string $currentYear;
    /**
     * Stocke la vision du site.
     * @var string
     */
    private string $siteVision;
    /**
     * Stocke le titre de la page.
     * @var string
     */
    private string $pageTitle;
    /**
     * Stocke la langue de la page.
     * @var string
     */
    private string $pageLanguage;
    /**
     * Stocke l'encodage de la page.
     * @var string
     */
    private string $pageEncoding;
    /**
     * Stocke le logo de la page.
     * @var string
     */
    private string $pageLogo;
    /**
     * Stocke le type MIME du logo de la page.
     * @var string
     */
    private string $pageLogoMimeType;
    /**
     * Stocke la description de la page.
     * @var string
     */
    private string $pageDescription;
    /**
     * Stocke le type d'Open Graph.
     * @var string
     */
    private string $openGraphType;
    /**
     * Stocke l'image d'Open Graph.
     * @var string
     */
    private string $openGraphImage;
    /**
     * Stocke le type MIME de l'image d'Open Graph.
     * @var string
     */
    private string $openGraphImageMimeType;
    /**
     * Stocke la largeur de l'image d'Open Graph.
     * @var int
     */
    private int $openGraphImageWidth;
    /**
     * Stocke la hauteur de l'image d'Open Graph.
     * @var int
     */
    private int $openGraphImageHeight;
    /**
     * Stocke la langue d'Open Graph.
     * @var string
     */
    private string $openGraphLocale;
    /**
     * Stocke l'URL d'Open Graph.
     * @var string
     */
    private string $openGraphUrl;
    /**
     * Stocke le titre d'Open Graph.
     * @var string
     */
    private string $openGraphTitle;
    /**
     * Stocke le nom du site d'Open Graph.
     * @var string
     */
    private string $openGraphSiteName;
    /**
     * Stocke la description d'Open Graph.
     * @var string
     */
    private string $openGraphDescription;
    /**
     * Stocke la page d'accueil.
     * @var string
     */
    private string $homePage;
    /**
     * Stocke l'ID de la page.
     * @var string
     */
    private string $pageId;
    /**
     * Stocke le titre de la vue.
     * @var string
     */
    private string $viewTitle;
    /**
     * Stocke le nombre de vues de la page.
     * @var int
     */
    private int $viewCount;
    /**
     * Stocke l'URL de partage sur Facebook.
     * @var string
     */
    private string $facebookShareUrl;
    /**
     * Stocke l'URL de partage sur LinkedIn.
     * @var string
     */
    private string $linkedInShareUrl;
    /**
     * Stocke la liste des menus.
     * @var \app\php\model\MenuList
     */
    private \app\php\model\MenuList $headerMenuList;
    /**
     * Stocke le menu courant.
     * @var \app\php\model\Menu
     */
    private \app\php\model\Menu $headerMenuCurrent;

    /**
     * Construit la page principale du site.
     * Permet de construire la page principale du site.
     */
    public function __construct()
    {
        $controller = new \app\php\controller\Main();

        $this->siteName = $controller->getSiteName();
        $this->siteStartYear = $controller->getSiteStartYear();
        $this->currentYear = $controller->getCurrentYear();
        $this->siteVision = $controller->getSiteVision();

        $this->pageTitle = $controller->getPageTitle();
        $this->pageLanguage = $controller->getPageLanguage();
        $this->pageEncoding = $controller->getPageEncoding();
        $this->pageLogo = $controller->getPageLogo();
        $this->pageLogoMimeType = $controller->getPageLogoMimeType();
        $this->pageDescription = $controller->getPageDescription();

        $this->openGraphType = $controller->getOpenGraphType();
        $this->openGraphImage = $controller->getOpenGraphImage();
        $this->openGraphImageMimeType = $controller->getOpenGraphImageMimeType();
        $this->openGraphImageWidth = $controller->getOpenGraphImageWidth();
        $this->openGraphImageHeight = $controller->getOpenGraphImageHeight();
        $this->openGraphLocale = $controller->getOpenGraphLocale();
        $this->openGraphUrl = $controller->getPageUrl();
        $this->openGraphTitle = $controller->getPageTitle();
        $this->openGraphSiteName = $controller->getSiteName();
        $this->openGraphDescription = $controller->getPageDescription();

        $this->homePage = $controller->getHomePage();
        $this->pageId = $controller->getPageId();

        $this->headerMenuList = $controller->loadHeaderMenuList();
        $this->headerMenuCurrent = $this->headerMenuList->getMenuByLink($this->pageId);

        $this->viewTitle = $this->headerMenuCurrent->title;
        $this->viewCount = $controller->getViewCount();
        $this->facebookShareUrl = $controller->getFacebookShareUrl();
        $this->linkedInShareUrl = $controller->getLinkedInShareUrl();
    }

    /**
     * Affiche la page principale du site.
     * Permet d'afficher la page principale du site.
     * @return void
     */
    public function run(): void
    {
        $outputText = "";
        $outputText .= \sprintf("<!DOCTYPE html>\n");
        $outputText .= \sprintf("<html lang='%s'>\n", $this->pageLanguage);
        $outputText .= \sprintf("<head>\n");
        $this->runSiteInfos($outputText);
        $this->runOpenGraph($outputText);
        $this->runStyleCss($outputText);
        $outputText .= \sprintf("</head>\n");
        $outputText .= \sprintf("<body>\n");
        $outputText .= \sprintf("<div class='Html1'>\n");
        $this->runBackground($outputText);
        $outputText .= \sprintf("<div class='Html2 HtmlPage'>\n");
        $this->runBody($outputText);
        $outputText .= \sprintf("</div>\n");
        $this->runFooter($outputText);
        $outputText .= \sprintf("</div>\n");
        $this->runScriptJs($outputText);
        $outputText .= \sprintf("</body>\n");
        $outputText .= \sprintf("</html>\n");
        echo $outputText;
    }

    /**
     * Affiche les informations du site.
     * Permet d'fficher les informations du site.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    private function runSiteInfos(string &$p_out_text): void
    {
        $p_out_text .= \sprintf("<title>%s</title>\n", $this->pageTitle);
        $p_out_text .= \sprintf("<meta charset='%s'/>\n", $this->pageEncoding);
        $p_out_text .= \sprintf("<link rel='shortcut icon' type='%s' href='%s'/>\n", $this->pageLogoMimeType, $this->pageLogo);
        $p_out_text .= \sprintf("<meta name='description' content=\"%s\"/>\n", $this->pageDescription);
    }

    /**
     * Affiche les informations d'Open Graph.
     * Permet d'afficher les informations d'Open Graph.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    private function runOpenGraph(string &$p_out_text): void
    {
        $p_out_text .= \sprintf("<meta property='og:type' content=\"%s\"/>\n", $this->openGraphType);
        $p_out_text .= \sprintf("<meta property='og:image' content=\"%s\"/>\n", $this->openGraphImage);
        $p_out_text .= \sprintf("<meta property='og:image:secure_url' content=\"%s\"/>\n", $this->openGraphImage);
        $p_out_text .= \sprintf("<meta property='og:image:type' content=\"%s\"/>\n", $this->openGraphImageMimeType);
        $p_out_text .= \sprintf("<meta property='og:image:width' content=\"%d\"/>\n", $this->openGraphImageWidth);
        $p_out_text .= \sprintf("<meta property='og:image:height' content=\"%d\"/>\n", $this->openGraphImageHeight);
        $p_out_text .= \sprintf("<meta property='og:locale' content=\"%s\"/>\n", $this->openGraphLocale);
        $p_out_text .= \sprintf("<meta property='og:url' content=\"%s\"/>\n", $this->openGraphUrl);
        $p_out_text .= \sprintf("<meta property='og:title' content=\"%s\"/>\n", $this->openGraphTitle);
        $p_out_text .= \sprintf("<meta property='og:site_name' content=\"%s\"/>\n", $this->openGraphSiteName);
        $p_out_text .= \sprintf("<meta property='og:description' content=\"%s\"/>\n", $this->openGraphDescription);
    }

    /**
     * Affiche les styles CSS.
     * Permet d'afficher les styles CSS.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    private function runStyleCss(string &$p_out_text): void
    {
        // google-fonts
        $p_out_text .= \sprintf("<link rel='stylesheet' href='/libs/google-fonts/Aclonica/css.css'/>\n");
        $p_out_text .= \sprintf("<link rel='stylesheet' href='/libs/google-fonts/Akronim/css.css'/>\n");
        $p_out_text .= \sprintf("<link rel='stylesheet' href='/libs/google-fonts/Allan/css.css'/>\n");
        $p_out_text .= \sprintf("<link rel='stylesheet' href='/libs/google-fonts/Archivo_Narrow/css.css'/>\n");
        $p_out_text .= \sprintf("<link rel='stylesheet' href='/libs/google-fonts/Anton/css.css'/>\n");
        $p_out_text .= \sprintf("<link rel='stylesheet' href='/libs/google-fonts/Aclonica/css.css'/>\n");
        // font-awesome
        $p_out_text .= \sprintf("<link rel='stylesheet' href='/libs/font-awesome/css/font-awesome.min.css'/>\n");
        // css
        $p_out_text .= \sprintf("<link rel='stylesheet' href='/public/css/styles.css'/>\n");
    }

    /**
     * Affiche les fonds d'écran.
     * Permet d'afficher les fonds d'écran.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    private function runBackground(string &$p_out_text): void
    {
        $p_out_text .= \sprintf("<div class='Background1'></div>\n");
        $p_out_text .= \sprintf("<div class='Background2'></div>\n");
        $p_out_text .= \sprintf("<div class='Background3'></div>\n");
    }

    /**
     * Cree le corps de la page.
     * Permet de creer le corps de la page.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    private function runBody(string &$p_out_text): void
    {
        $this->runHeader($p_out_text);
        $this->runView($p_out_text);
        $this->runPage($p_out_text);
    }

    /**
     * Cree l'entete de la page.
     * Permet de creer l'entete de la page.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    private function runHeader(string &$p_out_text): void
    {
        $p_out_text .= \sprintf("<header class='Menu1' id='HeaderMenu'>\n");
        $p_out_text .= \sprintf("<a class='Menu3' href='%s'>\n", $this->homePage);
        $p_out_text .= \sprintf("<img class='Menu4' src='%s' alt='logo.png'/>\n", $this->pageLogo);
        $p_out_text .= \sprintf("<span class='Menu5'>%s</span>\n", $this->siteName);
        $p_out_text .= \sprintf("</a>\n");
        $this->runHeaderMenu(0, $this->headerMenuCurrent, $p_out_text);
        $p_out_text .= \sprintf("<div class='Bars1' onclick='call_server(\"app\", \"open_menu_bars\", this)'><i class='fa fa-bars'></i></div>\n");
        $p_out_text .= \sprintf("</header>\n");
    }

    /**
     * Affiche le menu de l'entete.
     * Permet d'afficher le menu de l'entete.
     * @param int $p_in_parent_index Indique l'index du parent du menu.
     * @param \app\php\model\Menu $p_in_current_menu Indique le menu courant.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    private function runHeaderMenu(int $p_in_parent_index, $p_in_current_menu, string &$p_out_text): void
    {
        $menuListI = $this->headerMenuList->getMenuListByParentIndex($p_in_parent_index);
        $menuK = new \app\php\model\Menu();

        for ($i = 0; $i < $menuListI->size(); $i++) {
            $menuI = $menuListI->getMenuByPosition($i);

            if ($menuI->isActive) {
                $menuListJ = $this->headerMenuList->getMenuListByParentIndex($menuI->index);

                $activeClass = "";

                $isActive = false;
                $isActive |= $menuI->isEqual($this->headerMenuCurrent);
                $isActive |= (($menuI->name == $this->headerMenuCurrent->name) && ($menuI->parentIndex == 0));

                if ($isActive) $activeClass = " Active";

                if ($menuListJ->isEmpty()) {
                    if (!$menuI->parentIndex) {
                        $p_out_text .= \sprintf("<a class='Menu2%s' href='%s'><div class='Menu14'>%s</div></a>\n", $activeClass, $menuI->link, $menuI->label);
                    } else {
                        $p_out_text .= \sprintf("<a class='Menu10' href='%s'><div class='Menu8%s'>%s</div></a>\n", $menuI->link, $activeClass, $menuI->label);
                    }
                } else {
                    if (!$menuI->parentIndex) {
                        $p_out_text .= \sprintf("<div class='Menu6'>\n");
                        $p_out_text .= \sprintf("<a class='Menu2%s' href='%s' onclick='return call_server(\"app\", \"open_menu_group\", this)'><div class='Menu14'>%s</div><i class='Menu13 fa fa-caret-down'></i></a>\n", $activeClass, $menuI->link, $menuI->label);
                        $menuK = $menuI;
                    } else {
                        $p_out_text .= \sprintf("<div class='Menu9'>\n");
                        $p_out_text .= \sprintf("<div class='Menu12'><div class='Menu8'>%s <i class='Menu15 fa fa-caret-down'></i></div></div>\n", $menuI->label);
                    }

                    if (!$menuI->parentIndex) {
                        $p_out_text .= \sprintf("<div class='Menu7'>\n");
                        $p_out_text .= \sprintf("<a class='Menu16' href='%s'><div class='Menu8'>%s</div></a>\n", $menuK->link, $menuK->label);
                    } else {
                        $p_out_text .= \sprintf("<div class='Menu11'>\n");
                    }

                    $this->runHeaderSubMenu($menuI->index, $this->headerMenuCurrent, $p_out_text);
                    $p_out_text .= \sprintf("</div>\n");
                    $p_out_text .= \sprintf("</div>\n");
                }
            }
        }
    }

    /**
     * Affiche le sous-menu de l'entete.
     * Permet d'afficher le sous-menu de l'entete.
     * @param int $p_in_parent_index Indique l'index du parent du menu.
     * @param \app\php\model\Menu $p_in_current_menu Indique le menu courant.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    private function runHeaderSubMenu(int $p_in_parent_index, \app\php\model\Menu $p_in_current_menu, string &$p_out_text): void
    {
        $menuListI = $this->headerMenuList->getMenuListByParentIndex($p_in_parent_index);
        $menuK = new \app\php\model\Menu();

        for ($i = 0; $i < $menuListI->size(); $i++) {
            $menuI = $menuListI->getMenuByPosition($i);

            if ($menuI->isActive) {
                $menuListJ = $this->headerMenuList->getMenuListByParentIndex($menuI->index);

                $activeClass = "";

                $isActive = false;
                $isActive |= $menuI->isEqual($p_in_current_menu);
                $isActive |= (($menuI->name == $p_in_current_menu->name) && ($menuI->parentIndex == 0));

                if ($isActive) $activeClass = " Active";

                if ($menuListJ->isEmpty()) {
                    if (!$menuI->parentIndex) {
                        $p_out_text .= \sprintf("<a class='Menu2%s' href='%s'><div class='Menu14'>%s</div></a>\n", $activeClass, $menuI->link, $menuI->label);
                    } else {
                        $p_out_text .= \sprintf("<a class='Menu10' href='%s'><div class='Menu8%s'>%s</div></a>\n", $menuI->link, $activeClass, $menuI->label);
                    }
                } else {
                    if (!$menuI->parentIndex) {
                        $p_out_text .= \sprintf("<div class='Menu6'>\n");
                        $p_out_text .= \sprintf("<a class='Menu2%s' href='%s' onclick='return call_server(\"app\", \"open_menu_group\", this)'><div class='Menu14'>%s</div><i class='Menu13 fa fa-caret-down'></i></a>\n", $activeClass, $menuI->link, $menuI->label);
                        $menuK = $menuI;
                    } else {
                        $p_out_text .= \sprintf("<div class='Menu9'>\n");
                        $p_out_text .= \sprintf("<div class='Menu12'><div class='Menu8'>%s <i class='Menu15 fa fa-caret-down'></i></div></div>\n", $menuI->label);
                    }

                    if (!$menuI->parentIndex) {
                        $p_out_text .= \sprintf("<div class='Menu7'>\n");
                        $p_out_text .= \sprintf("<a class='Menu16' href='%s'><div class='Menu8'>%s</div></a>\n", $menuK->link, $menuK->label);
                    } else {
                        $p_out_text .= \sprintf("<div class='Menu11'>\n");
                    }

                    $this->runHeaderSubMenu($menuI->index, $p_in_current_menu, $p_out_text);
                    $p_out_text .= \sprintf("</div>\n");
                    $p_out_text .= \sprintf("</div>\n");
                }
            }
        }
    }

    /**
     * Affiche la vue principale.
     * Permet d'afficher la vue principale.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    private function runView(string &$p_out_text): void
    {
        $p_out_text .= \sprintf("<div class='View1'>\n");
        // title
        $p_out_text .= \sprintf("<h1 class='View2'>%s</h1>\n", $this->viewTitle);
        //
        $p_out_text .= \sprintf("<div class='View3'>\n");
        $p_out_text .= \sprintf("<div>\n");
        $p_out_text .= \sprintf("<div class='View4'>\n");
        // label
        $p_out_text .= \sprintf("<div class='View6'><i class='fa fa-eye'></i> Vues</div>\n");
        // vues
        $p_out_text .= \sprintf("<div class='View7'>%d</div>\n", $this->viewCount);
        //
        $p_out_text .= \sprintf("</div>\n");
        $p_out_text .= \sprintf("</div>\n");
        $p_out_text .= \sprintf("<div>\n");
        // network
        $p_out_text .= \sprintf("<a href=\"%s\" target='_blank'><i class='View5 Facebook fa fa-facebook'></i></a>\n", $this->facebookShareUrl);
        $p_out_text .= \sprintf("<a href=\"%s\" target='_blank'><i class='View5 Linkedin fa fa-linkedin'></i></a>\n", $this->linkedInShareUrl);
        //
        $p_out_text .= \sprintf("</div>\n");
        $p_out_text .= \sprintf("</div>\n");
        $p_out_text .= \sprintf("</div>\n");
    }

    /**
     * Affiche la page principale.
     * Permet d'afficher la page principale.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    private function runPage(string &$p_out_text): void
    {
        $pageFactory = \app\php\factory\Page::Instance();
        $page = $pageFactory->getPage($this->pageId);
        $page->run($p_out_text);
    }

    /**
     * Affiche le pied de page.
     * Permet d'afficher le pied de page.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    private function runFooter(string &$p_out_text): void
    {
        $p_out_text .= \sprintf("<footer class='Footer1'>\n");
        $this->runFooterTitle($p_out_text);
        $p_out_text .= \sprintf("<div>\n");
        $this->runFooterSocialNetwork($p_out_text);
        $p_out_text .= \sprintf("</div>\n");
        $this->runFooterCopyright($p_out_text);
        $p_out_text .= \sprintf("</footer>\n");
    }

    /**
     * Affiche le titre du pied de page.
     * Permet d'afficher le titre du pied de page.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    private function runFooterTitle(string &$p_out_text): void
    {
        $p_out_text .= \sprintf("<div>Réseaux Sociaux - Réjoignez-nous</div>\n");
    }

    /**
     * Affiche les réseaux sociaux du pied de page.
     * Permet d'afficher les réseaux sociaux du pied de page.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    private function runFooterSocialNetwork(string &$p_out_text): void
    {
        // facebook
        $p_out_text .= \sprintf("<a href='#'>\n");
        $p_out_text .= \sprintf("<i class='Footer2 fa fa-facebook'></i>\n");
        $p_out_text .= \sprintf("</a>\n");
        // skype
        $p_out_text .= \sprintf("<a href='#'>\n");
        $p_out_text .= \sprintf("<i class='Footer2 fa fa-skype'></i>\n");
        $p_out_text .= \sprintf("</a>\n");
        // linkedin
        $p_out_text .= \sprintf("<a href='https://www.linkedin.com/in/tia-gerard-kesse/' target='_blank'>\n");
        $p_out_text .= \sprintf("<i class='Footer2 fa fa-linkedin'></i>\n");
        $p_out_text .= \sprintf("</a>\n");
        // github
        $p_out_text .= \sprintf("<a href='https://github.com/gkesse/' target='_blank'>\n");
        $p_out_text .= \sprintf("<i class='Footer2 fa fa-github'></i>\n");
        $p_out_text .= \sprintf("</a>\n");
    }

    /**
     * Affiche le copyright du pied de page.
     * Permet d'afficher le copyright du pied de page.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    private function runFooterCopyright(string &$p_out_text): void
    {
        $p_out_text .= \sprintf("<div>\n");
        $p_out_text .= \sprintf("<i class='fa fa-copyright'></i>\n");
        $p_out_text .= \sprintf("<span>%s - %s | %s</span>\n", $this->siteStartYear, $this->currentYear, $this->siteName);
        $p_out_text .= \sprintf("<div>%s</div>\n", $this->siteVision);
        $p_out_text .= \sprintf("</div>\n");
    }

    /**
     * Affiche les scripts JavaScript.
     * Permet d'afficher les scripts JavaScript.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    private function runScriptJs(string &$p_out_text): void
    {
        $p_out_text .= \sprintf("<script src='/public/js/app/view/Main.js'></script>\n");
        $p_out_text .= \sprintf("<script src='/public/js/scripts.js'></script>\n");
    }
}
