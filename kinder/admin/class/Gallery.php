<?php
/**
 * Класс фото-галереи на сайт
 * @author дизайн студия ox2.ru
 */
class Gallery {

    public function getGallery() {
        $files = scandir("../images/"); //Выбираем все содержимое папки images, и записываем из в массив $files
        $gallery_files = array();
        foreach ($files as $key => $value) { //Проходим по массиму
            if (filetype("../images/" . $value) == 'file') { //Проверяем файл или нет, если файл, то:
                $gallery_files[] = $value;  //Записываем в массив
            }
        }
        return $gallery_files; //Возвращаем массив
    }

}