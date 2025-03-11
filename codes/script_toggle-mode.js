document.addEventListener("DOMContentLoaded", function () {
    
    const toggleButton = document.getElementById("toggle-mode");

    if (localStorage.getItem("dark-mode") === "enabled") {
        document.body.classList.add("dark-mode");
        toggleButton.innerText = "Mode Bonbon";
    }

    toggleButton.addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");
        if (document.body.classList.contains("dark-mode")) {
            localStorage.setItem("dark-mode", "enabled");
            toggleButton.innerText = "Mode Bonbon";
        } else {
            localStorage.setItem("dark-mode", "disabled");
            toggleButton.innerText = "Mode Figue";
        }
    });
});