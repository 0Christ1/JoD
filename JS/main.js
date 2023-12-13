document.addEventListener("DOMContentLoaded", function () {
  var navItems = document.querySelectorAll("#nav a");

  navItems.forEach(function (navItem) {
    navItem.addEventListener("click", function (event) {
      var clickedId = event.target.id;
      var contentItem = document.getElementById(clickedId + "Content");

      if (contentItem) {
        event.preventDefault();

        var contentItems = document.querySelectorAll(".content-item");
        contentItems.forEach(function (ci) {
          ci.style.display = (ci === contentItem) ? "block" : "none";
        });
      }
    });
  });
});


document.addEventListener("DOMContentLoaded", function() {
  var searchButton = document.getElementById("dreamSearchButton");
  var searchInput = document.getElementById("dreamSearchInput");

  searchButton.addEventListener("click", function() {
    var searchTerm = searchInput.value;
    if (searchTerm) {
      window.open("https://www.google.com/search?q=" + encodeURIComponent(searchTerm));
    }
  });
});
