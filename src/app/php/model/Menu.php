<?php

declare(strict_types=1);

namespace app\php\model;

/**
 * Cree le modele du menu du site.
 * Permet de creer le modele du menu du site.
 * @package app\php\model
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Menu
{
    /**
     * Stocke l'index du menu du site.
     * @var int
     */
    public int $m_index = -1;
    /**
     * Stocke l'index du menu parent du site.
     * @var int
     */
    public int $m_parentIndex = -1;
    /**
     * Stocke le nom du menu du site.
     * @var string
     */
    public string $m_name = "";
    /**
     * Stocke le libelle du menu du site.
     * @var string
     */
    public string $m_label = "";
    /**
     * Stocke le titre du menu du site.
     * @var string
     */
    public string $m_title = "";
    /**
     * Stocke le lien du menu du site.
     * @var string
     */
    public string $m_link = "";
    /**
     * Stocke l'etat du menu du site.
     * @var bool
     */
    public bool $m_isActive = false;

    /**
     * Vérifie si le menu du site est égal à un autre menu du site.
     * Permet de vérifier si le menu du site est égal à un autre menu du site.
     * @param Menu $p_in_menu Indique le menu du site à comparer.
     * @return bool Indique que les menus sont égaux (si true).
     */
    public function isEqual(Menu $p_in_menu): bool
    {
        $isEqual = true;
        $isEqual &= ($this->m_index == $p_in_menu->m_index);
        $isEqual &= ($this->m_parentIndex == $p_in_menu->m_parentIndex);
        $isEqual &= ($this->m_name == $p_in_menu->m_name);
        $isEqual &= ($this->m_label == $p_in_menu->m_label);
        $isEqual &= ($this->m_title == $p_in_menu->m_title);
        $isEqual &= ($this->m_link == $p_in_menu->m_link);
        $isEqual &= ($this->m_isActive == $p_in_menu->m_isActive);
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
