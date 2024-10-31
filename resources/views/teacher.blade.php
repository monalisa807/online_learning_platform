<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Header Navigation */
        header {
            display: flex;
            justify-content: flex-start;
            background-color: #333;
            padding: 16px;
            margin-bottom: 20px;
        }

        header a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
            font-weight: bold;
            padding: 8px;
        }

        header a:hover {
            text-decoration: underline;
        }

        /* Container for Form */
        .upload-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Message Styling */
        .message {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
            font-weight: bold;
            color: #555;
        }

        select, input[type="text"], input[type="file"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 1rem;
            color: #333;
        }

        input[type="file"] {
            padding: 5px;
        }

        select, input[type="text"], input[type="file"] {
            margin-bottom: 15px;
        }

        input[type="submit"] {
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <a href="/teacher">Home</a>
        <a href="/fetchVideo">All Videos</a>
        <a href="/logout">Logout</a>
    </header>

    <div class="upload-container">
        <h2>Upload Videos</h2>
        @if(Session::has('message'))
            <p class="message">{{ Session::get('message') }}</p>
        @endif

        <form method="post" enctype="multipart/form-data" action="/upload">
            @csrf
            <label>Subject:</label>
            <select name="subject_id">
                <option hidden>Choose The Subject</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach
            </select>

            <label>Video Title:</label>
            <input type="text" name="title">

            <label>Choose Video:</label>
            <input type="file" name="video">

            <input type="submit" name="btn" value="Upload">
        </form>
    </div>
</body>
</html>
