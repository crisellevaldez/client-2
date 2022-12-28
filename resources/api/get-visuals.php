<?php include 'connection.php';
session_start();



if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $surveyId = $_GET['survey-id'];
    $status = $_GET['status'];

    $path = "../results/survey-".$surveyId;    

    if ($status == 3) {
        $path .= "/low";
    }

    else if ($status == 2) {
        $path .= "/mid";
    }

    else {
        $path .= "/high";
    }

    $files=array();

    foreach( new RecursiveIteratorIterator( new RecursiveDirectoryIterator( $path, RecursiveDirectoryIterator::KEY_AS_PATHNAME ), RecursiveIteratorIterator::CHILD_FIRST ) as $file => $info ) {
        if( $info->isFile() && $info->isReadable() ){
            $files[]=array('filename'=>$info->getFilename(),'path'=>realpath( $info->getPathname() ) );
        }
    }

    print_r(json_encode($files,true));
}
