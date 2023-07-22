<!DOCTYPE html>
<html>
<head>
    <title>YouTube Video Downloader</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        h2 {
            font-size: 24px;
        }
        form {
            margin-top: 20px;
            text-align: center;
        }
        label {
            display: block;
            font-size: 18px;
            margin-bottom: 10px;
        }
        input[type="text"] {
            font-size: 16px;
            padding: 8px 10px;
            width: 100%;
            max-width: 400px;
            margin-bottom: 10px; /* Tambahkan margin bottom untuk memberikan jarak */
        }
        button {
            font-size: 18px;
            padding: 10px 20px;
            background-color: #ff5722;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #e64a19;
        }
        p {
            font-size: 16px;
            margin-top: 10px;
        }
        a {
            color: #ff5722;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>YouTube Video Downloader</h2>
    <form method="post">
        <label for="videoUrl">Masukkan URL Video YouTube:</label>
        <input type="text" name="videoUrl" id="videoUrl" required>
        <button type="submit" name="download">Convert Video</button>
    </form>

    <?php
    if (isset($_POST['download'])) {
        $videoUrl = $_POST['videoUrl'];

        // Validasi apakah URL YouTube valid
        if (!isValidYouTubeURL($videoUrl)) {
            echo "<p>URL YouTube tidak valid.</p>";
        } else {
            $downloadUrl = generateDownloadURL($videoUrl);
            echo "<p><a href='$downloadUrl' download>Download Video</a></p>";
        }
    }

    function isValidYouTubeURL($url) {
        return preg_match("/^(https?:\/\/)?(www\.)?youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/", $url);
    }

    function generateDownloadURL($url) {
        $dirpyUrl = "https://dirpy.com/studio?url=";
        $affid = "&affid=tubeoffline";
        $utmSource = "&utm_source=tubeoffline&utm_medium=download";
        return $dirpyUrl . urlencode($url) . $affid . $utmSource;
    }
    ?>
</body>
</html>
