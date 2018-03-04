<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>File upload</title>

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
        <?php echo $error; ?>
        <form action="upload"  method="Post" enctype="multipart/form-data">

            <input type="file" name="image">
            <!--<input type="submit" name="submit" value="image upload">-->

                        <button>Upload</button>
        </form>
    </center>
</body>
</html>