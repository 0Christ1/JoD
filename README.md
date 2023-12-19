# Journey of Dreams Website Documentation by Christ Chen

## Overview
"Journey of Dreams," alternatively known as "Dreams Journey," stands as a cutting-edge web platform, ingeniously crafted to establish a vibrant community centered around the intriguing world of dreams. This unique platform is not just a mere repository of nocturnal narratives; it's a dynamic space where users can meticulously record their dreams, transforming these often fleeting and enigmatic night-time experiences into enthralling stories that can be shared with a wider audience. The essence of this project transcends the boundaries of conventional dream journaling tools, venturing into the realms of cultural and psychological exploration. Here, users can delve into the deeper meanings of their dreams, analyze patterns, and uncover hidden messages that dreams may carry.

## Features
The platform includes several key features:
- **User System**: Users can register and log in their account to manage data and information.
- **Exploring**: Offers information on different cultural interpretations of dreams.
- **Decoding**: Allows users to unravel the meanings of their dreams with expert analysis.
- **Sharing**: A space for users to share their dream stories.
- **Discussing**: A community forum for users to discuss their dreams.

## Intro Page
![intro1](/Doc/Intro1.png)

## After click on "Join Now"
![intro2](/Doc/Intro2.png)

## Specific features

### User System

#### Homepage Before Sign In
![Sign In-Homepage](/Doc/Sign-In(HomePage).png)

#### Login Page

![login](/Doc/Login.png)

##### html
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

##### php
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

#### Register Page

![login](/Doc/Register.png)

##### html
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
      <h2>User Registration</h2>
      <form action="register.php" method="post">
        <input
          type="text"
          id="fname"
          name="fname"
          placeholder="First Name"
          required
        />
        <br />
        <input
          type="text"
          id="lname"
          name="lname"
          placeholder="Last Name"
          required
        />
        <br />
        <input
          type="text"
          id="uname"
          name="uname"
          placeholder="Username"
          required
        />
        <br />
        <input
          type="password"
          id="pwd"
          name="pwd"
          placeholder="Password"
          required
        />
        <input type="submit" value="Sign Up" class="btn" />
      </form>
    </div>
    <video onmouseover="playVideo(this)" autoplay >
        <source src="../Assets/Main.mp4" type="video/mp4" />
    </video>
    <footer>(C) 2023 Dreams Journey Corp. | Verson 1.0</footer>
  </body>
</html>
```

##### php
```php
<?php
//Register.php
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


#### Background Video and Sound Javascript

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


#### Homepage After Sign In
![Sign out-Homepage](/Doc/Sign-Out(HomePage).png)

##### php
```php
<?php
// Database credentials
$servname = "localhost";
$username = "root";
$password = "";
$dbname = "JOD";

// Database connection
$conn = mysqli_connect($servname, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check for form submission
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST["title"];
    $dreamer = $_POST["dreamer"];
    $content = $_POST["content"];
    $stmt = $conn->prepare("INSERT INTO share (title, dreamer, content) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $dreamer, $content);

    if ($stmt->execute()) {
        echo '<script>alert("Submit successfully");</script>';
        header("Location: index.php");
    } else {
        echo '<script>alert("Error: ' . $stmt->error . '");</script>';
    }
    $stmt->close();
}

$conn->close();
?>
```
##### html
```html
<!doctype html>
<html lang="en">
  <head>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
      charset="UTF-8"
    />
    <link rel="stylesheet" href="../Style/global.css" />
    <script src="../JS/main.js" defer></script>

    <title>Journey of Dreams</title>
  </head>
  <body>
    <div class="upper-header">
      <div class="container">
        <span class="left"
          ><img src="../Assets/JOD.png" alt="JoD-logo" class="JoD-logo" />
          <img src="../Assets/divider.gif" /><span class="name"
            >Journey of Dreams</span
          ></span
        ><span class="padding"></span
        ><span class="right"
          ><span class="text">402</span><img src="../Assets/divider.gif" /><span
            class="text"
            >Visit JOD.shop websites</span
          ></span
        >
      </div>
    </div>

    <div class="main-header">
      <div class="header-top">
        <div class="container">
          <span class="slogan">"Dream" Together</span>

          <div class="agency-logo-wrapper">
            <a href="#"
              ><img
                class="agency-logo"
                src="../Assets/JOD-logo.png"
                alt="Journey of Dreams Corp. Logo"
            /></a>
          </div>
          <div id="Sign-in">
            <?php
              session_start();
              if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
                  echo '<a href="../User/logout.php">Sign Out</a>';
              } else {
                  echo '<a href="../User/login.html">Sign In</a>';
              }
            ?>
          </div>
        </div>
      </div>

      <div class="container">
        <nav id="nav">
          <ul>
            <li class="nav-home">
              <a href="index.php"> Home</a>
            </li>
            <li>
              <a id="abt" href="">About</a>
            </li>
            <li>
              <a id="exp" href="">Exploring</a>
            </li>
            <li>
              <a id="dec" href="">Decoding</a>
            </li>
            <li>
              <a id="sha" href="">Sharing</a>
            </li>
            <li>
              <a id="dis" href="">Discussing</a>
            </li>
            <li>
              <a id="cre" href="">Credits</a>
            </li>
            <li>
              <a id="repo" href="https://github.com/0Christ1/JoD" target="_blank"
                >Repository</a
              >
            </li>
          </ul>
        </nav>
      </div>
    </div>

    <div class="main-content">
      <div class="container">
        <div id="content">

          <div id="creContent" class="content-item">
            <h1><a href="https://store.steampowered.com/app/1426210/It_Takes_Two/">It Takes Two - A Steam Game</a></h1>
            <p> Thanks for their beautiful videos for my login page and background image for my home page.</p>
          </div>
        </div>
      </div>
    </div>

    <footer>(C) 2023 Dreams Journey Corp. | Verson 1.0</footer>
  </body>
</html>
```

##### javascript

```javascript
//main.js
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
```

##### css
```css
/* global.css */
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

### About Section
The "About" Section gives the backgroud and history about JoD.
![abt](/Doc/Abt.png)

#### HTML
```html
  <div id="abtContent" class="content-item">
    <h1 >About Journey of Dreams</h1>
    <p>"Journey of Dreams," alternatively known as "Dreams Journey," stands as a cutting-edge web platform, ingeniously crafted to establish a vibrant community centered around the intriguing world of dreams. This unique platform is not just a mere repository of nocturnal narratives; it's a dynamic space where users can meticulously record their dreams, transforming these often fleeting and enigmatic night-time experiences into enthralling stories that can be shared with a wider audience. The essence of this project transcends the boundaries of conventional dream journaling tools, venturing into the realms of cultural and psychological exploration. Here, users can delve into the deeper meanings of their dreams, analyze patterns, and uncover hidden messages that dreams may carry.</p>
    <p>In terms of functionality, "Journey of Dreams" offers a rich tapestry of features that cater to various aspects of dream exploration and community engagement. The platform includes a 'Daily' section, where users can document and track their dreams on a regular basis, offering insights into their subconscious mind over time. The 'Exploring' area serves as a treasure trove of information, where users can delve into different cultural interpretations of dreams and understand the diverse symbolism often found in these mysterious night-time visions. 'Decoding' takes this a step further by allowing users to unravel the meanings of their dreams, aided by expert analyses and community discussions, thus providing a deeper understanding of their subconscious messages.</p>
    <p>In the 'Sharing' section, users are encouraged to share their dream stories, creating a rich repository of dream narratives that others can read and engage with. This not only fosters a sense of community but also helps in identifying common themes and experiences shared among dreamers. The 'Discussing' feature is pivotal in creating an interactive community, where users can engage in meaningful conversations about their dreams, share interpretations, and offer support to each other. Lastly, the 'Activity' section is where the platform really comes alive with various online and offline events like workshops, webinars, and discussions, bringing together dream enthusiasts and experts in a collaborative and enlightening environment.</p>
    <p>The inception of "Journey of Dreams" is rooted in a childhood memory, where the concept of selling and buying dreams was encountered on a Chinese version of an "Amazon"-like website. This intriguing idea laid the foundation for a platform that now serves as a bridge connecting the mysterious world of dreams to our waking reality, allowing for a shared exploration of the depths of the human psyche.</p>
  </div>
```

### Exploring Section
The "Exploring" section allows you look through other people's dreams
![exp](/Doc/Exp.png)

#### HTML
```html
  <div id="expContent" class="content-item">
    <table class="table">
        <thead> 
            <tr>
                <th>Title</th>
                <th>Dreamer</th>
                <th>Content</th>
            </tr> 
        </thead>
        <tbody>
            <?php
                $servname = "localhost";
                $username = "root";
                $password = "";
                $dbname = "JOD";
            
            $conn = mysqli_connect($servname, $username, $password, $dbname);
            if(!$conn){
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM share";
            $result = $conn->query($sql);

            if (!$result) {
                die("Invalid query: " . $conn->error);
            }

            while($row = $result->fetch_assoc()){
                echo "<tr>
                        <td>{$row['title']}</td>
                        <td>{$row['dreamer']}</td>
                        <td>{$row['content']}</td>
                    </tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>  
  </div>
```

### Decoding Section
The "Decode" section offers tools and resources for users to analyze and interpret the meanings of their dreams. It includes interactive elements that help in breaking down dream symbols and understanding their deeper implications.
![dec](/Doc/Dec.png)

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

#### Javascript
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



### Share Section
The "Share" section is a dynamic area where users can post their dream experiences. It includes a user-friendly interface for submitting dream stories, encouraging community members to contribute and share their personal dream narratives.

#### Share Page
![share](/Doc/Sha.png)

#### HTML
```html
<div id="shaContent" class="content-item">
  <form id="sharingSection" method="post">
    <div class="form-group">
      <label for="postTitle">Title</label>
      <input type="text" id="title" class="postTitle" placeholder = "Enter your title of dream" name="title" value="<?php echo htmlspecialchars($title); ?>" required oninvalid="setCustomValidity('Title is required.')" oninput="setCustomValidity('')">
    </div>
    <div class="form-group">
      <label for="postDreamer">Dreamer</label>
      <input type="text" id="dreamer" class="postDreamer" placeholder = "Enter your name" name="dreamer" value="<?php echo htmlspecialchars($dreamer); ?>" required oninvalid="setCustomValidity('Dreamer is required.')" oninput="setCustomValidity('')">
    </div>
    <div class="form-group">
      <label for="postContent">Content</label>
      <textarea type="text" id="postContent" placeholder = "Write about your dream..." name="content" value="<?php echo htmlspecialchars($content); ?>" required oninvalid="setCustomValidity('Content is required.')" oninput="setCustomValidity('')"></textarea>
    </div>
    <button type="submit" id="submitPost"> Submit </button>
  </form>
</div>
```

### Disucssing Section
This section allows users to choose the specific dream to check the comments
![dis1](/Doc/Dis1.png)
User can comment it if they want when they get in 
![dis2](/Doc/Dis2.png)

#### HTML
```php
<div id="disContent" class="content-item">
  <table class="table">
      <thead> 
          <tr>
              <th>Dreamer</th>
              <th>Title</th>
              <th>Discuss Link</th>
          </tr> 
      </thead>
      <tbody>
          <?php
              $servname = "localhost";
              $username = "root";
              $password = "";
              $dbname = "JOD";
          
          $conn = mysqli_connect($servname, $username, $password, $dbname);
          if(!$conn){
              die("Connection failed: " . mysqli_connect_error());
          }

          $sql = "SELECT * FROM share";
          $result = $conn->query($sql);

          if (!$result) {
              die("Invalid query: " . $conn->error);
          }

          while($row = $result->fetch_assoc()){
              echo "<tr>
                      <td>{$row['dreamer']}</td>
                      <td>{$row['title']}</td>
                      <td><button onclick='loadDiscussion({$row['id']})'>Discuss</button></td>
                  </tr>";
          }
          $conn->close();
          ?>
      </tbody>
  </table>
</div>
```

### PHP
```php
//get_discussion.php
<?php
$servname = "localhost";
$username = "root";
$password = "";
$dbname = "JOD";

$conn = new mysqli($servname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$id = $conn->real_escape_string($id);

$sql_share = "SELECT title, dreamer, content FROM share WHERE id = '$id'";
$result_share = $conn->query($sql_share);

if ($result_share->num_rows > 0) {

    $row_share = $result_share->fetch_assoc();
    echo "<button style='margin-left: 20px'; onclick='window.location.href = \"index.php\";'>Back to homepage</button>";
    echo "<div style='margin: 20px; padding: 10px; border: 1px solid #ddd; border-radius: 5px; max-width: 897px; height: 48vh; overflow-y: auto;'>";
    echo "<h1 style='color: #3366cc;'>" . htmlspecialchars($row_share["title"]) . ' - ' . htmlspecialchars($row_share["dreamer"]) . "</h1>";
    echo "<p style='font-size: 16px;'>" . nl2br(htmlspecialchars($row_share["content"])) . "</p>";

    $sql_discuss = "SELECT comment FROM discuss WHERE share_id = '$id'";
    $result_discuss = $conn->query($sql_discuss);

    echo "<h2 style='color: #3366cc;'>Discussion</h2>";

    if ($result_discuss->num_rows > 0) {
        while ($row_discuss = $result_discuss->fetch_assoc()) {
            echo "<p style='font-size: 16px;'>" . nl2br(htmlspecialchars($row_discuss["comment"] ?? '')) . "</p>";
        }
    } else {
        echo "<p>No comments yet.</p>";
    }
    echo "</div>";
    echo "<div style='margin: 20px;'>";
    echo "<h3>Leave your Comment</h3>";
    echo "<form action='../PHP/submit_comment.php' method='post'>";
    echo "<input type='hidden' name='share_id' value='" . htmlspecialchars($id) . "'>";
    echo "<textarea name='comment' style='width: 100%; height: 100px; resize: none;'></textarea><br>";
    echo "<input type='submit' value='Submit Comment'>";
    echo "</form>";
    echo "</div>";
}

$conn->close();
?>
```
```php
//submit_comment.php
<?php
$servname = "localhost";
$username = "root";
$password = "";
$dbname = "JOD";

$conn = new mysqli($servname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$share_id = isset($_POST['share_id']) ? intval($_POST['share_id']) : 0;
$comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

if (empty($comment)) {
    echo "Comment cannot be empty.";
    exit;
}

$share_id = $conn->real_escape_string($share_id);
$comment = $conn->real_escape_string($comment);

$sql = "INSERT INTO discuss (share_id, comment) VALUES ('$share_id', '$comment')";

if ($conn->query($sql) === TRUE) {
    echo "New comment added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


header("Location: ../Homepage/index.php");
?>
```

### Credit section
This section is to show the credits
![cre](/Doc/Cre.png)
We extend our heartfelt gratitude and recognition to the creators and artists behind the game "双人成行" (It takes two), whose captivating videos and images have been instrumental in enriching the visual experience of "Journey of Dreams." The dynamic and immersive media from this game have greatly contributed to illustrating the essence of collaboration, exploration, and the depth of human connections within our platform.

Additionally, we would like to acknowledge the use of various videos and imagery from unnamed sources. These contributions, though not specifically credited, have played a significant role in bringing the diverse and intriguing world of dreams to life on our website. Their visual representations have added depth and context to our content, making the user experience more engaging and profound.

# Conclusion
"Journey of Dreams" is more than just a digital platform; it's a gateway into the mysterious and profound world of dreams. With its user-friendly interface, comprehensive features like the Daily, Exploring, Decoding, Sharing, Discussing, and Activity sections, the platform invites users to a journey of self-discovery and communal exchange. It stands as a testament to the power of technology in enhancing our understanding of the human psyche, bridging the gap between the surreal realm of dreams and our waking life.

As this is only version 1.0, we are committed to continuous improvement and refinement. Our team is dedicated to listening to our community's feedback and incorporating it into future updates to make "Journey of Dreams" even more engaging and user-friendly. We are constantly exploring new features and enhancements to ensure that our platform remains at the forefront of dream exploration and community interaction. Our goal is not just to maintain the website but to see it evolve and adapt, reflecting the growing needs and insights of our users. We believe that every update will bring us closer to making "Journey of Dreams" a beloved destination for dream enthusiasts around the globe.