"use strict";

var app = app || {};
app.backend = app.backend || {};

app.backend.Backend = class Backend {
    #m_backendInfo;

    constructor() {
        this.#m_backendInfo = new app.model.BackendInfo();
    }

    run(p_in_module, p_in_method, p_in_obj, p_in_data) {
        console.log(
            `Backend.run()...|module=${p_in_module}|method=${p_in_method}|element=${p_in_obj}|data=${p_in_data}`,
        );
    }

    backendInfo() {
        return this.#m_backendInfo;
    }
};
