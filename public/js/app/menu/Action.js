"use strict";

var app = app || {};
app.menu = app.menu || {};

app.menu.Action = class Action {
    constructor() {}

    run() {
        this.runMenuBlock();
        this.runMenuBar();
    }

    runMenuBlock() {
        const buttons = document.querySelectorAll(".Block18");
        for (let i = 0; i < buttons.length; ++i) {
            const button = buttons[i];
            button.addEventListener("click", function (e) {
                let content = this.nextElementSibling;
                if (!content) return;
                content.classList.toggle("Show");

                const contents = document.querySelectorAll(".Block22");
                for (let i = 0; i < contents.length; ++i) {
                    const content = contents[i];
                    const line = content.parentNode.firstElementChild;
                    line.classList.remove("Active");
                    content.classList.remove("Show");
                }
            });
            button.addEventListener("mousedown", function (e) {
                e.preventDefault();
            });
        }

        let lines = document.querySelectorAll(".Block20");
        for (let i = 0; i < lines.length; ++i) {
            const line = lines[i];
            line.addEventListener("click", function (e) {
                lines = document.querySelectorAll(".Block20");
                for (let i = 0; i < lines.length; ++i) {
                    const line = lines[i];
                    const content = line.nextElementSibling;
                    if (!content) continue;
                    const child = content.firstElementChild;
                    if (!child) continue;
                    if (line == this) continue;
                    content.classList.remove("Show");
                    line.classList.remove("Active");
                }

                let content = null;
                let child = null;
                let isContent = false;

                content = this.nextElementSibling;
                if (content) child = content.firstElementChild;
                if (content) isContent = content.matches(".Block22");

                let parentNode = this;

                if (!content || !child || !isContent) {
                    while (true) {
                        parentNode = parentNode.parentNode;
                        if (parentNode.matches(".Block19")) {
                            parentNode.classList.remove("Show");
                            return;
                        }
                    }
                }

                content.classList.toggle("Show");
                this.classList.toggle("Active");

                while (true) {
                    parentNode = parentNode.parentNode;
                    if (parentNode.matches(".Block19")) break;
                    if (parentNode.matches(".Block21")) continue;
                    const content = parentNode;
                    const line = content.previousElementSibling;
                    line.classList.toggle("Active");
                    content.classList.toggle("Show");
                }
            });
            line.addEventListener("mousedown", function (e) {
                e.preventDefault();
            });
        }

        document.addEventListener("click", function (e) {
            let isHidden = true;
            isHidden &&= !e.target.matches(".Block18");
            isHidden &&= !e.target.matches(".Block20");
            isHidden &&= !e.target.matches(".Block25");

            if (isHidden) {
                let contents = document.querySelectorAll(".Block19");
                for (let i = 0; i < contents.length; ++i) {
                    const content = contents[i];
                    content.classList.remove("Show");
                }
                contents = document.querySelectorAll(".Block22");
                for (let i = 0; i < contents.length; ++i) {
                    const content = contents[i];
                    content.classList.remove("Show");
                }
            }
        });
    }

    runMenuBar() {
        const buttons = document.querySelectorAll(".Block29");
        for (let i = 0; i < buttons.length; ++i) {
            const button = buttons[i];
            button.addEventListener("click", function (e) {
                const content = this.nextElementSibling;
                if (!content) return;
                content.classList.toggle("Show");

                const contents = document.querySelectorAll(".Block30");
                for (let i = 0; i < contents.length; ++i) {
                    const content = contents[i];
                    const line = content.parentNode.firstElementChild;
                    line.classList.remove("Active");
                    content.classList.remove("Show");
                }
            });
            button.addEventListener("mousedown", function (e) {
                e.preventDefault();
            });
        }

        const lines = document.querySelectorAll(".Block28");
        for (let i = 0; i < lines.length; ++i) {
            const line = lines[i];
            line.addEventListener("click", function (e) {
                const lines = document.querySelectorAll(".Block28");
                for (let i = 0; i < lines.length; ++i) {
                    const line = lines[i];
                    const content = line.nextElementSibling;
                    if (!content) continue;
                    const child = content.firstElementChild;
                    if (!child) continue;
                    if (line == this) continue;
                    content.classList.remove("Show");
                    line.classList.remove("Active");
                }

                let content = null;
                let child = null;
                let isContent = false;

                content = this.nextElementSibling;
                if (content) child = content.firstElementChild;
                if (content) isContent = content.matches(".Block30");

                let parentNode = this;

                if (!content || !child || !isContent) {
                    while (true) {
                        parentNode = parentNode.parentNode;
                        if (parentNode.matches(".Block27")) {
                            parentNode.classList.remove("Show");
                            return;
                        }
                    }
                }

                content.classList.toggle("Show");
                this.classList.toggle("Active");

                while (true) {
                    parentNode = parentNode.parentNode;
                    if (parentNode.matches(".Block27")) break;
                    if (parentNode.matches(".Block31")) continue;
                    const content = parentNode;
                    const line = content.previousElementSibling;
                    line.classList.toggle("Active");
                    content.classList.toggle("Show");
                }
            });
            line.addEventListener("mousedown", function (e) {
                e.preventDefault();
            });
        }

        document.addEventListener("click", function (e) {
            let isHidden = true;
            isHidden &&= !e.target.matches(".Block29");
            isHidden &&= !e.target.matches(".Block28");
            isHidden &&= !e.target.matches(".Block25");

            if (isHidden) {
                let contents = document.querySelectorAll(".Block27");
                for (let i = 0; i < contents.length; ++i) {
                    const content = contents[i];
                    content.classList.remove("Show");
                }
                contents = document.querySelectorAll(".Block30");
                for (let i = 0; i < contents.length; ++i) {
                    const content = contents[i];
                    content.classList.remove("Show");
                }
            }
        });
    }
};
