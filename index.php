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
        /* Existing styles */
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

    <!-- Existing header and body content -->
    <header class="header_section header_bg">
        <!-- Existing header content -->
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

    <footer class="footer_section">
        <!-- Existing footer content -->
    </footer>

    <div class="copyright_section">
        <p class="copyright_text">&copy; 2024 JobReadyX.All Rights Reserved.</p>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
</body>
</html>
