<?php
include "config.php";

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, email, password)
              VALUES ('$name', '$email', '$password')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Email already exists!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<form method="POST" class="bg-white p-6 rounded shadow w-80">
    <h2 class="text-2xl font-bold mb-4 text-center">Register</h2>

    <?php if (!empty($error)) echo "<p class='text-red-500'>$error</p>"; ?>

    <input type="text" name="name" placeholder="Name" required
        class="w-full mb-3 p-2 border rounded">

    <input type="email" name="email" placeholder="Email" required
        class="w-full mb-3 p-2 border rounded">

    <input type="password" name="password" placeholder="Password" required
        class="w-full mb-3 p-2 border rounded">

    <button name="register"
        class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
        Register
    </button>

    <p class="mt-4 text-sm text-center">
        Already have an account?
        <a href="index.php" class="text-blue-500">Login</a>
    </p>
</form>

</body>
</html>
