<?php

declare(strict_types=1);

namespace app\php\model;

use PHPUnit\Framework\TestCase;

final class MenuListTest extends TestCase
{
    public function test_general(): void
    {
        // cree une liste de menu vide
        $menuList01 = new \app\php\model\MenuList();

        // teste une liste de menu vide
        $this->assertSame($menuList01->isEmpty(), true);

        // cree une liste de menu avec des donnees
        $menuList02 = new \app\php\model\MenuList();
        $menu01 = $menuList02->addMenuByRoot("MENU_NAME_01", "MENU_LABEL_01", "MENU_TITLE_01", "MENU_LINK_01", true);
        $menuList02->addMenuByParentMenu($menu01, "MENU_NAME_02", "MENU_LABEL_02", "MENU_TITLE_02", "MENU_LINK_02", true);
        $menuList02->addMenuByParentMenu($menu01, "MENU_NAME_03", "MENU_LABEL_03", "MENU_TITLE_03", "MENU_LINK_03", true);
        $menu02 = $menuList02->addMenuByRoot("MENU_NAME_04", "MENU_LABEL_04", "MENU_TITLE_04", "MENU_LINK_04", true);
        $menuList02->addMenuByParentMenu($menu02, "MENU_NAME_05", "MENU_LABEL_05", "MENU_TITLE_05", "MENU_LINK_05", true);
        $menuList02->addMenuByParentMenu($menu02, "MENU_NAME_06", "MENU_LABEL_06", "MENU_TITLE_06", "MENU_LINK_06", true);

        // teste une liste de menu avec des donnees
        $this->assertSame($menuList02->isEmpty(), false);
        // teste le nombre de menus dans la liste
        $this->assertSame($menuList02->size(), 6);

        // teste des menus egaux
        $this->assertSame($menu01->isEqual($menu01), true);
        // teste des menus differents
        $this->assertSame($menu01->isEqual($menu02), false);

        // recupere la liste des menus racine
        $menuList03 = $menuList02->getMenuListByParentIndex(0);

        // teste la liste des menus racine
        $this->assertSame($menuList03->isEmpty(), false);
        $this->assertSame($menuList03->size(), 2);

        // recupere un menu par son lien
        $menu03 = $menuList03->getMenuByLink("MENU_LINK_01");
        $menu04 = $menuList03->getMenuByLink("MENU_LINK_04");

        // teste la recuperation d'un menu par son lien
        $this->assertSame($menu01->isEqual($menu03), true);
        $this->assertSame($menu02->isEqual($menu04), true);

        // récupère un menu avec un lien inconnu
        $menu04 = $menuList02->getMenuByLink("MENU_LINK_ERROR");

        // teste la recuperation d'un menu avec un lien inconnu
        $this->assertSame($menu04->isEmpty(), true);
    }
}
