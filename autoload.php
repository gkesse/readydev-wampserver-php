<?php
session_start();

const SRC_DIR = "src/";

function autoload_register(string $p_in_className)
{
    $filename = __DIR__ . DIRECTORY_SEPARATOR . SRC_DIR . $p_in_className . ".php";
    $filename = str_replace("\\", "/", $filename);

    if (is_readable($filename)) {
        require $filename;
    }
}

if (version_compare(PHP_VERSION, "5.1.2", ">=")) {
    if (version_compare(PHP_VERSION, "5.3.0", ">=")) {
        spl_autoload_register("autoload_register", true, true);
    } else {
        spl_autoload_register("autoload_register");
    }
} else {
    function spl_autoload_register(string $p_in_className)
    {
        require autoload_register($p_in_className);
    }
}
