<div class="content1">
    <div class="container">

        <div class="box">

            <div class="box1">

            </div>

            <div class="box2" id="box2_profil">
                <div class="box-left">

                    <div class="box-left-1" >
                        <div id = "contarner">
                            <p22>Добро пожаловать!<br><?php if (isset($_SESSION['user'])) {
                                    echo $_SESSION['user'];} else {echo "Уважаемый Гость";} ?> </p22>
                        </div>
                    </div>

                    <div class="box-left-2">
                        <p6> </p6>
                        <div class="line2" "></div>
                    <div class="blog_container">

                        <div class="blog_box_full_text">
                            <p5> ID:<?php echo $vars1[0][0]['idUser'];?> </p5>
                            <p5> Логин:<?php echo $vars1[0][0]['loginUser'];?> </p5>
                            <p5> Email:<?php echo $vars1[0][0]['emailUser'];?> </p5>
                        </div>

                        <div class="line1"></div>
                    </div>
                </div>
            </div>

            <div class="box-right" id="box-right-profil">

                <p5> Список статей автора  </p5>

                <?php foreach ($vars[0] as $i => $value): ?>
                    <div class="blog_container"  id="blog_container-profil">
                        <div class="blog_box_title">
                            <p5> <a class="link" id="link1" href="content/<?php echo $vars[0][$i]['idArticle'];?>"> <?php echo $vars[0][$i]['titleArticle'];?></a> </p5>
                        </div>
                    </div>

                <?php endforeach; ?>


            </div>

        </div>
    </div>
</div>
</div>

