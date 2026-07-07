"use strict";

var app = app || {};
app.tools = app.tools || {};

app.tools.JQuery = class JQuery {
    static #m_instance = null;

    constructor() {}

    static Instance() {
        if (this.#m_instance == null) {
            this.#m_instance = oStrictInstance.create(new app.tools.JQuery());
        }
        return this.#m_instance;
    }

    ajaxGet(p_in_url, p_in_callback = null) {
        $.ajax({
            url: p_in_url,
            method: "GET",

            success: function (p_in_response) {
                if (p_in_callback) {
                    p_in_callback(true, p_in_response, 200);
                }
            },

            error: function (p_in_xhr, p_in_status, p_in_error) {
                if (p_in_callback) {
                    p_in_callback(false, p_in_error, p_in_status);
                }
            },
        });
    }

    ajaxPost(p_in_url, p_in_data, p_in_callback = null) {
        $.ajax({
            url: p_in_url,
            method: "POST",
            data: p_in_data,

            success: function (p_in_response) {
                if (p_in_callback) {
                    p_in_callback(true, p_in_response, 200);
                }
            },

            error: function (p_in_xhr, p_in_status, p_in_error) {
                if (p_in_callback) {
                    p_in_callback(false, p_in_error, p_in_status);
                }
            },
        });
    }
};

const oJQuery = app.tools.JQuery.Instance();
