<?php

declare(strict_types=1);

namespace app\php\model;

/**
 * Cree le modele de la liste des menus du site.
 * Permet de creer le modele de la liste des menus du site.
 * @package app\php\model
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class MenuList
{
    /**
     * Stocke la liste des menus du site.
     * @var array
     */
    private array $menuList = [];

    /**
     * Ajoute un menu à la liste des menus du site.
     * Permet d'ajouter un menu à la liste des menus du site.
     * @param Menu $menu Indique le menu à ajouter.
     */
    private function addMenuByItem(Menu $menu): void
    {
        $this->menuList[] = $menu;
    }

    /**
     * Ajoute un menu à la liste des menus du site par ses paramètres.
     * Permet d'ajouter un menu à la liste des menus du site par ses paramètres.
     * @param int $p_in_parent_index Indique l'index du menu parent du site.
     * @param string $p_in_name Indique le nom du menu du site.
     * @param string $p_in_label Indique le libelle du menu du site.
     * @param string $p_in_title Indique le titre du menu du site.
     * @param string $p_in_link Indique le lien du menu du site.
     * @param bool $p_in_is_active Indique l'etat du menu du site.
     * @return Menu Indique le menu ajouté à la liste des menus du site.
     */
    private function addMenuByParams(int $p_in_parent_index, string $p_in_name, string $p_in_label, string $p_in_title, string $p_in_link, bool $p_in_is_active): Menu
    {
        $menu = new Menu();
        $menu->index = $this->size() + 1;
        $menu->parentIndex = $p_in_parent_index;
        $menu->name = $p_in_name;
        $menu->label = $p_in_label;
        $menu->title = $p_in_title;
        $menu->link = $p_in_link;
        $menu->isActive = $p_in_is_active;
        $this->menuList[] = $menu;
        return $menu;
    }

    /**
     * Ajoute un menu à la liste des menus du site par ses paramètres et en tant que menu racine.
     * Permet d'ajouter un menu à la liste des menus du site par ses paramètres et en tant que menu racine.
     * @param string $p_in_name Indique le nom du menu du site.
     * @param string $p_in_label Indique le libelle du menu du site.
     * @param string $p_in_title Indique le titre du menu du site.
     * @param string $p_in_link Indique le lien du menu du site.
     * @param bool $p_in_is_active Indique l'etat du menu du site.
     * @return Menu Indique le menu ajouté à la liste des menus du site.
     */
    public function addMenuByRoot(string $p_in_name, string $p_in_label, string $p_in_title, string $p_in_link, bool $p_in_is_active): Menu
    {
        return $this->addMenuByParams(0, $p_in_name, $p_in_label, $p_in_title, $p_in_link, $p_in_is_active);
    }

    /**
     * Ajoute un menu à la liste des menus du site par ses paramètres et en tant que menu enfant d'un menu parent.
     * Permet d'ajouter un menu à la liste des menus du site par ses paramètres et en tant que menu enfant d'un menu parent.
     * @param Menu $p_in_parent_menu Indique le menu parent du site.
     * @param string $p_in_name Indique le nom du menu du site.
     * @param string $p_in_label Indique le libelle du menu du site.
     * @param string $p_in_title Indique le titre du menu du site.
     * @param string $p_in_link Indique le lien du menu du site.
     * @param bool $p_in_is_active Indique l'etat du menu du site.
     * @return Menu Indique le menu ajouté à la liste des menus du site.
     */
    public function addMenuByParentMenu(Menu $p_in_parent_menu, string $p_in_name, string $p_in_label, string $p_in_title, string $p_in_link, bool $p_in_is_active): Menu
    {
        return $this->addMenuByParams($p_in_parent_menu->index, $p_in_name, $p_in_label, $p_in_title, $p_in_link, $p_in_is_active);
    }

    /**
     * Recupere la liste des menus du site par l'index de leur menu parent.
     * Permet de recuperer la liste des menus du site par l'index de leur menu parent.
     * @param int $p_in_parent_index Indique l'index du menu parent du site.
     * @return MenuList Indique la liste des menus du site par l'index de leur menu parent.
     */
    public function getMenuListByParentIndex(int $p_in_parent_index): MenuList
    {
        $outputMenuList = new MenuList();
        foreach ($this->menuList as $menu) {
            if ($menu->parentIndex == $p_in_parent_index) {
                $outputMenuList->addMenuByItem($menu);
            }
        }
        return $outputMenuList;
    }

    /**
     * Recupere un menu de la liste des menus du site par son lien.
     * Permet de recuperer un menu de la liste des menus du site par son lien.
     * @param string $p_in_link Indique le lien du menu du site.
     * @return Menu Indique le menu de la liste des menus du site par son lien.
     */
    public function getMenuByLink(string $p_in_link): Menu
    {
        $outputMenu = new Menu();
        foreach ($this->menuList as $menu) {
            if ($menu->link == $p_in_link) {
                $outputMenu = $menu;
                break;
            }
        }
        return $outputMenu;
    }

    /**
     * Recupere un menu de la liste des menus du site par sa position dans la liste.
     * Permet de recuperer un menu de la liste des menus du site par sa position dans la liste.
     * @param int $p_in_position Indique la position du menu du site dans la liste.
     * @return Menu Indique le menu de la liste des menus du site par sa position dans la liste.
     */
    public function getMenuByPosition(int $p_in_position): Menu
    {
        return $this->menuList[$p_in_position] ?? new Menu();
    }

    /**
     * Recupere la liste des menus du site.
     * Permet de recuperer la liste des menus du site.
     * @return array Indique la liste des menus du site.
     */
    public function getMenuList(): array
    {
        return $this->menuList;
    }

    /**
     * Vérifie si la liste des menus du site est vide.
     * Permet de vérifier si la liste des menus du site est vide.
     * @return bool Indique que la liste des menus du site est vide (si true).
     */
    public function isEmpty(): bool
    {
        return (\count($this->menuList) == 0);
    }

    /**
     * Recupere la taille de la liste des menus du site.
     * Permet de recuperer la taille de la liste des menus du site.
     * @return int Indique la taille de la liste des menus du site.
     */
    public function size(): int
    {
        return \count($this->menuList);
    }
}
