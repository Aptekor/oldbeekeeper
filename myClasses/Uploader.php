<?php


namespace myClasses;


class Uploader {

    public function imageLoads(){
        if (isset($_FILES['file'])) {

            if ($_FILES['file']['size'] > 1000){
                $msg = array('msg' => "Слишком большой размер файла");
                exit (json_encode($msg, JSON_UNESCAPED_UNICODE));
            }

            // 1. првоерка на тип загрузки
            if ($_FILES['file']['type'] == "image/png" ||
                $_FILES['file']['type'] == "image/jpeg" ||
                $_FILES['file']['type'] == "image/webp" ||
                $_FILES['file']['type'] == "image/gif") {


                // 2. првоерка на тип загрузки
                $imageinfo = getimagesize($_FILES['file']['tmp_name']);
                if ($imageinfo['mime'] == 'image/jpeg' ||
                    $imageinfo['mime'] == 'image/png' ||
                    $imageinfo['mime'] == 'image/webp' ||
                    $imageinfo['mime'] == 'image/gif') {

                    // 3. првоерка на тип загрузки
                    $blacklist = array('/.jpeg/i', '/.jpg/i', '/.png/i', '/.webp/i', '/.gif/i');
                    foreach ($blacklist as $item1) {
                        if (preg_match($item1, $_FILES['file']['name'])) {

                            $uploaddir = 'Uploads';
                            if (!is_dir($uploaddir)) {
                                mkdir($uploaddir, 0777);
                            }

                            $name = $_FILES['file']['name'];
                            $done_files = array();

                            if (is_uploaded_file($_FILES['file']["tmp_name"])) {
                                move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir . '/' . $name);
                                $done_files[] = '/' . $uploaddir . '/' . $name;
                                $data = $done_files ? array('files' => $done_files, 'answer' => true) : array('error' => 'Ошибка загрузки файлов.');
                                exit(json_encode($data));
                            }
                        }
                    }
                    $msg = array('msg' => "Простите Вы пытветесь загрузить не подходящий формат3");
                    exit (json_encode($msg, JSON_UNESCAPED_UNICODE));

                }else{
                    $msg = array('msg' => "Простите Вы пытветесь загрузить не подходящий формат2");
                    exit (json_encode($msg, JSON_UNESCAPED_UNICODE));
                }

            }else{
                $msg = array('msg' => "Простите Вы пытаетесь загрузить не подходящий формат1");
                exit (json_encode($msg, JSON_UNESCAPED_UNICODE));
            }
        }
    }
}
?>