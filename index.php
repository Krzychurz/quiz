<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Quiz</title>
    </head>
    <body>
        <?php
            $con = new mysqli("localhost","root","","quiz");
            $sql = "SELECT a.questions_id AS a_id, a.content AS answer, a.is_right, a.questions_id AS ident, q.content AS question FROM answers AS a JOIN questions AS q ON a.questions_id = q.id";
            $res = $con->query($sql);
            $row = $res->fetch_all(MYSQLI_ASSOC);

            //while(true)
            {
                $punkty = 0;
                $i = 0;
                $id = $row[0]['a_id'];
                $r = 0;
                $right = [];
                for($i=0;$i<)
                echo $row[$id]["question"]."<br>
                    <form action = 'index.php' method = 'POST'>  
                ";
                while($id == $row[$i]['ident'])
                {
                    if($row[$i]['is_right'])
                        $right[] = 1;
                    else
                        $right[] = 0;
                    echo "<input type='hidden' name='$i' value='0'>";
                    echo "<input type='checkbox' name='$i' value='1'>".$row[$i]['answer']."<br>";
                    $i++;
                }
                echo
                "
                    <input type='submit' value='Sprawdź'>
                </form>";
                /*
                $_POST[2] = 2;
                print_r($_POST);
                echo "<br>";
                print_r($right);
                */
                if($_POST == $right)
                    $punkty++;
                
                echo $punkty;
            }
           
            

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