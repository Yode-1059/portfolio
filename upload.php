<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>

<body>
    <?php
    function dbConect()
    {
        $dsn = 'mysql:dbname=LAA1416052-portfolio;host=mysql213.phy.lolipop.lan';
        $user = 'LAA1416052';
        $pass = 'port';

        try {
            $dbh = new PDO($dsn, $user, $pass);
            echo '';
        } catch (PDOException $e) {
            exit();
        }

        return $dbh;
    }

    function sql($i)
    {
        $dbh = dbConect();
        return $dbh->query($i);
    }

    function dbpush()
    {
        $title = $_POST["title"];
        $tec = $_POST["tec"];
        $per = $_POST["per"];
        $hline = $_POST["hline"];
        $content = $_POST["content"];
        $cat = $_POST["cat"];

        $idget = sql("SELECT * FROM `article`");
        foreach ($idget as $id) {
            $newid = $id[0];
        }

        $newid++;

        $cont_arr = explode("[|]", $content);
        $cat_arr = explode(",", $hline);
        echo "<br>";
        $content_n = [];
        $cat_vol = 0;
        $img_vol = 1;
        foreach ($cont_arr as $t_cont) {
            if ($t_cont == "hd") {
                $content_n[] = "<h3 class=''article__hd'' id=''h_$cat_vol''>$cat_arr[$cat_vol]</h3>";
                $cat_vol++;
            } elseif ($t_cont == "img") {
                $content_n[] = "<div class=''article__flex''>    <img src=''./f$newid/img_$img_vol.png''>
    </div>";
                $img_vol++;
            } elseif ($t_cont == "img2") {
                $img_vol2 = $img_vol + 1;
                $content_n[] = "<div class=''article__flex''>    <img src=''./f$newid/img_$img_vol.png''>
                <img src=''./f$newid/img_$img_vol2.png''>
    </div>";
                $img_vol += 2;
            } else {
                $content_n[] = $t_cont;
            }
        }
        $content_sql = implode($content_n);
        echo "INSERT INTO `article`(`ID`, `title`, `tec`, `catch`, `content`, `per`, `hline`) VALUES ('$newid','$title','$tec','$cat',`$content_sql`,'$per','$hline')";
        if (sql("INSERT INTO `article`(`ID`, `title`, `tec`, `catch`, `content`, `per`, `hline`) VALUES ('$newid','$title','$tec','$cat','$content_sql','$per','$hline')")) {
            echo "SQL成功";
        } else {
            echo "SQL失敗<br>";
        }

        echo $content_sql;

        if (mkdir("./f$newid", 0777, )) {
            echo "File成功<br>";
        }

        if (isset($_FILES["topimg"]) && is_uploaded_file($_FILES["topimg"]["tmp_name"])) {
            $o_name = $_FILES['topimg']["tmp_name"];
            $n_name = "topimg.png";
            echo $o_name . "<br>" . $n_name . "成功";
            if (move_uploaded_file($o_name, "f$newid/" . $n_name)) {
            }
        }
        for ($i = 1; $i <= $img_vol; $i++) {
            if (isset($_FILES["i_$i"]) && is_uploaded_file($_FILES["i_$i"]["tmp_name"])) {
                $o_name = $_FILES["i_$i"]["tmp_name"];
                $n_name = "img_$i.png";
                if (move_uploaded_file($o_name, "f$newid/$n_name")) {
                    echo "Aimg成功";
                }
            }
        }
    }

    dbpush();



    ?>
</body>

</html>