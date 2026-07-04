<?php

declare(strict_types=1);

namespace twig\controller;

/**
 * Cree le controleur de template twig.
 * Permet de creer le controleur de template twig.
 * @package twig\controller
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Template
{
    /**
     * Stocke le repertoire des templates twig.
     * @var string
     */
    private string $m_templateDir;

    /**
     * Construit le controleur de template twig.
     * Permet de construire le controleur de template twig.
     * @param string $p_in_template_dir Indique le repertoire des templates twig.
     */
    public function __construct(string $p_in_template_dir)
    {
        $this->m_templateDir = $p_in_template_dir;
    }

    /**
     * Retourne le repertoire des templates twig.
     * Permet de retourner le repertoire des templates twig.
     * @return string Indique le repertoire des templates twig.
     */
    public function getTemplateDir(): string
    {
        return $this->m_templateDir;
    }

    /**
     * Retourne les donnees de template twig.
     * Permet de retourner les donnees de template twig.
     * @return array Indique les donnees de template twig.
     */
    public function getTemplateData(): array
    {
        return [];
    }

    /**
     * Ajoute une extension twig.
     * Permet d'ajouter une extension twig.
     * @param \Twig\Environment $p_in_twig_environment Indique l'environnement de template twig.
     */
    public function addExtension(\Twig\Environment $p_in_twig_environment): void {}

    /**
     * Ajoute un chargeur de runtime twig.
     * Permet d'ajouter un chargeur de runtime twig.
     * @param \Twig\Environment $p_in_twig_environment Indique l'environnement de template twig.
     */
    public function addRuntimeLoader(\Twig\Environment $p_in_twig_environment): void {}

    /**
     * Ajoute une variable globale twig.
     * Permet d'ajouter une variable globale twig.
     * @param \Twig\Environment $p_in_twig_environment Indique l'environnement de template twig.
     */
    public function addGlobal(\Twig\Environment $p_in_twig_environment): void {}

    /**
     * Retourne le chemin du template twig.
     * Permet de retourner le chemin du template twig.
     * @return string Indique le chemin du template twig.
     */
    public function getTemplateFile(): string
    {
        return 'file.page.twig';
    }
}
