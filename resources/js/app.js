import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    // Sidebar toggle
    const navImage = document.querySelector(".nav-image");
    const sidebar = document.querySelector(".dropdown-sidebar");

    if (navImage && sidebar) {
        navImage.addEventListener("click", (e) => {
            e.preventDefault();
            sidebar.classList.toggle("collapsed");
        });

        // Close sidebar when clicking outside
        document.addEventListener("click", (e) => {
            if (
                !sidebar.contains(e.target) &&
                !navImage.contains(e.target)
            ) {
                sidebar.classList.add("collapsed");
            }
        });
    }

    // Modal logic
    const imageModal = document.getElementById("imageModal");
    const modalImage = document.getElementById("modalImage");
    const closeModalBtn = document.getElementById("closeModalBtn");

    // Add event listeners to all announcement images
    document.querySelectorAll(".announcement-image").forEach((img) => {
        img.addEventListener("click", () => {
            modalImage.src = img.src;
            imageModal.classList.remove("hidden");
        });
    });

    // Close modal on X button
    closeModalBtn.addEventListener("click", () => {
        imageModal.classList.add("hidden");
        modalImage.src = "";
    });

    // Close modal when clicking the background
    imageModal.addEventListener("click", (e) => {
        if (e.target === imageModal) {
            imageModal.classList.add("hidden");
            modalImage.src = "";
        }
    });

    // Close on Escape key
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && !imageModal.classList.contains("hidden")) {
            imageModal.classList.add("hidden");
            modalImage.src = "";
        }
    });

    //like ajax
    document.querySelectorAll(".like-btn").forEach((button) => {
        button.addEventListener("click", async () => {
            const id = button.dataset.announcementId;
            const icon = button.querySelector("i");
            const countContainer = document.querySelector(
                `.like-container[data-announcement-id="${id}"]`
            );
            const numberSpan = countContainer.querySelector(".like-number");
            const labelSpan = countContainer.querySelector(".like-label");

            const isLiked = icon.classList.contains("fa-solid");
            const url = `/announcements/${id}/like`;
            const method = isLiked ? "DELETE" : "POST";

            try {
                const response = await fetch(url, {
                    method: method,
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content,
                        Accept: "application/json",
                    },
                });

                if (response.ok) {
                    const data = await response.json();
                    numberSpan.textContent = data.likes_count;
                    labelSpan.textContent =
                        data.likes_count === 1 ? "like" : "likes";

                    if (isLiked) {
                        icon.classList.remove("fa-solid", "text-blue");
                        icon.classList.add("fa-regular");
                    } else {
                        icon.classList.remove("fa-regular");
                        icon.classList.add("fa-solid", "text-blue");
                    }
                }
            } catch (error) {
                console.error("Like failed:", error);
            }
        });
    });
});

// const sidebar = document.getElementById("sidebar");
// const openBtn = document.getElementById("openSidebar");
// const closeBtn = document.getElementById("closeSidebar");

// if (openBtn) {
//     openBtn.addEventListener("click", () => {
//         sidebar.classList.add("translate-x-0");
//         sidebar.classList.add("md:relative");
//     });
// }

// if (closeBtn) {
//     closeBtn.addEventListener("click", () => {
//         sidebar.classList.remove("translate-x-0");
//         sidebar.classList.remove("md:translate-x-0");
//         sidebar.classList.remove("md:relative");
//         // sidebar.classList.add("-translate-x-0")
//     });
// }
