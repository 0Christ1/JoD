# Journey of Dreams Website Documentation by Christ Chen

## Overview
"Journey of Dreams," alternatively known as "Dreams Journey," stands as a cutting-edge web platform, ingeniously crafted to establish a vibrant community centered around the intriguing world of dreams. This unique platform is not just a mere repository of nocturnal narratives; it's a dynamic space where users can meticulously record their dreams, transforming these often fleeting and enigmatic night-time experiences into enthralling stories that can be shared with a wider audience. The essence of this project transcends the boundaries of conventional dream journaling tools, venturing into the realms of cultural and psychological exploration. Here, users can delve into the deeper meanings of their dreams, analyze patterns, and uncover hidden messages that dreams may carry.

In terms of functionality, "Journey of Dreams" offers a rich tapestry of features that cater to various aspects of dream exploration and community engagement. The platform includes a 'Daily' section, where users can document and track their dreams on a regular basis, offering insights into their subconscious mind over time. The 'Exploring' area serves as a treasure trove of information, where users can delve into different cultural interpretations of dreams and understand the diverse symbolism often found in these mysterious night-time visions. 'Decoding' takes this a step further by allowing users to unravel the meanings of their dreams, aided by expert analyses and community discussions, thus providing a deeper understanding of their subconscious messages.

In the 'Sharing' section, users are encouraged to share their dream stories, creating a rich repository of dream narratives that others can read and engage with. This not only fosters a sense of community but also helps in identifying common themes and experiences shared among dreamers. The 'Discussing' feature is pivotal in creating an interactive community, where users can engage in meaningful conversations about their dreams, share interpretations, and offer support to each other. Lastly, the 'Activity' section is where the platform really comes alive with various online and offline events like workshops, webinars, and discussions, bringing together dream enthusiasts and experts in a collaborative and enlightening environment.

The inception of "Journey of Dreams" is rooted in a childhood memory, where the concept of selling and buying dreams was encountered on a Chinese version of an "Amazon"-like website. This intriguing idea laid the foundation for a platform that now serves as a bridge connecting the mysterious world of dreams to our waking reality, allowing for a shared exploration of the depths of the human psyche.

## Features
The platform includes several key features:
- **User System**: Users can register and log in their account to manage data and information.
- **Daily**: Users can document their dreams regularly, providing insights into their subconscious.
- **Exploring**: Offers information on different cultural interpretations of dreams.
- **Decoding**: Allows users to unravel the meanings of their dreams with expert analysis.
- **Sharing**: A space for users to share their dream stories.
- **Discussing**: A community forum for users to discuss their dreams.
- **Activity**: Hosts events and workshops related to dreams.

## The Homepage
![Homepage](/Doc/HomePage.png)

## Specific features

### User System

#### PHP & HTML
```php
<?php
include "connect.php";

// Get the values from the form
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$username = $_POST['uname'];
$password = $_POST['pwd'];

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if user already exists
$checkUserSql = "SELECT * FROM users WHERE username = '$username'";
$checkUserResult = mysqli_query($conn, $checkUserSql);

if (mysqli_num_rows($checkUserResult) > 0) {
    // User already exists, redirect to login page
    echo '<script language="javascript">alert("'.$username.' already exists, Please Login!"); location.href="login.html";</script>';
} else {
    // User doesn't exist, proceed with registration
    $sql = "INSERT INTO users(firstname, lastname, username, password) VALUES ('$firstname', '$lastname', '$username', '$hashed_password')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Registration successful, redirect to mainframe
        echo '<script language="javascript">alert("' . $firstname . ', You Registered successfully!"); location.href="login.html";</script>';
    } else {
        // Registration failed, handle error
        echo '<script language="javascript">alert("Registration failed, Please try again!");</script>';
    }
}

$conn->close();
?>
```
**Register.php**: 
This script processes user registration by checking if a username already exists in the database and, if not, securely hashes the password before storing the new user's information. If the registration is successful, it redirects to the login page with a success message, otherwise, it shows an error message.

```php
// Authenticate.php
<?php
session_start();
include "connect.php";

$un = mysqli_real_escape_string($conn, $_POST['uname']);
$enteredPassword = mysqli_real_escape_string($conn, $_POST['pwd']);

$sql = "SELECT * FROM users WHERE username = '$un'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if(password_verify($enteredPassword, $row['password'])){
        $_SESSION['user_logged_in'] = true;
        $_SESSION['username'] = $un;
        $_SESSION['login_time'] = time();
        echo '<script language="javascript">alert("Welcome Back to Dream World, ' . $un .'!"); location.href="../Homepage";</script>';
    } else {
        echo '<script language="javascript">alert("Incorrect Username or Password!");location.href="login.html";</script>';
    }
} else {
    echo '<script language="javascript">alert("User does not exist. Please Register!");location.href="register.html";</script>';
}
?>
```
**Authenticate.php**: 
This script handles user login by verifying the entered credentials against the database. If the username exists and the password matches, it creates a session for the user and redirects to the homepage with a welcome message. If the credentials are incorrect, it redirects back to the login page with an error message.

```php
// logout.php
<?php
session_start();
session_unset();
session_destroy();
header('Location: login.html');
exit();
?>
```
**logout.php**: This script ends the user's session by clearing session data and destroying the session, then redirects the user back to the login page, effectively logging them out.

#### Login Page

![login](/Doc/Login.png)

```javascript
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
    window.location.href = "Homepage"; 
  };
});

function playVideo(v){
    v.play();
}
```
**Intro Video Control Script**:
- This script attaches an event listener to a button. When clicked, it hides the main content and footer on the page and displays an introduction video.
- The video starts playing automatically upon the button click. Once the video ends (`onended` event), the script hides the video and redirects the browser to the "Homepage".
- There's also a `playVideo` function defined that takes a video element as an argument and plays the video, but it isn't used within this snippet.

```javascript
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
```
**Navigation Interaction Script**:
- This script waits until the DOM content is fully loaded. Then, it selects all navigation items and sets up a click event listener for each.
- When a navigation item is clicked, the script looks for a corresponding content item (with an ID that matches the navigation item's ID plus 'Content').
- If found, it prevents the default action (to stop navigating away), hides all content items, and only displays the one that matches the clicked navigation item.

```javascript
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
```
**Search Functionality Script**:
- Also triggered after the DOM is fully loaded, this script attaches an event listener to a search button.
- Upon clicking the search button, it retrieves the search term from a text input field. If the search term is not empty, the script opens a new browser tab or window with Google search results for the entered term using `window.open()`.

```html
<!DOCTYPE html>
<html>
  <head>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
      charset="UTF-8"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
      defer
    ></script>
    <script src="../JS/user.js" defer></script>
    <link rel="stylesheet" href="../Style/styles.css" />
    <title>JoD - Login</title>
  </head>
  <body>
    <div class="textBoxContainer shadow">
      <img src="../Assets/JOD-logo.png" />
      <h2>Login or Register</h2>
      <form action="authenticate.php" method="post">
        <input
          type="text"
          id="uname"
          name="uname"
          placeholder="Username"
          required
        />
        <input
          type="password"
          id="pwd "
          name="pwd"
          placeholder="Password"
          required
        />
        <input type="submit" value="Login" class="btn" />
      </form>
      <form action="register.html" method="post">
        <input type="submit" value="Register" class="btn" />
      </form>
    </div>
    <video onmouseover="playVideo(this)" autoplay >
        <source src="../Assets/Main.mp4" type="video/mp4" />
    </video>
    <footer>(C) 2023 Dreams Journey Corp. | Verson 1.0</footer>
  </body>
</html>
```
1. This HTML file, titled "JoD - Login," is a login page for the "Journey of Dreams" website, featuring responsive design with Bootstrap and custom styles, and includes a login form along with a link to a registration page.
2. The page uses Bootstrap for styling and layout, ensuring compatibility across various devices and screen sizes, and also includes a custom JavaScript file (user.js) for additional functionality.
3. Additional visual elements include the website's logo, an autoplaying video with mouseover play functionality, and a footer with copyright and version information, enhancing the user experience with interactive and engaging content.


### Share Section
The "Share" section is a dynamic area where users can post their dream experiences. It includes a user-friendly interface for submitting dream stories, encouraging community members to contribute and share their personal dream narratives.

#### Share Page
![share](/Doc/share.png)

#### HTML
```html
<div id="shaContent" class="content-item">
    <div id="sharingSection">
        <h1>Share Your Dream</h1>
        <form id="postForm">
        <div class="form-group">
            <label for="postTitle">Title</label>
            <input type="text" id="postTitle" name="title" placeholder="Enter your dream title">
        </div>
        <div class="form-group">
            <label for="postContent">Content</label>
            <textarea id="postContent" name="content" placeholder="Write about your dream..."></textarea>
        </div>
        <button type="submit" id="submitPost">Submit</button>
        </form>
    </div>
</div>
```
This HTML structure provides a form for users to input the title and content of their dream, with a button to submit their story.

### Decode Section
The "Decode" section offers tools and resources for users to analyze and interpret the meanings of their dreams. It includes interactive elements that help in breaking down dream symbols and understanding their deeper implications.

#### Decode Page
![decode](/Doc/decode.png)

#### HTML
```html
<div id="decContent" class="content-item">
    <h1 style="margin-top: 30%">Which dream do you want to decode?</h1>
    <div id="decodeSearch">
        <input type="text" id="dreamSearchInput" placeholder="Search your dreams...">
        <button id="dreamSearchButton">Search</button>
    </div>
</div>
```
This section allows users to input a symbol or element from their dream and receive interpretations or analyses in return.

#### Homepage.css
```css
body {
  display: block;
  margin: 0;
  font-size: 15px;
  color: #333;
}

.container {
  max-width: 934px;
  padding-left: 20px;
  padding-right: 20px;
  margin-left: auto;
  margin-right: auto;
  position: relative;
  font-family: Arial, sans-serif;
}

.upper-header,
.upper-header img {
  background: #000;
  height: 25px;
  vertical-align: middle;
}

.upper-header .left {
  width: 25%;
}

.upper-header .JoD-logo {
  height: 15px;
  margin: 0 10px 0 -1px;
}

.upper-header .name {
  color: #fff;
  font-size: 12px;
  font-weight: bold;
  padding: 0 0 0 10px;
}

.upper-header .padding {
  width: 50%;
}

.upper-header .right {
  position: absolute;
  right: 13px;
  padding-right: 4%;
}

.upper-header .text {
  color: #fff;
  font-size: 12px;
  font-weight: bold;
  margin: 0 5px;
}

.main-header,
.header-top {
  border-bottom: 1px solid #d5d5d5;
}

.main-header {
  display: block;
  background: url("../Assets/bg-nav.png") repeat-x 0 bottom;
}

.main-header .header-top {
  min-height: 100px;
  margin-top: 20px;
  padding: 20px 0;
}

.header-top .slogan {
  position: absolute;
  top: 2.5vh;
  left: 20px;
  font-size: 15px;
  color: #666;
  font-weight: 400;
  max-width: 30%;
}

.header-top .agency-logo-wrapper {
  position: absolute;
  top: -40px;
  text-align: center;
  width: 96%;
  z-index: 1;
}

.agency-logo-wrapper img {
  max-width: 15%;
  height: auto;
}

.header-top #Sign-in {
  position: absolute;
  top: 2.5vh;
  right: 57px;
  z-index: 3;
}

.header-top #Sign-in a {
  text-decoration: none;
  color: #666;
  font-weight: 700;
  font-size: 14;
}

.container::after,
.container::before {
  content: "";
  height: auto;
  display: table;
  clear: both;
}

.main-header #nav {
  position: relative;
  overflow: hidden;
  z-index: 2;
}

.main-header nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.main-header nav ul li.nav-home {
  border-left: 1px solid #d5d5d5;
}

.main-header nav ul li {
  float: left;
  border-right: 1px solid #d5d5d5;
  padding: 0 2.083333333333% 0 2.083333333333%;
  line-height: 45px;
}

.main-header nav ul li a:link {
  text-decoration: none;
  font-size: 16px;
  font-weight: 700 !important;
  color: #333;
  display: block;
  line-height: 45px;
}

.main-header nav ul li a:active,
.main-header nav ul li a:visited {
  text-decoration: none;
  outline: 0;
  color: #333333;
}

.main-header nav ul li:hover {
  background-color: #000;
  cursor: pointer;
}

.main-header nav ul li:active {
  background-color: #0a5796;
}

.main-header nav ul li.active a,
.main-header nav ul li:hover a {
  color: #fff;
  text-decoration: none;
}

.main-header nav ul li.nav-home a {
  background: url("../Assets/nav-sprite.png") no-repeat center 14px;
  text-indent: 100%;
  white-space: nowrap;
  overflow: hidden;
  display: block;
  width: 20px;
}

.main-header nav ul li a {
  transition: 0s;
}

.main-header nav ul li.nav-home:hover a {
  background: url("../Assets/nav-sprite.png") no-repeat center -28px;
}

.main-content{
  background-image: url("../Assets/BG.JPG");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  height: 80vh;
}

.content-item {
  display: none;
  position: fixed;
  box-sizing: border-box;
  margin-top: 1vh;
  width: 898px;
  height: 75vh;
  background-color: white;
  border: 1px solid #ccc;
  padding: 20px;
  opacity: 0.92;
  z-index: 10;
}

#abtContent p {
  font-family: 'Times New Roman', Times, serif;
  font-size: 20px;
}

.content-item h1 {
  display: flex;
  justify-content: center;
}

.content-item.active {
  display: block;
}

#decodeSearch {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 90px;
}

#dreamSearchInput {
  padding: 10px;
  margin-right: 10px;
  border-radius: 4px;
  width: 500px; 
}

#dreamSearchButton {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

#dreamSearchButton:hover {
  background-color: #45a049;
}

#dailyPuzzle {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px; 
  padding: 20px;
}

.puzzle-item {
  background-color: #f4f4f4;
  padding: 20px;
  border: 1px solid #ccc;
  box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
}

.puzzle-item:nth-child(1) { grid-row: span 1; }
.puzzle-item:nth-child(2) { grid-row: span 1; }
.puzzle-item:nth-child(3) { grid-column: span 1;}
.puzzle-item:nth-child(4) { grid-column: span 2; grid-row: span 1;}

#sharingSection {
  max-width: 898px;
  margin: 0 auto;
  padding: 20px;
}

#sharingSection .form-group {
  margin-bottom: 15px;
}

#sharingSection label {
  display: block;
  margin-bottom: 5px;
}

#sharingSection input[type="text"],
#sharingSection textarea {
  width: 100%; 
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
  box-sizing: border-box;
}

#sharingSection textarea {
  height: 150px;
}

#submitPost {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

#submitPost:hover {
  background-color: #45a049;
}

footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  font-size: 15px;
  background-color: #000000;
  color: white;
  text-align: center;
  padding: 12px 0;
  font-family: "Segoe UI", sans-serif;
}

```

#### Other.css
```css
@import url("https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Edu+TAS+Beginner&family=Paprika&display=swap");

html,
body {
  min-height: 100%;
  margin: 0;
  padding: 0;
}

h1 {
  position: absolute;
  font-family: "Architects Daughter", cursive;
  top: 12vh;
  right: 17vw;
  color: #ffffff;
  transform: rotate(-5deg);
  z-index: 1;
}

video {
  width: 100%;
  height: 100%;
  object-fit: fill;
  
}

button {
  position: absolute;
  bottom: 10vh;
  right: 10vw;
  font-family: Paprika;
  font-size: 40px;
  font-style: italic;
  color: rgb(255, 255, 255);
  opacity: 0.8;
  z-index: 1;
  border: none;
  background-color: transparent;
  animation: fade 1.5s infinite;
}

button:hover {
  opacity: 1;
  animation: none;
}

@keyframes fade {
  0%,
  100% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
}

input, 
textarea {
    display: inline-block;
    font-family: arial;
    margin: 10px 10px 10px 10px;
    padding: 8px 12px 8px 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    width: 60%;
    font-size: large;
  }
  
  .textBoxContainer {
    display: block;
    position: absolute;
    width: 18vw;
    top: 45%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    padding: 10px;
    background-color: rgb(227, 248, 255);
    border-radius: 1vh;
    opacity: 0.9;
    z-index: 2;
  }
  
  .textBoxContainer img {
    width: 12vw;
    height: auto;
    margin: 1.5vh;
  }
  
  .textBoxContainer h2 {
    text-align: center;
    font-size: 2em;
    margin-bottom: 1.5vh;
  }
  
  input[type="submit"] {
    background: #ccc1ff;
    cursor: pointer;
    border-radius: 5px;
  }
  
  input[type="submit"]:hover {
    background-color: rgb(193, 137, 234);
  }

footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  font-size: 15px;
  background-color: #000000;
  color: white;
  text-align: center;
  padding: 10px 0;
  font-family: "Segoe UI", sans-serif;
}
```

## Credits
We extend our heartfelt gratitude and recognition to the creators and artists behind the game "双人成行" (A Way Out), whose captivating videos and images have been instrumental in enriching the visual experience of "Journey of Dreams." The dynamic and immersive media from this game have greatly contributed to illustrating the essence of collaboration, exploration, and the depth of human connections within our platform.

Additionally, we would like to acknowledge the use of various videos and imagery from unnamed sources. These contributions, though not specifically credited, have played a significant role in bringing the diverse and intriguing world of dreams to life on our website. Their visual representations have added depth and context to our content, making the user experience more engaging and profound.

# Conclusion
"Journey of Dreams" is more than just a digital platform; it's a gateway into the mysterious and profound world of dreams. With its user-friendly interface, comprehensive features like the Daily, Exploring, Decoding, Sharing, Discussing, and Activity sections, the platform invites users to a journey of self-discovery and communal exchange. It stands as a testament to the power of technology in enhancing our understanding of the human psyche, bridging the gap between the surreal realm of dreams and our waking life.

As this is only version 1.0, we are committed to continuous improvement and refinement. Our team is dedicated to listening to our community's feedback and incorporating it into future updates to make "Journey of Dreams" even more engaging and user-friendly. We are constantly exploring new features and enhancements to ensure that our platform remains at the forefront of dream exploration and community interaction. Our goal is not just to maintain the website but to see it evolve and adapt, reflecting the growing needs and insights of our users. We believe that every update will bring us closer to making "Journey of Dreams" a beloved destination for dream enthusiasts around the globe.