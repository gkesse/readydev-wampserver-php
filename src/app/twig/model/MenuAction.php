<?php

declare(strict_types=1);

namespace app\twig\model;

/**
 * Cree le modele du menu des actions.
 * Permet de creer le modele du menu des actions.
 * @package app\twig\model
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class MenuAction
{
    /**
     * Stocke l'index du menu d'une action.
     * @var int
     */
    public int $index = -1;
    /**
     * Stocke l'index du menu parent d'une action.
     * @var int
     */
    public int $parentIndex = -1;
    /**
     * Stocke le module du menu d'une action.
     * @var string
     */
    public string $module = "";
    /**
     * Stocke la méthode du menu d'une action.
     * @var string
     */
    public string $method = "";
    /**
     * Stocke le titre du menu d'une action.
     * @var string
     */
    public string $title = "";
    /**
     * Stocke l'état du menu d'une action.
     * @var bool
     */
    public bool $isActive = false;
    /**
     * Stocke la donnee du menu d'une action.
     * @var string
     */
    public string $data = "";

    /**
     * Vérifie si le menu d'une action est égal à un autre menu d'une action.
     * Permet de vérifier si le menu d'une action est égal à un autre menu d'une action.
     * @param MenuAction $p_in_menu Indique le menu d'une action à comparer.
     * @return bool Indique que les menus sont égaux (si true).
     */
    public function isEqual(MenuAction $p_in_menu): bool
    {
        $isEqual = true;
        $isEqual &= ($this->index == $p_in_menu->index);
        $isEqual &= ($this->parentIndex == $p_in_menu->parentIndex);
        $isEqual &= ($this->module == $p_in_menu->module);
        $isEqual &= ($this->method == $p_in_menu->method);
        $isEqual &= ($this->title == $p_in_menu->title);
        $isEqual &= ($this->isActive == $p_in_menu->isActive);
        $isEqual &= ($this->data == $p_in_menu->data);
        return ($isEqual == true);
    }

    /**
     * Vérifie si le menu d'une action est vide.
     * Permet de vérifier si le menu d'une action est vide.
     * @return bool Indique que le menu d'une action est vide (si true).
     */
    public function isEmpty(): bool
    {
        return $this->isEqual(new MenuAction());
    }
}
