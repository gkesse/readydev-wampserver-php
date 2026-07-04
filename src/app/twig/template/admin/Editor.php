<?php

declare(strict_types=1);

namespace app\twig\template\admin;

/**
 * Cree le controleur de l'editeur html de la page d'administration.
 * Permet de creer le controleur de l'editeur html de la page d'administration.
 * @package app\twig\template\admin
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Editor
{
    /**
     * Construit le controleur de l'editeur html de la page d'administration.
     * Permet de construire le controleur de l'editeur html de la page d'administration.
     */
    public function __construct() {}

    public function getTitle(): string
    {
        return "Editeur de page HTML";
    }

    public function getHeaderMenu(): \app\twig\model\MenuActionList
    {
        $menuList = new \app\twig\model\MenuActionList();

        // modules
        $menu1 = $menuList->addMenuByRoot("", "", "Modules", false);
        // modules/editor
        $menu2 = $menuList->addMenuByParentMenu($menu1, "", "", "Editeur HTML", false);
        $menuList->addMenuByParentMenu($menu2, "editor", "open_editor_tab", "Accueil", true, "EditorTab0");
        $menuList->addMenuByParentMenu($menu2, "editor", "open_editor_tab", "Page", true, "EditorTab1");
        $menuList->addMenuByParentMenu($menu2, "editor", "open_editor_tab", "Edition", true, "EditorTab2");
        $menuList->addMenuByParentMenu($menu2, "editor", "open_editor_tab", "Code", true, "EditorTab3");
        // modules/sitemap
        $menu2 = $menuList->addMenuByParentMenu($menu1, "", "", "Sitemap", false);
        $menuList->addMenuByParentMenu($menu2, "sitemap", "generate_sitemap", "Générer", true);
        $menuList->addMenuByParentMenu($menu2, "sitemap", "visualize_sitemap", "Visualiser", true);

        return $menuList;
    }

    public function getHomeDescription(): string
    {
        $description = <<<_EOF_
        <b>ReadyHTML</b> est un éditeur de pages HTML.<br/>
        Il permet d'éditer les pages HTML du site ReadyDev.
        Cela accélère l'ajout de nouveaux composants
        et évite de passer du temps inutilement à écrire du code
        dans le but d'ajouter de nouveaux contenus.
        <br/>Produit par <b>Gérard KESSE</b>.
        _EOF_;
        return $description;
    }

    public function getPageMenu(): \app\twig\model\MenuActionList
    {
        $menuList = new \app\twig\model\MenuActionList();

        // actions
        $menu1 = $menuList->addMenuByRoot("", "", "Actions", false);
        // actions/page
        $menu2 = $menuList->addMenuByParentMenu($menu1, "", "", "Page", false);
        $menuList->addMenuByParentMenu($menu2, "page", "load_page", "Charger", true, "EditorTab0");
        $menuList->addMenuByParentMenu($menu2, "page", "create_page", "Créer", true, "EditorTab1");
        $menuList->addMenuByParentMenu($menu2, "page", "new_page", "Nouveau", true, "EditorTab2");
        // actions/repertoire
        $menu2 = $menuList->addMenuByParentMenu($menu1, "", "", "Répertoire", false);
        $menuList->addMenuByParentMenu($menu2, "page", "create_folder", "Créer", true);

        return $menuList;
    }
}
