<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Grid and Card Styling */
        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 16px;
            padding: 16px;
        }

        .video-item {
            background-color: #f9f9f9;
            padding: 8px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .video-wrapper {
            width: 100%;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            border-radius: 8px;
        }

        .video-wrapper video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .video-item h3 {
            font-size: 1rem;
            text-align: center;
            margin-top: 8px;
            font-weight: bold;
            color: #333;
        }

        /* Header Navigation with Search */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .search-box {
            display: flex;
            align-items: center;
        }

        .search-box input[type="text"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 1rem;
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <header>
        <div>
            <a href="/student">Home</a>
            <a href="/fetchVideoForStudents">Videos For Students</a>
            <a href="/logout">Logout</a>
        </div>
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Search by subject name">
        </div>
    </header>
    
    <div class="video-grid" id="videoGrid">
        @foreach($videos as $video)
            <div class="video-item" data-subject="{{ strtolower($video->subject_name) }}">
                <div class="video-wrapper">
                    <video controls>
                        <source src="{{ asset($video->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <h3>{{ $video->title }}</h3>
                <p><strong>Subject:</strong> {{ $video->subject_name }}</p>
                <p><strong>Uploaded by:</strong> {{ $video->name }}</p>
            </div>
        @endforeach
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const videos = document.querySelectorAll('.video-item');

            videos.forEach(video => {
                const subject = video.getAttribute('data-subject');
                if (subject.includes(searchValue)) {
                    video.style.display = 'block';
                } else {
                    video.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
