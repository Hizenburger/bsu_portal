import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();


document.addEventListener("DOMContentLoaded", () => {
    // Find all icons with the attribute data-toggle="password"
    document.querySelectorAll('[data-toggle="password"]').forEach(toggle => {
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
});

