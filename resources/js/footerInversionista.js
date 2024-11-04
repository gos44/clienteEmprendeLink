  document.addEventListener("DOMContentLoaded", function() {
    fetch("footerInversor.blade.php")
      .then(response => response.text())
      .then(data => {
        document.getElementById("footer").innerHTML = data;
      });
  });
