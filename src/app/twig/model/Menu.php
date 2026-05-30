<?php

declare(strict_types=1);

namespace app\twig\model;

/**
 * Cree le modele du menu du site.
 * Permet de creer le modele du menu du site.
 * @package app\twig\model
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Menu
{
    /**
     * Stocke l'index du menu du site.
     * @var int
     */
    public int $index = -1;
    /**
     * Stocke l'index du menu parent du site.
     * @var int
     */
    public int $parentIndex = -1;
    /**
     * Stocke le nom du menu du site.
     * @var string
     */
    public string $name = "";
    /**
     * Stocke le libelle du menu du site.
     * @var string
     */
    public string $label = "";
    /**
     * Stocke le titre du menu du site.
     * @var string
     */
    public string $title = "";
    /**
     * Stocke le lien du menu du site.
     * @var string
     */
    public string $link = "";
    /**
     * Stocke l'etat du menu du site.
     * @var bool
     */
    public bool $isActive = false;

    /**
     * Vérifie si le menu du site est égal à un autre menu du site.
     * Permet de vérifier si le menu du site est égal à un autre menu du site.
     * @param Menu $p_in_menu Indique le menu du site à comparer.
     * @return bool Indique que les menus sont égaux (si true).
     */
    public function isEqual(Menu $p_in_menu): bool
    {
        $isEqual = true;
        $isEqual &= ($this->index == $p_in_menu->index);
        $isEqual &= ($this->parentIndex == $p_in_menu->parentIndex);
        $isEqual &= ($this->name == $p_in_menu->name);
        $isEqual &= ($this->label == $p_in_menu->label);
        $isEqual &= ($this->title == $p_in_menu->title);
        $isEqual &= ($this->link == $p_in_menu->link);
        $isEqual &= ($this->isActive == $p_in_menu->isActive);
        return ($isEqual == true);
    }

    /**
     * Vérifie si le menu du site est vide.
     * Permet de vérifier si le menu du site est vide.
     * @return bool Indique que le menu du site est vide (si true).
     */
    public function isEmpty(): bool
    {
        return $this->isEqual(new Menu());
    }
}
