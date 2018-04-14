<?php
  $target_dir = "uploads/";
  $target_file = $target_dir.basename($_FILES["slider1"]["name"]);
  $uploadOk = 1;
  //Check if image is valid or fake
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if(isset($_POST["submit"])){
    $check=getimagesize($_FILES["slider1"]["tmp_name"]);
      if($check !==false){
        echo "File is an image-".$check["mime"].".";
        $uploadOk=1;
      }else{
        echo "File is not an image";
        $uploadOk=0;
      }
  }
  //check if file already exists
  if(file_exists($target_file)){
    echo "UPS, File already exists";
    $uploadOk = 0;
  }
  //check file SIZE
  if($_FILES["slider1"]["size"]>500000){
    echo "Sorry, large file";
    $uploadOk=0;
  }
  //allow file format
  if($imageFileType!="jpg"){
    echo "sorry, only jpg";
    $uploadOk=0;
  }
  //check if $uploadOk is set to 0 by an error
  if($uploadOk==0){
    echo "sorry, thefile not uploaded";
    //upload ok
  }else{
    $temp=explode(".",$_FILES["slider1"]["name"]);
    $newfilename = round(microtime(true)).'.'.end($temp);
    if(move_uploaded_file($_FILES["slider1"]["tmp_name"],$target_file.$newfilename)){
      echo "the file".basename($_FILES["slider1"]["name"])."has been uploaded.";
    }else{
      echo "Soryy, error occured";
    }
  }
 ?>
