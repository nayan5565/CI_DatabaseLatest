<!DOCTYPE html>
<html>
    <head> 
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: inherit;
                background-color: #f1f1c1;
            }
            th, td {
                padding: 5px;
                text-align: left;
            }
        </style>

    </head>

    <body>

        <table>
            <caption>Table Sample</caption>
            <tr>
                <th>status</th>
                <th>title</th> 
                <th>details</th>
                <th>categoryTitle</th>
            </tr>

            <?php
            foreach ($records as $rec) {
                echo '<tr>'
                . '<td>' . $rec->status . ' </td>'
                . '<td>' . $rec->title . ' </td>'
                . '<td>' . $rec->details . ' </td>'
                . '<td>' . $rec->title . ' </td>'
                . '</tr>';
//                echo "<br/>" . $rec->id . "  " . $rec->title . "  " . $rec->details . "  " . $rec->categoryId . "  " . $rec->link . "  " . $rec->status;
            }
            ?>
        </table>

    </body>
</html>
