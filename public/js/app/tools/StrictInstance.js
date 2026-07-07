"use strict";

var app = app || {};
app.tools = app.tools || {};

app.tools.StrictInstance = class StrictInstance {
    static #m_instance = null;

    constructor() {}

    static Instance() {
        if (this.#m_instance == null) {
            this.#m_instance = new app.tools.StrictInstance();
        }
        return this.#m_instance;
    }

    create(p_in_instance) {
        // Récupère TOUTES les propriétés publiques de l'instance
        const allowed = new Set(Reflect.ownKeys(p_in_instance));

        return new Proxy(p_in_instance, {
            get(p_in_target, p_in_prop, p_in_receiver) {
                const value = Reflect.get(
                    p_in_target,
                    p_in_prop,
                    p_in_receiver,
                );

                // Autoriser les méthodes (héritées incluses)
                if (typeof value === "function") {
                    return value.bind(p_in_target);
                }

                // Bloquer la lecture d'un attribut non déclaré
                if (!allowed.has(p_in_prop)) {
                    throw new Error(
                        `Lecture d'un attribut non déclaré : ${p_in_prop}`,
                    );
                }

                return value;
            },

            set(p_in_target, p_in_prop, p_in_value, p_in_receiver) {
                // Bloquer l'écriture d'un attribut non déclaré
                if (!allowed.has(p_in_prop)) {
                    throw new Error(`Attribut non déclaré : ${p_in_prop}`);
                }

                return Reflect.set(
                    p_in_target,
                    p_in_prop,
                    p_in_value,
                    p_in_receiver,
                );
            },
        });
    }
};

const oStrictInstance = app.tools.StrictInstance.Instance();
