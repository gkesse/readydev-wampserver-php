"use strict";

function runMain() {
    const main = oTools.strictInstance(new app.controller.Main());
    main.run();
}

function callBackend(p_in_module, p_in_method, p_in_obj, p_in_data = null) {
    try {
        const backend = oTools.strictInstance(new app.controller.Backend());
        backend.run(p_in_module, p_in_method, p_in_obj, p_in_data);
        return backend.m_backendInfo.m_isOpenLink;
    } catch (e) {
        console.error(e);
        return false;
    }
}

runMain();
