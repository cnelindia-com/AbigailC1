<?php 
require_once 'config.php';
$rowperpage = 3;

// selecting posts
$query = 'SELECT * FROM tracks limit '.$row.','.$rowperpage;
$result = mysqli_query($db,$query);

$html = '';

while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $title = $row['track_title'];

    // Creating HTML structure
    $html .= '<div id="post_'.$id.'" class="post">';
    $html .= '<h1>'.$title.'</h1>';
    $html .= '</div>';

}

echo $html;

?>