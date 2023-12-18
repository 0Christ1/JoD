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

document.getElementById('sharingSection').addEventListener('Submit', function(event) {
  var input = document.getElementById('title');
  if (!input.value) {
      input.setCustomValidity('Title is required.');
  } else {
      input.setCustomValidity(''); 
  }
});

function loadDiscussion(id) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', '../PHP/get_discussion.php?id=' + id, true);
  xhr.onload = function() {
      if (this.status == 200) {
          document.getElementById('disContent').innerHTML = this.responseText;
      }
  }
  xhr.send();
}