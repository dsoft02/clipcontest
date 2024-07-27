
"use strict";
(() => {
  window.addEventListener('scroll', stickyFn);
  var navbar = document.getElementById("sidebar");
  var sticky = navbar.offsetTop;
  function stickyFn() {
    if (window.scrollY >= 75) {
      if (!navbar.classList.contains("sticky-pin")) {
          navbar.classList.add("sticky-pin");
      }
    } else {
      if (!navbar.classList.contains("no-home")) {
        navbar.classList.remove("sticky-pin");
      }
    }
  }
  window.addEventListener('scroll', stickyFn);
  window.addEventListener('DOMContentLoaded', stickyFn);
})();
