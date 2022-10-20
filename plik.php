<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Dowolna</title>
    </head>
    <body>
        <?php
        /*
            $count;
            print_r($_POST);
            if(isset($_POST['c']))
            {
                $count = $_POST['c'];
                $count++;
            }
            else
                $count = 0;
        
            $count;
            print_r($_COOKIE);
            if(isset($_COOKIE["c"]))
            {
                $count = $_COOKIE['c'];
                $count++;
            }
            else
                $count = 0;
            setcookie("c",$count);
        */
        session_start();
        $count;
        if(isset($_SESSION["c"]))
        {
            $count = $_SESSION["c"];
            $count++;
            $_SESSION["c"]=$count;    
        }
        else
        {
            $_SESSION['c'] = 0;
        }
            print_r($_SESSION);
            
        ?>
        <form action = 'plik.php' method = 'POST'>
            <br>    
            Imię:
            <input type="text" name="imie">
            <br>
            Nazwisko:
            <input type="text" name="nazwisko">
            <br>
            <input type="submit">
        <!--
            <input type="hidden" name="c" value="<?php echo $count; ?>">
        -->
        </form>
    </body> 
</html>