document.addEventListener("DOMContentLoaded", function () {
    const flashMessage = document.querySelector(".flash-message");

    // Show the flash message if it exists
    if (flashMessage) {
        flashMessage.classList.add("show");

        // Remove the flash message after 3 seconds
        setTimeout(() => {
            flashMessage.classList.add("hide");

            // Completely remove the flash message after the animation
            setTimeout(() => {
                flashMessage.style.display = "none"; // Hide the element from DOM
            }, 500); // Match the slide-out duration
        }, 5000); // Keep visible for 3 seconds
    }
});


