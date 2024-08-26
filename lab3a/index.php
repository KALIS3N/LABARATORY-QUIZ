<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <!-- Add the Bulma CSS here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script>
        function validateForm() {
            const name = document.querySelector('input[name="complete_name"]').value.trim();
            const email = document.querySelector('input[name="email"]').value.trim();
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            const isNameValid = name !== '';
            const isEmailValid = emailPattern.test(email);
            const isFormValid = isNameValid && isEmailValid;

            document.querySelector('button[type="submit"]').disabled = !isFormValid;
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('input[name="complete_name"]').addEventListener('input', validateForm);
            document.querySelector('input[name="email"]').addEventListener('input', validateForm);
        });
    </script>
</head>
<body>
<section class="section">
    <h1 class="title">User Registration</h1>
    <h2 class="subtitle">
        This is the IPT10 PHP Quiz Web Application Laboratory Activity. Please register
    </h2>
    <!-- Supply the correct HTTP method and target form handler resource -->
    <form method="POST" action="instructions.php">
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" type="text" name="complete_name" placeholder="Complete Name">
            </div>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" name="email" type="email" placeholder="Email">
            </div>
        </div>

        <div class="field">
            <label class="label">Birthdate</label>
            <div class="control">
                <input class="input" name="birthdate" type="date">
            </div>
        </div>

        <div class="field">
            <label class="label">Contact Number</label>
            <div class="control">
                <input class="input" name="contact_number" type="number">
            </div>
        </div>

        <!-- Next button -->
        <button type="submit" class="button is-link">
            Submit 
        </button>
    </form>
</section>

</body>
</html>
        