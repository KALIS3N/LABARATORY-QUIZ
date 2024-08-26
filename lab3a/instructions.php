<?php
// Check if the HTTP method used is POST; if not, redirect to index.php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

// Retrieve the form data using POST
$complete_name = $_POST['complete_name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$contact_number = $_POST['contact_number'];

// Extract the first name
$first_name = explode(' ', trim($complete_name))[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
    <script>
        function validateForm() {
            const checkbox = document.querySelector('input[name="disagree"]');
            if (!checkbox.checked) {
                alert("You must agree to the terms and conditions before starting the quiz.");
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>
</head>
<body>
<section class="section">
    <h1 class="title">Instructions</h1>
    <h2 class="subtitle">
        Hello <?php echo htmlspecialchars($first_name); ?>, please read the instructions first.
    </h2>

    <!-- Display the instruction -->
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>

    <form method="POST" action="quiz.php" onsubmit="return validateForm();">
        <!-- Hidden inputs to pass data -->
        <input type="hidden" name="complete_name" value="<?php echo htmlspecialchars($complete_name); ?>" />
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>" />
        <input type="hidden" name="birthdate" value="<?php echo htmlspecialchars($birthdate); ?>" />
        <input type="hidden" name="contact_number" value="<?php echo htmlspecialchars($contact_number); ?>" />

        <div class="field">
            <label class="label">Terms and Conditions</label>
            <div class="control">
                <textarea class="textarea" readonly>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <label class="checkbox">
                    <input type="checkbox" name="disagree">
                    I agree to the <a href="#">terms and conditions</a>
                </label>
            </div>
        </div>

        <!-- Start Quiz button -->
        <button type="submit" class="button is-link">
        Start Quiz
        </button>
    </form>
</section>

</body>
</html>
