document.addEventListener("DOMContentLoaded", function () {
  var navItems = document.querySelectorAll("#nav a");
  var contentItems = document.querySelectorAll(".content-item");

  navItems.forEach(function (navItem) {
    navItem.addEventListener("click", function (event) {
      event.preventDefault();

      // 获取被点击的导航项的 id
      var clickedId = event.target.id;

      // 根据被点击的项的 id 决定显示哪个内容区域
      contentItems.forEach(function (contentItem) {
        if (contentItem.id === clickedId + "Content") {
          contentItem.style.display = "block";
        } else {
          contentItem.style.display = "none";
        }
      });
    });
  });
});
