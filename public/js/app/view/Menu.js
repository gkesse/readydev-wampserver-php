"use strict";

var app = app || {};
app.view = app.view || {};

app.view.Menu = class Menu {
    constructor() {
        console.log("Menu constructor...");
    }

    run() {
        this.runMenu();
        this.runMenuBlock();
        this.runMenuBar();
    }

    runMenu() {
        var lLines = document.querySelectorAll(".Menu12");
        for(var i = 0; i < lLines.length; i++) {
            var lLine = lLines[i];
            lLine.addEventListener("click", function(e) {
                var lLines = document.querySelectorAll(".Menu12");
                for(var i = 0; i < lLines.length; i++) {
                    var lLine = lLines[i];
                    var lContent = lLine.nextElementSibling;
                    if(lLine == this) continue;
                    lContent.classList.remove("Show");
                    lLine.classList.remove("Active");
                }

                var lContent = this.nextElementSibling;
                lContent.classList.toggle("Show");
                this.classList.toggle("Active");

                var lParentNode = this;

                if(lParentNode) {
                    while(1) {
                        lParentNode = lParentNode.parentNode;
                        if(lParentNode.matches(".Menu7")) break;
                        if(lParentNode.matches(".Menu11")) {
                            var lLine = lParentNode.previousElementSibling;
                            lParentNode.classList.add("Show");
                            lLine.classList.add("Active");
                            return;
                        }
                    }
                }
            });
            lLine.addEventListener("mousedown", function(e) {
                e.preventDefault();
            });
        }
        var lMenus = document.querySelectorAll(".Menu7");
        for(var i = 0; i < lMenus.length; i++) {
            var lMenu = lMenus[i];
            lMenu.addEventListener("mouseleave", function(e) {
                var lObj = new GMenu();
                if(lObj.toWidth() <= lObj.toWidthRWD()) return;
                var lLines = this.querySelectorAll(".Menu12");
                for(var i = 0; i < lLines.length; i++) {
                    var lLine = lLines[i];
                    var lContent = lLine.nextElementSibling;
                    lContent.classList.remove("Show");
                    lLine.classList.remove("Active");
                }
            });
        }
    }

    runMenuBlock() {
        var lButtons = document.querySelectorAll(".Block18");
        for(var i = 0; i < lButtons.length; i++) {
            var lButton = lButtons[i];
            lButton.addEventListener("click", function(e) {
                var lContent = this.nextElementSibling;
                if(!lContent) return;
                lContent.classList.toggle("Show");

                var lContents = document.querySelectorAll(".Block22");
                for(var i = 0; i < lContents.length; i++) {
                    var lContent = lContents[i];
                    var lLine = lContent.parentNode.firstElementChild;
                    lLine.classList.remove("Active");
                    lContent.classList.remove("Show");
                }
            });
            lButton.addEventListener("mousedown", function(e) {
                e.preventDefault();
            });
        }

        var lLines = document.querySelectorAll(".Block20");
        for(var i = 0; i < lLines.length; i++) {
            var lLine = lLines[i];
            lLine.addEventListener("click", function(e) {
                var lLines = document.querySelectorAll(".Block20");
                for(var i = 0; i < lLines.length; i++) {
                    var lLine = lLines[i];
                    var lContent = lLine.nextElementSibling;
                    if(!lContent) continue;
                    var lSub = lContent.firstElementChild;
                    if(!lSub) continue;
                    if(lLine == this) continue;
                    lContent.classList.remove("Show");
                    lLine.classList.remove("Active");
                }

                var lContent = null;
                var lSub = null;
                var lContentOk = false;

                lContent = this.nextElementSibling;
                if(lContent) lSub = lContent.firstElementChild;
                if(lContent) lContentOk = lContent.matches(".Block22");

                var lParentNode = this;

                if(!lContent || !lSub || !lContentOk) {
                    while(1) {
                        lParentNode = lParentNode.parentNode;
                        if(lParentNode.matches(".Block19")) {
                            lParentNode.classList.remove("Show");
                            return;
                        }
                    }
                }

                lContent.classList.toggle("Show");
                this.classList.toggle("Active");

                while(1) {
                    var lParentNode = lParentNode.parentNode;
                    if(lParentNode.matches(".Block19")) break;
                    if(lParentNode.matches(".Block21")) continue;
                    var lContent = lParentNode;
                    var lLine = lContent.previousElementSibling;
                    lLine.classList.toggle("Active");
                    lContent.classList.toggle("Show");
                }
            });
            lLine.addEventListener("mousedown", function(e) {
                e.preventDefault();
            });
        }

        document.addEventListener("click", function(e) {
            var lHideOk = true;
            lHideOk &&= !e.target.matches(".Block18");
            lHideOk &&= !e.target.matches(".Block20");
            lHideOk &&= !e.target.matches(".Block25");

            if(lHideOk) {
                var lContents = document.getElementsByClassName("Block19");
                for(var i = 0; i < lContents.length; i++) {
                    var lContent = lContents[i];
                    lContent.classList.remove("Show");
                }
                var lContents = document.getElementsByClassName("Block22");
                for(var i = 0; i < lContents.length; i++) {
                    var lContent = lContents[i];
                    lContent.classList.remove("Show");
                }
            }
        });
    }

    runMenuBar() {
        var lButtons = document.getElementsByClassName("Block29");
        for(var i = 0; i < lButtons.length; i++) {
            var lButton = lButtons[i];
            lButton.addEventListener("click", function(e) {
                var lContent = this.nextElementSibling;
                if(!lContent) return;
                lContent.classList.toggle("Show");

                var lContents = document.getElementsByClassName("Block30");
                for(var i = 0; i < lContents.length; i++) {
                    var lContent = lContents[i];
                    var lLine = lContent.parentNode.firstElementChild;
                    lLine.classList.remove("Active");
                    lContent.classList.remove("Show");
                }
            });
            lButton.addEventListener("mousedown", function(e) {
                e.preventDefault();
            });
        }

        var lLines = document.getElementsByClassName("Block28");
        for(var i = 0; i < lLines.length; i++) {
            var lLine = lLines[i];
            lLine.addEventListener("click", function(e) {
                var lLines = document.getElementsByClassName("Block28");
                for(var i = 0; i < lLines.length; i++) {
                    var lLine = lLines[i];
                    var lContent = lLine.nextElementSibling;
                    if(!lContent) continue;
                    var lSub = lContent.firstElementChild;
                    if(!lSub) continue;
                    if(lLine == this) continue;
                    lContent.classList.remove("Show");
                    lLine.classList.remove("Active");
                }

                var lContent = null;
                var lSub = null;
                var lContentOk = false;

                lContent = this.nextElementSibling;
                if(lContent) lSub = lContent.firstElementChild;
                if(lContent) lContentOk = lContent.matches(".Block30");

                var lParentNode = this;

                if(!lContent || !lSub || !lContentOk) {
                    while(1) {
                        lParentNode = lParentNode.parentNode;
                        if(lParentNode.matches(".Block27")) {
                            lParentNode.classList.remove("Show");
                            return;
                        }
                    }
                }

                lContent.classList.toggle("Show");
                this.classList.toggle("Active");

                while(1) {
                    var lParentNode = lParentNode.parentNode;
                    if(lParentNode.matches(".Block27")) break;
                    if(lParentNode.matches(".Block31")) continue;
                    var lContent = lParentNode;
                    var lLine = lContent.previousElementSibling;
                    lLine.classList.toggle("Active");
                    lContent.classList.toggle("Show");
                }
            });
            lLine.addEventListener("mousedown", function(e) {
                e.preventDefault();
            });
        }

        document.addEventListener("click", function(e) {
            var lHideOk = true;
            lHideOk &&= !e.target.matches(".Block29");
            lHideOk &&= !e.target.matches(".Block28");
            lHideOk &&= !e.target.matches(".Block25");

            if(lHideOk) {
                var lContents = document.getElementsByClassName("Block27");
                for(var i = 0; i < lContents.length; i++) {
                    var lContent = lContents[i];
                    lContent.classList.remove("Show");
                }
                var lContents = document.getElementsByClassName("Block30");
                for(var i = 0; i < lContents.length; i++) {
                    var lContent = lContents[i];
                    lContent.classList.remove("Show");
                }
            }
        });
    }
}
