<?php

declare(strict_types=1);

namespace app\twig\template\page;

/**
 * Cree le controleur du template de la page d'administration.
 * Permet de creer le controleur du template de la page d'administration.
 * @package app\twig\template\page
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Admin extends Page
{
    /**
     * Construit le controleur du template de la page d'administration.
     * Permet de construire le controleur du template de la page d'administration.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retourne le chemin du template twig.
     * Permet de retourner le chemin du template twig.
     * @return string Indique le chemin du template twig.
     */
    public function getTemplateFile(): string
    {
        return 'page/admin.page.twig';
    }

    public function getEditorTitle(): string
    {
        return "Editeur de page HTML";
    }

    public function getModuleMenuActionList(): \app\twig\model\MenuActionList
    {
        $menuList = new \app\twig\model\MenuActionList();

        $menu1 = $menuList->addMenuByRoot("", "", "Modules", false);

        $menu2 = $menuList->addMenuByParentMenu($menu1, "", "", "Editeur HTML", false);
        $menuList->addMenuByParentMenu($menu2, "editor", "open_editor_tab", "Accueil", true, "EditorTab0");
        $menuList->addMenuByParentMenu($menu2, "editor", "open_editor_tab", "Page", true, "EditorTab1");
        $menuList->addMenuByParentMenu($menu2, "editor", "open_editor_tab", "Edition", true, "EditorTab2");
        $menuList->addMenuByParentMenu($menu2, "editor", "open_editor_tab", "Code", true, "EditorTab3");

        $menu2 = $menuList->addMenuByParentMenu($menu1, "", "", "Sitemap", false);
        $menuList->addMenuByParentMenu($menu2, "sitemap", "generate_sitemap", "Générer", true);
        $menuList->addMenuByParentMenu($menu2, "sitemap", "visualize_sitemap", "Visualiser", true);

        return $menuList;
    }
}
