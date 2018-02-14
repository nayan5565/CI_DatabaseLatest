<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Multi File upload</title>

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
        <?php
        echo form_open_multipart();
        echo form_upload(array(
            'multiple' => '',
            'name' => 'file_upload[]'
        ));
        echo form_error('file_upload');
        echo form_submit(array(
            'name' => 'file_submit',
            'value' => 'upload file 2'
        ));

        echo form_close();
        ?>
        
        <ul>
            <?php 
            if($query->num_rows()>0){
                foreach ($query->result() as $data){
                    echo '<li>';
                    echo img(array(                     
                        'src'=>'image2/'.$data->path
                            
    
                    ));
         
                    echo '</li>';
                }
            }
            else{
                echo '<li>file still empty</li>';
            }
            ?>
        </ul>

    </center>
</body>
</html>