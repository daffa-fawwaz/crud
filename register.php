<?php

require 'function.php';

if (isset($_POST["submit"])) {
    register($_POST);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-96">
        <h2 class="text-2xl font-semibold text-center mb-6">Register</h2>
        <form action="" method="post">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" required>
            </div>
            <div>
                <label for="password2" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password2" id="password2" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300" required>
            </div>
            <button type="submit" name="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-500 transition duration-200">Register</button>
        </form>
    </div>
</body>

</html>