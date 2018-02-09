<?php 

echo 'Records data from Items table';
foreach ($records as $rec) {
    echo "<br/>" . $rec->id . "  " . $rec->title . "  " . $rec->details . "  " . $rec->categoryId . "  " . $rec->link . "  " . $rec->status;
}
