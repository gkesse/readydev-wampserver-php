"use strict";

var app = app || {};
app.admin = app.admin || {};

app.admin.Editor = class Editor {
    constructor() {}

    run() {
        const editorDefaultTab = document.querySelector("#EditorDefaultTab");
        if (editorDefaultTab) {
            const index = editorDefaultTab.value;
            const contentId = `EditorTab${index}`;
            const tab = document.querySelectorAll(".EditorTab")[index];
            this.runOpenTab(tab, contentId);
        }
    }

    runOpenTab(p_in_tab, p_in_contentId) {
        const contents = document.querySelectorAll(".EditorTabCtn");
        for (let i = 0; i < contents.length; ++i) {
            const content = contents[i];
            content.style.display = "none";
        }
        const contentId = p_in_contentId;
        const content = document.getElementById(contentId);
        content.style.display = "block";
    }
};
