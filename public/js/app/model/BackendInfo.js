"use strict";

var app = app || {};
app.model = app.model || {};

app.model.BackendInfo = class BackendInfo {
    #m_isOpenLink;

    constructor() {
        this.#m_isOpenLink = true;
    }

    /**
     * Charge les informations du backend dans le modèle
     * Permet de charger les informations du backend dans le modèle
     * @param {app.model.BackendInfo} p_in_backend_info Indique les informations du backend.
     */
    load(p_in_backend_info) {
        this.#m_isOpenLink = p_in_backend_info.#m_isOpenLink;
    }
};
