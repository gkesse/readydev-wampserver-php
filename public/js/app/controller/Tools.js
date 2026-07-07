"use strict";

var app = app || {};
app.controller = app.controller || {};

app.controller.Tools = class Tools {
    static #m_instance = null;

    constructor() {}

    static Instance() {
        if (this.#m_instance == null) {
            this.#m_instance = new app.controller.Tools();
        }
        return this.#m_instance;
    }

    strictInstance(instance) {
        // Récupère TOUTES les propriétés publiques de l'instance
        const allowed = new Set(Reflect.ownKeys(instance));

        return new Proxy(instance, {
            get(target, prop, receiver) {
                const value = Reflect.get(target, prop, receiver);

                // Autoriser les méthodes (héritées incluses)
                if (typeof value === "function") {
                    return value.bind(target);
                }

                // Bloquer la lecture d'un attribut non déclaré
                if (!allowed.has(prop)) {
                    throw new Error(
                        `Lecture d'un attribut non déclaré : ${prop}`,
                    );
                }

                return value;
            },

            set(target, prop, value, receiver) {
                // Bloquer l'écriture d'un attribut non déclaré
                if (!allowed.has(prop)) {
                    throw new Error(`Attribut non déclaré : ${prop}`);
                }

                return Reflect.set(target, prop, value, receiver);
            },
        });
    }
};

const oTools = app.controller.Tools.Instance();
