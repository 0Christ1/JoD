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
          <div id="abtContent" class="content-item">
            <h1 >About Journey of Dreams</h1>
            <p>"Journey of Dreams," alternatively known as "Dreams Journey," stands as a cutting-edge web platform, ingeniously crafted to establish a vibrant community centered around the intriguing world of dreams. This unique platform is not just a mere repository of nocturnal narratives; it's a dynamic space where users can meticulously record their dreams, transforming these often fleeting and enigmatic night-time experiences into enthralling stories that can be shared with a wider audience. The essence of this project transcends the boundaries of conventional dream journaling tools, venturing into the realms of cultural and psychological exploration. Here, users can delve into the deeper meanings of their dreams, analyze patterns, and uncover hidden messages that dreams may carry.</p>
            <p>In terms of functionality, "Journey of Dreams" offers a rich tapestry of features that cater to various aspects of dream exploration and community engagement. The platform includes a 'Daily' section, where users can document and track their dreams on a regular basis, offering insights into their subconscious mind over time. The 'Exploring' area serves as a treasure trove of information, where users can delve into different cultural interpretations of dreams and understand the diverse symbolism often found in these mysterious night-time visions. 'Decoding' takes this a step further by allowing users to unravel the meanings of their dreams, aided by expert analyses and community discussions, thus providing a deeper understanding of their subconscious messages.</p>
            <p>In the 'Sharing' section, users are encouraged to share their dream stories, creating a rich repository of dream narratives that others can read and engage with. This not only fosters a sense of community but also helps in identifying common themes and experiences shared among dreamers. The 'Discussing' feature is pivotal in creating an interactive community, where users can engage in meaningful conversations about their dreams, share interpretations, and offer support to each other. Lastly, the 'Activity' section is where the platform really comes alive with various online and offline events like workshops, webinars, and discussions, bringing together dream enthusiasts and experts in a collaborative and enlightening environment.</p>
            <p>The inception of "Journey of Dreams" is rooted in a childhood memory, where the concept of selling and buying dreams was encountered on a Chinese version of an "Amazon"-like website. This intriguing idea laid the foundation for a platform that now serves as a bridge connecting the mysterious world of dreams to our waking reality, allowing for a shared exploration of the depths of the human psyche.</p>
          </div>
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
          <div id="decContent" class="content-item">
            <h1 style="margin-top: 30%">What dream do you want to decode?</h1>
            <div id="decodeSearch">
              <input type="text" id="dreamSearchInput" placeholder="Search your dreams...">
              <button id="dreamSearchButton">Search</button>
            </div>
          </div>
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