<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class MenuTest extends TestCase
{
    public function test_Lecture_Ecriture(): void
    {
        // si on a unmenu vide
        $menu01 = new \app\model\Menu();

        // on doit avoir un menu vide
        $this->assertSame($menu01->isEmpty(), true);

        // si on cree un menu avec des donnees
        $menu02 = new \app\model\Menu();
        $menu02->index = 1;
        $menu02->parentIndex = 0;
        $menu02->name = "MENU_NAME";
        $menu02->label = "MENU_LABEL";
        $menu02->title = "MENU_TITLE";
        $menu02->link = "MENU_LINK";
        $menu02->isActive = true;

        // on doit avoir un menu non vide
        $this->assertSame($menu02->isEmpty(), false);

        // si on compare un menu a lui meme
        // on doit avoir des menus egaux
        $this->assertSame($menu02->index, 1);

        // si on cree un menu avec des donnees identiques
        $menu03 = new \app\model\Menu();
        $menu03->index = 1;
        $menu03->parentIndex = 0;
        $menu03->name = "MENU_NAME";
        $menu03->label = "MENU_LABEL";
        $menu03->title = "MENU_TITLE";
        $menu03->link = "MENU_LINK";
        $menu03->isActive = true;

        // on doit avoir des menus egaux
        $this->assertSame($menu03->isEqual($menu02), true);

        // si on modifie le lien d'un menu
        $menu03->link = "MENU_LINK_DIFFERENT";

        // on doit avoir des menus differents
        $this->assertSame($menu03->isEqual($menu02), false);
    }
}
