<?php

//echo 'Records data from Items table';
//foreach ($records as $rec) {
//    echo "<br/>" . $rec->id . "  " . $rec->title . "  " . $rec->details . "  " . $rec->categoryId . "  " . $rec->link . "  " . $rec->status . "  " . $rec->title;
//}

echo 'image show'."<br/>";
foreach ($img as $rec) {

    echo "<img style='width:150px;' src=" . $rec->path . ">";
//    echo "<br/>" . $rec->id . "  " . $rec->path;
}
?>

