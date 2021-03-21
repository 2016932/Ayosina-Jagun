const body = document.body;
const collapseBtn = document.querySelector(".admin-menu .collapse-btn");
const collapsedClass = "collapsed";
 
collapseBtn.addEventListener("click", function() {
  body.classList.toggle(collapsedClass);
  this.getAttribute("aria-expanded") == "true"
    ? this.setAttribute("aria-expanded", "false")
    : this.setAttribute("aria-expanded", "true");
  this.getAttribute("aria-label") == "collapse menu"
    ? this.setAttribute("aria-label", "expand menu")
    : this.setAttribute("aria-label", "collapse menu");
});