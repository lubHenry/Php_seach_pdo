<?php
namespace Urenah;

use Urenah\SearchModel;
require_once __DIR__ . "/../Model/SearchModel.php";
require_once __DIR__ . '/../lib/Config.php';

$search_keyword = '';

if (! empty($_POST['search'])) {
    $search_keyword = $_POST['search'];
}

/* Pagination Code starts */
$per_page_html = '';
$page = 1;
$start = 0;
if (! empty($_POST["page"])) {
    $page = $_POST["page"];
    $start = ($page - 1) * Config::LIMIT_PER_PAGE;
}
$searchModel = new SearchModel();

$result = $searchModel->getAllPosts($start, Config::LIMIT_PER_PAGE, $search_keyword);

function highlightKeywords($text, $keyword)
{
    $wordsAry = explode(" ", $keyword);
    $wordsCount = count($wordsAry);

    for ($i = 0; $i < $wordsCount; $i ++) {
        $highlighted_text = "<span style='font-weight:bold;'>$wordsAry[$i]</span>";
        $text = str_ireplace($wordsAry[$i], $highlighted_text, $text);
    }

    return $text;
}
if (! empty($_POST["page"])) {
    if (! empty($result)) {
        foreach ($result as $row) {
            if (Config::ENABLE_HIGHLIGHT == true) {
                $post_title = highlightKeywords($row["post_title"], $_POST["search"]);
                $new_description = highlightKeywords($row["description"], $_POST["search"]);
                $post_at = highlightKeywords($row["post_at"], $_POST["search"]);
            } else {
                print $post_title = $row['post_title'];
                $new_description = $row['description'];
                $post_at = $row['post_at'];
            }
            ?>
<tr class='table-row'>
	<td><?php echo $post_title ?></td>
	<td><?php echo $new_description ?></td>
	<td><?php echo $post_at ?></td>
</tr>
<?php
        }
    }
}

?>
