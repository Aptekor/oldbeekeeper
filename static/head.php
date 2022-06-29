<!DOCTYPE HTML>
<html lang="ru">
<head>
    <title> oldbeekeeper - офмциальный сайт о пчеловодстве </title>
    <meta name="descriotion" content="Все, что выхотеле знать о пчеловодстве и меде"/>
    <meta name="keywords" content="мед, пчеловодство"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="/css/style1.css?<?php echo date("h:i:sa");?>" rel="stylesheet" type="text/css"/>
    <link href="/css/CkEditStyles.css"<?php echo date("h:i:sa");?>" rel="stylesheet" type="text/css"/>

</head>


    <body>
    <?php include 'static/header.php'; ?>
    <?php  echo $content; ?>
    <?php  include 'static/footer.php'; ?>


        <div id="wrapper"> </div>
        <div id = "modal" >
            <div class="popup1">
                <form method="post" class="form_index">
                    <h32>Login Form</h32> <br><br>
                    <div>
                         <input type="text" name="loginUser" class="username" placeholder="Логин"><br>
                    </div>

                    <div>
                        <input type="password" name="passUser"  class="password" placeholder="Пароль"><br><br>
                    </div>
                    <div>
                        <input class="button10 btn1" type="submit"  name="in_put" placeholder="Войти"><br><br>
                    </div>
                    <div id="error_cod">
                        <p1 id="msg1"></p1>
                    </div>
                    <a href="/account"> <p> Жми сюда если еще не зарегестрировался?</p></a>
                </form>
            </div>
        </div>
    </body>
<script type="text/javascript" src="/JS/jquery.js"></script>
<script type="text/javascript" src="/JS/particles.min.js"></script>
<script type="text/javascript" src="/JS/search.js"></script>
<script type="text/javascript" src="/JS/ajax.js"></script>
<script type="text/javascript" src="/JS/style.js"></script>
<script type="text/javascript" src="/plugins/dist/bundle.js"></script>

</html>