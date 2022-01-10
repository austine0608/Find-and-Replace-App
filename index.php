<?php

$offset= 0;
    if (isset($_POST['textarea']) && isset($_POST['search']) && isset($_POST['replace'])) {
        $textarea = $_POST['textarea'];
        $search =$_POST['search'];
        $replace= $_POST['replace'];
        $textarea_length= strlen($search);

        if (!empty($textarea) && !empty($search) && !empty($replace)) {
            while ($strpos= strpos($textarea, $search, $offset)) {
                $offset= $strpos + $textarea_length;
                $textarea= substr_replace($textarea, $replace, $strpos, $textarea_length);
                // echo $strpos. '<br>';
                // echo $offset.'<br>';
                // echo $textarea;
            }
        }else{
            $error_message = 'please fill in all fields';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
            <div style="background-color:green;width:500px;border-radius:10px"><br><br><hr>
                    <form action="index.php" method="post">
                        <p> <strong> <?php if (isset($error_message)) { ?>
                            <?php echo $error_message; ?>
                        <?php }?></strong></p>
                            <div style="color:white">
                                <textarea name="textarea" id="" cols="45" rows="10"><?php if (isset($textarea)){?><?php echo  $textarea ?><?php  }?>
                                </textarea><br><br>
                                Search for:<br>
                                <input type="text" name="search"><br><br>
                                replace with:<br>
                                <input type="text" name="replace"><br><br>
                                <input type="submit" value="find and replace">
                            </div><br><br><hr>
                    </form>
            </div>
    </center>
</body>
</html>
