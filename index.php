<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .box{
            width: 30%;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        #textar{
            grid-column:1/3;
            min-width:30vw;
            min-height:200px;
            max-width:30vw;
            max-height:200px;
        }
    </style>
</head>
<body>
    <form action="#" method="post"  class="box">
        <textarea name="text" id="textar"><?php 
            if(isset($_POST["changeBtn"])){
                echo file_get_contents("text.txt");
            }
        ?></textarea>
        <input type="submit" name="changeBtn" value="change">
        <input type="submit" name="submitBtn" value="load">
        <input type="submit" name="appendBtn" value="append" style="grid-column:1/3;">
    </form>
    <p id="intext"><?php
        if(isset($_POST["submitBtn"])){
            $file = fopen("text.txt", 'w+');
            fwrite($file, $_POST['text']);
            fclose($file);
        }
        if(isset($_POST['appendBtn'])){
            $file = fopen("text.txt", 'a');
            if($file){
                fwrite($file, (' '.$_POST['text']));
                fclose($file);
            }
        }
        $file = fopen('text.txt', 'r');
        if($file){
            echo fgets($file);
            fclose($file);
        
        }else{
            echo "no file";
        } 
    ?></p>
</body>
</html>