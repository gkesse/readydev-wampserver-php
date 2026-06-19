"use strict";

var app = app || {};
app.controller = app.controller || {};

app.controller.MainWindow = class MainWindow {
    constructor() {}

    getWidth() {
        var width =
            window.innerWidth ||
            document.documentElement.clientWidth ||
            document.body.clientWidth;
        return width;
    }

    getHeight() {
        var height =
            window.innerHeight ||
            document.documentElement.clientHeight ||
            document.body.clientHeight;
        return height;
    }

    getWidthRWD() {
        return 960;
    }
};
