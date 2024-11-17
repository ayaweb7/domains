<?php
/**
 * Класс фото-галереи на сайт
 * @author дизайн студия ox2.ru
 */
class Gallery {

    public function getGallery() {
        $files = scandir("images/"); //Выбираем все содержимое папки images, и записываем из в массив $files
        $gallery_files = array();
        foreach ($files as $key => $value) { //Проходим по массиму
            if (filetype("images/" . $value) == 'file') { //Проверяем файл или нет, если файл, то:
                $gallery_files[] = $value;  //Записываем в массив
            }
        }
        return $gallery_files; //Возвращаем массив
    }

}

$obj = new Gallery();
$gallery = $obj->getGallery();
?>
<img src="" alt="" id="gallery" />
<div id="number_img"></div>
<a href="javascript:void(0)" onclick="backImg(); this.blur();">Назад</a> / <a href="javascript:void(0)" onclick="nextImg(); this.blur();">Вперед</a>

<script type="text/javascript">
    var images = new Array();
    var current_image_key = 0; //Переменная содержит номер текущей фотографии
<?php
foreach ($gallery as $key => $file) { //Проходим по всем фотографиям
    echo "images[$key] = new Image();\n\r"; //Создаем новый объект Images
    echo "images[$key].src = './images/$file';\n\r"; //Записываем путь к фотографии
}
?>
/**
 * Функция обновляет текущее изображение, и его номер
 */
function refreshImage() {
    document.getElementById('gallery').src = images[current_image_key].src; //Изменяем изображение на текущее
    document.getElementById('number_img').innerHTML = (current_image_key+1) + ' из ' + images.length //Изменяем надпись под изображением
}

/**
 * Следующая фотография
 */
function nextImg() {
    current_image_key++; //Увеличиваем текущую фотографию на 1
    if (current_image_key >= images . length) current_image_key = 0; //Если достигнут конец, то делаем первую фотографию текущей
    refreshImage(); //Обновляем фотографию
}
/**
 * Предыдущая фотография
 */
function backImg() {
    current_image_key--; //Уменьшаем текущую фотографию на 1
    if (current_image_key < 0) current_image_key = images . length - 1; //Если достигнуто начало, то делаем последнюю фотографию текущей
    refreshImage(); //Обновляем фотографию
}
refreshImage(); //Обновляем фотографию
</script>

