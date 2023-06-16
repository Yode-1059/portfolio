<?php
include("header.php");
?>
<?php function dbConect()
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

function caption()
{
    $dbh = dbConect();
    $sql = "SELECT * FROM `article`";
    $q = $dbh->query($sql);
    echo '<style>';
    foreach ($q as $leng) {
        $id = $leng[0];
        $cat = $leng[3];
        echo ".w_";
        echo $id;
        echo '::after {content: "';
        echo $cat;
        echo '";}';

    }
    echo '</style>';
}

caption();
?>

<button class="humbar"></button>
<header class="header">
    <div class="header__inner">
        <a class="txt" href="#top">プロフィール</a>
        <a class="txt" href=" #work">作品紹介</a>
        <a class="txt" href="#contact">お問合せ</a>
    </div>
</header>
<main>
    <div class="top" id="top">
        <h1 class="sitetop">Yoshinaga's Portfolio Site</h1>

    </div>
    <section class="prof">
        <div class="prof__inner">
            <h2 class="prof__title">プロフィール</h2>
            <h3 class="prof__hd" id="name">吉永　遥祐</h3>
            <div class="prof__flex">
                <div class="prof__content">
                    <img class="prof__img" src="./img/icon.png" alt="">
                </div>
                <div class="prof__content">
                    <p>トライデントコンピュータ専門学校<br class="m"> Webデザイン学科所属</p>
                    <p>色々な知識を収集して<br class="m">何かに役立てようとしている</p>
                    <p>学校に来た頃は「コーディング」と<br class="m">「プログラミング」の <br class="p">
                        分別がついていなかった</p>
                    <p>PHPでの制作を通して<br class="m">データの取り扱いの奥深さを<br class="p"><br class="m">とても感じた </p>
                    <p>バックエンドエンジニア志望</p>
                    <p>github <a href="https://github.com/Yode-1059" target="_new">https://github.com/Yode-1059</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="tec">
        <div class="tec__inner">
            <h3 class="tec__hd">技術</h3>
            <div class="tec__content">
                <div class="tec__box">
                    <img src="./img/html.svg" alt="HTML">
                    <p>HTML</p>
                </div>
                <div class="tec__box">
                    <img src="./img/css.svg.png" alt="CSS">
                    <p>CSS</p>
                </div>
                <div class="tec__box">
                    <img src="./img/js.png" alt="JavaScript">
                    <p>JavaScript</p>
                </div>
                <div class="tec__box">
                    <img src="./img/php.svg" alt="PHP">
                    <p>php</p>
                </div>
                <div class="tec__box">
                    <img src="./img/sql.png" alt="SQL">
                    <p>SQL</p>
                </div>
                <div class="tec__box">
                    <img src="./img/db.svg" alt="データベース">
                    <p>データベース</p>
                </div>
            </div>
        </div>
    </section>
    <section class="work" id="work">
        <div class="work__inner">
            <h2>作品一覧</h2>
            <?php
            function output()
            {
                $dbh = dbConect();
                $sql = "SELECT * FROM `article`";
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
    </section>
    <section class="contact" id="contact">
        <div class="contact__inner">
            <h2>お問合せ</h2>
            <form action="contact.php" method="post">
                <p>お名前　*</p><input type="text" name="name" required>
                <p>メールアドレス</p><input type="email" name="mail" required>
                <p>ご用件</p><textarea name="" id="" name="text" required></textarea>
                <input type="submit" value="送信">
            </form>
        </div>
    </section>
</main>
<footer class="footer">
    <div class="footer__inner">
        <small>Copyright © 2023 YoshinagaYosuke Inc. All Rights Reserved.</small>
    </div>
</footer>
</body>

</html>