"use strict";

var app = app || {};
app.view = app.view || {};

app.view.Main = class Main {
    constructor() {
        console.log("Main constructor...");
    }

    run() {
        console.log("Exécution de la méthode Main.run()...");
    }
}
