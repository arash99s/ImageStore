<?php
$result = "";
if ($_FILES["file"]["error"] > 0){
    $result = "Error: " . $_FILES["file"]["error"];
}else{
    //echo "file name Uploaded: " . $_FILES["file"]["name"];
    if (file_exists("Images/" . $_FILES["file"]["name"])) 
    {       
        $result = $_FILES["file"]["name"] . " already exists. ";
    } 
    else 
    {
         move_uploaded_file($_FILES["file"]["tmp_name"], "Images/" . $_FILES["file"]["name"]);
         $result = "Stored in: " . "Images/" . $_FILES["file"]["name"];
    }   
}
echo "<script>
var ok = alert('$result')
window.location.replace('panel.php');
</script>";

?>
