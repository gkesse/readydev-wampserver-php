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
    public int $m_index = -1;
    /**
     * Stocke l'index du menu parent d'une action.
     * @var int
     */
    public int $m_parentIndex = -1;
    /**
     * Stocke le module du menu d'une action.
     * @var string
     */
    public string $m_module = "";
    /**
     * Stocke la méthode du menu d'une action.
     * @var string
     */
    public string $m_method = "";
    /**
     * Stocke le titre du menu d'une action.
     * @var string
     */
    public string $m_title = "";
    /**
     * Stocke l'état du menu d'une action.
     * @var bool
     */
    public bool $m_isActive = false;
    /**
     * Stocke la donnee du menu d'une action.
     * @var string
     */
    public string $m_data = "";

    /**
     * Vérifie si le menu d'une action est égal à un autre menu d'une action.
     * Permet de vérifier si le menu d'une action est égal à un autre menu d'une action.
     * @param MenuAction $p_in_menu Indique le menu d'une action à comparer.
     * @return bool Indique que les menus sont égaux (si true).
     */
    public function isEqual(MenuAction $p_in_menu): bool
    {
        $isEqual = true;
        $isEqual &= ($this->m_index == $p_in_menu->m_index);
        $isEqual &= ($this->m_parentIndex == $p_in_menu->m_parentIndex);
        $isEqual &= ($this->m_module == $p_in_menu->m_module);
        $isEqual &= ($this->m_method == $p_in_menu->m_method);
        $isEqual &= ($this->m_title == $p_in_menu->m_title);
        $isEqual &= ($this->m_isActive == $p_in_menu->m_isActive);
        $isEqual &= ($this->m_data == $p_in_menu->m_data);
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
