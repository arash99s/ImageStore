<?php
    session_start();

    if(!isset($_SESSION["username"])){
        $newURL = 'login.php';
        header('Location: '.$newURL);
        exit();
    }
    setcookie(session_name() , session_id() , time()+60);
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>site</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/panel.css">
    </head>  
    <body>
        
        <div id="main">
            <div class="upper">
                Admin Panel 
            </div>

            
            <div id="inner">
                <form action="upload_file.php" method="post" class="component" 
                onclick="uploadImage()" id="form" enctype="multipart/form-data" >
                    Upload new Image
                    <input id="file-input" type="file" name="file" accept="image/*">
                </form>
                <div class="component" onclick="editImages()">
                    Edit Images
                </div>
            </div>
            <section class="paragraphs" id="paragraphs"> 
            </section>
            
        </div>
        
    </body>
    <script src="js/panel.js"></script>
</html>