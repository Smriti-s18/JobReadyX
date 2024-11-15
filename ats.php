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
            background-color: #f8f0e3;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        h1, h2, h3 {
            color: #fbb03b;
        }

        .content-section {
            width: 100%;
            max-width: 900px;
            background-color: #fff;
            color: #333;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 50px 0;
            align-items: center;
        }

        .submit-button {
            background-color: #fbb03b;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            display: inline-block;
        }

        .submit-button:hover {
            background-color: #c06060;
        }

        .suggestions {
            white-space: pre-wrap;
            border: 1px solid #666;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            background-color: #f1f1f1;
        }

        .error-message {
            color: #ff6f6f;
            font-weight: bold;
        }

        .footer_section {
            background-color: #333;
            color: #fff;
            padding: 30px 0;
        }

        .address_text {
            font-size: 24px;
            color: #fff;
            margin-bottom: 20px;
        }

        .footer_text {
            font-size: 16px;
            color: #ddd;
        }

        .location_text ul {
            list-style: none;
            padding: 0;
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

        .update_mail {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .subscribe_bt a img {
            width: 30px;
        }

        .copyright_section {
            background-color: #222;
            color: #ccc;
            padding: 10px 0;
        }

        .copyright_text {
            margin: 0;
        }

        .footer_social_icon ul {
            list-style: none;
            padding: 0;
        }

        .footer_social_icon ul li {
            display: inline;
            margin-right: 10px;
        }

        .footer_social_icon a {
            color: #ccc;
            font-size: 18px;
            text-decoration: none;
        }

        .footer_social_icon a:hover {
            color: #fff;
        }
        
    </style>
</head>
<body>
<?php
    // Start the session
    session_start();

    // Handle file upload and ATS checking
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['resume'])) {
        $resume = $_FILES['resume'];

        // Check if file was uploaded without errors
        if ($resume['error'] === UPLOAD_ERR_OK) {
            // Read the file content
            $fileContent = file_get_contents($resume['tmp_name']);

            // Simple keyword-based ATS analysis
            $keywords = [
                'skills' => 10, 
                'experience' => 10, 
                'education' => 10, 
                'qualification' => 10, 
                'achievements' => 10, 
                'certifications' => 10, 
                'projects' => 10, 
                'languages' => 10, 
                'tools' => 10
            ]; // Example keywords with updated scoring
            $score = 0;
            $suggestions = [];

            foreach ($keywords as $keyword => $points) {
                if (stripos($fileContent, $keyword) !== false) {
                    $score += $points; // Assign score for each keyword found
                } else {
                    $suggestions[] = "Include information about $keyword in your resume.";
                }
            }

            // Store data in session
            $_SESSION['resumeScore'] = $score;
            $_SESSION['suggestions'] = implode("\n", $suggestions); // Store suggestions for displaying

            // Redirect to result page
            header('Location: result.php');
            exit();
        } else {
            $error = "Error uploading the file.";
        }
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
            <form action="" method="post" enctype="multipart/form-data">
                <div class="file-upload-container">
                    <div class="file-upload-box">
                        <p><span class="fa fa-cloud-upload"></span> Upload your resume file</p>
                        <input type="file" name="resume" accept=".doc,.docx,.pdf" required />
                    </div>
                </div>
                <button type="submit" class="submit-button">Analyze Resume</button>
            </form>
            <?php if (isset($error)): ?>
                <div class="error-message"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
        </div>
    </main>
    <!-- <main>
        <div class="content-section">
        <form action="" method="post" enctype="multipart/form-data">
    <div class="file-upload-container">
        <div class="file-upload-box">
            <p><span class="fa fa-cloud-upload"></span> Upload your resume file</p>
            <input type="file" name="resume" accept=".doc,.docx,.pdf" required />
        </div>
    </div>
    <button type="submit" class="submit-button">Analyze Resume</button>
</form>
            -->


<style>
    .file-upload-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 20px 0;
    }

    .file-upload-box {
        background-color: #fff;
        border: 3px dashed #fbb03b;
        border-radius: 15px;
        padding: 50px;
        width: 80%;
        max-width: 600px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .file-upload-box:hover {
        background-color: #fbb03b;
        border-color: #c06060;
    }

    .file-upload-box p {
        font-size: 20px;
        color: #333;
        margin-bottom: 20px;
    }

    .submit-button {
        background-color: #fbb03b;
        color: white;
        padding: 15px 30px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 18px;
        text-align: center;
        margin-top: 20px;
    }

    .submit-button:hover {
        background-color: #fbb03b;
    }

    .suggestions {
        background-color: #fbb03b;
        border: 2px solid #666;
        padding: 10px;
        border-radius: 10px;
        margin-top: 0px;
        max-width: 100%;
        text-align: center;
        font-size: 16px;
        margin-top: -10px;

    }

    pre {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        white-space: pre-wrap;
        word-wrap: break-word;
        font-size: 25px;
        color: #333;
    }

    .error-message {
        color: #ff6f6f;
        font-weight: bold;
        margin-top: 20px;
    }
    .cute-container {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    margin: 0 auto;
    text-align: left;
}

.cute-container h1, 
.cute-container h2, 
.cute-container p {
    color: #333;
}

.cute-container h1 {
    color: #fbb03b;
    font-size: 28px;
}

.cute-container h2 {
    color: #fbb03b;
    font-size: 24px;
}

.cute-container p {
    font-size: 18px;
    line-height: 1.6;
}

.cute-container ul {
    list-style-type: disc;
    margin-left: 20px;
    padding: 0;
}

.cute-container ul li {
    margin-bottom: 10px;
}
ul, li, ol {
    margin: 0px;
    padding: 0px;
    list-style: none;
    font-size: 18px;
}

</style>
<main>
    <div class="content-section">
        <div class="cute-container">
            <h1>Analyze Your Current Resume & Get Score</h1>
            <p>Evaluate your resume's compatibility with Applicant Tracking Systems (ATS) and enhance your chances of landing an interview. Our tool provides detailed feedback and actionable suggestions to improve your resume.</p>

            <h2>Why Check Your Resume Score?</h2>
            <p>Your resume is a critical tool in the job application process. Many employers use ATS to filter resumes before they even reach human hands. By assessing your resume with our tool, you ensure it is optimized to pass through these systems and catch the attention of hiring managers.</p>

            <h2>How It Works</h2>
            <p>Upload your resume, and our ATS Checker will analyze it based on key criteria such as relevance of keywords, formatting, and overall content quality. You will receive a score out of 100, along with personalized suggestions to improve your resume's effectiveness.</p>

            <h2>Features of Our ATS Checker</h2>
            <p><ul>
                <li>Keyword Optimization: Ensure your resume includes relevant industry-specific keywords.</li>
                <li>Content Analysis: Receive feedback on essential sections such as skills, experience, and education.</li>
                <li>Formatting Tips: Learn how to format your resume for better readability and ATS compatibility.</li>
            </ul></p>
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
        <p class="copyright_text">&copy; 2024 JobReadyX. All Rights Reserved.</p>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
</body>
</html>
