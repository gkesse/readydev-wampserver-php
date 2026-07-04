<?php

declare(strict_types=1);

namespace app\php\model;

use PHPUnit\Framework\TestCase;

final class MenuTest extends TestCase
{
    public function test_general(): void
    {
        // cree un menu vide
        $menu01 = new \app\php\model\Menu();

        // teste un menu vide
        $this->assertSame($menu01->isEmpty(), true);

        // teste les attributs d'un menu vide
        $this->assertSame($menu01->m_index, -1);
        $this->assertSame($menu01->m_parentIndex, -1);
        $this->assertSame($menu01->m_name, "");
        $this->assertSame($menu01->m_label, "");
        $this->assertSame($menu01->m_title, "");
        $this->assertSame($menu01->m_link, "");
        $this->assertSame($menu01->m_isActive, false);

        // cree un menu avec des donnees
        $menu02 = new \app\php\model\Menu();
        $menu02->m_index = 1;
        $menu02->m_parentIndex = 0;
        $menu02->m_name = "MENU_NAME";
        $menu02->m_label = "MENU_LABEL";
        $menu02->m_title = "MENU_TITLE";
        $menu02->m_link = "MENU_LINK";
        $menu02->m_isActive = true;

        // teste un menu avec des donnees
        $this->assertSame($menu02->isEmpty(), false);

        // teste les attributs d'un menu avec des donnees
        $this->assertSame($menu02->m_index, 1);
        $this->assertSame($menu02->m_parentIndex, 0);
        $this->assertSame($menu02->m_name, "MENU_NAME");
        $this->assertSame($menu02->m_label, "MENU_LABEL");
        $this->assertSame($menu02->m_title, "MENU_TITLE");
        $this->assertSame($menu02->m_link, "MENU_LINK");
        $this->assertSame($menu02->m_isActive, true);

        // cree un menu avec des donnees
        $menu03 = new \app\php\model\Menu();
        $menu03->m_index = 1;
        $menu03->m_parentIndex = 0;
        $menu03->m_name = "MENU_NAME";
        $menu03->m_label = "MENU_LABEL";
        $menu03->m_title = "MENU_TITLE";
        $menu03->m_link = "MENU_LINK";
        $menu03->m_isActive = true;

        // teste des menus egaux
        $this->assertSame($menu03->isEqual($menu02), true);

        // modifie le lien du menu
        $menu03->m_link = "MENU_LINK_DIFFERENT";

        // teste des menus differents
        $this->assertSame($menu03->isEqual($menu02), false);
    }
}
