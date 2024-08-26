<?php

require "helpers.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

$complete_name = $_POST['complete_name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$contact_number = $_POST['contact_number'];
$agree = $_POST['agree'];
$answers = $_POST['answers'] ?? [];

$questions = json_decode (file_get_contents("./questions/triviaquiz.json"), true)['questions'];
$correct_answers = json_decode (file_get_contents("./questions/triviaquiz.json"), true)['answers'];

// Assuming compute_score() is a function that takes the user's answers and the correct answers and returns a score.
$score = compute_score($answers, $correct_answers);

// Convert birthdate format from YYYY-MM-DD to "Month dd, YYYY"
$formatted_birthdate = date("F d, Y", strtotime($birthdate));

// Determine the hero section class based on the score
$hero_class = $score > 2 ? 'is-success' : 'is-danger';

?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/site/site.min.css">
    <script src="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/dist/index.min.js"></script>
</head>
<body>
<section class="hero <?php echo $hero_class; ?>">
    <div class="hero-body">
        <p class="title">Your Score: <?php echo htmlspecialchars($score); ?></p>
        <p class="subtitle">This is the IPT10 PHP Quiz Web Application Laboratory Activity.</p>
    </div>
</section>
<section class="section">
    <div class="table-container">
        <table class="table is-bordered is-hoverable is-fullwidth">
            <tbody>
                <tr>
                    <th>Input Field</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Complete Name</td>
                    <td><?php echo htmlspecialchars($complete_name); ?></td>
                </tr>
                <tr class="is-selected">
                    <td>Email</td>
                    <td><?php echo htmlspecialchars($email); ?></td>
                </tr>
                <tr>
                    <td>Birthdate</td>
                    <td><?php echo htmlspecialchars($formatted_birthdate); ?></td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td><?php echo htmlspecialchars($contact_number); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    
    <div class="table-container" style="margin-top: 20px;">
        <table class="table is-bordered is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Correct Answer</th>
                    <th>Your Answer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($questions as $index => $question): ?>
                <tr>
                    <td><?php echo htmlspecialchars($question['question']); ?></td>
                    <td><?php echo htmlspecialchars($question['options'][array_search($correct_answers[$index], array_column($question['options'], 'key'))]['value']); ?></td>
                    <td><?php echo htmlspecialchars($question['options'][array_search($answers[$index], array_column($question['options'], 'key'))]['value'] ?? 'No Answer'); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php if ($score == 500): ?>
    <canvas id="confetti-canvas"></canvas>
    <script>
        var confettiSettings = {
            target: 'confetti-canvas'
        };
        var confetti = new ConfettiGenerator(confettiSettings);
        confetti.render();
    </script>
    <?php endif; ?>
</section>
</body>
</html>
