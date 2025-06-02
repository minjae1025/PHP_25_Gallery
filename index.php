<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>갤러리</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
    <style>
        .my {
            display: flex;
            justify-content: space-between;
            margin: 5px
        }

        table {
            width: 100%;
        }

        .imgCell {
            width: 20%;
            padding: 5px;
        }

        .imgCell img {
            display: block;
            width: 100%;
        }

        .display-1 {
            text-align: center;
            padding-bottom: 10px;
            margin: 0;
            border-bottom: 1px dashed black;
        }

        .myButtons {
            display: inline-block;
            margin-right: 10px;
        }

        .upload {
            display: inline-block;
            margin-left: 10px;
        }

        .imgNum {
            text-align: center;
            margin: 0;
        }

        td {
            border: 1px solid black;
        }

        .imgName {
            margin: 0;
            text-align: center;
        }

        .numCell {
            border-top: 2.5px solid black;
        }
    </style>
</head>

<body>
    <nav>
        <p class="display-1">Simple Gallery</p>
        <div class="my">
            <div class="upload">
                <a href="image_upload.html" id="imgUpload">사진 업로드</a>
            </div>
            <div class="myButtons">
                <button id="loginButton" class="button" onclick="location.href='login.html'">로그인</button>
                <button id="SigninButton" class="button" onclick="location.href='sign_in.html'">회원가입</button>
            </div>
        </div>
    </nav>

    <?php

    $dir = "./uploads/";
    $scan = scandir($dir);
    ?>
    <table>
        <?php
        for ($i = 2; $i < count($scan); $i += 5) {
            echo "<tr>";
            $max = $i + 5;
            if ($max > count($scan)) {
                $max = count($scan);
            }
            for ($j = $i; $j < $max; $j++) {
                ?>
                <td class="numCell">
                    <p class="imgNum">사진<?= $j - 1 ?></p>
                </td>

                <?php
            }
            echo "</tr>";

            echo "<tr>";
            for ($j = $i; $j < $max; $j++) {
                ?>
                <td class="imgCell">
                    <div class="imgBox">
                        <img src="<?= $dir . $scan[$j] ?>" class="image">
                    </div>
                </td>

                <?php
            }
            echo "</tr>";
            for ($j = $i; $j < $max; $j++) {
                ?>
                <td>
                    <p class="imgName"><?= $scan[$j] ?></p>
                </td>

                <?php
            }

        }
        ?>
    </table>


    <script>
        window.oncontextmenu = function () {
            return false;
        }
        const images = document.getElementsByClassName("image");
        for (let i = 0; i < images.length; i++) {
            images[i].addEventListener("click", function () {
                window.open(images[i].src, "이미지", open);
            });

        }
    </script>

</body>

</html>