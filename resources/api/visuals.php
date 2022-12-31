<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST["add"])) {
        $surveyId = $_POST["id"];

        $target_dir = "../results/survey-" . $surveyId;
        
        $status = $_POST['status'];
        if ($status == 3) {
            $target_dir .= "/low";
        } else if ($status == 2) {
            $target_dir .= "/mid";
        } else {
            $target_dir .= "/high";
        }
        

        $target_file = $target_dir . basename($_FILES["visual"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

         // Check if survey
        if ($surveyId == 0) {
            echo "Please choose a survey.";
            $uploadOk = 0;
        }

        // Check if file already exists
        else if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($fileType != "jpg" && $fileType != "jpeg"
            && $fileType != "mp4" && $fileType != "mp3") {
            echo "Sorry, only JPG, JPEG, MP4, and MP3 files are allowed.";
            $uploadOk = 0;
        }

        else {
            if ($fileType == "jpg" || $fileType == "jpeg"){
                $target_dir .= "/imgs/";
            } else if ($fileType == "mp4") {
                $target_dir .= "/videos/";
            } else {
                $target_dir .= "/musics/";
            }

            $newTargetFile = $target_dir . basename($_FILES["visual"]["name"]);
        }

        

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo " Your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["visual"]["tmp_name"], $newTargetFile)) {
                echo 1;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } 
    
    else if (isset($_POST["delete"])) {
        $path = '../results'.$_POST["filePath"];
        unlink($path);
        echo 1;
    }
}
