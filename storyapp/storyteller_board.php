<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tell a Story</title>
    <link rel="stylesheet" href="storyteller_board.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
    </style>
</head>

<body>
<h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to your Dashboard</h1>
        
    <p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;"></p>
    <button><p><label for="file" style="cursor: pointer;">Click To Upload Your Image</label></p></button>
    <p><img id="output" width="200" /></p>

    <script>
        var loadFile = function (event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

    <div id="editer" contenteditable="true">
    </div>
    <div>
        <button type="submit" name="upload">UPLOAD</button>
    </div>

    <script type="text/javascript" language="javascript">
    var editer = document.getElementById('editer');
    function uploadFile(e) {
        Let file = e.target.files[0]; //Image to be uploaded to the background
        //Upload the background, omitted here. . . . . . . . . . .
        //filePath is the image address returned in the background
        editer.focus();
        document.execCommand('InsertImage', false, filePath);
    }
</script>

</body>
</html>

<footer><p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">LOG OUT</a>
    </p></footer>
