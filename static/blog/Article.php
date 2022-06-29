<?php if($_SERVER['REQUEST_URI'] == "/content"):?>
    <div class="content1">
        <div class="container">
            <h1>  Редактор  </h1>

            <form action="" method="post"  class="article-form">
                <input type="text" class="article-title-input" name="titleArticle" value="<?php if (isset($_POST['titleArticle'])) {echo $_POST['titleArticle'];}?>" placeholder="Название статьи"><br>
                <textarea name="textArticle" class="article-text-input" value="<?php if (isset($_POST['textArticle'])) {echo $_POST['textArticle'];}?>" placeholder="Текст статьи"></textarea><br>

               <div class="button-text">
                <button class="button10" type="submit" name="in_put_Article"> Написать </button>
               <!-- <button class="button10" type="submit" name="red_Article"> Редактировать </button>
                <button class="button10" type="submit" name="del_Article"> Удалить </button>--!>
               </div>
            </form>

           <!-- <div> <?php if (isset($_SESSION['errors'])) {
                    print_r($_SESSION['errors']);
                    unset($_SESSION['errors']);}?></div> --!>
        </div>
    </div>
<?php endif;?>
