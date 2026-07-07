"use strict";

var app = app || {};
app.controller = app.controller || {};

app.controller.Admin = class Admin {
    constructor() {}

    run() {
        const editor = oTools.strictInstance(new app.admin.Editor());
        editor.run();
    }
};
