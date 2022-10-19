<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Quiz</title>
    </head>
    <body>
        <?php
            $con = new mysqli("localhost","root","","quiz");
            $sql = "SELECT a.id AS a_id, a.content AS answer, a.is_right, a.questions_id AS ident ,q.content AS question FROM answers AS a JOIN questions AS q ON a.questions_id = q.id";
            $res = $con->query($sql);
            $row = $res->fetch_all(MYSQLI_ASSOC);

            $punkty = $i = $j = 0;

            $id = 1;
            $right = [];
            echo $row[$id]["question"]."<br>
                <form action = 'index.php' method = 'POST'>  
            ";
            while($id == $row[$i]['ident'])
            {
                if($row[$i]['is_right'])
                {
                    $right[] = $i;
                    $j++;
                }
                echo "<input type='checkbox' name='$i' value='1'>".$row[$i]['answer']."<br>";
                $i++;
            }
            echo
            "
                <input type='submit' value='Sprawdź'>
            </form>";
            $k = 0;
            while($id == $row[$k]['ident'] && $k<$j)
            {
                if(isset($_POST[$right[$k]]))
                {
                    for ($i=0;$i<$j;$i++)
                    {
                        if($row[$i]['is_right'] == $_POST[$i])
                        {
                            $punkty++;
                        }
                    }
                }
                $k++;
            }

            echo "<br>Ilość punktów: $punkty";
            $con->close();
        ?>
    </body>
</html>