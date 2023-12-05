<?php
session_start();
$idroom = $_REQUEST['idroom'];
include "../../model/pdo.php";
include "../../model/comment.php";
$listComment = loadall_binhluan_taikhoan($idroom);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <section class="section-padding" style="padding-top: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post-comment-section" style="margin-top: 20px;">
                        <div class="row">
                            <!-- Comment -->
                            <div class="col-md-12">
                                <div class="news-post-comment-wrap" style="margin-bottom: 20px;">
                                    <div class="post-user-content">
                                        <?php foreach ($listComment as $comment) : ?>
                                            <?php extract($comment); ?>

                                            <h3><?= $name ?><span> <?= $ngaybinhluan ?></span></h3>
                                            <p><?= $noidung ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <?php if (isset($_SESSION['user']['id'])) : ?>

                        <div class="col-md-8 mb-30">
                            <h3 class="mb-30">Bình luận</h3>
                            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="row">
                                <input type="hidden" name="idroom" value="<?= $idroom ?>">
                                <div class="col-md-12">
                                    <textarea name="comment" cols="40" rows="4" placeholder="Bình luận *" required=""></textarea>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" name="send" class="butn-dark2" value="Gửi"></input>
                                </div>
                            </form>
                        </div>

                    <?php else : ?>
                        <div class="col-md-8 mb-30">
                            <p>Để bình luận, vui lòng đăng nhập.</p>
                        </div>
                        <div class="col-md-4 mb-30">
                            <a href="index.php?act=sign-in" class="butn-dark2">Đăng nhập</a>
                        </div>
                    <?php endif; ?>


                </div>
            </div>

    </section>

    <?php
    if (isset($_POST['send'])) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $noidung = $_POST['comment'];
        $idroom = $_POST['idroom'];
        $iduser = $_SESSION['user']['id'];
        $ngaybinhluan = date('h:i:sa d/m/Y');
        insert_binhluan($noidung, $iduser, $idroom, $ngaybinhluan);
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
    ?>

</body>

</html>