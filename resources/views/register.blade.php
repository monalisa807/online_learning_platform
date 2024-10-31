<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <style>
        /* General Reset */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Page Background */
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f3f4f6;
        }

        /* Header Styling */
        header {
            width: 100%;
            background-color: #333;
            padding: 10px 20px;
            position: fixed; /* Fixed position */
            top: 0; /* Sticks to the top */
            left: 0;
            z-index: 1000; /* Keeps it above other elements */
        }

        header a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        header a:hover {
            text-decoration: underline;
        }

        /* Form Container */
        .form-container {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-top: 80px; /* Offset for the fixed header */
        }

        /* Form Styling */
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 1rem;
            color: #333;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .form-container {
                padding: 15px;
            }

            header a {
                margin: 0 10px;
            }
        }
    </style>
</head>
<body>
    <header>
        <a href="/">Login</a>
        <a href="/register">Register</a>
    </header>
    
    <div class="form-container">
        <h2>Register</h2>
        <form method="post">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
            
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            
            <label for="role">Role</label>
            <select name="role" id="role" required>
                <option hidden>select your role</option>
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
            </select>
            
            <input type="submit" name="btn" value="Register">
        </form>
    </div>
</body>
</html>
