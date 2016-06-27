<?php
$target_dir = "/input/";
$uid = uniqid("presentation_");
$fileType = pathinfo(basename($_FILES["file"]["name"]),PATHINFO_EXTENSION);
$target_file = $target_dir . $uid . "." . $fileType;
$uploadOk = 1;

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Allow certain file formats
// if($fileType != "pdf" ) {
//     echo "Sorry, only pdf files are allowed.". $fileType;
//     $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// If everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded ". " as " . $uid . ". See <a href='slideshow.php?dir=" . $uid . "'>results</a> or whole <a href='output'>folder</a>.";
    } else {
        echo "Sorry, there was an error uploading your file " . $_FILES["file"]["tmp_name"] . " to " . $target_file;
    }
}
?>