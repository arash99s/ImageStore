<?php
$var = "";
foreach (glob('Images/*') as $filename) {
    $var .= "<form action='edit.php' id='form' method='POST' class='row'>
    <img class='img' src=".$filename . ">
    <input type = 'button' class='replace' onclick='replace(\"$filename\")' value='replace'>
    <input type = 'button' class='delete' onclick='remove(\"$filename\")' value='delete'>
    <input type = 'file' id='file-input' name='file'>
    <input type='hidden' name='remove' id='remove'>
    </form>";
}

if (isset($_POST["remove"]) && $_POST["remove"]!=""){
    $file = $_POST["remove"];
    echo "<script>
    var ok = alert('file $file' + ' removed' );
    </script>";
    unset($_POST["remove"]);
}

if (isset($_POST["file"]) && $_POST["file"]!=""){
    $file = $_POST["file"];
    echo "<script>
    var ok = alert('file $file' + ' replaced' );
    </script>";
    unset($_POST["file"]);
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
