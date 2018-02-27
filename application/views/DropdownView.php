<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test insert/update</title>

        <style> 
            .select {
                width: 130px;
                background-color: #4CAF50;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }



            input[type=option] {
                width: 130px;
                box-sizing: border-box;
                border: 2px solid #ccc;
                margin: 8px 0;
                border-radius: 4px;
                font-size: 16px;
                background-color: white;

                background-position: 10px 10px; 
                background-repeat: no-repeat;
                padding: 12px 20px 12px 40px;

            }

            input[type=text]:focus {
                width: 30%;
            }
            button[type=submit]{
                background-color: greenyellow;
                border-radius: 10px;
            }
            #bd{
                width: 130px;
            }
        </style>
    </head>
    <body>


    <center>

        <!--<form>-->
        <label for='formCountries[]'>Select the countries that you have visited:</label><br>
        <form action="<?php echo site_url("Api/dropdown") ?>" method="post">

            <select class="bd"  name="formCountries">
                <?php foreach ($results as $rec) { ?>
                    <option value="<?php echo $rec->id; ?>"><?php echo $rec->title; ?></option>
                <?php } ?>    
            </select>
            <button type="submit" name="formSubmit">submit</button>
        </form>


        <h1> 
            <?php
            if (isset($error_msg['formCountries'])) {
                echo $formCountries;
                echo $error_msg['formCountries'];
            }
            ?> 
        </h1>


        <!--</form>-->


    </center>
</body>
</html>