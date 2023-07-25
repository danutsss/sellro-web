require("./bootstrap");
import { Workbox } from "worbox-window";

if ("serviceWorker" in navigator) {
    const wb = new Workbox("/service-worker.js");

    wb.register();
}
