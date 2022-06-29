<div class="content1">
    <div class="container">
        <div class="box">
            <div class="ajax-reply" id="uploads"></div>
            <div class="box2-1-8" id="box2-1-8" >
                <div class="slaide" id="slaide" draggable="true">
                    <div class="img-icon" ></div>
                </div>

                <?php if(($_SESSION['user'] === $vars1[0][0]['autorArticle']) || ($_SESSION['user'] === 'Aptekor')):?>
                    <form action="" method="post" name="form-redact" class="box2-1-8-form">
                        <textarea name="text_redact_one_article" class="text-redact-one-article" id="editor" >
                            <?php echo (html_entity_decode($vars1[0][0]['textArticle'])); ?>
                        </textarea>
                        <input name="redOneArticle" class ="button-text-redact-one-article" id="btn-troa" type="submit" value="отправить" >
                        <input type="hidden" name="red-id-article" value="<?php echo $vars1[0][0]['idArticle'];?>">

                    </form>
                <?php endif;?>

            </div>

            <div class="box2-1-7" id="box2-1-7">
                <?php if(isset($_SESSION['user'])):?>
                    <form method="post" class="comment-input">
                        <input type="text" class="coment-text" name="comentText" placeholder="Введите коментарий">
                        <div>
                            <input class="button10 btn4" type="submit"  name="in_put_coment" placeholder="Подтвердить"><br>
                        </div>
                    </form>
                <?php endif;?>
            </div>

            <div class="red-text-coment" id="red-text-coment">
                <?php if(isset($_SESSION['user'])):?>
                    <form method="post" class="comment-input" >
                        <div  id="redTextComent"></div>
                        <div>
                            <input class="button10 btn4" type="submit"  name="redOneComent" placeholder="Подтвердить"><br>
                        </div>
                    </form>
                <?php endif;?>
            </div>


            <div class="box1"></div>

            <div class="box2" id="box2_articl_one">

                <div class="box2-1"  id="box2-1-670px">
                    <div class="container-1">
                        <div class="box2-1-1" >
                            <div id = "contarner">
                               <p22>Статья: <?php echo $vars1[0][0]['titleArticle'];?> </p22>
                            </div>
                        </div>

                        <div class="box2-1-4" id="box2-1-4">
                            <div class="blog_container">
                                <div class="blog_box_title"></div>
                                <div class="blog_box_full_text">
                                    <p5>Cодержание:</p5>
                                    <p5 id="textArt"> <?php echo html_entity_decode($vars1[0][0]['textArticle']);?> </p5>

                                </div>
                                <div class="blog_box_autor_data">
                                    <p5>
                                        <?php echo $vars1[0][0]['autorArticle'];?>,
                                        <?php echo $vars1[0][0]['dataArticle'];?>,
                                        id#<?php echo $vars1[0][0]['idArticle'];?>
                                    </p5>
                                </div>
                            </div>
                        </div>

                        <?php if(isset($_SESSION['user']) ):?>
                            <div class="box2-1-6">
                                <div class="block-icon"><!-- контейнер -->
                                    <div class="comment-panel" id="comment-panel-1"></div><!-- видимый элемент -->
                                    <span class="hidden">Комментировать</span> <!-- скрытый элемент -->
                                </div>

                                <?php if((isset($_SESSION['user']) && $_SESSION['user'] === $vars1[0][0]['autorArticle'] ) || $_SESSION['user'] === 'Aptekor' ):?>
                                    <div class="block-icon"><!-- контейнер -->
                                        <div class="comment-panel" id="comment-panel-2"></div>
                                        <span class="hidden">Редактировать</span> <!-- скрытый элемент -->
                                    </div>

                                    <div class="block-icon"><!-- контейнер -->
                                        <div class="comment-panel" id="comment-panel-3">
                                            <form method="post" action="">
                                                <input type="hidden" name="id-del-article" id="id_del_article" value="<?php echo $vars1[0][0]['idArticle'];?>">
                                                <input class="button16 btn8" type="submit" name="del_one_article"  value="удалить"><br>
                                            </form>
                                        </div><!-- видимый элемент -->

                                        <span class="hidden">Удалить</span> <!-- скрытый элемент -->
                                    </div>
                                <?php endif;?>

                            </div>
                        <?php endif;?>
                    </div>

                    <div class="container-2">
                        <div class="box2-1-9">
                            <?php foreach ($vars[0] as $i => $value): ?>
                                <div class="blog_container_1">

                                    <div class="blog_box_title">
                                        <?php if(isset($_SESSION['user'])):?>
                                            <?php if(($_SESSION['user'] === $vars[0][$i]['name_Autor']) || ($_SESSION['user'] === 'Aptekor')):?>
                                                    <div class="display-button">
                                                        <button class="button15btn7" name="red_coments" id="button15btn7;?>" value="<?php echo $vars[0][$i]['id_Com'];?>"> </button>  <br>
                                                        <button class="button14 btn5" name="del_coment" value="удалить"> </button>
                                                    </div>
                                            <?php endif;?>
                                        <?php endif;?>
                                    </div>

                                    <div class="blog_box_full_text" id="">
                                        <p5> <?php echo $vars[0][$i]['text_comment'];?> </p5>
                                    </div>

                                    <div class="blog_box_autor_data">
                                        <p5>
                                            <?php echo $vars[0][$i]['name_Autor'];?>,
                                            <?php echo $vars[0][$i]['dataArticle'];?>,
                                            коментарий №<?php echo $vars[0][$i]['id_Com'];?>
                                        </p5>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
