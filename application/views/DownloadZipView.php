<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>zip</title>

        <style> 
            input[type=file] {
                width: 100%;
                box-sizing: border-box;
                border: 2px solid #ccc;
                margin: 8px 0;
                border-radius: 4px;
                font-size: 16px;
                background-color: #ffdddd;

                background-position: 10px 10px; 
                background-repeat: no-repeat;
                padding: 12px 20px 12px 40px;


            }
        </style>
    </head>
    <body>
    <center>
        <h1>welcome</h1>
        <a href="<?php echo base_url('index.php/api/downloadZip'); ?>">download zip</a>
    </center>
</body>
</html>