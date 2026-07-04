<?php

declare(strict_types=1);

namespace app\twig\model;

/**
 * Cree le modele de la liste des menus des actions.
 * Permet de creer le modele de la liste des menus des actions.
 * @package app\twig\model
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class MenuActionList
{
    /**
     * Stocke la liste des menus des actions.
     * @var array
     */
    private array $m_menuList = [];

    /**
     * Ajoute un menu à la liste des menus des actions.
     * Permet d'ajouter un menu à la liste des menus des actions.
     * @param MenuAction $menu Indique le menu à ajouter.
     */
    private function addMenuByItem(MenuAction $menu): void
    {
        $this->m_menuList[] = $menu;
    }

    /**
     * Ajoute un menu enfant à la liste des menus par ses paramètres.
     * Permet d'ajouter un menu enfant à la liste des menus par ses paramètres.
     * @param int $p_in_parent_index Indique l'index du menu parent.
     * @param string $p_in_module Indique le module concerné.
     * @param string $p_in_method Indique la méthode à exécuter.
     * @param string $p_in_title Indique le titre du menu.
     * @param bool $p_in_isActive Indique l'état du menu.
     * @param string $p_in_data Indique la donnee à transmettre.
     * @return MenuAction Indique le menu ajouté à la liste des menus des actions.
     */
    private function addMenuByParams(int $p_in_parent_index, string $p_in_module, string $p_in_method, string $p_in_title, bool $p_in_isActive, string $p_in_data = ""): MenuAction
    {
        $menu = new MenuAction();
        $menu->m_index = $this->size() + 1;
        $menu->m_parentIndex = $p_in_parent_index;
        $menu->m_module = $p_in_module;
        $menu->m_method = $p_in_method;
        $menu->m_title = $p_in_title;
        $menu->m_isActive = $p_in_isActive;
        $menu->m_data = $p_in_data;
        $this->m_menuList[] = $menu;
        return $menu;
    }

    /**
     * Ajoute un menu racine à la liste des menus par ses paramètres.
     * Permet d'ajouter un menu racine à la liste des menus par ses paramètres.
     * @param string $p_in_module Indique le module concerné.
     * @param string $p_in_method Indique la méthode à exécuter.
     * @param string $p_in_title Indique le titre du menu.
     * @param bool $p_in_isActive Indique l'état du menu.
     * @param string $p_in_data Indique la donnee à transmettre.
     * @return MenuAction Indique le menu racine ajouté à la liste des menus.
     */
    public function addMenuByRoot(string $p_in_module, string $p_in_method, string $p_in_title, bool $p_in_isActive, string $p_in_data = ""): MenuAction
    {
        return $this->addMenuByParams(0, $p_in_module, $p_in_method, $p_in_title, $p_in_isActive, $p_in_data);
    }

    /**
     * Ajoute un menu enfant à la liste des menus par ses paramètres.
     * Permet d'ajouter un menu enfant à la liste des menus par ses paramètres.
     * @param MenuAction $p_in_parent_menu Indique le menu parent .
     * @param string $p_in_module Indique le module concerné.
     * @param string $p_in_method Indique la méthode à exécuter.
     * @param string $p_in_title Indique le titre.
     * @param bool $p_in_isActive Indique l'état.
     * @param string $p_in_data Indique la donnee à transmettre.
     * @return MenuAction Indique le menu enfant ajouté à la liste des menus.
     */
    public function addMenuByParentMenu(MenuAction $p_in_parent_menu, string $p_in_module, string $p_in_method, string $p_in_title, bool $p_in_isActive, string $p_in_data = ""): MenuAction
    {
        return $this->addMenuByParams($p_in_parent_menu->m_index, $p_in_module, $p_in_method, $p_in_title, $p_in_isActive, $p_in_data);
    }

    /**
     * Recupere la liste des menus enfants d'un menu parent.
     * Permet de recuperer la liste des menus enfants d'un menu parent.
     * @param int $p_in_parent_index Indique l'index du menu parent.
     * @return MenuActionList Indique la liste des menus enfants.
     */
    public function getMenuListByParentIndex(int $p_in_parent_index): MenuActionList
    {
        $outputMenuList = new MenuActionList();
        foreach ($this->m_menuList as $menu) {
            if ($menu->m_parentIndex == $p_in_parent_index) {
                $outputMenuList->addMenuByItem($menu);
            }
        }
        return $outputMenuList;
    }

    /**
     * Recupere un menu par son module et sa méthode.
     * Permet de recuperer un menu par son module et sa méthode.
     * @param string $p_in_module Indique le module concerné.
     * @param string $p_in_method Indique la méthode.
     * @return MenuAction Indique le menu correspondant au module et à la méthode.
     */
    public function getMenuByModuleMethod(string $p_in_module, string $p_in_method): MenuAction
    {
        $outputMenu = new MenuAction();
        foreach ($this->m_menuList as $menu) {
            if ($menu->m_module == $p_in_module && $menu->m_method == $p_in_method) {
                $outputMenu = $menu;
                break;
            }
        }
        return $outputMenu;
    }

    /**
     * Recupere un menu par sa position dans la liste.
     * Permet de recuperer un menu par sa position dans la liste.
     * @param int $p_in_position Indique la position du menu dans la liste.
     * @return MenuAction Indique le menu de la liste par sa position.
     */
    public function getMenuByPosition(int $p_in_position): MenuAction
    {
        return $this->m_menuList[$p_in_position] ?? new MenuAction();
    }

    /**
     * Recupere la liste.
     * Permet de recuperer la liste.
     * @return array Indique la liste.
     */
    public function getMenuList(): array
    {
        return $this->m_menuList;
    }

    /**
     * Vérifie si la liste est vide.
     * Permet de vérifier si la liste est vide.
     * @return bool Indique que la liste est vide (si true).
     */
    public function isEmpty(): bool
    {
        return (\count($this->m_menuList) == 0);
    }

    /**
     * Recupere la taille de la liste.
     * Permet de recuperer la taille de la liste.
     * @return int Indique la taille de la liste.
     */
    public function size(): int
    {
        return \count($this->m_menuList);
    }
}
