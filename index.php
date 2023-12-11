<?php 
    if(isset($_POST['download'])){ // if download btn clicked
        $imgUrl = $_POST['imgurl']; // getting img url from hidden input
        $ch = curl_init($imgUrl); // initializing curl
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // it transfers data as the return value of curl_exec rather than outputting it directly
        $download = curl_exec($ch); // executing curl
        curl_close($ch); //closing curl session
        header('Content-type: image/jpg'); //setting content-type of header to image/jpg so we can get img in jpg not in base64 format
        header('Content-Disposition: attachment; filename="thumbnail.jpg"'); //setting Content-Disposition to attachment to indicating browser this file should download with give file name
        echo $download; //download img in jpg format
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download YouTube Video Thumbnail</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="./script.js" defer></script>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <header>Download Thumbnail</header>
        <div class="url-input">
            <span class="title">Paste video url:</span>
            <div class="field">
                <input type="text" placeholder="https://www.youtube.com/watch?v=lqwdD2ivIbM" required>
                <input class="hidden-input" type="hidden" name="imgurl">
                <div class="bottom-line"></div>
            </div>
        </div>
        <div class="preview-area">
            <img class="thumbnail" src="" alt="thumbnail">
            <i class="icon fas fa-cloud-download-alt"></i>
            <span>Paste video url to see preview</span>
        </div>
        <button class="download-btn" type="submit" name="download">Download Thumbnail</button>
    </form>
</body>
</html>