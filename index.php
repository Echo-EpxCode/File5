<?php
session_start();
include "config.php";

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<form method="POST" class="bg-white p-6 rounded shadow w-80">
    <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>

    <?php if (!empty($error)) echo "<p class='text-red-500'>$error</p>"; ?>

    <input type="email" name="email" placeholder="Email" required
        class="w-full mb-3 p-2 border rounded">

    <input type="password" name="password" placeholder="Password" required
        class="w-full mb-3 p-2 border rounded">

    <button name="login"
        class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600">
        Login
    </button>

    <p class="mt-4 text-sm text-center">
        No account?
        <a href="register.php" class="text-blue-500">Register</a>
    </p>
</form>

</body>
</html>
