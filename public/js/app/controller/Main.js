"use strict";

var app = app || {};
app.controller = app.controller || {};

app.controller.Main = class Main {
    constructor() {}

    run() {
        const menu = oTools.strictInstance(new app.controller.Menu());
        menu.run();
        const admin = oTools.strictInstance(new app.controller.Admin());
        admin.run();
    }
};
