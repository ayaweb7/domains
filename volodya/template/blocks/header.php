<?php
function createLink($href, $text) {
    if (
        (!isset($_GET['page']) and $href == '/') or
        (isset($_GET['page']) and $_GET['page'] == $href)
    ) {
        $class = ' class="active"';
    } else {
        $class = '';
    }

    if ($href != '/') {
        $hrefPart = '/template/?page=';
    } else {
        $hrefPart = '/template';
    }
    echo "<a href=\"$hrefPart$href\"$class>$text</a>";
}

$query = "SELECT * FROM pages WHERE url != '404'";
$result = mysqli_query($db, $query) or die(mysqli_error($db));

for ($data=[]; $row=mysqli_fetch_assoc($result); $data[] = $row);
foreach ($data as $page) {
    createLink($page['url'], $page['title']);
}


