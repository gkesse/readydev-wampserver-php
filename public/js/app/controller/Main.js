"use strict";

var app = app || {};
app.controller = app.controller || {};

app.controller.Main = class Main {
    constructor() {}

    run() {
        const menu = oStrictInstance.create(new app.controller.Menu());
        menu.run();
        const admin = oStrictInstance.create(new app.controller.Admin());
        admin.run();
    }
};
