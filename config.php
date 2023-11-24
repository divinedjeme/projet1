<?php
    function se_connecter(){
        $server="localhost";
        $user="root";
        $pwd="";
        $db="projet_laravel";
        $link = mysqli_connect($server,$user,$pwd,$db);
        return $link;
    }
?>