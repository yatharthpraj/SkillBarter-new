<!-- <?php
session_start(); // Start the session here

if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
    $hideCreatePost = true;
    $hideRightItem = false;

}

?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="service.css">
    <link rel="shortcut icon" href="../Assets/Fav_icon.png" type="image/x-icon">


    <title>Feed</title>
</head>

<body>
    <script>
        function closeSliderBtn(){
            // console.log("Closing slider btn");
            // document.getElementsByClassName("slider-btn").style.display='none';

            document.addEventListener("DOMContentLoaded", () => {
    const nextBtn = document.querySelector(".next-btn");
    const prevBtn = document.querySelector(".prev-btn");

    if (nextBtn) nextBtn.style.display = 'none';
    if (prevBtn) prevBtn.style.display = 'none';
});

            // document.querySelector(".prev-btn").style.display='none';

}
        function togglePassword() {
  const passwordInput = document.getElementById('password');
  const showPasswordCheckbox = document.getElementById('show-password');
  console.log("password function invoked");
  if (showPasswordCheckbox.checked) {
      passwordInput.type = 'text'; // Show password
  } else {
      passwordInput.type = 'password'; // Hide password
  }
}
    </script>
    <div class="container">
        <nav id="nav">
            <button class=" navigation-btn back-btn" onclick="window.history.back();"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg></button>
            <ul class="left-items">
                <li class="other1"><a href="../index.php">Home</a></li>
                <li class="other1"><a href="#">Feed</a></li>
                <li class="other"><a href="../Courses/courses.html">Courses</a></li>
                <li class="other"><a href="../About/about.html">About </a></li>
            </ul>
            <div class="center">
                <a href="#" style="text-decoration: none;">
                    <h1>Skill<span>Barter</span><span id="feed">Feed</span></h1>
                </a>
            </div>
            <ul class="right-items" style="display: <?php echo $hideRightItem ? 'none' : 'flex'; ?>">
                <li class="other"><a href="../Register/register.html" target="_blank"
                        onclick="openProfile('form')">Register</a></li>
                <button class="login-btn"
                    onclick="document.querySelector('.form-container').style.display='flex'">Login</button>
            </ul>
            
            <div class="manage-account" onclick="openManagePostContent();"
                style="display: <?php echo $hideCreatePost ? 'none' : 'flex'; ?>"><button
                    class="manage-account-btn">Manage Account </button></div>
            <div class="manage-post">
                <button
                    onclick="document.getElementById('your-post').style.display='flex';document.querySelector('.manage-post').style.display='none';"><svg
                        xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 -960 960 960"
                        fill="currentcolor" stroke="#000000" stroke-width="0.2">
                        <path
                            d="M120-200q-33 0-56.5-23.5T40-280v-400q0-33 23.5-56.5T120-760h400q33 0 56.5 23.5T600-680v400q0 33-23.5 56.5T520-200H120Zm0-146q44-26 94-40t106-14q56 0 106 14t94 40v-334H120v334Zm200 26q-41 0-80 10t-74 30h308q-35-20-74-30t-80-10Zm0-110q-45 0-77.5-32.5T210-540q0-45 32.5-77.5T320-650q45 0 77.5 32.5T430-540q0 45-32.5 77.5T320-430Zm0-74q15 0 25.5-10.5T356-540q0-15-10.5-25.5T320-576q-15 0-25.5 10.5T284-540q0 15 10.5 25.5T320-504Zm360 304v-560h80v560h-80Zm160 0v-560h80v560h-80ZM320-540Zm0 260Z" />
                    </svg>


                    My
                    Posts</button>
                <button class="create-btn"
                    onclick="document.querySelector('.create-post-form').style.display='flex';document.querySelector('.manage-post').style.display='none';"><svg
                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#000000">
                        <path
                            d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h360v80H200v560h560v-360h80v360q0 33-23.5 56.5T760-120H200Zm120-160v-80h320v80H320Zm0-120v-80h320v80H320Zm0-120v-80h320v80H320Zm360-80v-80h-80v-80h80v-80h80v80h80v80h-80v80h-80Z" />
                    </svg>

                    Create
                    Post</button>
                <form action="../login.php" method="post">
                    <button class="logout-btn" name="logout"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            width="25px" height="25px" fill="currentColor">
                            <path
                                d="M4 4h10a2 2 0 0 1 2 2v3h-2V6H4v12h10v-3h2v3a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" />
                            <path d="M15 16l5-4-5-4v3h-4v2h4v3z" />
                        </svg>
                        Logout</button>
                </form>
            </div>
            <button class="navigation-btn close-btn" onclick="window.history.forward();"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff"><path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z"/></svg></button>
        </nav>

        <div class="buttom-top">
            <button class="up-btn" onclick="scrollToTop()">
                <svg xmlns="http://www.w3.org/2000/svg" height="44px" viewBox="0 -960 960 960" width="44px" fill="#fff">
                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                </svg>
            </button>
        </div>
        <div class="form-container" onclick="openLogin()">
            <div class="login-popup" id="form-popup">
                <button onclick="document.querySelector('.form-container').style.display='none'"><svg
                        xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                        fill="#000000">
                        <path
                            d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                    </svg>
                </button>
                <form action="../login.php" class="form" method="post">
                    <h2>Log in to your account</h2>

                    <input type="email" name="Email" id="email" placeholder="Email*" required>
                    <input type="password" name="password" id="password" placeholder="Password*" required>
                    <label for="show-password" id="show-password-label">
        <input type="checkbox" id="show-password" onclick="togglePassword()"> Show Password
    </label>
                    <!-- <a>Forgot password?</a> -->
                    <button type="submit" name="login">Login</button>
                </form>
                <p>Don't have Account?
                    <a class="create-account" href="../Register/register.html"
                        onclick=" document.querySelector('.form-container').style.display='none'">Create
                        New Account</a>
                </p>
            </div>
        </div>
        <div class="filter-container">
            <div class="filter-header" >
                <button class="filter-btn" onclick="openFilterContent()">Filter By Category
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#111">
                        <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                    </svg>
                </button>
            </div>

            <div class="filter-content">
                <div class="filter-checkbox">
                    <h2>Filter by category</h2>
                    <div class="checkbox">
                        <form action="#" method="post">


                            <div class="filter">
                                <input type="checkbox" name="filter" id="filter-item-1" value="filter-1">
                                <label for="filter-item-1" class="checkbox-label">Programming</label>
                            </div>
                            <div class="filter">
                                <input type="checkbox" name="filter" id="filter-item-2" value="filter-2">
                                <label for="filter-item-2" class="checkbox-label">Music Production</label>
                            </div>
                            <div class="filter">
                                <input type="checkbox" name="filter" id="filter-item-3" value="filter-3">
                                <label for="filter-item-3" class="checkbox-label">Art</label>
                            </div>
                            <div class="filter">
                                <input type="checkbox" name="filter" id="filter-item-4" value="filter-4">
                                <label for="filter-item-4" class="checkbox-label">Stock Market</label>
                            </div>
                            <div class="filter">
                                <input type="checkbox" name="filter" id="filter-item-5" value="filter-5">
                                <label for="filter-item-5" class="checkbox-label">Game Development</label>
                            </div>
                            <button type="button" onclick="filterServices()">Apply</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="create-post-form">
            <div class="post-form-header">
                <h2>Create Your Post</h2>
                <button onclick="document.querySelector('.create-post-form').style.display='none'">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                        fill="#000000">
                        <path
                            d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                    </svg>
                </button>
            </div>
            <form action="../register/register_test.php" method="POST">
                <label for="skill">Enter your Skill:</label>
                <select id="skills" name="skills">
                    <option value="">Select your skill</option>
                    <option value="music-production">Music Production</option>
                    <option value="programming">Programming</option>
                    <option value="art-craft">Arts and Craft</option>
                    <option value="game-development">Game Development</option>
                    <option value="stock-market">Stock Market</option>
                </select>
                <label for="experience">Experience:</label>
                <input type="number" min="0" max="30" name="experience" value="0" placeholder="0" id="experience">

                <label for="exchange-skill">What you want to learn in Exchange:</label>
                <select id="interest" name="interest">
                    <option value="">Select your interest</option>
                    <option value="music-production">Music Production</option>
                    <option value="programming">Programming</option>
                    <option value="art-craft">Arts and Craft</option>
                    <option value="game-development">Game Development</option>
                    <option value="stock-market">Stock Market</option>
                </select>
                <label for="description">Description</label>
                <textarea name="description" id="description" placeholder="Enter your description here..." cols="10"
                    rows="3"></textarea>
                <label for="mobile">Mobile</label>
                <input type="tel" name="mobile" min="10" max="10" id="mobile" placeholder=" +91-9999988822">
                <label for="mode">Teaching mode:</label>
                <div class="teaching-modes">
                    <input type="radio" name="mode" id="offline" value="Offline">
                    <label for="offline">Offline</label>
                    <input type="radio" name="mode" id="online" value="online">
                    <label for="online">Online</label>
                    <input type="radio" name="mode" id="both" value="both">
                    <label for="both">Both</label>
                </div>
                <input type="submit" value="Submit" name="submit_skills">
            </form>
        </div>
        <div id="your-post" class="service-container">
            <button class="slider-btn prev-btn">&#10094;</button>
            <div class="slider-wrapper">
                <div class="slider-header">
                <h1 id="Your-Post-Heading">Your Posts</h1>
                    <button onclick="document.getElementById('your-post').style.display='none'"><svg
                            xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960" width="35px"
                            fill="#000000">
                            <path
                                d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                        </svg></button>
                </div>
                <div class="slider"><?php include 'fetch_details.php'; ?></div>

            </div>
            <button class="slider-btn next-btn">&#10095;</button>
        </div>

        <div id="slider1" class="service-container filter-1">
    <button class="slider-btn prev-btn">&#10094;</button>
    <div class="slider-wrapper">
        <h1>Programming</h1>
        <div class="slider">

            <!-- Card 1 -->
            <div class="card">
                <div class="contact-details">
                    <div class="head">
                        <h2>Programming</h2>
                        <div class="card-desc">
                            <p>Specialized in Python, JavaScript, and efficient algorithms.</p>
                        </div>
                    </div>
                    <div class="title">
                        <div class="card-name">
                            <h3>Name:</h3>
                            <p>Rohit Sharma</p>
                        </div>
                        <div class="card-exchange">
                            <h3>Exchange:</h3>
                            <p>Machine Learning tutorials</p>
                        </div>
                        <div class="card-mode">
                            <h3>Mode:</h3>
                            <p>Online</p>
                        </div>
                        <div class="card-experience">
                            <h3>Experience:</h3>
                            <p>3 years</p>
                        </div>
                        <div class="onclick">
                            <div class="card-more">
                                <h3>About:</h3>
                                <p>Rohit specializes in developing efficient algorithms for machine learning models, with a strong command over Python and JavaScript.</p>
                            </div>
                            <div class="card-mobile">
                                <h3>Contact:</h3>
                                <p>+91-9876543210</p>
                            </div>
                            <div class="card-email">
                                <h3>Email:</h3>
                                <p>rohit.sharma@example.com</p>
                            </div>
                        </div>
                    </div>
                    <button onclick="openDetails(event)" class="open-detail-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="card">
                <div class="contact-details">
                    <div class="head">
                        <h2>Programming</h2>
                        <div class="card-desc">
                            <p>Front-end developer skilled in HTML, CSS, and Vue.js.</p>
                        </div>
                    </div>
                    <div class="title">
                        <div class="card-name">
                            <h3>Name:</h3>
                            <p>Sanya Gupta</p>
                        </div>
                        <div class="card-exchange">
                            <h3>Exchange:</h3>
                            <p>UI/UX design feedback</p>
                        </div>
                        <div class="card-mode">
                            <h3>Mode:</h3>
                            <p>Offline</p>
                        </div>
                        <div class="card-experience">
                            <h3>Experience:</h3>
                            <p>2 years</p>
                        </div>
                        <div class="onclick">
                            <div class="card-more">
                                <h3>About:</h3>
                                <p>Sanya excels at creating intuitive, visually appealing user interfaces and is passionate about refining user experiences.</p>
                            </div>
                            <div class="card-mobile">
                                <h3>Contact:</h3>
                                <p>+91-9123456789</p>
                            </div>
                            <div class="card-email">
                                <h3>Email:</h3>
                                <p>sanya.gupta@example.com</p>
                            </div>
                        </div>
                    </div>
                    <button onclick="openDetails(event)" class="open-detail-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="card">
                <div class="contact-details">
                    <div class="head">
                        <h2>Programming</h2>
                        <div class="card-desc">
                            <p>Expert in Node.js, Django, and database management.</p>
                        </div>
                    </div>
                    <div class="title">
                        <div class="card-name">
                            <h3>Name:</h3>
                            <p>Aakash Patel</p>
                        </div>
                        <div class="card-exchange">
                            <h3>Exchange:</h3>
                            <p>Cloud computing tutorials</p>
                        </div>
                        <div class="card-mode">
                            <h3>Mode:</h3>
                            <p>Online</p>
                        </div>
                        <div class="card-experience">
                            <h3>Experience:</h3>
                            <p>4 years</p>
                        </div>
                        <div class="onclick">
                            <div class="card-more">
                                <h3>About:</h3>
                                <p>Aakash has extensive experience with cloud infrastructure and is skilled at building scalable backend systems using Node.js and Django.</p>
                            </div>
                            <div class="card-mobile">
                                <h3>Contact:</h3>
                                <p>+91-9988776655</p>
                            </div>
                            <div class="card-email">
                                <h3>Email:</h3>
                                <p>aakash.patel@example.com</p>
                            </div>
                        </div>
                    </div>
                    <button onclick="openDetails(event)" class="open-detail-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="card">
                <div class="contact-details">
                    <div class="head">
                        <h2>Programming</h2>
                        <div class="card-desc">
                            <p>Mobile app developer skilled in Flutter and Swift.</p>
                        </div>
                    </div>
                    <div class="title">
                        <div class="card-name">
                            <h3>Name:</h3>
                            <p>Anjali Verma</p>
                        </div>
                        <div class="card-exchange">
                            <h3>Exchange:</h3>
                            <p>Backend development guidance</p>
                        </div>
                        <div class="card-mode">
                            <h3>Mode:</h3>
                            <p>Offline</p>
                        </div>
                        <div class="card-experience">
                            <h3>Experience:</h3>
                            <p>5 years</p>
                        </div>
                        <div class="onclick">
                            <div class="card-more">
                                <h3>About:</h3>
                                <p>Anjali is experienced in building cross-platform mobile applications and mentoring developers in backend technologies.</p>
                            </div>
                            <div class="card-mobile">
                                <h3>Contact:</h3>
                                <p>+91-9871234567</p>
                            </div>
                            <div class="card-email">
                                <h3>Email:</h3>
                                <p>anjali.verma@example.com</p>
                            </div>
                        </div>
                    </div>
                    <button onclick="openDetails(event)" class="open-detail-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="card">
                <div class="contact-details">
                    <div class="head">
                        <h2>Programming</h2>
                        <div class="card-desc">
                            <p>Game developer with Unity and C# expertise.</p>
                        </div>
                    </div>
                    <div class="title">
                        <div class="card-name">
                            <h3>Name:</h3>
                            <p>Raghav Kumar</p>
                        </div>
                        <div class="card-exchange">
                            <h3>Exchange:</h3>
                            <p>3D modeling tips</p>
                        </div>
                        <div class="card-mode">
                            <h3>Mode:</h3>
                            <p>Online</p>
                        </div>
                        <div class="card-experience">
                            <h3>Experience:</h3>
                            <p>3 years</p>
                        </div>
                        <div class="onclick">
                            <div class="card-more">
                                <h3>About:</h3>
                                <p>Raghav is passionate about game development and proficient in Unity and C#, working on both 2D and 3D game projects.</p>
                            </div>
                            <div class="card-mobile">
                                <h3>Contact:</h3>
                                <p>+91-9812345678</p>
                            </div>
                            <div class="card-email">
                                <h3>Email:</h3>
                                <p>raghav.kumar@example.com</p>
                            </div>
                        </div>
                    </div>
                    <button onclick="openDetails(event)" class="open-detail-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>
    <button class="slider-btn next-btn">&#10095;</button>
</div>




        <div id="slider2" class="service-container filter-2">
            <button class="slider-btn prev-btn">&#10094;</button>
            <div class="slider-wrapper">
                <h1>Music Production</h1>
                <div class="slider">
                    <!-- Card 1 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Music Production</h2>
                                <div class="card-desc">
                                    <p>I specialize in producing cinematic soundtracks.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Arjun Singh</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Web Development</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Online</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>3 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Arjun is known for his ability to create dynamic cinematic soundtracks that
                                            bring visuals to life.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9123456780</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>arjun.singh@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn"><svg
                                    xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg></button>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Music Production</h2>
                                <div class="card-desc">
                                    <p>Creating catchy jingles for advertisements.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Ananya Patel</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Social Media Management</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Offline</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>1.5 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Ananya excels in creating memorable jingles that resonate with audiences and
                                            reinforce brand messages.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9837654321</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>ananya.patel@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn"><svg
                                    xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg></button>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Music Production</h2>
                                <div class="card-desc">
                                    <p>Specialist in EDM track production and remixes.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Ravi Kumar</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Photography</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Online</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>2 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Ravi is passionate about producing EDM tracks that energize listeners with
                                            electrifying beats and unique remixes.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9988123456</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>ravi.kumar@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn"><svg
                                    xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg></button>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Music Production</h2>
                                <div class="card-desc">
                                    <p>I compose background scores for indie films.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Priya Reddy</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Graphic Design</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Offline</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>4 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Priya creates soulful background scores that complement the emotional depth
                                            of indie films.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9876543210</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>priya.reddy@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn"><svg
                                    xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg></button>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Music Production</h2>
                                <div class="card-desc">
                                    <p>Producing lo-fi beats for study and relaxation.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Vikas Mehta</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Video Editing</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Online</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>2.5 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Vikas produces relaxing lo-fi beats perfect for studying or unwinding after a
                                            long day.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9123459876</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>vikas.mehta@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn"><svg
                                    xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg></button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="slider-btn next-btn">&#10095;</button>
        </div>


        <div id="slider3" class="service-container filter-3">
            <button class="slider-btn prev-btn">&#10094;</button>
            <div class="slider-wrapper">
                <h1>Art</h1>
                <div class="slider">
                    <!-- Card 1 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Art</h2>
                                <div class="card-desc">
                                    <p>Specializes in abstract painting and mixed media art.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Priya Sharma</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Content Writing</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Offline</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>5 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Priya creates visually striking abstract paintings and is known for her
                                            innovative use of mixed media techniques.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9876543210</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>priya.sharma@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Art</h2>
                                <div class="card-desc">
                                    <p>Painter and sculptor specializing in modern art.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Amit Verma</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Web Design</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Online</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>3 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Amit blends contemporary ideas with traditional techniques to create
                                            thought-provoking paintings and sculptures.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9876543211</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>amit.verma@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Art</h2>
                                <div class="card-desc">
                                    <p>Focuses on watercolor landscapes and illustrations.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Neha Gupta</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Social Media Management</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Offline</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>4 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Neha's serene watercolor landscapes and detailed illustrations have won
                                            acclaim for their beauty and intricacy.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9876543212</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>neha.gupta@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Art</h2>
                                <div class="card-desc">
                                    <p>Expert in charcoal drawings and sketches.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Ravi Kumar</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>SEO Services</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Online</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>6 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Ravi's mastery of charcoal captures the nuances of light and shadow, creating
                                            stunningly realistic sketches.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9876543213</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>ravi.kumar@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Art</h2>
                                <div class="card-desc">
                                    <p>Creates unique digital art using Photoshop and Illustrator.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Simran Kaur</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Photography</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Online</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>2 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Simran uses digital tools to craft visually captivating art that blends
                                            technology and creativity.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9876543214</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>simran.kaur@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="slider-btn next-btn">&#10095;</button>
        </div>





        <div id="slider4" class="service-container filter-4">
            <button class="slider-btn prev-btn">&#10094;</button>
            <div class="slider-wrapper">
                <h1>Stock Market</h1>
                <div class="slider">
                    <!-- Card 1 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Stock Market</h2>
                                <div class="card-desc">
                                    <p>Expert in technical analysis and stock predictions.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Aarav Sharma</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Investment Strategies</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Online</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>3 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Aarav specializes in deciphering complex stock market patterns, using
                                            advanced technical analysis to guide investors.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9123456780</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>aarav.sharma@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Stock Market</h2>
                                <div class="card-desc">
                                    <p>Focused on stock market analysis and risk management.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Priya Verma</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Stock Trading Tips</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Offline</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>2 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Priya excels in minimizing risks through meticulous market analysis and
                                            strategic investment planning.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9837654321</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>priya.verma@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Stock Market</h2>
                                <div class="card-desc">
                                    <p>Specializes in stock market investment and portfolio management.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Vikram Singh</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Financial Planning</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Online</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>4 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Vikram provides tailored portfolio strategies to help investors achieve their
                                            long-term financial goals.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9988123456</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>vikram.singh@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Stock Market</h2>
                                <div class="card-desc">
                                    <p>Helps with stock market trend analysis and predictions.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Meera Joshi</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Trading Software Insights</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Offline</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>3.5 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Meera uses advanced tools to analyze stock market trends, offering
                                            predictions that help traders make informed decisions.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9876543210</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>meera.joshi@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Stock Market</h2>
                                <div class="card-desc">
                                    <p>Expert in stock trading and market behavior analysis.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Ravi Kumar</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Technical Analysis Methods</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Online</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>5 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Ravi is skilled in analyzing market behavior, providing actionable insights
                                            for successful stock trading.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9123459876</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>ravi.kumar@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="slider-btn next-btn">&#10095;</button>
        </div>




        <div id="slider5" class="service-container filter-5">
            <button class="slider-btn prev-btn">&#10094;</button>
            <div class="slider-wrapper">
                <h1>Game Development</h1>
                <div class="slider">
                    <!-- Card 1 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Game Development</h2>
                                <div class="card-desc">
                                    <p>Specialized in 2D and 3D game design and development.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Rajesh Kumar</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Game Art Design</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Online</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>3 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Rajesh combines creativity and technical expertise to develop immersive 2D
                                            and 3D gaming experiences.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9123456780</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>rajesh.kumar@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Game Development</h2>
                                <div class="card-desc">
                                    <p>Focused on creating mobile and PC games.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Neha Patel</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Game Sound Design</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Offline</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>2 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Neha excels in creating engaging gameplay for mobile and PC platforms,
                                            integrating innovative sound design.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9837654321</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>neha.patel@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Game Development</h2>
                                <div class="card-desc">
                                    <p>Experienced in Unity and Unreal Engine for game development.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Amit Reddy</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Game Testing</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Online</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>4 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Amit leverages his expertise in Unity and Unreal Engine to create captivating
                                            and high-performing games.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9988123456</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>amit.reddy@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Game Development</h2>
                                <div class="card-desc">
                                    <p>Expert in developing VR games and interactive experiences.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Pooja Singh</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Game Animation</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Offline</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>3.5 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Pooja is a pioneer in VR game development, creating immersive and interactive
                                            gaming environments.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9876543210</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>pooja.singh@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="card">
                        <div class="contact-details">
                            <div class="head">
                                <h2>Game Development</h2>
                                <div class="card-desc">
                                    <p>Proficient in creating mobile games using C# and Unity.</p>
                                </div>
                            </div>
                            <div class="title">
                                <div class="card-name">
                                    <h3>Name:</h3>
                                    <p>Vikram Chauhan</p>
                                </div>
                                <div class="card-exchange">
                                    <h3>Exchange:</h3>
                                    <p>Game UI Design</p>
                                </div>
                                <div class="card-mode">
                                    <h3>Mode:</h3>
                                    <p>Online</p>
                                </div>
                                <div class="card-experience">
                                    <h3>Experience:</h3>
                                    <p>5 years</p>
                                </div>
                                <div class="onclick">
                                    <div class="card-more">
                                        <h3>About:</h3>
                                        <p>Vikram specializes in optimizing mobile games with polished UI designs for
                                            seamless user experiences.</p>
                                    </div>
                                    <div class="card-mobile">
                                        <h3>Contact:</h3>
                                        <p>+91-9123459876</p>
                                    </div>
                                    <div class="card-email">
                                        <h3>Email:</h3>
                                        <p>vikram.chauhan@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="openDetails(event)" class="open-detail-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#000000">
                                    <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="slider-btn next-btn">&#10095;</button>
        </div>





        <footer>
            <div class="footer-container" id="footer">
                <div class="section">
                    <div class="center">
                        <h1>Skill<span>Barter</span></h1>
                    </div>
                    <p class="footer-text">SkillBarter is a platform made by students, for students who want to learn
                        and
                        gain skills without spending money. Here we provide an interactive place for students to
                        exchange
                        their skills and communicate.</p>
                    <div class="all-socials">
                        <img class="social-icons" src="../Assets/youtube.png" alt="">
                        <img class="social-icons" src="../Assets/social.png" alt="">
                        <img class="social-icons" src="../Assets/facebook.png" alt="">
                    </div>
                </div>
                <div class="section">
                    <h2>Navigation</h2>
                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../About/about.html">About Us</a></li>
                        <li><a href="../Service/service.php">Our Feed</a></li>
                        <li><a href="../Courses/courses.html">Courses</a></li>
                        <li><a href="../HelpAndSupport/support.html">Help And Support</a></li>
                    </ul>
                </div>
                <div class="section">
                    <h2>Get In Touch</h2>
                    <pre><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 -960 960 960" width="15px" fill="#111  "><path d="M480.21-480Q510-480 531-501.21t21-51Q552-582 530.79-603t-51-21Q450-624 429-602.79t-21 51Q408-522 429.21-501t51 21ZM480-191q119-107 179.5-197T720-549q0-105-68.5-174T480-792q-103 0-171.5 69T240-549q0 71 60.5 161T480-191Zm0 95Q323.03-227.11 245.51-339.55 168-452 168-549q0-134 89-224.5T479.5-864q133.5 0 223 90.5T792-549q0 97-77 209T480-96Zm0-456Z"/></svg>   <span class="foot-dets">Lorem ipsum.</span></pre>
                    <pre><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 -960 960 960" width="15px" fill="#111  "><path d="M763-145q-121-9-229.5-59.5T339-341q-86-86-135.5-194T144-764q-2-21 12.29-36.5Q170.57-816 192-816h136q17 0 29.5 10.5T374-779l24 106q2 13-1.5 25T385-628l-97 98q20 38 46 73t57.97 65.98Q422-361 456-335.5q34 25.5 72 45.5l99-96q8-8 20-11.5t25-1.5l107 23q17 5 27 17.5t10 29.5v136q0 21.43-16 35.71Q784-143 763-145ZM255-600l70-70-17.16-74H218q5 38 14 73.5t23 70.5Zm344 344q35.1 14.24 71.55 22.62Q707-225 744-220v-90l-75-16-70 70ZM255-600Zm344 344Z"/></svg> <span class="foot-dets">+91-1234567890</span> </pre>

                    <pre><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 -960 960 960" width="15px" fill="#111  "><path d="M168-192q-29.7 0-50.85-21.16Q96-234.32 96-264.04v-432.24Q96-726 117.15-747T168-768h624q29.7 0 50.85 21.16Q864-725.68 864-695.96v432.24Q864-234 842.85-213T792-192H168Zm312-240L168-611v347h624v-347L480-432Zm0-85 312-179H168l312 179Zm-312-94v-85 432-347Z"/></svg>  <span class="foot-dets">skillbarter@gmail.com</span> </pre>

                    </pre>
                </div>
                <!-- </div> -->
            </div>
        </footer>
        
    </div>

    <script src="service.js"></script>
</body>

</html>