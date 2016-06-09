<?php
    include_once("config.php");

    if(function_exists($_GET['f'])) {
        $_GET['f']();
    }

    function remove(){
        include("config.php");
        $p_id= $_GET["p_id"];

        $query = "DELETE FROM product WHERE id=$p_id";


        if (isset($conn)) {
            $stmt = $conn->query($query);
            $stmt->execute();
        }
        echo 'ok';
    }

    function edit(){
        include("config.php");
        $p_n= $_GET["p_n"];
        $p_des= $_GET["p_des"];
        $p_pr= $_GET["p_pr"];
        $p_pold= $_GET["p_pold"];
        $p_id= $_GET["p_id"];
        $p_type= $_GET["p_ptype"];
        if($_GET["p_pic"])
            $p_pic= $_GET["p_pic"];

        if($p_type == 'file'){
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["p_pic"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            //if(isset($_GET["p_pic"])) {
            $check = getimagesize($_FILES["p_pic"]["tmp_name"]);
            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            if (move_uploaded_file($_FILES["p_pic"]["tmp_name"], $target_file)) {
                //echo "The file ". basename( $_FILES["p_pic"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        else{
            $target_file = $p_pic;
        }

        $p_pic = $target_file;
        $sql = "UPDATE product set `p_n`='$p_n',`p_des`='$p_des',`p_pr`=$p_pr,`p_pold`=$p_pold,`p_pic`='$p_pic' where id='$p_id'";

        if (isset($conn)) {
            $stmt = $conn->query($sql);
        }

        // execute the query
        $stmt->execute();

        // echo a message to say the UPDATE succeeded
        echo "\nupdate success";
        //}
    }

    function insert(){
        include("config.php");
        $p_n= $_GET["p_n"];
        $p_des= $_GET["p_des"];
        $p_pr= $_GET["p_pr"];
        $p_pold= $_GET["p_pold"];


        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["p_pic"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        //if(isset($_GET["p_pic"])) {
        $check = getimagesize($_FILES["p_pic"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        if (move_uploaded_file($_FILES["p_pic"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["p_pic"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        $p_pic = $target_file;
        $query = "insert into product (`p_n`,`p_des`,`p_pr`,`p_pold`,`p_pic`) values('$p_n', '$p_des', $p_pr, $p_pold, '$p_pic')";

        if (isset($conn)) {
            $stmt = $conn->query($query);
        }

        echo "\ninsert success";
        //}
    }

    function regi(){
        include("config.php");
        $un = $_GET["un"];
        $ue = $_GET["ue"];
        $up = $_GET["up"];
        $rep = false;

        $query = "select ut from users where un='$un'";
        if (isset($conn)) {
            $stmt = $conn->query($query);
        }
        $stmt->execute();
        $row = $stmt->fetchAll();
        if(count($row) > 0){
            if($row["ut"] == 0 || $row["ut"] == 1){
                echo 'un';
                $rep = true;
            }
        }

        $query = "select ut from users where ue='$ue'";
        if (isset($conn)) {
            $resualt = $conn->query($query);
        }
        $resualt->execute();
        $row = $resualt->fetchAll();
        if(count($row) > 0){
            if($row["ut"] == 0 || $row["ut"] == 1){
                echo 'ue';
                $rep = true;
            }
        }

        if($rep == false){
            $query = "insert into users (un, ue, up) values('$un', '$ue', '$up')";
            if (isset($conn)) {
                $conn->query($query);
            }
            echo 1;       
        }
    }

    function login(){
    include("config.php");
        $un = $_GET["un"];
        $up = $_GET["up"];

        $query = "select ut from users where un='$un' and up='$up'";

        if (isset($conn)) {
            $resualt = $conn->query($query);
        }
        $resualt->execute();
        $row = $resualt->fetchAll();
        if($row[0]["ut"] == 0){
            echo 0;
        }

        else if($row[0]["ut"] == 1){
            echo 1;
        }
    }

?>