<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Container Styling */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
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

        /* Success Message Styling */
        .alert {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* Card Styling */
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        /* Video and Card Body Styling */
        .card video {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
            text-align: center;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }

        .card-text {
            color: #555;
            margin-bottom: 15px;
        }

        /* Button Styling */
        .btn-danger {
            background-color: #ff4d4d;
            border: none;
            padding: 10px 20px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #ff1a1a;
        }
    </style>
</head>
<body>
    <header>
        <a href="/teacher">Home</a>
        <a href="/fetchVideo">All Videos</a>
        <a href="/logout">Logout</a>
    </header>
    <div class="container">
        <h2>All Videos</h2>

        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="row">
            @foreach($datas as $video)
                <div class="col-md-4 mb-4"> <!-- Three columns per row on medium and larger screens -->
                    <div class="card">
                        <video controls>
                            <source src="{{ asset($video->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="card-body">
                            <h5 class="card-title">{{ $video->title }}</h5>
                            <p class="card-text">Subject: {{ $video->subject_name }}</p>
                            <a href="/deleteVideo/{{$video->id}}">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
