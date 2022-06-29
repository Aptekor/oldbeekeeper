<?php if($_SERVER['REQUEST_URI'] == "/"):?>

    <div class="content1">
        <div class="container">
            <div class="box">

                <div class="box1">
                </div>

                <div class="box2">
                    <div class="box2-2">
                        <div class="box2-2-1">
                            <button class="custom-btn btn-12"><span>НАЖМИ</span><span>Категории</span></button>
                            <button class="custom-btn btn-12 btn-12-1"><span>НАЖМИ</span> <span>Справочник</span></button>
                            <button class="custom-btn btn-12 btn-12-1"><span>НАЖМИ</span> <span>Отзывы</span></button>
                        </div>
                    </div>

                    <div class="box2-1">
                        <div class="box2-1-1">
                            <div id = "contarner">
                               <p22>Добро пожаловать!<br><?php if (isset($_SESSION['user'])) {
                               echo $_SESSION['user'];} else {echo "Уважаемый Гость";} ?> </p22>
                            </div>
                        </div>

                        <div class="box2-1-2">
                            <form  class="search-form" name="search" method="post">
                                <input class="search-input" id="search-input" type="text" name="query" placeholder="Поиск">
                                <input class="reset_button" id="btn-search-reset" type="reset"/>
                                <input class="search_button btn2" id="search-button" type="submit" name="search-button">
                            </form>
                        </div>

                        <div class="box2-1-3"   id="box2-1-3">
                            <h4> Интересное на сайте: </h4>
                        </div>

                        <div class="container-1" id="container-1">
                            <?php foreach ($vars[0] as $i => $value): ?>
                                <div class="box2-1-4" id="box2-1-4">
                                    <div class="blog_container">
                                        <div class="blog_box_title">
                                            <p5> <a class="link" id="link1" href="content/<?php echo $vars[0][$i]['idArticle'];?>"> <?php echo $vars[0][$i]['titleArticle'];?></a> </p5>
                                        </div>
                                        <div class="blog_box_full_text">

                                            <p5> <?php echo html_entity_decode ($vars[0][$i]['textArticle']);?> </p5>
                                        </div>
                                        <div class="blog_box_autor_data">
                                            <p5>
                                                <?php echo $vars[0][$i]['autorArticle'];?>,
                                                <?php echo $vars[0][$i]['dataArticle'];?>,
                                                id#<?php echo $vars[0][$i]['idArticle'];?>
                                            </p5>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="box2-1-5" id="box2-1-5">

                        </div>

                    </div>

                    <div class="box2-3">
                        <div class="box2-3-1">
                            <img class="foto-content" src="/img/foto-content.jpg" alt="">
                        </div>

                        <div class="box2-3-1">
                            <img class="foto-content" src="/img/foto-content.jpg" alt="">
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>
<!--  // Раздел 2 (регистрация, авторизация)-->
    <?php if($_SERVER['REQUEST_URI'] == "/account"):?>
            <div class="content1">
                <div class="container">
                   <div class="box" id="box1">

                      <div class="box1">

                      </div>

                        <div class="box2">
                            <div class="box-left" id="box-left-reg">
                                <div class="box-left-1" id="box-left-1-reg">
                                    <div id = "contarner2">
                                        <p22 id="p22-reg" >Регистрация </p22>
                                    </div>
                                </div>
                                <div class="box-left-2">

                                    <form method="post" class="form_index">
                                        <input type="text" name="loginUser"  placeholder="Логин"><br>
                                        <input type="password" name="passUser"  placeholder="Пароль"><br>
                                        <input type="text" name="emailUser"  placeholder="E-mail"><br>
                                        <input type="text" name="telUser"  placeholder="Телефон"><br>
                                        <input type="date" name="birthdaylUser"  placeholder="День рождения"><br>

                                        <button class="button10" type="submit" name="in_reg" > Регистрация </button> <br>

                                    </form>

                                    <div>
                                        <? if (isset($_SESSION['errors'])) {
                                        print_r($_SESSION['errors']);
                                        unset($_SESSION['errors']);} ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                   </div>
                </div>
            </div>
    <?php endif;?>