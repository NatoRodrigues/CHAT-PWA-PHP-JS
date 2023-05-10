<?php
if(isset($_FILES['audio']))
    {
    $errors= array();
    $file_name = $_FILES['audio']['name'];
    $file_size =$_FILES['audio']['size'];
    $file_tmp =$_FILES['audio']['tmp_name'];
    $file_type=$_FILES['audio']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['audio']['name'])));

    $extensions= array("mp3","wav","ogg");

    if(in_array($file_ext,$extensions)=== false)
    {
        $errors[]="Extensão não suportada, por favor selecione um arquivo MP3, WAV ou OGG.";
    }

    if($file_size > 20971520)
    {
        $errors[]='Arquivo deve ser menor que 20mb MB';
    }

    if(empty($errors)==true)
    {
        $unique_id = uniqid();
        $upload_dir = "upload_audio/";
        $file_path = $upload_dir.$unique_id.".".$file_ext;
        move_uploaded_file($file_tmp, $file_path);
        echo "Arquivo foi upado com sucesso! Upado em: " . $file_path;
    }
    
    else  
    {
        print_r($errors);
    }
}
?>
