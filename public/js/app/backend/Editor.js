"use strict";

var app = app || {};
app.backend = app.backend || {};

app.backend.Editor = class Editor extends app.backend.Backend {
    constructor() {
        super();
        this.m_methodMap["open_editor_tab"] = this.runOpenEditorTab;
    }

    run(p_in_module, p_in_method, p_in_obj, p_in_data) {
        const method = this.m_methodMap[p_in_method] || this.runUnknown;
        method.call(this, p_in_module, p_in_method, p_in_obj, p_in_data);
    }

    runUnknown(p_in_module, p_in_method, p_in_obj, p_in_data) {
        console.log(
            `Editor.run()...|module=${p_in_module}|method=${p_in_method}|element=${p_in_obj}|data=${p_in_data}`,
        );
    }

    runOpenEditorTab(p_in_module, p_in_method, p_in_obj, p_in_data) {
        const contents = document.querySelectorAll(".EditorTabCtn");
        for (const content of contents) {
            content.style.display = "none";
        }
        const contentId = "#" + p_in_data;
        const content = document.querySelector(contentId);
        content.style.display = "block";
    }
};
