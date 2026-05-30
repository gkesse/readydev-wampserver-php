<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\isFalse;

final class MenuListTest extends TestCase
{
    public function test_Lecture_Ecriture(): void
    {
        // si on cree une liste de menu vide
        $menuList01 = new \app\php\model\MenuList();

        // on doit avoir une liste de menu vide
        $this->assertSame($menuList01->isEmpty(), true);

        // si on cree une liste de menu vide
        // si on ajoute 2 menus racine
        // si on ajoute 4 menus enfant
        $menuList02 = new \app\php\model\MenuList();
        $menu01 = $menuList02->addMenuByRoot("MENU_NAME_01", "MENU_LABEL_01", "MENU_TITLE_01", "MENU_LINK_01", true);
        $menuList02->addMenuByParentMenu($menu01, "MENU_NAME_02", "MENU_LABEL_02", "MENU_TITLE_02", "MENU_LINK_02", true);
        $menuList02->addMenuByParentMenu($menu01, "MENU_NAME_03", "MENU_LABEL_03", "MENU_TITLE_03", "MENU_LINK_03", true);
        $menu02 = $menuList02->addMenuByRoot("MENU_NAME_04", "MENU_LABEL_04", "MENU_TITLE_04", "MENU_LINK_04", true);
        $menuList02->addMenuByParentMenu($menu02, "MENU_NAME_05", "MENU_LABEL_05", "MENU_TITLE_05", "MENU_LINK_05", true);
        $menuList02->addMenuByParentMenu($menu02, "MENU_NAME_06", "MENU_LABEL_06", "MENU_TITLE_06", "MENU_LINK_06", true);

        // on doit avoir une liste de menu non vide
        // on doit avoir 6 menus dans la liste
        $this->assertSame($menuList02->isEmpty(), false);
        $this->assertSame($menuList02->size(), 6);

        // on doit avoir menu01 egale a menu01
        // on doit avoir menu01 different de menu02
        $this->assertSame($menu01->isEqual($menu01), true);
        $this->assertSame($menu01->isEqual($menu02), false);

        // si on recupere la liste des menus racine
        $menuList03 = $menuList02->getMenuListByParentIndex(0);

        // on doit avoir une liste de menu non vide
        // on doit avoir 2 menus dans la liste
        $this->assertSame($menuList03->isEmpty(), false);
        $this->assertSame($menuList03->size(), 2);

        // si on recupere le menu par son lien
        $menu03 = $menuList03->getMenuByLink("MENU_LINK_01");
        $menu04 = $menuList03->getMenuByLink("MENU_LINK_04");

        // on doit avoir l'egalite des menus racine
        $this->assertSame($menu01->isEqual($menu03), true);
        $this->assertSame($menu02->isEqual($menu04), true);

        // si on recupere un menu inexistant par son lien
        $menu04 = $menuList02->getMenuByLink("MENU_LINK_ERROR");

        // on doit avoir menu04 vide
        $this->assertSame($menu04->isEmpty(), true);
    }
}
