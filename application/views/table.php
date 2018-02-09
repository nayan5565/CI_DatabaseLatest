<!DOCTYPE html>
<html>
    <head> Table Sample</head>
    <body>

        <table style="width:100%">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th> 
                <th>Age</th>
            </tr>
           
            <?php
            foreach ($records as $rec) {
                echo '<tr>'
                .'<td>'.$rec->status .' </td>'
                .'<td>'.$rec->title .' </td>'
                .'<td>'.$rec->details .' </td>'
            .'</tr>';
//                echo "<br/>" . $rec->id . "  " . $rec->title . "  " . $rec->details . "  " . $rec->categoryId . "  " . $rec->link . "  " . $rec->status;
            }
            ?>
        </table>

    </body>
</html>
