
// Mengatur menu navigasi pada layar kecil

const menuToggle = document.getElementById("menuToggle");
const navbar = document.getElementById("navbar");

menuToggle.addEventListener("click", function () {
    navbar.classList.toggle("active");

    const menuTerbuka = navbar.classList.contains("active");

    menuToggle.setAttribute("aria-expanded", menuTerbuka);
    menuToggle.setAttribute(
        "aria-label",
        menuTerbuka ? "Tutup menu navigasi" : "Buka menu navigasi"
    );

    menuToggle.textContent = menuTerbuka ? "✕" : "☰";
});

// Menutup menu setelah salah satu menu diklik

const menuLinks = navbar.querySelectorAll("a");

menuLinks.forEach(function (link) {
    link.addEventListener("click", function () {
        navbar.classList.remove("active");
        menuToggle.setAttribute("aria-expanded", "false");
        menuToggle.setAttribute("aria-label", "Buka menu navigasi");
        menuToggle.textContent = "☰";
    });
});

// Menampilkan tahun secara otomatis pada footer

document.getElementById("year").textContent =
    new Date().getFullYear();
