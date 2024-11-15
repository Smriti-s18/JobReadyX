<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATS Resume Checker</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        h1, h2, h3 {
            color: #fbb03b;
        }

        .header_section {
            width: 100%;
            background-color: #ffffff;
            padding: 15px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .navbar-nav .nav-link {
            font-size: 1rem;
            color: #333;
        }

        .navbar-nav .nav-link.active {
            color: #4a90e2;
        }

        .navbar-nav .nav-link:hover {
            color: #4a90e2;
        }

        .submit-button {
            background-color: #4a90e2;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: #357abd;
        }

        .content-section {
            width: 100%;
            max-width: 1000px;
            background-color: #ffffff;
            color: #333;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 40px 0;
        }

        .section {
            margin-bottom: 40px;
        }

        .section h2 {
            border-bottom: 2px solid #4a90e2;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .topics ul {
            /* padding-left: 20px; */
            list-style-type:circle;
        }

        .topics ul li {
            margin-bottom: 10px;
            font-size: 15px;
            font-weight: 300;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .suggestions {
            white-space: pre-wrap;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            background-color: #f9f9f9;
        }

        .error-message {
            color: #d9534f;
            font-weight: bold;
        }

        .footer_section {
            background-color: #333;
            color: #fff;
            padding: 40px 0;
            text-align: center;
        }

        .address_text {
            font-size: 28px;
            color: #fff;
            margin-bottom: 20px;
        }

        .location_text ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .location_text ul li {
            margin-bottom: 10px;
        }

        .location_text a {
            color: #fff;
            text-decoration: none;
        }

        .location_text a:hover {
            text-decoration: underline;
        }

        .footer_social_icon ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer_social_icon ul li {
            display: inline;
            margin-right: 15px;
        }

        .footer_social_icon a {
            color: #fff;
            font-size: 20px;
            text-decoration: none;
        }

        .footer_social_icon a:hover {
            color: #4a90e2;
        }

        .copyright_section {
            background-color: #222;
            color: #ccc;
            padding: 15px 0;
            text-align: center;
        }

        .copyright_text {
            margin: 0;
        }

        .update_mail {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 20px;
        }

        .subscribe_bt a img {
            width: 30px;
        }
        .topics ul {
    list-style-type: disc;
    padding-left: 20px; /* Add padding for better alignment */
    color: #333; /* Ensure bullet color contrasts with the background */
}

.topics li {
    margin-bottom: 10px; /* Space between list items */
}

.suggestions ul {
    list-style-type: disc;
    padding-left: 20px; /* Add padding for better alignment */
    color: #333; /* Ensure bullet color contrasts with the background */
}

.suggestions li {
    margin-bottom: 10px; /* Space between list items */
}

.error-message ul {
    list-style-type: disc;
    padding-left: 20px; /* Add padding for better alignment */
    color: #333; /* Ensure bullet color contrasts with the background */
}

.error-message li {
    margin-bottom: 10px; /* Space between list items */
}
.topics ul, .suggestions ul, .error-message ul {
    list-style-type: none; /* Remove default bullets */
    padding-left: 0; /* Remove default padding */
}

.topics li, .suggestions li, .error-message li {
    position: relative;
    padding-left: 25px; /* Add space for custom bullet */
    margin-bottom: 10px; /* Space between list items */
}

.topics li::before, .suggestions li::before, .error-message li::before {
    content: '•'; /* Unicode bullet character */
    color: #333; /* Bullet color */
    font-size: 1.2em; /* Bullet size */
    position: absolute;
    left: 0;
    top: 0;
}
.topics a, .suggestions a, .error-message a {
    color:#fbb03b; /* Set link color */
    text-decoration: none; /* Remove underline from links */
}

.topics a:hover, .suggestions a:hover, .error-message a:hover {
    color:#fbb03b; /* Change link color on hover */
    text-decoration: underline; /* Underline links on hover for better visibility */
}


    </style>
</head>

<body>

<header class="header_section header_bg">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.html"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="about.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="news.html">News</a></li>
                        <li class="nav-item active"><a class="nav-link" href="mock.php">Mock Tests</a></li>
                        <li class="nav-item"><a class="nav-link" href="ats.php">ATS Checker</a></li>
                        <li class="nav-item"><a class="nav-link" href="company.php">Company Listing</a></li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <div class="login_bt">
                            <ul style="color:#222">
                                <li><a href="login.html" style="color:#222"><span class="user_icon"><i class="fa fa-user" aria-hidden="true" style="color:#222"></i></span>Login</a></li>
                                <!-- <li><a href="#"><i class="fa fa-search" aria-hidden="true" style="color:#222"></i></a></li> -->
                            </ul>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="content-section">
                <h1>Aptitude Tests for Internships and Placements</h1>

                <div class="section">
                    <h2>Verbal Reasoning</h2>
                    <p>Hone your verbal reasoning skills to excel in competitive placements and internship exams.</p>
                    <div class="topics">
                        <h3>Topics Covered:</h3>
                        <ul>
                            <li>Synonyms & Antonyms</li>
                            <li>Sentence Completion</li>
                            <li>Reading Comprehension</li>
                            <li>Sentence Rearrangement</li>
                            <li>Spotting Errors</li>
                        </ul>
                    </div>
                    <div>
                        <h3>Practice Links:</h3>
                        <ul>
                            <li><a href="https://www.jobtestprep.co.uk/verbal-reasoning-practice-test">Verbal Reasoning Practice Set 1</a></li>
                            <li><a href="https://www.ssbinterviewtips.in/online-tests/ssb-intelligence-test-verbal-reasoning-mock-test-1/71">Verbal Reasoning Practice Set 2</a></li>
                            <li><a href="https://www.worldwisetutoring.com/wp-content/uploads/2019/11/ETS-GRE-Verbal-practice-questions-2014.pdf">Verbal Reasoning Advanced Test</a></li>
                        </ul>
                    </div>
                </div>

                <div class="section">
                    <h2>Logical Reasoning</h2>
                    <p>Sharpen your logical thinking to solve problems under timed conditions.</p>
                    <div class="topics">
                        <h3>Topics Covered:</h3>
                        <ul>
                            <li>Blood Relations</li>
                            <li>Series Completion</li>
                            <li>Puzzle Solving</li>
                            <li>Coding-Decoding</li>
                            <li>Analogy Problems</li>
                        </ul>
                    </div>
                    <div>
                        <h3>Practice Links:</h3>
                        <ul>
                            <li><a href="https://www.indiabix.com/logical-reasoning/questions-and-answers/">Logical Reasoning Beginner Test</a></li>
                            <li><a href="https://www.naukri.com/campus/career-guidance/65-logical-reasoning-questions-and-answers-for-freshers">Logical Reasoning Intermediate Set</a></li>
                            <li><a href="https://www.ambitionbox.com/topics/logical-reasoning/questions-and-answers/number-series">Logical Reasoning Advanced Test</a></li>
                        </ul>
                    </div>
                </div>

                <div class="section">
                    <h2>Quantitative Aptitude</h2>
                    <p>Improve your numerical abilities to tackle quantitative problems effectively.</p>
                    <div class="topics">
                        <h3>Topics Covered:</h3>
                        <ul>
                            <li>Arithmetic</li>
                            <li>Algebra</li>
                            <li>Geometry</li>
                            <li>Data Interpretation</li>
                            <li>Number Series</li>
                        </ul>
                    </div>
                    <div>
                        <h3>Practice Links:</h3>
                        <ul>
                            <li><a href="https://www.javatpoint.com/aptitude/quantitative">Quantitative Aptitude Basic Test</a></li>
                            <li><a href="https://www.indiabix.com/aptitude/questions-and-answers/">Quantitative Aptitude Intermediate Set</a></li>
                            <li><a href="https://www.geeksforgeeks.org/quantitative-aptitude/">Quantitative Aptitude Advanced Test</a></li>
                        </ul>
                    </div>
                </div>

                <div class="section">
                    <h2>Mock Tests</h2>
                    <p>Take full-length mock tests to simulate the exam environment and assess your preparation.</p>
                    <div>
                        <h3>Mock Test Links:</h3>
                        <ul>
                            <li><a href="https://www.indiabix.com/online-test/aptitude-test/1">Aptitude Mock Test 1</a></li>
                            <li><a href="https://www.indiabix.com/online-test/aptitude-test/2">Aptitude Mock Test 2</a></li>
                            <li><a href="https://www.indiabix.com/online-test/aptitude-test/3">Aptitude Mock Test 3</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <footer class="footer_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="address_text">Address</div>
                    <div class="location_text">
                        <ul>
                            <li>M.O.P Vaishnav College for Women</li>
                            <li>Nungambakkam, Chennai-600034</li>
                            <li>Phone: 981095817  |  9382633966</></li>
                            <li><a href="#">Email: 2313711058046@mopvaishnav.ac.in  |  2313711058004@mopvaishnav.ac.in</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer_text">
                        <p>&copy; 2024 JobReadyX. All Rights Reserved.</p>
                        <div class="footer_social_icon">
                            <ul>
                                <li><a href="https://www.facebook.com/MOPVaishnavCollegeforWomen/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://in.linkedin.com/school/m-o-p-vaishnav-college-for-women/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.instagram.com/mopvcfw/?igshid=r8dcc24adg9u"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright_section">
        <p class="copyright_text">&copy; 2024 JobReadyX.All Rights Reserved.</p>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
</body>

</html>
