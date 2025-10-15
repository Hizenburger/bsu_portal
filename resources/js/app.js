import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    // Find all icons with the attribute data-toggle="password"
    document.querySelectorAll('[data-toggle="password"]').forEach((toggle) => {
        toggle.addEventListener("click", function () {
            const input = document.getElementById(this.dataset.target);

            if (input) {
                if (input.type === "password") {
                    input.type = "text";
                    this.classList.remove("fa-eye");
                    this.classList.add("fa-eye-slash");
                } else {
                    input.type = "password";
                    this.classList.remove("fa-eye-slash");
                    this.classList.add("fa-eye");
                }
            }
        });
    });

    const sidebar = document.getElementById("sidebar");
    const openBtn = document.getElementById("openSidebar");
    const closeBtn = document.getElementById("closeSidebar");

    if (openBtn) {
        openBtn.addEventListener("click", () => {
            sidebar.classList.add("translate-x-0");
            sidebar.classList.add("md:relative");
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener("click", () => {
            sidebar.classList.remove("translate-x-0");
            sidebar.classList.remove("md:translate-x-0");
            sidebar.classList.remove("md:relative");
            // sidebar.classList.add("-translate-x-0")
        });
    }
});
