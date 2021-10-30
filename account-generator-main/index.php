<?php

//put accounts in directory "accounts"
//separate each account by 1 line

$minecraft_txt = file_get_contents("accounts/minecraft.txt");
$spotify_txt = file_get_contents("accounts/spotify.txt");

if(isset($_POST['generate'])){
    if(isset($_POST['type']) && !empty($_POST['type'])){
        $type = $_POST['type'];
        $type_arr = array("minecraft", "spotify");

        if(in_array($type, $type_arr)){
            if($type === "minecraft"){
                $mc_arr = preg_split('/\r\n|\r|\n/', $minecraft_txt);
                $success = $mc_arr[array_rand($mc_arr)];
            }
            else if($type === "spotify"){
                $spot_arr = preg_split('/\r\n|\r|\n/', $spotify_txt);
                $success = $spot_arr[array_rand($spot_arr)];
            }
        }
        else{
            $err = "Invalid account type";
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Generator Template - Made by Treasure#0001</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="main.css">
    <script>window.history.replaceState&&window.history.replaceState(null,null,window.location.href);</script>
</head>
<body>
    <!-- Created by Treasure#0001, Discord Server: https://discord.gg/mnMMKw6rAc -->
    <div class="main">
        <p class="title">GENERATOR NAME</p>
        <?php
        if(isset($err)){
            echo '<div class="alert error">'.$err.'</div>';
        }
        else if(isset($success)){
            echo '<div class="alert success">'.$success.'</div>';
        }
        ?>
        <form method="POST">
            <select name="type">
                <option value="minecraft">Minecraft</option>
                <option value="spotify">Spotify</option>
            </select>
            <button name="generate" type="submit">Generate</button>
        </form>
        <p class="cred">Template By <a href="https://discord.gg/mnMMKw6rAc" target="_blank">Treasure#0001</a></p>
    </div>
</body>
</html>
