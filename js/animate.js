document.addEventListener("DOMContentLoaded", function(event) {
 var animate = document.getElementById("animate");
 animate.classList.add("not-loaded");
  window.setTimeout(function () {
    animate.classList.remove("not-loaded");
    animate.classList.add("loaded");
  }, 0);
});
