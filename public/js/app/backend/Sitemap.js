"use strict";

var app = app || {};
app.backend = app.backend || {};

app.backend.Sitemap = class Sitemap extends app.backend.Backend {
    constructor() {
        super();
        this.m_methodMap["generate_sitemap"] = this.runGenerateSitemap;
        this.m_methodMap["visualize_sitemap"] = this.runVisualizeSitemap;
    }

    run(p_in_module, p_in_method, p_in_obj, p_in_data) {
        const method = this.m_methodMap[p_in_method] || this.runUnknown;
        method.call(this, p_in_module, p_in_method, p_in_obj, p_in_data);
    }

    runUnknown(p_in_module, p_in_method, p_in_obj, p_in_data) {
        console.log(
            `Sitemap.run()...|module=${p_in_module}|method=${p_in_method}|element=${p_in_obj}|data=${p_in_data}`,
        );
    }

    runGenerateSitemap(p_in_module, p_in_method, p_in_obj, p_in_data) {}

    runVisualizeSitemap(p_in_module, p_in_method, p_in_obj, p_in_data) {}
};
