<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Quiz</title>
    </head>
    <body>
        <?php
            $con = new mysqli("localhost","root","","quiz");
            $sql = "SELECT a.id AS aid, a.content AS answer, a.is_right, a.questions_id AS ident ,q.content AS question FROM answers AS a JOIN questions AS q ON a.questions_id = q.id";
            #allah
            $res = $con->query($sql);
            $row = $res->fetch_all(MYSQLI_ASSOC);

            $punkty = $i = $j 0;
            $id = 1;
            $right = [];
            echo $row[$i]["question"]."<br>
                <form action = 'index.php' method = 'POST'>  
            ";
            while($id == $row[$i]['ident'])
            {
                if($row[$i]['is_right'])
                    $right[] = $row[$i]['aid'];
                echo
                "
                    <input type='checkbox' name='check_box' value='$i'>
                ".$row[$i]['answer']."<br> ";
                $i++;
            }
            echo
            "
                <input type='submit' value='Sprawdź'>
            </form>";

            if(isset($_POST['check_box']))
                while($id == $row[$j]['ident'])
                {
                    if($_POST['check_box'] == $row[$right[$j]]['is_right'])
                        $punkty++;
                    $j++;
                }

            echo $punkty;
            

        ?>
    </body>
</html>