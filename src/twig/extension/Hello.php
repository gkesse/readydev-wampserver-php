<?php

declare(strict_types=1);

namespace twig\extension;

/**
 * Cree l'extension Hello pour Twig.
 * Permet de creer l'extension Hello pour Twig.
 * @package twig\extension
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Hello extends \Twig\Extension\AbstractExtension
{
    /**
     * Retourne les fonctions disponibles dans l'extension Hello.
     * Permet de retourner les fonctions disponibles dans l'extension Hello.
     * @return array Indique les fonctions disponibles dans l'extension Hello.
     */
    public function getFunctions()
    {
        return [
            new \Twig\TwigFunction('hello', [$this, 'hello']),
        ];
    }

    /**
     * Retourne un message de bienvenue pour le nom donne.
     * Permet de retourner un message de bienvenue pour le nom donne.
     * @param string $p_in_name Indique le nom pour lequel generer le message de bienvenue.
     * @return string Indique le message de bienvenue pour le nom donne.
     */
    public function hello(string $p_in_name): string
    {
        return (string)"Bonjour " . $p_in_name;
    }
}
