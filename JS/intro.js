const theButton = document.querySelector("button");
const theMain = document.getElementById("main");
const introVideo = document.getElementById("intro");
const theFooter = document.querySelector("footer");
theButton.addEventListener("click", () => {
  theMain.style.display = "none";
  introVideo.style.display = "block";
  theFooter.style.display = "block";
  introVideo.play();
  introVideo.onended = () => {
    introVideo.style.display = "none"; 
    window.location.href = "Homepage/index.php"; 
  };
});
