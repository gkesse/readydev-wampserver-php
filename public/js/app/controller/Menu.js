"use strict";

var app = app || {};
app.controller = app.controller || {};

app.controller.Menu = class Menu {
    constructor() {}

    run() {
        const header = oTools.strictInstance(new app.menu.Header());
        header.run();
        const action = oTools.strictInstance(new app.menu.Action());
        action.run();
    }
};
