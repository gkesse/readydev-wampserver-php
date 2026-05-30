<?php

declare(strict_types=1);

namespace app\twig\factory;

/**
 * Cree la factory des controleurs de templates des pages twig.
 * Permet de creer la factory des controleurs de templates des pages twig.
 * @package app\twig\factory
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Template
{
    /**
     * Stocke l'instance de la factory des controleurs de templates des pages twig.
     * @var Template
     */
    private static ?Template $s_instance = null;
    /**
     * Stocke la liste des controleurs de templates des pages twig.
     * @var array
     */
    private array $templateList = [];

    /**
     * Construit la factory des controleurs de templates des pages twig.
     * Permet de construire la factory des controleurs de templates des pages twig.
     */
    private function __construct()
    {
        $this->templateList = [
            "/home/admin" => new \app\twig\template\page\Admin(),
            "/home/connexion" => new \app\twig\template\page\Connexion(),
        ];
    }

    /**
     * Recupere l'instance de la factory des controleurs de templates des pages twig.
     * Permet de recuperer l'instance de la factory des controleurs de templates des pages twig.
     * @return Template Indique l'instance de la factory des controleurs de templates des pages twig.
     */
    public static function Instance(): Template
    {
        if (self::$s_instance === null) {
            self::$s_instance = new self();
        }
        return self::$s_instance;
    }

    /**
     * Recupere le controleur de template de la page du site.
     * Permet de recuperer le controleur de template de la page du site.
     * @param string $p_in_page_id Indique l'identifiant de la page du site.
     * @return \app\twig\template\page\Page Indique le controleur de template twig.
     */
    public function getTemplate(string $p_in_page_id): \app\twig\template\page\Page
    {
        if (\array_key_exists($p_in_page_id, $this->templateList)) {
            return $this->templateList[$p_in_page_id];
        }
        return new \app\twig\template\page\Page();
    }
}
