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
    <h2>投稿フォーム</h2>
    <form action="./upload.php" method="post" enctype="multipart/form-data">
        <p>
            タイトル<input type="text" name="title" id="" required>
        </p>
        <p>
            技術<input type="text" name="tec" id="" required>
        </p>
        <p>
            期間<input type="text" name="per" id="" required>
        </p>
        <p>
            見出し(,で分解)<input type="text" name="hline" id="" required>
        </p>
        <p>
            本文<textarea name="content" id="txt" cols="30" rows="10"></textarea>
        </p>
        <p>
            キャッチ<input type="text" name="cat" id="" required>
        </p>
        <p>
            トップ画像<input type="file" name="topimg" id="" required>
        </p>
        <p class="a_img">
            記事画像<input type="file" name="i_1" required class="img">
            <input type="hidden" name="img_vol" id="img_vol" value="1">
        </p>
        <input type="submit" name="" id="" value="投稿">
    </form>

    <button id="pop">画像追加</button>
    <button id="del">画像消す</button>
    <button id="hdpush">見出し追加</button>
    <button id="imgpush">画像挿入</button>
    <button id="imgpushtwin">画像二連</button>
    <script src="./upload.js"></script>
</body>

</html>