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
              <a id="daily" href="">Daily</a>
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
              <a id="act" href="">Activity</a>
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
            <h1 style="margin-bottom: 35px;" >About Journy of Dreams</h1>
            <p>"Journey of Dreams," alternatively known as "Dreams Journey," stands as a cutting-edge web platform, ingeniously crafted to establish a vibrant community centered around the intriguing world of dreams. This unique platform is not just a mere repository of nocturnal narratives; it's a dynamic space where users can meticulously record their dreams, transforming these often fleeting and enigmatic night-time experiences into enthralling stories that can be shared with a wider audience. The essence of this project transcends the boundaries of conventional dream journaling tools, venturing into the realms of cultural and psychological exploration. Here, users can delve into the deeper meanings of their dreams, analyze patterns, and uncover hidden messages that dreams may carry.</p>
            <p>In terms of functionality, "Journey of Dreams" offers a rich tapestry of features that cater to various aspects of dream exploration and community engagement. The platform includes a 'Daily' section, where users can document and track their dreams on a regular basis, offering insights into their subconscious mind over time. The 'Exploring' area serves as a treasure trove of information, where users can delve into different cultural interpretations of dreams and understand the diverse symbolism often found in these mysterious night-time visions. 'Decoding' takes this a step further by allowing users to unravel the meanings of their dreams, aided by expert analyses and community discussions, thus providing a deeper understanding of their subconscious messages.</p>
            <p>In the 'Sharing' section, users are encouraged to share their dream stories, creating a rich repository of dream narratives that others can read and engage with. This not only fosters a sense of community but also helps in identifying common themes and experiences shared among dreamers. The 'Discussing' feature is pivotal in creating an interactive community, where users can engage in meaningful conversations about their dreams, share interpretations, and offer support to each other. Lastly, the 'Activity' section is where the platform really comes alive with various online and offline events like workshops, webinars, and discussions, bringing together dream enthusiasts and experts in a collaborative and enlightening environment.</p>
            <p>The inception of "Journey of Dreams" is rooted in a childhood memory, where the concept of selling and buying dreams was encountered on a Chinese version of an "Amazon"-like website. This intriguing idea laid the foundation for a platform that now serves as a bridge connecting the mysterious world of dreams to our waking reality, allowing for a shared exploration of the depths of the human psyche.</p>
          </div>
          <div id="dailyContent" class="content-item">
            <div id="dailyPuzzle">
              <div class="puzzle-item"></div>
              <div class="puzzle-item"></div>
              <div class="puzzle-item"></div>
              <div class="puzzle-item"></div>
            </div>
          </div>
          <div id="expContent" class="content-item">Exploring</div>
          <div id="decContent" class="content-item">
            <h1 style="margin-top: 30%">Which dream do you want to decode?</h1>
            <div id="decodeSearch">
              <input type="text" id="dreamSearchInput" placeholder="Search your dreams...">
              <button id="dreamSearchButton">Search</button>
            </div>
          </div>
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
          <div id="disContent" class="content-item">Discussing</div>
          <div id="actContent" class="content-item">Activity</div>
        </div>
      </div>
    </div>



    <footer>(C) 2023 Dreams Journey Corp. | Verson 1.0</footer>
  </body>
</html>
