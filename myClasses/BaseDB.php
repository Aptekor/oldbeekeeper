<?php
namespace myClasses;

use http\Env\Response;
use PDO;


class BaseDB{

    protected $myDB;
    public $result;

    public function __construct(){
        $db_server = "localhost";
        $db_user = "mysql";
        $db_password = ",fpf#1";  // для сайта пороль  <fpflfyys[21
        $db_name = "dbmy";

        $this->myDB = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password);
    }




    /*  I______Раздел работы c пользователями ___________________________________________________________ */
    /*  1.1 ______Авторизация_____________ */
    public function autoriz(){
        /* Код авторизации*/
        if (isset($_POST['in_put'])) {
            if (empty($_POST['loginUser'])) {
                   $_SESSION['errors'] = "Введи логин";

                   $answer = array( 'msg'=>"Логин введи");
                   echo json_encode($answer, JSON_UNESCAPED_UNICODE);
                   exit();
            } else {
                if (empty($_POST['passUser'])) {
                    $_SESSION['errors'] = "Введи пароль";

                    $answer = array( 'msg'=>"Введи пароль");
                    echo json_encode($answer, JSON_UNESCAPED_UNICODE);
                    exit();

                } else {
                    $loginU = (htmlspecialchars(filter_var(trim($_POST['loginUser']), FILTER_SANITIZE_STRING)));
                    $passU = filter_var(trim($_POST['passUser']), FILTER_SANITIZE_STRING);

                    $zapros1 = "SELECT idUser, loginUser, passUser, verifUser FROM infouser WHERE loginUser = ?";
                    $test = $this->myDB->prepare($zapros1);
                    $test->execute([$loginU]);
                    $row = $test->fetch(PDO::FETCH_ASSOC);

                    if (isset($row['loginUser']) == $loginU && password_verify($passU, $row['passUser'])) {

                            $_SESSION['user'] = $row['loginUser'];
                            $_SESSION['id'] = $row['idUser'];
                            $_SESSION['status'] = $row['verifUser'];

                            // header('Refresh: 5; URL=http://oldbeekeeper'); //redirect с задержкой
                            $_SESSION['errors'] = "Авторизация прошла успешно"; //вывод сообщения

                            $answer = array( 'msg'=>"Авторизация прошла успешно");
                            echo json_encode($answer, JSON_UNESCAPED_UNICODE);

                            exit();

                        } else {

                            $_SESSION['errors'] = "введены неверные данные";
                            $answer = array('msg' => "введены неверные данные");
                            echo json_encode($answer, JSON_UNESCAPED_UNICODE);
                            exit();
                    }
                }
            }
        }
    }
    /*  1.2 ______Регистрация_____________ */

        public function reg(){
        /* Код Регистрации */
        if (isset($_POST['in_reg'])) {
            if (empty($_POST['loginUser'])) {
                $_SESSION['errors'] = "Введи логин";
            }
            if (empty($_POST['passUser'])) {
                $_SESSION['errors'] = "Введи пароль";
            }

            if (empty($_POST['emailUser'])) {
                $_SESSION['errors'] = "Введи почту";
            }

            if (empty($_POST['telUser'])) {
                $_SESSION['errors'] = "Введи телефон";
            }

            if (empty($_POST['birthdaylUser'])) {
                $_SESSION['errors'] = "Введи дату своего рождения";
            }



            $loginU = filter_var(trim($_POST['loginUser']), FILTER_SANITIZE_STRING);
            $emailU = filter_var(trim($_POST['emailUser']), FILTER_SANITIZE_STRING);
            $telU = filter_var(trim($_POST['telUser']), FILTER_SANITIZE_STRING);
            $birthdaylU = filter_var(trim($_POST['birthdaylUser']), FILTER_SANITIZE_STRING);
            $passU = password_hash(filter_var(trim($_POST['passUser']), FILTER_SANITIZE_STRING), PASSWORD_BCRYPT);

            if(mb_strlen($loginU) < 3 || mb_strlen($loginU) > 90){
                $_SESSION['errors'] = "Недопустимая длина логина";

            } else {

                $zapros1 = "SELECT * FROM `infouser` WHERE `loginUser` = ?";
                $test = $this->myDB->prepare($zapros1);
                $test->execute([$loginU]);
                $row1 = $test->fetch(PDO::FETCH_ASSOC);

                if (empty($row1['loginUser'])) {

                    if (isset ($_SESSION['user'])) {

                        header('Refresh: 5; URL=http://oldbeekeeper'); //redirect с задержкой
                        echo 'Вы будете перенаправлены на главную страницу через 5 секунд.'; //вывод сообщения

                        } else {

                        $zapros2 = "SELECT * FROM `infouser` WHERE `emailUser` = ?";
                        $test = $this->myDB->prepare($zapros2);
                        $test->execute([$emailU]);
                        $row2 = $test->fetch(PDO::FETCH_ASSOC);

                        if (empty($row2['emailUser'])) {

                            $zapros3 = "SELECT * FROM `infouser` WHERE `telUser` = ?";
                            $test = $this->myDB->prepare($zapros3);
                            $test->execute([$telU]);
                            $row3 = $test->fetch(PDO::FETCH_ASSOC);

                            if (empty($row3['telUser'])) {

                            $qur = $this->myDB->prepare("INSERT INTO infoUser (loginUser, passUser, verifUser, emailUser, telUser, statUser,  birthdayUser, dataRegUser ) VALUES (?,?,?,?,?,?,?,now())");
                            $qur->execute([$loginU, $passU, 0, $emailU, $telU, 'user', $birthdaylU ]);
                            echo 'Благодарим за регестрацию'; //вывод сообщения

                            } else {
                                $_SESSION['errors'] = "Этот телефон уже используется";
                            }

                        } else {
                            $_SESSION['errors'] = "Это почта уже используется";
                        }
                    }
                } else {
                    $_SESSION['errors'] = "Простите такой логин уже занят";
                }
            }
        }
    }

    /*  1.3 ______Логаут_____________ */
    public function destroySession() {
        $destroySessionFlag = filter_input(INPUT_POST, 'destroySession');
        if ($destroySessionFlag == 1) {
            session_destroy();
            header('Location: /');
           exit();
        }
    }

    /*  1.4 ______Получение информации о пользователе и вывод на страницу в отдельное окно_____________ */
    public function profil(){

            $zapros1 = "SELECT * FROM `infouser` WHERE `loginUser` = ?";
            $test = $this->myDB->prepare($zapros1);
            $test->execute([$_SESSION['user']]);
            $myprofil = $test->fetchAll(PDO::FETCH_ASSOC);
            return $myprofil;

    }



    /*  II______Раздел работы блога --- Ввод полной статьи в зависимости от запроса_____________ */
    /*   2.1.1____ Ввод статьи в базу данных_____ */
    public function blogArticle () {

        if (isset($_POST['in_put_Article']) && $_SESSION['user']) {
            if (empty($_POST['titleArticle'])) {
                $_SESSION['errors'] = "Введи наименование статьи";
            }
            if (empty($_POST['textArticle'])) {
                $_SESSION['errors'] = "Введи текст статьи";
            }

            $titleArt  = filter_var(trim($_POST['titleArticle']), FILTER_SANITIZE_STRING);
            $textArt = filter_var(trim($_POST['textArticle']), FILTER_SANITIZE_STRING);

            if(mb_strlen($titleArt) < 5 || mb_strlen($titleArt) > 90){
                $_SESSION['errors'] = "Недопустимая длина наименования статьи";

            } else {

                $zapros1 = "SELECT * FROM `myblog` WHERE `titleArticle` = ?";
                $test = $this->myDB->prepare($zapros1);
                $test->execute([$titleArt]);
                $row1 = $test->fetch(PDO::FETCH_ASSOC);

                if (empty($row1['titleArticle'])) {
                    $time = date("H:m:s");
                    $qur = $this->myDB->prepare("INSERT INTO myblog (titleArticle , textArticle, autorArticle, dataArticle) VALUES (?,?,?, now())");
                    $qur->execute([$titleArt, $textArt, $_SESSION['user']]);
                    header('Location:http:/');
                    exit('Благодарим за написание');//вывод сообщения

                } else {
                    $_SESSION['errors'] = "Такая статья существует переименуйте пожалуйста";
                }
            }
        }
    }
    /*   2.1.2____ Ввод редактируемой статьи в базу данных_____ */

    public function redArticle ()
    {
        if (isset($_POST['redOneArticle']) && $_SESSION['user'])
        {
            $redtextArt = htmlentities(trim($_POST['text_redact_one_article']));
            $idRedTextArt = filter_var(trim($_POST['red-id-article']), FILTER_SANITIZE_STRING);

            if(mb_strlen($redtextArt) < 5 || mb_strlen($redtextArt) > 250){
                $_SESSION['errors'] = "Недопустимая длина наименования статьи";
            } else {
                $url = $_SERVER['REQUEST_URI'];
                $parse = parse_url($url, PHP_URL_PATH);

                $qur1 = $this->myDB->prepare("UPDATE myblog SET textArticle = ?, dataArticle = now()  WHERE idArticle = ?");
                $qur1->execute([$redtextArt, $idRedTextArt]);
                header('Location:http:'. $parse);
            }
        }
    }

    /*   2.1.3____ Удаление статьи из базы данных_____ */
    public function DelArticle ()
    {
        if (isset($_POST['del_one_article']) && $_SESSION['user']) {
            $zapros = "DELETE FROM myblog WHERE `idArticle` = ?";
            $test = $this->myDB->prepare($zapros);
            $test->execute([$_POST['id-del-article']]);

            $zapros1 = "DELETE FROM comments WHERE `id_Page` = ?";
            $test1 = $this->myDB->prepare($zapros1);
            $test1->execute([$_POST['id-del-article']]);


            header('Location:http:/');
            exit();
        }
    }


    /*   2.2 _______ Вывод статьи в отдельное окно____________ */
    public function oneArticle () {
        $url = $_SERVER['REQUEST_URI'];
        $parse = parse_url($url, PHP_URL_PATH);
        $route = explode('/', $parse);

        if ($_SERVER['REQUEST_URI'] === "/content/".$route['2']) {
            $zapros1 = "SELECT * FROM `myblog` WHERE `idArticle` = ? ";
            $test = $this->myDB->prepare($zapros1);
            $test->execute([$route['2']]);
            $article = $test->fetchAll(PDO::FETCH_ASSOC);
            return $article;
        }
    }

    /*  2.3   _______Вывод статей на главной_____________ */
    public function viewArticle() {
        $zapros = "SELECT * FROM myblog LIMIT 4;";
        $test = $this->myDB->query($zapros);
        $result = $test->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    /*  2.4   _______Вывод статей отдельного автора_____________ */
    public function profilArticle()
    {
        $zapros = "SELECT * FROM myblog WHERE `autorArticle` = ?";
        $test = $this->myDB->prepare($zapros);
        $test->execute([$_SESSION['user']]);
        $myArticle = $test->fetchAll(PDO::FETCH_ASSOC);
        return $myArticle;
    }



    /*  2.5   _______Коментирование статей отдельного автора_____________ */
    public function cometsArticle(){
      /*  2.5.1  _______Ввод коментария_____________ */
      if (isset($_POST['in_put_coment']) && $_SESSION['user']) {
          if (empty($_POST['comentText'])) {
              $_SESSION['errors'] = "Введи коментарий к статье";
          } else {

              $url = $_SERVER['REQUEST_URI'];
              $parse = parse_url($url, PHP_URL_PATH);
              $route = explode('/', $parse);

              $textComent = filter_var(trim($_POST['comentText']), FILTER_SANITIZE_STRING);
              if (mb_strlen($textComent) < 5 || mb_strlen($textComent) > 90) {
                  $_SESSION['errors'] = "Недопустимая длина коментария";
              } else {

                  $qur = $this->myDB->prepare("INSERT INTO comments (id_Page, name_Autor, text_comment, dataArticle) VALUES (?,?,?, now())");
                  $qur->execute([$route['2'], $_SESSION['user'], $textComent]);
                  header('Location:http:'. $parse);

              }
          }
      }

    /*  2.5.2  _______Редактирвоание Коментариев_____________ */
      if (isset($_POST['redOneComent']) && $_SESSION['user'])
      {
        $redtextComment = filter_var(trim($_POST['text-redact-one-coment']), FILTER_SANITIZE_STRING);
        $idRedTextComment = filter_var(trim($_POST['country']), FILTER_SANITIZE_STRING);

        if(mb_strlen($redtextComment) < 5 || mb_strlen($redtextComment) > 90){
            $_SESSION['errors'] = "Недопустимая длина наименования статьи";
        } else {
            $qur1 = $this->myDB->prepare("UPDATE comments SET text_comment = ?, dataArticle = now()  WHERE id_Com = ?");
            $qur1->execute([$redtextComment, $idRedTextComment]);
        }
      }
    }


    /*  2.6  _______Вывод на редактирование конкретного коментария_____________*/
    public function redCometsArticle(){
        if (isset($_POST['red_coments']) && $_SESSION['user']) {
           $zapros = "SELECT * FROM comments WHERE `id_Com` = ?";
            $test = $this->myDB->prepare($zapros);
            $test->execute([$_POST['country']]);
            $myRedComment = $test->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($myRedComment, JSON_UNESCAPED_UNICODE);
            exit();
        }
    }


    /*  2.7   _______Удаление конкретного коментария_____________ */
    public function cometsArticleDel(){
        if (isset($_POST['del_coment']) && $_SESSION['user']) {
            $zapros = "DELETE FROM comments WHERE `id_Com` = ?";
            $test = $this->myDB->prepare($zapros);
            $test->execute([$_POST['country']]);
        }
    }


    /*  2.8  _______Вывод коментариев статьи_____________ */
    public function showCometsArticle() {
        $url = $_SERVER['REQUEST_URI'];
        $parse = parse_url($url, PHP_URL_PATH);
        $route = explode('/', $parse);

        $zapros = "SELECT * FROM comments WHERE `id_Page` = ?";
        $test = $this->myDB->prepare($zapros);
        $test->execute([$route['2']]);
        $allCometsArticle = $test->fetchAll(PDO::FETCH_ASSOC);
        return $allCometsArticle;
    }




    /*  III______Раздел работы блога --- Ввод полной статьи в зависимости от запроса_____________ */
    /*   3.1____ Поисковик_____ */


    public function serche(){

        if (isset($_POST['search_button'])) {

            if (empty($_POST['query'])) {
                $_SESSION['errors'] = "Пусто";

                /*$answer = array( 'msg'=>"Строка поиска пуста");
                echo json_encode($answer, JSON_UNESCAPED_UNICODE);*/

                } else {
                    $query = (htmlspecialchars(filter_var(trim($_POST['query']), FILTER_SANITIZE_STRING)));
                    $query = explode(' ', $query);
                    $arr1 = [];
                    $arr3 = [];
                    foreach ($query as $value) {
                        $query = '%' . $value . '%';
                        $zapros1 = "SELECT * FROM myblog WHERE titleArticle LIKE ?  OR  textArticle LIKE ? ";
                        $test = $this->myDB->prepare($zapros1);
                        $test->execute([$query, $query]);
                        $arr2 = $test->fetchAll(PDO::FETCH_ASSOC);
                        $arr1 = array_merge($arr1, $arr2);
                    }
                        $arr1 = array_unique($arr1, SORT_REGULAR);



                header("Content-type: application/json; charset=utf-8");
                echo json_encode($arr1, JSON_UNESCAPED_UNICODE);
                exit();

            }
        }
    }












}
?>