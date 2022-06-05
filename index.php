<?php
$var = "";
foreach (glob('admin/Images/*') as $filename) {
    $var .= "<img class='img' onclick='download(\"$filename\")' src=".$filename . ">";
}
?>

<script>
    function download(filepath){
        var filename = filepath.replace(/^.*[\\\/]/, '');
        console.log("downloading : " + filepath);
        var a = document.createElement("a");
        a.href = filepath;
        a.setAttribute("download", filename);
        a.click();
        document.removeChild(a);
    }
</script>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Image Store</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="style/index.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav id="header" class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container" id="navbar">
                <a class="navbar-brand" href="#!">Image Store</a>
                
                <div id="leftnav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="admin">Admin Panel</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <section id="grid" class="main">
            <div class="row">
                <?php echo $var?> 
            </div>
        </section>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>