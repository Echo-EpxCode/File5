<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">
        Welcome, <?php echo $_SESSION['name']; ?> 👋
    </h1>

    <p class="mb-4">You are successfully logged in.</p>

    <a href="logout.php"
       class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
       Logout
    </a>
</div>

</body>
</html>
