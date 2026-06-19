"use strict";

var app = app || {};
app.controller = app.controller || {};

app.controller.Main = class Main {
    constructor() {}

    run() {
        const menuHeader = new app.controller.MenuHeader();
        menuHeader.run();
        const menuAction = new app.controller.MenuAction();
        menuAction.run();
    }
};
