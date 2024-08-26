<?php

require "helpers.php";

# Check if the HTTP method used is POST, if it's not POST, redirect to the index.php page
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

$complete_name = $_POST['complete_name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$contact_number = $_POST['contact_number'];
$agree = isset($_POST['agree']) ? $_POST['agree'] : null;

# Load questions from the JSON file
$questions = json_decode(file_get_contents("./questions/triviaquiz.json"), true)['questions'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
    <script>
        // JavaScript function to submit the form after 60 seconds
        function autoSubmitForm() {
            setTimeout(function() {
                document.getElementById('quizForm').submit();
            }, 60000); // 60 seconds
        }

        document.addEventListener('DOMContentLoaded', autoSubmitForm);
    </script>
</head>
<body>
<section class="section">
    <h1 class="title">Quiz</h1>
    <h2 class="subtitle">Please answer all the questions below:</h2>

    <form id="quizForm" method="POST" action="result.php">
        <input type="hidden" name="complete_name" value="<?php echo htmlspecialchars($complete_name); ?>" />
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>" />
        <input type="hidden" name="birthdate" value="<?php echo htmlspecialchars($birthdate); ?>" />
        <input type="hidden" name="contact_number" value="<?php echo htmlspecialchars($contact_number); ?>" />
        <input type="hidden" name="agree" value="<?php echo htmlspecialchars($agree); ?>" />

        <?php foreach ($questions as $question_number => $question): ?>
            <div class="box">
                <h3 class="title is-4">Question <?php echo $question_number + 1; ?></h3>
                <p><?php echo htmlspecialchars($question['question']); ?></p>

                <?php foreach ($question['options'] as $option): ?>
                <div class="field">
                    <div class="control">
                        <label class="radio">
                            <input type="radio"
                                name="answers[<?php echo $question_number; ?>]"
                                value="<?php echo htmlspecialchars($option['key']); ?>" />
                            <?php echo htmlspecialchars($option['value']); ?>
                        </label>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <button type="submit" class="button is-link">Submit Quiz</button>
    </form>
</section>
</body>
</html>
