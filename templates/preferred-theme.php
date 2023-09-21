<script>
    // Check Local Storage
    let savedTheme = localStorage.getItem("theme"),
        preferredTheme = savedTheme;

    // If Local Storage is not set, we check the user OS preference
    if (!savedTheme) {
        preferredTheme = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"
    }

    // Set Preferred Theme
    document.documentElement.setAttribute("theme", preferredTheme);
</script>