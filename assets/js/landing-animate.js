document.addEventListener("DOMContentLoaded", function() {
  const menuSvg = document.querySelector("nav .menu-svg");
  const menuLinks = document.querySelector("nav .menu-links");

  menuSvg.addEventListener("click", function() {
    menuLinks.classList.toggle("expanded");
  });

  window.addEventListener("scroll", function() {
    const nav = document.querySelector("nav");
    if (window.scrollY > 100) {
      nav.classList.add("expand");
    } else {
      nav.classList.remove("expand");
    }
  });
});