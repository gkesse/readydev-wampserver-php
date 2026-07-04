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
     * Stocke les données du site.
     * @var \app\php\view\main\model\Site
     */
    private \app\php\view\main\model\Site $m_site;
    /**
     * Stocke les données de la page.
     * @var \app\php\view\main\model\Page
     */
    private \app\php\view\main\model\Page $m_page;
    /**
     * Stocke les données d'Open Graph.
     * @var \app\php\view\main\model\OpenGraph
     */
    private \app\php\view\main\model\OpenGraph $m_openGraph;
    /**
     * Stocke les données du partage sur les réseaux sociaux.
     * @var \app\php\view\main\model\Share
     */
    private \app\php\view\main\model\Share $m_share;
    /**
     * Stocke la liste des menus.
     * @var \app\php\model\MenuList
     */
    private \app\php\model\MenuList $m_headerMenuList;
    /**
     * Stocke le menu courant.
     * @var \app\php\model\Menu
     */
    private \app\php\model\Menu $m_headerMenuCurrent;

    /**
     * Construit la page principale du site.
     * Permet de construire la page principale du site.
     */
    public function __construct()
    {
        $controller = new \app\php\controller\Main();

        $this->m_site = new \app\php\view\main\model\Site();
        $this->m_site->m_siteName = $controller->getSiteName();
        $this->m_site->m_siteStartYear = $controller->getSiteStartYear();
        $this->m_site->m_currentYear = $controller->getCurrentYear();
        $this->m_site->m_siteVision = $controller->getSiteVision();

        $this->m_page = new \app\php\view\main\model\Page();
        $this->m_page->m_title = $controller->getPageTitle();
        $this->m_page->m_language = $controller->getPageLanguage();
        $this->m_page->m_encoding = $controller->getPageEncoding();
        $this->m_page->m_logo = $controller->getPageLogo();
        $this->m_page->m_logoMimeType = $controller->getPageLogoMimeType();
        $this->m_page->m_description = $controller->getPageDescription();
        $this->m_page->m_home = $controller->getHomePage();
        $this->m_page->m_id = $controller->getPageId();

        $this->m_openGraph = new \app\php\view\main\model\OpenGraph();
        $this->m_openGraph->m_type = $controller->getOpenGraphType();
        $this->m_openGraph->m_image = $controller->getOpenGraphImage();
        $this->m_openGraph->m_imageMimeType = $controller->getOpenGraphImageMimeType();
        $this->m_openGraph->m_imageWidth = $controller->getOpenGraphImageWidth();
        $this->m_openGraph->m_imageHeight = $controller->getOpenGraphImageHeight();
        $this->m_openGraph->m_locale = $controller->getOpenGraphLocale();
        $this->m_openGraph->m_url = $controller->getPageUrl();
        $this->m_openGraph->m_title = $controller->getPageTitle();
        $this->m_openGraph->m_siteName = $controller->getSiteName();
        $this->m_openGraph->m_description = $controller->getPageDescription();

        $this->m_headerMenuList = $controller->loadHeaderMenuList();
        $this->m_headerMenuCurrent = $this->m_headerMenuList->getMenuByLink($this->m_page->m_id);

        $this->m_page->m_viewTitle = $this->m_headerMenuCurrent->m_title;
        $this->m_page->m_viewCount = $controller->getViewCount();

        $this->m_share = new \app\php\view\main\model\Share();
        $this->m_share->m_facebookUrl = $controller->getFacebookShareUrl();
        $this->m_share->m_linkedInUrl = $controller->getLinkedInShareUrl();
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
        $outputText .= \sprintf("<html lang='%s'>\n", $this->m_page->m_language);
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
        $p_out_text .= \sprintf("<title>%s</title>\n", $this->m_page->m_title);
        $p_out_text .= \sprintf("<meta charset='%s'/>\n", $this->m_page->m_encoding);
        $p_out_text .= \sprintf("<link rel='shortcut icon' type='%s' href='%s'/>\n", $this->m_page->m_logoMimeType, $this->m_page->m_logo);
        $p_out_text .= \sprintf("<meta name='description' content=\"%s\"/>\n", $this->m_page->m_description);
    }

    /**
     * Affiche les informations d'Open Graph.
     * Permet d'afficher les informations d'Open Graph.
     * @param string $p_out_text Indique le texte de sortie.
     * @return void
     */
    private function runOpenGraph(string &$p_out_text): void
    {
        $p_out_text .= \sprintf("<meta property='og:type' content=\"%s\"/>\n", $this->m_openGraph->m_type);
        $p_out_text .= \sprintf("<meta property='og:image' content=\"%s\"/>\n", $this->m_openGraph->m_image);
        $p_out_text .= \sprintf("<meta property='og:image:secure_url' content=\"%s\"/>\n", $this->m_openGraph->m_image);
        $p_out_text .= \sprintf("<meta property='og:image:type' content=\"%s\"/>\n", $this->m_openGraph->m_imageMimeType);
        $p_out_text .= \sprintf("<meta property='og:image:width' content=\"%d\"/>\n", $this->m_openGraph->m_imageWidth);
        $p_out_text .= \sprintf("<meta property='og:image:height' content=\"%d\"/>\n", $this->m_openGraph->m_imageHeight);
        $p_out_text .= \sprintf("<meta property='og:locale' content=\"%s\"/>\n", $this->m_openGraph->m_locale);
        $p_out_text .= \sprintf("<meta property='og:url' content=\"%s\"/>\n", $this->m_openGraph->m_url);
        $p_out_text .= \sprintf("<meta property='og:title' content=\"%s\"/>\n", $this->m_openGraph->m_title);
        $p_out_text .= \sprintf("<meta property='og:site_name' content=\"%s\"/>\n", $this->m_openGraph->m_siteName);
        $p_out_text .= \sprintf("<meta property='og:description' content=\"%s\"/>\n", $this->m_openGraph->m_description);
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
        $p_out_text .= \sprintf("<a class='Menu3' href='%s'>\n", $this->m_page->m_home);
        $p_out_text .= \sprintf("<img class='Menu4' src='%s' alt='logo.png'/>\n", $this->m_page->m_logo);
        $p_out_text .= \sprintf("<span class='Menu5'>%s</span>\n", $this->m_site->m_siteName);
        $p_out_text .= \sprintf("</a>\n");
        $this->runHeaderMenu(0, $this->m_headerMenuCurrent, $p_out_text);
        $p_out_text .= \sprintf("<div class='Bars1' onclick='callBackend(\"app\", \"open_menu_bars\", this)' data-is-opened='false'><i class='fa fa-bars'></i></div>\n");
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
        $menuListI = $this->m_headerMenuList->getMenuListByParentIndex($p_in_parent_index);
        $menuK = new \app\php\model\Menu();

        for ($i = 0; $i < $menuListI->size(); $i++) {
            $menuI = $menuListI->getMenuByPosition($i);

            if ($menuI->m_isActive) {
                $menuListJ = $this->m_headerMenuList->getMenuListByParentIndex($menuI->m_index);

                $activeClass = "";

                $isActive = false;
                $isActive |= $menuI->isEqual($this->m_headerMenuCurrent);
                $isActive |= (($menuI->m_name == $this->m_headerMenuCurrent->m_name) && ($menuI->m_parentIndex == 0));

                if ($isActive) $activeClass = " Active";

                if ($menuListJ->isEmpty()) {
                    if (!$menuI->m_parentIndex) {
                        $p_out_text .= \sprintf("<a class='Menu2%s' href='%s'><div class='Menu14'>%s</div></a>\n", $activeClass, $menuI->m_link, $menuI->m_label);
                    } else {
                        $p_out_text .= \sprintf("<a class='Menu10' href='%s'><div class='Menu8%s'>%s</div></a>\n", $menuI->m_link, $activeClass, $menuI->m_label);
                    }
                } else {
                    if (!$menuI->m_parentIndex) {
                        $p_out_text .= \sprintf("<div class='Menu6'>\n");
                        $p_out_text .= \sprintf("<a class='Menu2%s' href='%s' onclick='return callBackend(\"app\", \"open_menu_group\", this)'><div class='Menu14'>%s</div><i class='Menu13 fa fa-caret-down'></i></a>\n", $activeClass, $menuI->m_link, $menuI->m_label);
                        $menuK = $menuI;
                    } else {
                        $p_out_text .= \sprintf("<div class='Menu9'>\n");
                        $p_out_text .= \sprintf("<div class='Menu12'><div class='Menu8'>%s <i class='Menu15 fa fa-caret-down'></i></div></div>\n", $menuI->m_label);
                    }

                    if (!$menuI->m_parentIndex) {
                        $p_out_text .= \sprintf("<div class='Menu7'>\n");
                        $p_out_text .= \sprintf("<a class='Menu16' href='%s'><div class='Menu8'>%s</div></a>\n", $menuK->m_link, $menuK->m_label);
                    } else {
                        $p_out_text .= \sprintf("<div class='Menu11'>\n");
                    }

                    $this->runHeaderSubMenu($menuI->m_index, $this->m_headerMenuCurrent, $p_out_text);
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
        $menuListI = $this->m_headerMenuList->getMenuListByParentIndex($p_in_parent_index);
        $menuK = new \app\php\model\Menu();

        for ($i = 0; $i < $menuListI->size(); $i++) {
            $menuI = $menuListI->getMenuByPosition($i);

            if ($menuI->m_isActive) {
                $menuListJ = $this->m_headerMenuList->getMenuListByParentIndex($menuI->m_index);

                $activeClass = "";

                $isActive = false;
                $isActive |= $menuI->isEqual($p_in_current_menu);
                $isActive |= (($menuI->m_name == $p_in_current_menu->m_name) && ($menuI->m_parentIndex == 0));

                if ($isActive) $activeClass = " Active";

                if ($menuListJ->isEmpty()) {
                    if (!$menuI->m_parentIndex) {
                        $p_out_text .= \sprintf("<a class='Menu2%s' href='%s'><div class='Menu14'>%s</div></a>\n", $activeClass, $menuI->m_link, $menuI->m_label);
                    } else {
                        $p_out_text .= \sprintf("<a class='Menu10' href='%s'><div class='Menu8%s'>%s</div></a>\n", $menuI->m_link, $activeClass, $menuI->m_label);
                    }
                } else {
                    if (!$menuI->m_parentIndex) {
                        $p_out_text .= \sprintf("<div class='Menu6'>\n");
                        $p_out_text .= \sprintf("<a class='Menu2%s' href='%s' onclick='return callBackend(\"app\", \"open_menu_group\", this)'><div class='Menu14'>%s</div><i class='Menu13 fa fa-caret-down'></i></a>\n", $activeClass, $menuI->m_link, $menuI->m_label);
                        $menuK = $menuI;
                    } else {
                        $p_out_text .= \sprintf("<div class='Menu9'>\n");
                        $p_out_text .= \sprintf("<div class='Menu12'><div class='Menu8'>%s <i class='Menu15 fa fa-caret-down'></i></div></div>\n", $menuI->m_label);
                    }

                    if (!$menuI->m_parentIndex) {
                        $p_out_text .= \sprintf("<div class='Menu7'>\n");
                        $p_out_text .= \sprintf("<a class='Menu16' href='%s'><div class='Menu8'>%s</div></a>\n", $menuK->m_link, $menuK->m_label);
                    } else {
                        $p_out_text .= \sprintf("<div class='Menu11'>\n");
                    }

                    $this->runHeaderSubMenu($menuI->m_index, $p_in_current_menu, $p_out_text);
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
        $p_out_text .= \sprintf("<h1 class='View2'>%s</h1>\n", $this->m_page->m_viewTitle);
        //
        $p_out_text .= \sprintf("<div class='View3'>\n");
        $p_out_text .= \sprintf("<div>\n");
        $p_out_text .= \sprintf("<div class='View4'>\n");
        // label
        $p_out_text .= \sprintf("<div class='View6'><i class='fa fa-eye'></i> Vues</div>\n");
        // vues
        $p_out_text .= \sprintf("<div class='View7'>%d</div>\n", $this->m_page->m_viewCount);
        //
        $p_out_text .= \sprintf("</div>\n");
        $p_out_text .= \sprintf("</div>\n");
        $p_out_text .= \sprintf("<div>\n");
        // network
        $p_out_text .= \sprintf("<a href=\"%s\" target='_blank'><i class='View5 Facebook fa fa-facebook'></i></a>\n", $this->m_share->m_facebookUrl);
        $p_out_text .= \sprintf("<a href=\"%s\" target='_blank'><i class='View5 Linkedin fa fa-linkedin'></i></a>\n", $this->m_share->m_linkedInUrl);
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
        $page = $pageFactory->getPage($this->m_page->m_id);
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
        $p_out_text .= \sprintf("<span>%s - %s | %s</span>\n", $this->m_site->m_siteStartYear, $this->m_site->m_currentYear, $this->m_site->m_siteName);
        $p_out_text .= \sprintf("<div>%s</div>\n", $this->m_site->m_siteVision);
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
        $p_out_text .= \sprintf("<script src='/public/js/app/controller/MainWindow.js'></script>\n");
        $p_out_text .= \sprintf("<script src='/public/js/app/menu/Header.js'></script>\n");

        $p_out_text .= \sprintf("<script src='/public/js/app/menu/Action.js'></script>\n");
        $p_out_text .= \sprintf("<script src='/public/js/app/controller/Menu.js'></script>\n");

        $p_out_text .= \sprintf("<script src='/public/js/app/admin/Editor.js'></script>\n");
        $p_out_text .= \sprintf("<script src='/public/js/app/controller/Admin.js'></script>\n");

        $p_out_text .= \sprintf("<script src='/public/js/app/backend/Backend.js'></script>\n");
        $p_out_text .= \sprintf("<script src='/public/js/app/backend/App.js'></script>\n");
        $p_out_text .= \sprintf("<script src='/public/js/app/factory/Backend.js'></script>\n");
        $p_out_text .= \sprintf("<script src='/public/js/app/model/BackendInfo.js'></script>\n");
        $p_out_text .= \sprintf("<script src='/public/js/app/controller/Backend.js'></script>\n");

        $p_out_text .= \sprintf("<script src='/public/js/app/controller/Main.js'></script>\n");
        $p_out_text .= \sprintf("<script src='/public/js/scripts.js'></script>\n");
    }
}
