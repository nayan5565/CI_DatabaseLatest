<?php

echo 'Records data from category table';
foreach ($records as $rec) {
    echo "<br/>" . " id =" . $rec->id . " title =" . $rec->title . " details =" . $rec->details . " status = " . $rec->status;
}

