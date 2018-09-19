
<?php 

echo "<pre>";

print_r($_FILES['file_upload']);

echo "<pre>";

?>

<form action="upload.php"  enctype="multipart/form-data" method="post">
    <input type="file" name="file_upload"></input>
    <input type="submit" name="submit"></input> 
</form> 

