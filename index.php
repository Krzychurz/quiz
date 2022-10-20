<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Quiz</title>
    </head>
    <body>
        <?php
            $con = new mysqli("localhost","root","","quiz");
            $sql = "SELECT a.questions_id AS a_qid, a.content AS answer, a.is_right, q.id AS q_id, q.content AS question FROM answers AS a JOIN questions AS q ON a.questions_id = q.id";
            $res = $con->query($sql);
            $row = $res->fetch_all(MYSQLI_ASSOC);

            $sql2 = "SELECT id,content FROM questions";
            $res2 = $con->query($sql2);
            $row2 = $res2->fetch_all(MYSQLI_ASSOC);

            $id_pytania;
            $losowe;

            if(isset($_POST['id_pytania']))
            {
                $id_pytania = $_POST['id_pytania'];
                $id_pytania++;
            }
            else
                $id_pytania = 1;

            if(isset($_POST['losowe']))
                $losowe=unserialize($_POST['losowe']);
            else
            {
                $losowe=range(0,count($row2)-1);
                shuffle($losowe);
            }

            $ilosc_odp = 0;
            while($id_pytania == $row[$ilosc_odp]['a_qid'])
            {
                $ilosc_odp++;
            }
            
            echo $losowe[$id_pytania-1]."<br>";
            print_r($losowe);


            echo $row2[$losowe[$id_pytania-1]]["content"]."<br>
            <form action = 'index.php' method = 'POST'>  
            ";
            
            while($row[])
            {

            }

            $losowe=serialize($losowe);
            echo
            "
            <input type='hidden' name='losowe' value='$losowe'>
            <input type='hidden' name='id_pytania' value='$id_pytania'>
            <input type='submit' value='Sprawdź'>
            </form>";

            /*
            if(isset($_POST['petla']))
                $id = $_POST['petla'];
            else
                $id = 1;
            $r = $id;
            $punkty = 0;
            
            $cykl = 0;
            
            $right = [];
            while($id == $row[$id]['a_id'])
                $r++;
            echo $row[$id]["question"]."<br>
                <form action = 'index.php' method = 'POST'>  
            ";
            while($id == $row[$cykl]['ident'])
            {
                if($row[$cykl]['is_right'])
                    $right[] = 1;
                else
                    $right[] = 0;
                
                echo "<input type='hidden' name='$cykl' value='0'>";
                echo "<input type='checkbox' name='$cykl' value='1'>".$row[$cykl]['answer']."<br>";
                $cykl++;
            }
            echo
            "
                <input type='hidden' name='petla' value='$r'>
                <input type='submit' value='Sprawdź'>
            </form>";
            /*
            $_POST[2] = 2;
            print_r($_POST);
            echo "<br>";
            print_r($right);
            
            if($_POST == $right)
                    $punkty++;

            echo $punkty;
            
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