const crosses = document.querySelectorAll('.alert-close');

crosses.forEach(function(cross) {
  cross.addEventListener('click', function() {
    this.parentElement.style.display = "none";
  });
});