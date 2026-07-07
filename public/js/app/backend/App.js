"use strict";

var app = app || {};
app.backend = app.backend || {};

app.backend.App = class App extends app.backend.Backend {
    constructor() {
        super();
        this.m_methodMap["open_menu_bars"] = this.runOpenMenuBars;
        this.m_methodMap["open_menu_group"] = this.runOpenMenuGroup;
    }

    run(p_in_module, p_in_method, p_in_obj, p_in_data) {
        const method = this.m_methodMap[p_in_method] || this.runUnknown;
        method.call(this, p_in_module, p_in_method, p_in_obj, p_in_data);
    }

    runUnknown(p_in_module, p_in_method, p_in_obj, p_in_data) {
        console.log(
            `App.run()...|module=${p_in_module}|method=${p_in_method}|element=${p_in_obj}|data=${p_in_data}`,
        );
    }

    runOpenMenuBars(p_in_module, p_in_method, p_in_obj, p_in_data) {
        const headerMenu = document.getElementById("HeaderMenu");
        let bars = '<i class="fa fa-bars"></i>';

        if (p_in_obj.dataset.isOpened === "false") {
            p_in_obj.dataset.isOpened = "true";
            bars = '<i class="fa fa-close"></i>';
            headerMenu.classList.add("RWD");

            const menus = document.getElementsByClassName("Menu7");

            for (let i = 0; i < menus.length; i++) {
                const menu = menus[i];
                const line = menu.previousElementSibling;
                if (line == p_in_obj) continue;
                menu.classList.remove("Show");
            }
        } else {
            p_in_obj.dataset.isOpened = "false";
            headerMenu.classList.remove("RWD");
        }

        p_in_obj.innerHTML = bars;
    }

    runOpenMenuGroup(p_in_module, p_in_method, p_in_obj, p_in_data) {
        if (oViewPort.getWidth() <= oViewPort.getWidthRWD()) {
            this.m_backendInfo.m_isOpenLink = false;
            const href = p_in_obj.getAttribute("href");
            const title = p_in_obj.firstElementChild.innerHTML;

            let menus = document.getElementsByClassName("Menu7");

            for (let i = 0; i < menus.length; i++) {
                const menu = menus[i];
                const line = menu.previousElementSibling;
                if (line == p_in_obj) continue;
                menu.classList.remove("Show");
            }

            menus = document.getElementsByClassName("Menu11");

            for (let i = 0; i < menus.length; i++) {
                const menu = menus[i];
                menu.classList.remove("Show");
            }

            const menu = p_in_obj.nextElementSibling;
            menu.classList.toggle("Show");
        }
    }
};
