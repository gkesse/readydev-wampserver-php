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
    private string $templateDir;

    /**
     * Construit le controleur de template twig.
     * Permet de construire le controleur de template twig.
     * @param string $p_in_template_dir Indique le repertoire des templates twig.
     */
    public function __construct(string $p_in_template_dir)
    {
        $this->templateDir = $p_in_template_dir;
    }

    /**
     * Retourne le repertoire des templates twig.
     * Permet de retourner le repertoire des templates twig.
     * @return string Indique le repertoire des templates twig.
     */
    public function getTemplateDir(): string
    {
        return $this->templateDir;
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

    public function addExtension(\Twig\Environment $twig): void {}
}
