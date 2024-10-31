<style type="text/css">
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
</style>
<header>
   <a href="/student">Home</a>
   <a href="fetchVideoForStudents">Videos For Students</a>
   <a href="/logout">Logout</a>
</header>
<p>Student {{Session::get('message')}}</p>