<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Test insert/update</title>

        <style>
            table { 
                margin-top: 30px;
                width: 40%;
            }
            .delete{
                margin: 20px 0 0 100px;
            }
        </style>
    </head>
    <body>
    <center>
        <form  method="Post">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th align="left">Title</th>
                        <th align="left">Details</th>
                        <th align="left">Created Date</th>
                        <th align="left">Update Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $rec) { ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="user_id[]" value="<?php echo $rec['id']; ?>"/>
                            </td>
                            <td><?php echo $rec['title']; ?></td>
                            <td><?php echo $rec['details']; ?></td>                           
                            <td><?php echo $rec['create_date']; ?></td>
                            <td><?php echo $rec['update_date']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <button type="submit" name="delete" value="delete" class="delete">Delete</button>
        </form>
    </center>
</body>
</html>