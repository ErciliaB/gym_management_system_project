document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".btn, .btn-outline");

    buttons.forEach(function (button) {
        button.addEventListener("mouseenter", function () {
            button.style.transform = "scale(1.05)";
        });

        button.addEventListener("mouseleave", function () {
            button.style.transform = "scale(1)";
        });
    });

    const forms = document.querySelectorAll("form");

    forms.forEach(function (form) {
        form.addEventListener("submit", function () {
            const submitButton = form.querySelector("button[type='submit']");

            if (submitButton) {
                submitButton.innerText = "Processing...";
                submitButton.disabled = true;
            }
        });
    });

    const cards = document.querySelectorAll(".feature-card, .class-card, .card");

    cards.forEach(function (card) {
        card.addEventListener("mouseenter", function () {
            card.style.transform = "translateY(-6px)";
        });

        card.addEventListener("mouseleave", function () {
            card.style.transform = "translateY(0)";
        });
    });
});
