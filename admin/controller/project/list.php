<?php
include '../../../config/config.php';
header("Content-type: application/json");
$verb = $_SERVER["REQUEST_METHOD"];
if ($verb == "GET") {
    $array = array();
    $sql = "SELECT * FROM project ORDER BY project_id DESC";
    $result = mysqli_query($con, $sql);

    if ($result) {
        while ($row = mysqli_fetch_object($result)) {
            $array[] = $row;
        }
    } else {
        if (DEBUG) {
            $error = "result error: " . mysqli_error($con);
            echo json_encode($error);
        } else {
            $error = "result query failed.";
            echo json_encode($error);
        }
    }
    echo "{\"data\":" . json_encode($array) . "}";
}


if ($verb == "POST") {

    extract($_POST);

    $arrayImage = array();
    $project_id = mysqli_real_escape_string($con, $project_id);
    $sqlImage = "SELECT project_image FROM project WHERE project_id = $project_id";
    $resultImage = mysqli_query($con, $sqlImage);
    if ($resultImage) {
        $arrayImage = mysqli_fetch_array($resultImage);
        unlink($config['IMAGE_UPLOAD_PATH'] . '/project_image/' . $arrayImage["project_image"]);
    } else {
        if (DEBUG) {
            $error = "resultImage error: " . mysqli_error($con);
            echo json_encode($error);
        } else {
            $error = "resultImage query failed";
            echo json_encode($error);
        }
    }

    $deleteSql = "DELETE FROM project WHERE project_id = $project_id";
    $resultDelete = mysqli_query($con, $deleteSql);
    if ($resultDelete) {
        echo json_encode($resultDelete);
    } else {
        if (DEBUG) {
            $error = "resultDelete error: " . mysqli_error($con);
            echo json_encode($error);
        } else {
            $error = "resultDelete query failed.";
            echo json_encode($error);
        }
    }
}
?>