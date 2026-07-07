"use strict";

var app = app || {};
app.controller = app.controller || {};

app.controller.Menu = class Menu {
    constructor() {}

    run() {
        const header = oStrictInstance.create(new app.menu.Header());
        header.run();
        const action = oStrictInstance.create(new app.menu.Action());
        action.run();
    }
};
