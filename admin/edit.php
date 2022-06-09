<?php
session_start();

if(!isset($_SESSION["username"])){
    $newURL = 'login.php';
    header('Location: '.$newURL);
    exit();
}

if (isset($_FILES["file"]) && $_FILES["file"]["name"]!=""){ // replace
    $newFile = $_FILES["file"]["name"];
    $oldFile = $_POST["remove"];
    
    $result = "";
    if (file_exists($oldFile) && unlink($oldFile)) {
        move_uploaded_file($_FILES["file"]["tmp_name"], $oldFile);
        $result = 'file '. $oldFile . ' replaced with '. $newFile;
    } else {
        $result = 'there was a problem replacing the file';
    }

    echo "<script>
    var ok = alert('$result' );
    window.location.replace('edit.php'); // reload page
    </script>";
}
else if (isset($_POST["remove"]) && $_POST["remove"]!=""){ // remove
    $file = $_POST["remove"];
    $result = "";
    if (file_exists($file) && unlink($file)) {
        $result = 'file '. $file . ' removed';
    } else {
        $result = 'there was a problem deleting the file';
    }
    echo "<script>
    var ok = alert('$result');
    window.location.replace('edit.php'); // reload page
    </script>";
}




$var = "";
foreach (glob('Images/*') as $filename) {
    $var .= "<form action='edit.php' id='form' method='POST' enctype='multipart/form-data' class='row'>
    <img class='img' src=".$filename . ">
    <input type = 'button' class='replace' onclick='replace(\"$filename\")' value='replace'>
    <input type = 'button' class='delete' onclick='remove(\"$filename\")' value='delete'>
    <input type = 'file' id='file-input' name='file'>
    <input type='hidden' name='remove' id='remove'>
    </form>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Site</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/edit.css">
    </head>  
    <body>
        
        <div id="main">
            <div class="upper">
                Edit Images
            </div>

            
            <div id="inner">
                <?php echo $var?> 
            </div>
            
        </div>
        
    </body>
    <script src="js/edit.js"></script>
</html>
