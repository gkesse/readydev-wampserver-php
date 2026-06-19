"use strict";

function runMain() {
    const main = new app.controller.Main();
    main.run();
}

function callBackend(p_in_module, p_in_method, p_in_obj, p_in_data = null) {
    const backend = new app.controller.Backend();
    backend.run(p_in_module, p_in_method, p_in_obj, p_in_data);
    return backend.backendInfo.isOpenLink;
}

runMain();
