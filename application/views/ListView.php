<!DOCTYPE html>
<html>
    <body>

        <h2>An Items List</h2>

        <ol>
            <?php
            foreach ($records as $rec) {
//                echo '<li>' . $rec->status . ' </li>';

                echo '<li>' . $rec->id . "  " . $rec->title . "  " . $rec->details .  $rec->status . ' </li>';
            }
            ?>
        </ol>  

    </body>
</html>

