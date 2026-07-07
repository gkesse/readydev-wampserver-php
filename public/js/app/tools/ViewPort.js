"use strict";

var app = app || {};
app.tools = app.tools || {};

app.tools.ViewPort = class ViewPort {
    static #m_instance = null;

    constructor() {}

    static Instance() {
        if (this.#m_instance == null) {
            this.#m_instance = oStrictInstance.create(new app.tools.ViewPort());
        }
        return this.#m_instance;
    }

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

const oViewPort = app.tools.ViewPort.Instance();
