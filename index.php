<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Quiz</title>
    </head>
    <body>
        <?php
            $con = new mysqli("localhost","root","","quiz");
            $sql = "SELECT a.content AS answer, a.is_right, q.content AS question FROM answers AS a JOIN questions AS q ON a.questions_id = q.id";

            $res = $con->query($sql);
            $row = $res->fetch_all(MYSQLI_ASSOC);

            $true_i = NULL;

                echo $row[$id]["question"]."<br>
                <form action = 'index.php' method = 'GET'>  
                ";
                for ($i=0;$i<count($row);$i++)
                {
                    if($row[$i]['is_right'])
                        $true_i = $i;
                    echo"
                        <input type='radio' name='radio_box' value='".($i+1)."'>
                        ".$row[$i]['answer']."<br> ";
                }
                echo"
                <input type='submit' value='Sprawdź'>
                </form>";
                
                if(isset($_GET['radio_box']))
                {
                    if($_GET['radio_box'] == $row[$true_i]['is_right'])
                        echo "Poprawna odpowiedź!<br>";
                    else
                        echo "Błędna odpowiedź, prawidłową odpowiedzią jest: ".$row[$true_i]['answer']."<br>";
                }
                else
                    echo "Wybierz którąś z odpowiedzi!<br>";

        ?>
    </body>
</html>