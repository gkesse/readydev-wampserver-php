"use strict";

var app = app || {};
app.factory = app.factory || {};

app.factory.Backend = class Backend {
    static m_instance = null;
    #moduleMap = {};

    constructor() {
        this.#moduleMap["app"] = () => new app.backend.App();
    }

    static Instance() {
        if (this.m_instance == null) {
            this.m_instance = new app.factory.Backend();
        }
        return this.m_instance;
    }

    create(p_in_module) {
        const module = this.#moduleMap[p_in_module] || this.createUnknown;
        return module.call(this);
    }

    createUnknown() {
        return new app.backend.Backend();
    }
};
