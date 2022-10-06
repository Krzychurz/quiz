<html>
    <head>
        <meta charset="UTF-8">
        <title>Quiz</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            $db = new mysqli("localhost","root","","quiz");
            $page = 1;
            $limit = 10;
            $offset = ($page * $limit) - $limit;
            $q = 'SELECT a.id,a.content,a.is_right,q.content FROM `answers` AS a JOIN questions as q on a.questions_id = q.id;';
        ?>

        <header>
            <h3>Witaj w quizie</h3>
        </header>
        <section>
            <?php
                if($results = $db->query($q))
                    while($row = $results->fetch_assoc())
                    {
                        echo"
                            
                        ";
                    }
            ?>
        </section>
    </body>
</html>