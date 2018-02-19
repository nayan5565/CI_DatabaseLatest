<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test insert/update</title>

        <style> 
            .dropbtn {
                background-color: #4CAF50;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }

            .dropdown {
                position: relative;
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content a:hover {background-color: #f1f1f1}

            .dropdown:hover .dropdown-content {
                display: block;
            }

            .dropdown:hover .dropbtn {
                background-color: #3e8e41;
            }

            input[type=text] {
                width: 130px;
                box-sizing: border-box;
                border: 2px solid #ccc;
                margin: 8px 0;
                border-radius: 4px;
                font-size: 16px;
                background-color: white;
                background-image: url('searchicon.png');
                background-position: 10px 10px; 
                background-repeat: no-repeat;
                padding: 12px 20px 12px 40px;
                -webkit-transition: width 0.4s ease-in-out;
                transition: width 0.4s ease-in-out;
            }

            input[type=text]:focus {
                width: 30%;
            }
            button[type=submit]{
                background-color: greenyellow;
                border-radius: 10px;
            }
        </style>
    </head>
    <body>

    <center>
        <div class="dropdown">
            <button class="dropbtn">Select category</button>
            <div class="dropdown-content">
                <?php foreach ($results as $rec) { ?>
                <a id="<?php  echo $rec->id; ?>" href="#<?php echo $rec->id; ?>"><?php echo $rec->title; ?></a>
                    <!--                <a href="#2">Link 2</a>
                                    <a href="#3">Link 3</a>-->
                <?php } ?>
            </div>
        </div>
        <form  method="Post">

            <input type="text" name="id" placeholder="Id"><br/>
            <input type="text" name="title" placeholder="Title"><br/>
            <input type="text" name="details" placeholder="Details"><br/>
            <input type="text" name="link" placeholder="Link"><br/>
            <input type="text" name="status" placeholder="Status"><br/>
            <input type="text" name="cat_id" placeholder="CategoryId"><br/>
            <button type="submit" name="submit" value="save">Save</button>
        </form>


    </center>
</body>
</html>