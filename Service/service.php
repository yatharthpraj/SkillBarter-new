<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="service.css">
    <title>Service</title>
</head>

<body>
    <div class="container">
        <nav id="nav">
            <ul class="left-items">
                <li class="other1"><a href="../index.html">Home</a></li>
                <li class="other1"><a href="../Service/service.html">Services</a></li>
                <li class="other"><a href="../Courses/courses.html">Courses</a></li>
                <li class="other"><a href="../About/about.html">About </a></li>
            </ul>
            <div class="center">
                <a href="#" style="text-decoration: none;">
                    <h1>Skill<span>Barter</span></h1>
                </a>
            </div>
            <ul class="right-items">
                <li class="other"><a href="../Register/register.html" target="_blank"
                        onclick="openProfile('form')">Register</a></li>
                <button class="login-btn"
                    onclick="document.querySelector('.form-container').style.display='flex'">Login</button>
            </ul>
        </nav>
        <div class="form-container">
            <div class="login-popup" id="form-popup">

                <button onclick="document.querySelector('.form-container').style.display='none'"><svg
                        xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                        fill="#000000">
                        <path
                            d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                    </svg>
                </button>
                <form action="../login.php" class="form" method="post">
                    <center><h2>Login or Sign up</h2></center>
                    <input type="email" name="Email" id="email" placeholder="Email*" required>
                    <input type="password" name="password" id="password" placeholder="Password*" required>
                    <a>Forgot password?</a>
                    <button type="submit" name="login">Login</button>
                </form>
                <p>New to Website?
                    <a class="create-account" href="./Register/register.html"
                        onclick=" document.querySelector('.form-container').style.display='none'">Create
                        New Account</a>
                </p>
            </div>
        </div>
        <div class="filter-container">
            <div class="filter-header">
                <button class="filter-btn"
                    onclick="document.querySelector('.filter-content').style.display='flex'">Filter By Category</button>
                <div class="create-post">
                    <button onclick="document.querySelector('.create-post-form').style.display='flex'">Create Post
                        +</button>
                    <button onclick="document.getElementById('your-post').style.display='flex'">My Posts</button>
                </div>
            </div>

            <div class="filter-content">
                <div class="filter-checkbox">
                    <h2>Filter by category</h2>
                    <div class="checkbox">
                        <label for="filter-item-1">Filter-1</label>
                        <input type="checkbox" name="filter" id="filter-item-1" value="filter-1">
                        <label for="filter-item-2">Filter-2</label>
                        <input type="checkbox" name="filter" id="filter-item-2" value="filter-2">
                        <label for="filter-item-3">Filter-3</label>
                        <input type="checkbox" name="filter" id="filter-item-3" value="filter-3">
                        <label for="filter-item-4">Filter-4</label>
                        <input type="checkbox" name="filter" id="filter-item-4" value="filter-4">
                        <label for="filter-item-5">Filter-5</label>
                        <input type="checkbox" name="filter" id="filter-item-5" value="filter-5">
                    </div>
                    <button onclick="document.querySelector('.filter-content').style.display='none'">Apply</button>
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
            <form action="../register/register.php" method="POST">
                <label for="skill">Enter your Skill:</label>
                <select id="skills" name="skills">
                        <option value="">Select your skill</option>
                        <option value="programming">Programming</option>
                        <option value="design">Design</option>
                        <option value="marketing">Marketing</option>
                    </select>
                <label for="experience">Experience:</label>
                <input type="number" min="0" max="100" value="0" id="experience" required>

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
                    <textarea name="description" id="description" placeholder="Enter your description here..." cols="52"></textarea>
                <label for="mode">Teaching mode:</label>
                <div class="teaching-modes">
                    <input type="radio" name="mode" id="offline" value="Offline" required>
                    <label for="offline">Offline</label>
                    <input type="radio" name="mode" id="online" value="online" required>
                    <label for="online">Online</label>
                    <input type="radio" name="mode" id="both" value="both" required>
                    <label for="both">Both</label>
                </div>
                <input type="submit" value="Submit" name="submit_skills">
            </form>
        </div>
        <div id="your-post" class="service-container">
            <button class="slider-btn prev-btn">&#10094;</button>
            <div class="slider-wrapper">
                <div class="slider-header">
                    <h1>Your Posts</h1>

                    <button onclick="document.getElementById('your-post').style.display='none'"><svg
                            xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960" width="35    px"
                            fill="#000000">
                            <path
                                d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                        </svg></button>
                </div>
                <div class="slider">
                    <?php
                    include 'fetch_details.php';
                    ?>
                </div>

            </div>
            <button class="slider-btn next-btn">&#10095;</button>
        </div>


        <div id="slider1" class="service-container">
            <button class="slider-btn prev-btn">&#10094;</button>
            <div class="slider-wrapper">
                <h1>Category 1</h1>
                <div class="slider">
                    <div class="card">
                        <div class="contact-details">
                            <div class="card-skill">
                                <h2>Skill</h2>
                            </div>
                            <div class="card-name">
                                <h3>Name:</h3>
                                <p> Lorem, ipsum.</p>
                            </div>
                            <div class="card-desc">
                                <h3>Description:</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, totam? Lorem ipsum
                                    dolor
                                    sit amet.</p>
                            </div>
                            <div class="card-exchange">
                                <h3>Exchange:</h3>
                                <p>Lorem, ipsum, dolor.</p>
                            </div>
                            <div class="card-mode">
                                <h3>Mode:</h3>
                                <p>Offline</p>
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="contact-details">
                            <div class="card-skill">
                                <h2>Skill</h2>
                            </div>
                            <div class="card-name">
                                <h3>Name:</h3>
                                <p> Lorem, ipsum.</p>
                            </div>
                            <div class="card-desc">
                                <h3>Description:</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, totam? Lorem ipsum
                                    dolor
                                    sit amet.</p>
                            </div>
                            <div class="card-exchange">
                                <h3>Exchange:</h3>
                                <p>Lorem, ipsum, dolor.</p>
                            </div>
                            <div class="card-mode">
                                <h3>Mode:</h3>
                                <p>Offline</p>
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="contact-details">
                            <div class="card-skill">
                                <h2>Skill</h2>
                            </div>
                            <div class="card-name">
                                <h3>Name:</h3>
                                <p> Lorem, ipsum.</p>
                            </div>
                            <div class="card-desc">
                                <h3>Description:</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, totam? Lorem ipsum
                                    dolor
                                    sit amet.</p>
                            </div>
                            <div class="card-exchange">
                                <h3>Exchange:</h3>
                                <p>Lorem, ipsum, dolor.</p>
                            </div>
                            <div class="card-mode">
                                <h3>Mode:</h3>
                                <p>Offline</p>
                            </div>
                        </div>

                    </div>
                    <div class="card ">
                        <div class="contact-details">
                            <div class="card-skill">
                                <h2>Skill</h2>
                            </div>
                            <div class="card-name">
                                <h3>Name:</h3>
                                <p> Lorem, ipsum.</p>
                            </div>
                            <div class="card-desc">
                                <h3>Description:</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, totam? Lorem ipsum
                                    dolor
                                    sit amet.</p>
                            </div>
                            <div class="card-exchange">
                                <h3>Exchange:</h3>
                                <p>Lorem, ipsum, dolor.</p>
                            </div>
                            <div class="card-mode">
                                <h3>Mode:</h3>
                                <p>Offline</p>
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="contact-details">
                            <div class="card-skill">
                                <h2>Skill</h2>
                            </div>
                            <div class="card-name">
                                <h3>Name:</h3>
                                <p> Lorem, ipsum.</p>
                            </div>
                            <div class="card-desc">
                                <h3>Description:</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, totam? Lorem ipsum
                                    dolor
                                    sit amet.</p>
                            </div>
                            <div class="card-exchange">
                                <h3>Exchange:</h3>
                                <p>Lorem, ipsum, dolor.</p>
                            </div>
                            <div class="card-mode">
                                <h3>Mode:</h3>
                                <p>Offline</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <button class="slider-btn next-btn">&#10095;</button>
        </div>



        <div id="slider2" class="service-container">
            <button class="slider-btn prev-btn">&#10094;</button>
            <div class="slider-wrapper">
                <h1>Category 2</h1>
                <div class="slider">
                    <div class="card">
                        <div class="contact-details">
                            <div class="card-skill">
                                <h2>Skill</h2>
                            </div>
                            <div class="card-name">
                                <h3>Name:</h3>
                                <p> Lorem, ipsum.</p>
                            </div>
                            <div class="card-desc">
                                <h3>Description:</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, totam? Lorem ipsum
                                    dolor
                                    sit amet.</p>
                            </div>
                            <div class="card-exchange">
                                <h3>Exchange:</h3>
                                <p>Lorem, ipsum, dolor.</p>
                            </div>
                            <div class="card-mode">
                                <h3>Mode:</h3>
                                <p>Offline</p>
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="contact-details">
                            <div class="card-skill">
                                <h2>Skill</h2>
                            </div>
                            <div class="card-name">
                                <h3>Name:</h3>
                                <p> Lorem, ipsum.</p>
                            </div>
                            <div class="card-desc">
                                <h3>Description:</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, totam? Lorem ipsum
                                    dolor
                                    sit amet.</p>
                            </div>
                            <div class="card-exchange">
                                <h3>Exchange:</h3>
                                <p>Lorem, ipsum, dolor.</p>
                            </div>
                            <div class="card-mode">
                                <h3>Mode:</h3>
                                <p>Offline</p>
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="contact-details">
                            <div class="card-skill">
                                <h2>Skill</h2>
                            </div>
                            <div class="card-name">
                                <h3>Name:</h3>
                                <p> Lorem, ipsum.</p>
                            </div>
                            <div class="card-desc">
                                <h3>Description:</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, totam? Lorem ipsum
                                    dolor
                                    sit amet.</p>
                            </div>
                            <div class="card-exchange">
                                <h3>Exchange:</h3>
                                <p>Lorem, ipsum, dolor.</p>
                            </div>
                            <div class="card-mode">
                                <h3>Mode:</h3>
                                <p>Offline</p>
                            </div>
                        </div>

                    </div>
                    <div class="card ">
                        <div class="contact-details">
                            <div class="card-skill">
                                <h2>Skill</h2>
                            </div>
                            <div class="card-name">
                                <h3>Name:</h3>
                                <p> Lorem, ipsum.</p>
                            </div>
                            <div class="card-desc">
                                <h3>Description:</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, totam? Lorem ipsum
                                    dolor
                                    sit amet.</p>
                            </div>
                            <div class="card-exchange">
                                <h3>Exchange:</h3>
                                <p>Lorem, ipsum, dolor.</p>
                            </div>
                            <div class="card-mode">
                                <h3>Mode:</h3>
                                <p>Offline</p>
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="contact-details">
                            <div class="card-skill">
                                <h2>Skill</h2>
                            </div>
                            <div class="card-name">
                                <h3>Name:</h3>
                                <p> Lorem, ipsum.</p>
                            </div>
                            <div class="card-desc">
                                <h3>Description:</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, totam? Lorem ipsum
                                    dolor
                                    sit amet.</p>
                            </div>
                            <div class="card-exchange">
                                <h3>Exchange:</h3>
                                <p>Lorem, ipsum, dolor.</p>
                            </div>
                            <div class="card-mode">
                                <h3>Mode:</h3>
                                <p>Offline</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <button class="slider-btn next-btn">&#10095;</button>
        </div>
        <div id="slider3" class="service-container">
            <button class="slider-btn prev-btn">&#10094;</button>
            <div class="slider-wrapper">
                <h1>Category 3</h1>
                <div class="slider">
                    <div class="card">
                        <div class="contact-details">
                            <div class="card-skill">
                                <h2>Skill</h2>
                            </div>
                            <div class="card-name">
                                <h3>Name:</h3>
                                <p> Lorem, ipsum.</p>
                            </div>
                            <div class="card-desc">
                                <h3>Description:</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, totam? Lorem ipsum
                                    dolor
                                    sit amet.</p>
                            </div>
                            <div class="card-exchange">
                                <h3>Exchange:</h3>
                                <p>Lorem, ipsum, dolor.</p>
                            </div>
                            <div class="card-mode">
                                <h3>Mode:</h3>
                                <p>Offline</p>
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="contact-details">
                            <div class="card-skill">
                                <h2>Skill</h2>
                            </div>
                            <div class="card-name">
                                <h3>Name:</h3>
                                <p> Lorem, ipsum.</p>
                            </div>
                            <div class="card-desc">
                                <h3>Description:</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, totam? Lorem ipsum
                                    dolor
                                    sit amet.</p>
                            </div>
                            <div class="card-exchange">
                                <h3>Exchange:</h3>
                                <p>Lorem, ipsum, dolor.</p>
                            </div>
                            <div class="card-mode">
                                <h3>Mode:</h3>
                                <p>Offline</p>
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="contact-details">
                            <div class="card-skill">
                                <h2>Skill</h2>
                            </div>
                            <div class="card-name">
                                <h3>Name:</h3>
                                <p> Lorem, ipsum.</p>
                            </div>
                            <div class="card-desc">
                                <h3>Description:</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, totam? Lorem ipsum
                                    dolor
                                    sit amet.</p>
                            </div>
                            <div class="card-exchange">
                                <h3>Exchange:</h3>
                                <p>Lorem, ipsum, dolor.</p>
                            </div>
                            <div class="card-mode">
                                <h3>Mode:</h3>
                                <p>Offline</p>
                            </div>
                        </div>

                    </div>
                    <div class="card ">
                        <div class="contact-details">
                            <div class="card-skill">
                                <h2>Skill</h2>
                            </div>
                            <div class="card-name">
                                <h3>Name:</h3>
                                <p> Lorem, ipsum.</p>
                            </div>
                            <div class="card-desc">
                                <h3>Description:</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, totam? Lorem ipsum
                                    dolor
                                    sit amet.</p>
                            </div>
                            <div class="card-exchange">
                                <h3>Exchange:</h3>
                                <p>Lorem, ipsum, dolor.</p>
                            </div>
                            <div class="card-mode">
                                <h3>Mode:</h3>
                                <p>Offline</p>
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="contact-details">
                            <div class="card-skill">
                                <h2>Skill</h2>
                            </div>
                            <div class="card-name">
                                <h3>Name:</h3>
                                <p> Lorem, ipsum.</p>
                            </div>
                            <div class="card-desc">
                                <h3>Description:</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, totam? Lorem ipsum
                                    dolor
                                    sit amet.</p>
                            </div>
                            <div class="card-exchange">
                                <h3>Exchange:</h3>
                                <p>Lorem, ipsum, dolor.</p>
                            </div>
                            <div class="card-mode">
                                <h3>Mode:</h3>
                                <p>Offline</p>
                            </div>
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
                        <li><a href="../index.html">Home</a></li>
                        <li><a href="../About/about.html">About Us</a></li>
                        <li><a href="../index.html#how-it-works">Guide</a></li>
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