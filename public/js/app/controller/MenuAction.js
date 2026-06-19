"use strict";

var app = app || {};
app.controller = app.controller || {};

app.controller.MenuAction = class MenuAction {
    constructor() {}

    run() {
        this.runMenuBlock();
        this.runMenuBar();
    }

    runMenuBlock() {
        var buttons = document.querySelectorAll(".Block18");
        for (var i = 0; i < buttons.length; i++) {
            var button = buttons[i];
            button.addEventListener("click", function (e) {
                var content = this.nextElementSibling;
                if (!content) return;
                content.classList.toggle("Show");

                var contents = document.querySelectorAll(".Block22");
                for (var i = 0; i < contents.length; i++) {
                    var content = contents[i];
                    var line = content.parentNode.firstElementChild;
                    line.classList.remove("Active");
                    content.classList.remove("Show");
                }
            });
            button.addEventListener("mousedown", function (e) {
                e.preventDefault();
            });
        }

        var lines = document.querySelectorAll(".Block20");
        for (var i = 0; i < lines.length; i++) {
            var line = lines[i];
            line.addEventListener("click", function (e) {
                var lines = document.querySelectorAll(".Block20");
                for (var i = 0; i < lines.length; i++) {
                    var line = lines[i];
                    var content = line.nextElementSibling;
                    if (!content) continue;
                    var child = content.firstElementChild;
                    if (!child) continue;
                    if (line == this) continue;
                    content.classList.remove("Show");
                    line.classList.remove("Active");
                }

                var content = null;
                var child = null;
                var isContent = false;

                content = this.nextElementSibling;
                if (content) child = content.firstElementChild;
                if (content) isContent = content.matches(".Block22");

                var parentNode = this;

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
                    var parentNode = parentNode.parentNode;
                    if (parentNode.matches(".Block19")) break;
                    if (parentNode.matches(".Block21")) continue;
                    var content = parentNode;
                    var line = content.previousElementSibling;
                    line.classList.toggle("Active");
                    content.classList.toggle("Show");
                }
            });
            line.addEventListener("mousedown", function (e) {
                e.preventDefault();
            });
        }

        document.addEventListener("click", function (e) {
            var isHidden = true;
            isHidden &&= !e.target.matches(".Block18");
            isHidden &&= !e.target.matches(".Block20");
            isHidden &&= !e.target.matches(".Block25");

            if (isHidden) {
                var contents = document.getElementsByClassName("Block19");
                for (var i = 0; i < contents.length; i++) {
                    var content = contents[i];
                    content.classList.remove("Show");
                }
                var contents = document.getElementsByClassName("Block22");
                for (var i = 0; i < contents.length; i++) {
                    var content = contents[i];
                    content.classList.remove("Show");
                }
            }
        });
    }

    runMenuBar() {
        var buttons = document.getElementsByClassName("Block29");
        for (var i = 0; i < buttons.length; i++) {
            var button = buttons[i];
            button.addEventListener("click", function (e) {
                var content = this.nextElementSibling;
                if (!content) return;
                content.classList.toggle("Show");

                var contents = document.getElementsByClassName("Block30");
                for (var i = 0; i < contents.length; i++) {
                    var content = contents[i];
                    var line = content.parentNode.firstElementChild;
                    line.classList.remove("Active");
                    content.classList.remove("Show");
                }
            });
            button.addEventListener("mousedown", function (e) {
                e.preventDefault();
            });
        }

        var lines = document.getElementsByClassName("Block28");
        for (var i = 0; i < lines.length; i++) {
            var line = lines[i];
            line.addEventListener("click", function (e) {
                var lines = document.getElementsByClassName("Block28");
                for (var i = 0; i < lines.length; i++) {
                    var line = lines[i];
                    var content = line.nextElementSibling;
                    if (!content) continue;
                    var child = content.firstElementChild;
                    if (!child) continue;
                    if (line == this) continue;
                    content.classList.remove("Show");
                    line.classList.remove("Active");
                }

                var content = null;
                var child = null;
                var isContent = false;

                content = this.nextElementSibling;
                if (content) child = content.firstElementChild;
                if (content) isContent = content.matches(".Block30");

                var parentNode = this;

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
                    var parentNode = parentNode.parentNode;
                    if (parentNode.matches(".Block27")) break;
                    if (parentNode.matches(".Block31")) continue;
                    var content = parentNode;
                    var line = content.previousElementSibling;
                    line.classList.toggle("Active");
                    content.classList.toggle("Show");
                }
            });
            line.addEventListener("mousedown", function (e) {
                e.preventDefault();
            });
        }

        document.addEventListener("click", function (e) {
            var isHidden = true;
            isHidden &&= !e.target.matches(".Block29");
            isHidden &&= !e.target.matches(".Block28");
            isHidden &&= !e.target.matches(".Block25");

            if (isHidden) {
                var contents = document.getElementsByClassName("Block27");
                for (var i = 0; i < contents.length; i++) {
                    var content = contents[i];
                    content.classList.remove("Show");
                }
                var contents = document.getElementsByClassName("Block30");
                for (var i = 0; i < contents.length; i++) {
                    var content = contents[i];
                    content.classList.remove("Show");
                }
            }
        });
    }
};
