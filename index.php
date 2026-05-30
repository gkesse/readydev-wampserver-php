<?php

declare(strict_types=1);

require "./autoload.php";

$mainPage = new app\twig\view\Main();
$mainPage->run();
