<?php
include("header.php");
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
?>

<body>
    <button class="humbar"></button>
    <header class="header">
        <div class="header__inner">
            <a class="txt" href="./#top">プロフィール</a>
            <a class="txt" href=" ./#work">作品紹介</a>
            <a class="txt" href="./#contact">お問合せ</a>
            <div class="article__jump">
                <p>目次</p>
                <?php
                function jump()
                {
                    $a_id = $_GET["a"];
                    $dbh = dbConect();
                    $sql = "SELECT * FROM `article` WHERE `id`=$a_id";
                    $t = $dbh->query($sql);
                    foreach ($t as $q) {
                        $title = $q[1];
                    }
                    echo ' <a href="#top">';
                    echo $title;
                    echo '</a>
                <a href="#a_tec">技術</a>
                <a href="#a_per">制作期間</a>
                <a href="#a_over">概要</a>';
                    $sql = "SELECT * FROM `article` WHERE `id`=$a_id";
                    $t = $dbh->query($sql);
                    foreach ($t as $anc) {
                        $arr = $anc[6];
                    }
                    $arr = explode(",", $arr);
                    $i = 0;
                    foreach ($arr as $cut) {
                        echo "<a href='#h_$i'> $cut</a>";
                        $i++;
                    }
                    return $title;
                }
                jump();
                ?>
            </div>
        </div>
    </header>
    <main>
        <div class="top" id="top">
            <h1 class="sitetop">Yoshinaga's Portfolio Site</h1>
        </div>
        <div class="article">
            <div class="article__inner">
                <h2 class="article__title">
                    <?php
                    $dbh = dbConect();
                    $a_id = $_GET["a"];
                    $sql = "SELECT * FROM `article` WHERE `id`=$a_id";
                    $t = $dbh->query($sql);
                    foreach ($t as $q) {
                        echo $q[1];
                    } ?>
                </h2>
                <img src="./f<?php echo $a_id; ?>/topimg.png" alt="" class="article__top">
                <h3 class="article__hd" id="a_tec">技術</h3>
                <?php
                $dbh = dbConect();
                $sql = "SELECT * FROM `article` WHERE `id`=$a_id";
                $t = $dbh->query($sql);
                foreach ($t as $q) {
                    echo $q[2];
                }
                ?>
                <h3 class="article__hd" id="a_per">制作期間</h3>
                <?php
                $dbh = dbConect();
                $sql = "SELECT * FROM `article` WHERE `id`=$a_id";
                $t = $dbh->query($sql);
                foreach ($t as $q) {
                    echo "<p>$q[5]</p>";
                }
                ?>

                <h3 class="article__hd" id="a_over">概要</h3>

                <?php
                $dbh = dbConect();
                $sql = "SELECT * FROM `article` WHERE `id`=$a_id";
                $t = $dbh->query($sql);
                foreach ($t as $q) {
                    echo "$q[4]";
                } ?>

            </div>
        </div>
        <div class="work">
            <div class="work__inner">
                <h3>その他作品</h3>
                <?php
                function output()
                {
                    $dbh = dbConect();
                    $sql = "SELECT * FROM `article`";
                    $a_id = $_GET["a"];
                    $a_arr = [];
                    $q = $dbh->query($sql);
                    foreach ($q as $leng) {
                        $a_arr[] = $leng[0];
                    }
                    shuffle($a_arr);
                    $i = 0;
                    $a_view = [];
                    while (count($a_view) < 3) {
                        if ($a_arr[$i] != $a_id) {
                            $a_view[] = $a_arr[$i];
                        }
                        $i++;
                    }
                    $sql = "SELECT * FROM `article` WHERE `id` IN ($a_view[0], $a_view[1],$a_view[2])";
                    $q = $dbh->query($sql);
                    echo '<div class="work__content">';
                    foreach ($q as $leng) {
                        $id = $leng[0];
                        $title = $leng[1];
                        $tec = $leng[2];
                        echo '<div class="work__box">
                    <a href="./article.php?a=';
                        echo $id;
                        echo '"><div class="work__img w_';
                        echo $id;
                        echo '">
                            <img src="./f';
                        echo $id;
                        echo '/topimg.png" alt="">
                        </div>
                        <div class="work__box__content">
                            <h4 class="work__title">';
                        echo $title;
                        echo '</h4>
                            <p class="work__tec">';
                        echo $tec;
                        echo ' </p>
                        </div>
                    </a>
                </div>';
                    }
                    echo "</div>";
                }
                output();
                ?>
            </div>
            <footer class="footer">
                <div class="footer__inner">
                    <small>Copyright © 2023 YoshinagaYosuke Inc. All Rights Reserved.</small>
                </div>
            </footer>
    </main>