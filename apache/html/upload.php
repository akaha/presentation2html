<?php
$target_dir = "/input/";
$uid = uniqid("presentation_");
$target_file = $target_dir . $uid . ".pdf";
$uploadOk = 1;
$fileType = pathinfo(basename($_FILES["pdf"]["name"]),PATHINFO_EXTENSION);

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Allow certain file formats
if($fileType != "pdf" ) {
    echo "Sorry, only pdf files are allowed.". $fileType;
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// If everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["pdf"]["name"]). " has been uploaded. See <a href='slideshow.php?dir=" . $uid . "'>results</a>";
    } else {
        echo "Sorry, there was an error uploading your file " . $_FILES["pdf"]["tmp_name"] . " to " . $target_file;
    }
}
?>