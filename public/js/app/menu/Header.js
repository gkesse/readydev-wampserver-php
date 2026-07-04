"use strict";

var app = app || {};
app.menu = app.menu || {};

app.menu.Header = class Header {
    constructor() {}

    run() {
        this.runMenu();
    }

    runMenu() {
        const lines = document.querySelectorAll(".Menu12");
        for (let i = 0; i < lines.length; i++) {
            const line = lines[i];
            line.addEventListener("click", function (e) {
                const lines = document.querySelectorAll(".Menu12");
                for (let i = 0; i < lines.length; i++) {
                    const line = lines[i];
                    const content = line.nextElementSibling;
                    if (line == this) continue;
                    content.classList.remove("Show");
                    line.classList.remove("Active");
                }

                const content = this.nextElementSibling;
                content.classList.toggle("Show");
                this.classList.toggle("Active");

                const parentNode = this;

                if (parentNode) {
                    while (true) {
                        parentNode = parentNode.parentNode;
                        if (parentNode.matches(".Menu7")) break;
                        if (parentNode.matches(".Menu11")) {
                            const line = parentNode.previousElementSibling;
                            parentNode.classList.add("Show");
                            line.classList.add("Active");
                            return;
                        }
                    }
                }
            });
            line.addEventListener("mousedown", function (e) {
                e.preventDefault();
            });
        }
        const menus = document.querySelectorAll(".Menu7");
        for (let i = 0; i < menus.length; i++) {
            const menu = menus[i];
            menu.addEventListener("mouseleave", function (e) {
                const mainWindow = new app.controller.MainWindow();
                if (mainWindow.getWidth() <= mainWindow.getWidthRWD()) return;
                const lines = this.querySelectorAll(".Menu12");
                for (let i = 0; i < lines.length; i++) {
                    const line = lines[i];
                    const content = line.nextElementSibling;
                    content.classList.remove("Show");
                    line.classList.remove("Active");
                }
            });
        }
    }
};
