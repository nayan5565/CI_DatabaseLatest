<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test insert/update</title>

        <style> 
            input[type=text] {
                width: 40%;
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
                /*                -webkit-transition: width 0.4s ease-in-out;
                                transition: width 0.4s ease-in-out;*/
            }

            input[type=text]:focus {
                width: 40%;

            }
            button[type=submit]{
                margin: 8px 0;
                background-color: greenyellow;
                border-radius: 10px;
            }
/*            select {

                width: 40%;
                height: 6%;
                line-height:30px;
                background:#f4f4f4;
            } 
            option {
                color: red;
            }*/
            .bootstrap-select.formCountries.show-tick .dropdown-menu option.selected a span.check-mark{
                position: absolute;
                display: inline-block;
                left: 5px; /*changed from right:15*/
                margin-top: 5px;
            }
            </style>
        </head>
        <body>

        <center>

            <form  method="Post">


 <!--<input type="text" name="id" placeholder="Id"><br/>-->
                <input type="text" name="title" placeholder="Title"><br/>
                <input type="text" name="details" placeholder="Details"><br/>
                <input type="text" name="link" placeholder="Link"><br/>
                <!--<input type="text" name="cat" placeholder="Category"><br/>-->
                <input value="" type="text" name="status" placeholder="Status"><br/>
                <select class="bd"  name="formCountries">
                    <option value="NULL">Select Category</option>
                    <?php foreach ($results as $rec) { ?>
                        <option value="<?php echo $rec->id; ?>"><?php echo $rec->title; ?></option>
                    <?php } ?>    
                </select>
                <?php
                if (isset($error_msg['formCountries'])) {

                    echo $error_msg['formCountries'];
                }
                ?> 
                </br>
                <button type="submit" name="submit" value="save">Save</button>
            </form>


        </center>
    </body>
</html>