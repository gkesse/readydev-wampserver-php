<?php

declare(strict_types=1);

namespace app\factory;

/**
 * Cree la factory de pages du site.
 * Permet de creer la factory de pages du site.
 * @package app\factory
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Page
{
    /**
     * Stocke l'instance de la factory du contenu de la page du site.
     * @var Page
     */
    private static ?Page $s_instance = null;
    /**
     * Stocke la liste des pages du site.
     * @var array
     */
    private array $pageList = [];

    /**
     * Construit la factory du contenu de la page du site.
     * Permet de construire la factory du contenu de la page du site.
     */
    private function __construct()
    {
        $this->pageList = [
            "/home/admin" => new \app\page\Admin(),
            "/home/connexion" => new \app\page\Connexion()
        ];
    }

    /**
     * Recupere l'instance de la factory du contenu de la page du site.
     * Permet de recuperer l'instance de la factory du contenu de la page du site.
     * @return Page Indique l'instance de la factory du contenu de la page du site.
     */
    public static function Instance(): Page
    {
        if (self::$s_instance === null) {
            self::$s_instance = new self();
        }
        return self::$s_instance;
    }

    /**
     * Recupere la page du site.
     * Permet de recuperer la page du site.
     * @param string $p_in_page_id Indique l'identifiant de la page du site.
     * @return \app\page\Page Indique la page du site.
     */
    public function getPage(string $p_in_page_id): \app\page\Page
    {
        if (\array_key_exists($p_in_page_id, $this->pageList)) {
            return $this->pageList[$p_in_page_id];
        }
        return new \app\page\Page();
    }
}
