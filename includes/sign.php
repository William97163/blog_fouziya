<!-- sign.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="assets/css/sign.css">
</head>
<body>

<div class="login-container">
    <h2>Sign In</h2>
    <form action="http://localhost:5000/login" method="post">
        <input type="text" name="pseudo" placeholder="pseudo" required>
        <br>
        <input type="mdp" name="mdp" placeholder="mdp" required>
        <br>
        <button type="submit">Sign In</button>
    </form>
</div>

</body>
</html>
