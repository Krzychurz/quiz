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

            $punkty = $final = 0;
            $i = $ri = $wr = $num = 0;
            $id = 1;
            $right = [];
            $wrong = [];
            echo $row[$id]["question"]."<br>
                <form action = 'index.php' method = 'POST'>  
            ";
            while($id == $row[$i]['ident'])
            {
                if($row[$i]['is_right'])
                {
                    $right[] = $i;
                    $ri++;
                }
                echo "<input type='hidden' name='$i' value='0'>";
                echo "<input type='checkbox' name='$i' value='1'>".$row[$i]['answer']."<br>";
                $i++;
            }
            echo
            "
                <input type='submit' value='Sprawdź'>
            </form>";

            print_r($_POST);
            echo "<br>$right[0]";
            echo "<br>$right[1]";
            echo "<br>$ri";



            /*
            $k = 0;
            while($id == $row[$k]['ident'] && $k<$ri)
            {
                if(isset($_POST[$right[$k]]))
                {
                    for ($i=0;$i<$ri;$i++)
                    {
                        if($row[$i]['is_right'] == $_POST[$i])
                        {
                            $punkty++;
                            echo "Odpowiedź: ".$row[$i]['is_right']."<br>";
                        }
                        else
                            $num++;
                    }
                }
                $k++;
            }
            if($num>0)
                $punkty=0;

            echo "<br>Ilość punktów: $punkty";
            */
            $con->close();
        ?>
    </body>
</html>