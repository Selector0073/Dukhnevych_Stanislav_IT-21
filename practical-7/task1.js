const PRESETS = {
    light: { bg: "#ffffff", surface: "#f8f9fa", text: "#212529", accent: "#0d6efd" },
    dark:  { bg: "#121212", surface: "#1e1e1e", text: "#e0e0e0", accent: "#4dabf7" },
    ocean: { bg: "#e8f4f8", surface: "#cce5f0", text: "#0d3349", accent: "#0077b6" },
};

const STORAGE_KEY = "siteTheme";

// Apply a theme object by setting CSS variables on the root element
function applyTheme(theme) {
    document.documentElement.style.setProperty("--bg", theme.bg);
    document.documentElement.style.setProperty("--surface", theme.surface);
    document.documentElement.style.setProperty("--text", theme.text);
    document.documentElement.style.setProperty("--accent", theme.accent);
}

// Save a theme object to localStorage as a JSON string
function saveTheme(theme) {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(theme));
}

// Read and parse the saved theme from localStorage; return null if absent
function loadTheme() {
    const raw = localStorage.getItem(STORAGE_KEY);
    return raw ? JSON.parse(raw) : null;
}

// Highlight the active preset button and remove highlight from others
function setActiveButton(name) {
    document.querySelectorAll(".theme-btn[data-preset]").forEach(function(btn) {
        btn.classList.toggle("active", btn.dataset.preset === name);
    });
}

// Populate color pickers to reflect the given theme object
function syncPickers(theme) {
    document.getElementById("inp-bg").value = theme.bg;
    document.getElementById("inp-surface").value = theme.surface;
    document.getElementById("inp-text").value = theme.text;
    document.getElementById("inp-accent").value = theme.accent;
}

// Build a theme object from the current color picker values
function readPickers() {
    return {
        bg:      document.getElementById("inp-bg").value,
        surface: document.getElementById("inp-surface").value,
        text:    document.getElementById("inp-text").value,
        accent:  document.getElementById("inp-accent").value,
    };
}

// Handle clicks on preset theme buttons
document.querySelector(".card-body").addEventListener("click", function(e) {
    const btn = e.target.closest("[data-preset]");
    if (!btn) return;
    const theme = PRESETS[btn.dataset.preset];
    applyTheme(theme);
    saveTheme(theme);
    setActiveButton(btn.dataset.preset);
    syncPickers(theme);
});

// Handle Save Custom Theme button click
document.getElementById("btn-save-custom").addEventListener("click", function() {
    const theme = readPickers();
    applyTheme(theme);
    saveTheme(theme);
    setActiveButton(null);
});

// Restore saved theme when the page loads
document.addEventListener("DOMContentLoaded", function() {
    const saved = loadTheme();
    const theme = saved || PRESETS.light;
    applyTheme(theme);
    syncPickers(theme);
    if (!saved) {
        setActiveButton("light");
    } else {
        const match = Object.entries(PRESETS).find(function(entry) {
            return entry[1].bg === saved.bg && entry[1].accent === saved.accent;
        });
        setActiveButton(match ? match[0] : null);
    }
});