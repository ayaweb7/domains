<?php
function createLink($href, $text) {
    if (
        (!isset($_GET['page']) and ($href == '/' or $href == 'admin/')) or
        (isset($_GET['page']) and $_GET['page'] == $href)
    ) {
        $class = ' class="nav-link active"';
    } else {
        $class = ' class="nav-link"';
    }

    if ($href == '/') {
        $hrefPart = '';
    } else {
        $hrefPart = '/?page=';
    }

    echo "<li><a href=\"$hrefPart$href\"$class>$text</a></li>";
}

$query = "SELECT * FROM pages WHERE marker='index'"; //WHERE url != '404'
$result = mysqli_query($db, $query) or die(mysqli_error($db));

for ($data=[]; $row=mysqli_fetch_assoc($result); $data[] = $row);
foreach ($data as $page) {
    createLink($page['url'], $page['title']);
}