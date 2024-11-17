<?php
/**
 * ����� ����-������� �� ����
 * @author ������ ������ ox2.ru
 */
class Gallery {

    public function getGallery() {
        $files = scandir("images/"); //�������� ��� ���������� ����� images, � ���������� �� � ������ $files
        $gallery_files = array();
        foreach ($files as $key => $value) { //�������� �� �������
            if (filetype("images/" . $value) == 'file') { //��������� ���� ��� ���, ���� ����, ��:
                $gallery_files[] = $value;  //���������� � ������
            }
        }
        return $gallery_files; //���������� ������
    }

}

$obj = new Gallery();
$gallery = $obj->getGallery();
?>
<img src="" alt="" id="gallery" />
<div id="number_img"></div>
<a href="javascript:void(0)" onclick="backImg(); this.blur();">�����</a> / <a href="javascript:void(0)" onclick="nextImg(); this.blur();">������</a>

<script type="text/javascript">
    var images = new Array();
    var current_image_key = 0; //���������� �������� ����� ������� ����������
<?php
foreach ($gallery as $key => $file) { //�������� �� ���� �����������
    echo "images[$key] = new Image();\n\r"; //������� ����� ������ Images
    echo "images[$key].src = './images/$file';\n\r"; //���������� ���� � ����������
}
?>
/**
 * ������� ��������� ������� �����������, � ��� �����
 */
function refreshImage() {
    document.getElementById('gallery').src = images[current_image_key].src; //�������� ����������� �� �������
    document.getElementById('number_img').innerHTML = (current_image_key+1) + ' �� ' + images.length //�������� ������� ��� ������������
}

/**
 * ��������� ����������
 */
function nextImg() {
    current_image_key++; //����������� ������� ���������� �� 1
    if (current_image_key >= images . length) current_image_key = 0; //���� ��������� �����, �� ������ ������ ���������� �������
    refreshImage(); //��������� ����������
}
/**
 * ���������� ����������
 */
function backImg() {
    current_image_key--; //��������� ������� ���������� �� 1
    if (current_image_key < 0) current_image_key = images . length - 1; //���� ���������� ������, �� ������ ��������� ���������� �������
    refreshImage(); //��������� ����������
}
refreshImage(); //��������� ����������
</script>

