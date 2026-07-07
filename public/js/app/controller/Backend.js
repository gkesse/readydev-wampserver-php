"use strict";

var app = app || {};
app.controller = app.controller || {};

app.controller.Backend = class Backend {
    constructor() {
        this.m_backendInfo = oTools.strictInstance(new app.model.BackendInfo());
    }

    run(p_in_module, p_in_method, p_in_obj, p_in_data) {
        const backendFactory = app.factory.Backend.Instance();
        const backend = backendFactory.create(p_in_module);
        backend.run(p_in_module, p_in_method, p_in_obj, p_in_data);
        this.m_backendInfo.load(backend.m_backendInfo);
    }
};
