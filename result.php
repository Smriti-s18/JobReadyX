<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Analysis Results</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        /* General Font Style */
        body {
            font-family: 'Poppins', sans-serif; /* Change to your preferred font */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Header, Footer, and Main Styling */
        .header_section, .footer_section {
            background-color: #f8f9fa; /* Light background for header and footer */
            padding: 20px 0;
        }

        .footer_section {
            background-color: #343a40; /* Dark background for footer */
            color: #fff;
        }

        .footer_section .footer_social_icon ul li a {
            color: #fff;
        }

        /* Main Content */
        main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding: 20px;
        }

        .content-section {
            padding: 20px;
        }

        /* Split Container Layout */
        .split-container {
            display: flex;
            justify-content: space-between;
            margin: 0 auto;
            max-width: 1200px;
            padding: 20px;
        }

        .left-container, .right-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* 3D effect */
            width: 48%;
            flex: 1;
        }

        .left-container h2, .right-container h2 {
            color: #fbb03b;
        }

        .left-container p, .right-container p {
            font-size: 18px;
            line-height: 1.6;
        }

        .left-container ul, .right-container ul {
            list-style-type: disc;
            margin-left: 20px;
        }

        .left-container ul li, .right-container ul li {
            margin-bottom: 10px;
        }
        

        @media (max-width: 768px) {
            .split-container {
                flex-direction: column;
            }

            .left-container, .right-container {
                width: 100%;
                max-width: 100%;
            }
        }
        .footer_social_icon ul {
            list-style: none;
            padding: 0;
        }

        .footer_social_icon ul li {
            display: inline;
            margin-right: 10px;
            color:#a0172f;
        }

        .footer_social_icon a {
            color: #ccc;
            font-size: 18px;
            text-decoration: none;
        }

        .footer_social_icon a:hover {
            color: #fff;
        }
        .fa {
    display: inline-block;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: #8f192d;
}
        
    </style>
</head>
<body>
    <?php
    // Start the session
    session_start();

    // Retrieve data from session
    if (isset($_SESSION['resumeScore']) && isset($_SESSION['suggestions'])) {
        $resumeScore = $_SESSION['resumeScore'];
        $suggestions = $_SESSION['suggestions'];

        // Clear session data
        unset($_SESSION['resumeScore']);
        unset($_SESSION['suggestions']);
    } else {
        // Redirect to home if no data
        header('Location: index.php');
        exit();
    }
    ?>

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
                        <li class="nav-item"><a class="nav-link" href="mock.php">Mock Tests</a></li>
                        <li class="nav-item active"><a class="nav-link" href="ats.php">ATS Checker</a></li>
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
        <div class="content-section">
            <h1>Resume Analysis Results</h1>
            <div class="split-container">
                <div class="left-container">
                    <div class="chart-container">
                        <h2>Resume Score Breakdown</h2>
                        <canvas id="scoreChart"></canvas>
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                var ctx = document.getElementById('scoreChart').getContext('2d');
                                var scoreChart = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        labels: ['Resume Score'],
                                        datasets: [{
                                            label: 'Score',
                                            data: [<?= htmlspecialchars($resumeScore) ?>, 100 - <?= htmlspecialchars($resumeScore) ?>],
                                            backgroundColor: ['#fbb03b', '#ddd']
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        plugins: {
                                            legend: {
                                                position: 'top',
                                            },
                                            tooltip: {
                                                callbacks: {
                                                    label: function (tooltipItem) {
                                                        return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                                                    }
                                                }
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
                    </div>
                    <div class="suggestions">
                        <h2>Suggestions for Improvement</h2>
                        <pre><?= htmlspecialchars($suggestions) ?></pre>
                    </div>
                </div>
                <div class="right-container">
                    <h2>Additional Tips for a Strong Resume</h2>
                    <div class="tips">
                        <ul>
                            <li><strong>Tailor Your Resume:</strong> Customize your resume for each job application by emphasizing the skills and experiences that are most relevant to the position.</li>
                            <li><strong>Use Keywords:</strong> Include industry-specific keywords from the job description to pass through Applicant Tracking Systems (ATS).</li>
                            <li><strong>Keep It Concise:</strong> Aim for a one-page resume if you have less than 10 years of experience. Make sure each section is clear and to the point.</li>
                            <li><strong>Highlight Achievements:</strong> Focus on accomplishments and quantifiable results rather than just listing job duties.</li>
                            <li><strong>Proofread:</strong> Ensure there are no spelling or grammatical errors. A polished resume reflects attention to detail.</li>
                            <li><strong>Use Professional Formatting:</strong> Opt for a clean, professional layout with consistent font sizes and styles. Avoid excessive use of colors and graphics.</li>
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
                            <li>>Nungambakkam, Chennai-600034</li>
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
