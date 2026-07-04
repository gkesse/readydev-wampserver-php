"use strict";

var app = app || {};
app.controller = app.controller || {};

app.controller.Main = class Main {
    constructor() {}

    run() {
        const menu = new app.controller.Menu();
        menu.run();
        const admin = new app.controller.Admin();
        admin.run();
    }
};
