<?php

declare(strict_types=1);

namespace app\php\controller;

/**
 * Cree le controleur de debogage.
 * Permet de creer le controleur de debogage.
 * @package app\php\controller
 * @author Gerard KESSE <https://www.readydev.ovh>
 * @version 1.0.0
 */
class Debug
{
    /**
     * Stocke le nom de l'environnement
     * @var string
     */
    private const string PARAM_APP_ENV = "APP_ENV";
    /**
     * Stocke la valeur de l'environnement de dev
     * @var string
     */
    private const string PARAM_APP_ENV_DEV = "dev";
    /**
     * Stocke le nom de la variable d'environnement pour le mode debug
     * @var string
     */
    private const string PARAM_APP_DEBUG = "APP_DEBUG";
    /**
     * Stocke la valeur de la variable d'environnement pour le mode debug activé
     * @var string
     */
    private const string PARAM_APP_DEBUG_ON = "on";

    /**
     * Construit le controleur de debogage.
     * Permet de construire le controleur de debogage.
     */
    public function __construct() {}

    /**
     * Verifie si le mode debug est activé.
     * Permet de vérifier si le mode debug est activé.
     * @return bool Indique si le mode debug est activé ou non.
     */
    public function isDebug(): bool
    {
        if (!isset($_SERVER[self::PARAM_APP_ENV])) {
            return false;
        }
        if (!isset($_SERVER[self::PARAM_APP_DEBUG])) {
            return false;
        }

        $appEnv = $_SERVER[self::PARAM_APP_ENV];
        $appDebug = $_SERVER[self::PARAM_APP_DEBUG];

        if ($appEnv !== self::PARAM_APP_ENV_DEV) {
            return false;
        }
        if ($appDebug !== self::PARAM_APP_DEBUG_ON) {
            return false;
        }

        return true;
    }
}
