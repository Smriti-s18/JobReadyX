<?php
require 'vendor/autoload.php'; // Include Composer's autoloader

use Smalot\PdfParser\Parser as PdfParser;
use PhpOffice\PhpWord\IOFactory as WordIOFactory;

header('Content-Type: application/json');

function extractTextFromPdf($filePath) {
    $parser = new PdfParser();
    $pdf = $parser->parseFile($filePath);
    return $pdf->getText();
}

function extractTextFromWord($filePath) {
    $phpWord = WordIOFactory::load($filePath);
    $text = '';
    foreach ($phpWord->getSections() as $section) {
        $text .= $section->getText();
    }
    return $text;
}

function analyzeResume($fileContent) {
    $wordCount = str_word_count(strip_tags($fileContent));
    $score = min(100, max(0, 50 + ($wordCount / 50))); // Example scoring formula
    $suggestions = [];

    if ($wordCount < 300) {
        $suggestions[] = "Consider adding more content to your resume.";
    }

    // Example: Check for keyword presence (could be more sophisticated)
    if (stripos($fileContent, 'skills') === false) {
        $suggestions[] = "Include a section about your skills.";
    }

    return [
        'score' => $score,
        'suggestions' => $suggestions
    ];
}

if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['resume']['tmp_name'];
    $fileType = $_FILES['resume']['type'];

    $fileContent = '';
    if (strpos($fileType, 'pdf') !== false) {
        $fileContent = extractTextFromPdf($fileTmpPath);
    } elseif (strpos($fileType, 'word') !== false) {
        $fileContent = extractTextFromWord($fileTmpPath);
    } else {
        echo json_encode(['error' => 'Unsupported file type.']);
        exit;
    }

    // Perform analysis
    $analysis = analyzeResume($fileContent);

    // Return analysis result
    echo json_encode($analysis);
} else {
    echo json_encode(['error' => 'File upload error.']);
}
?>
