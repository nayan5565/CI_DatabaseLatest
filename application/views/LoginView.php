<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <style>
             input[type=submit] {             
                box-sizing: border-box;
                border: 2px solid #ccc;
                margin: 8px 0;
                border-radius: 4px;              
                background-color: #ffdddd;
                background-position: 10px 10px;                       
            }           
             input[type=password] {                                          
                margin: 8px 0;                                                         
            }
            
        </style>
    </head>
    <body>
    <center> 
        <h1><?php echo $title; ?>  </h1>
        
         <div class="container">
        <form action="<?php echo base_url(); ?>login/login_validation" method="Post">
            <div class="form-group">
                <label>Enter username</label>
                <input type="text" name="username" class="form-control"></br>
                <span class="text-danger"><?php echo form_error('username'); ?></span>
            </div>
            <div class="form-group">
                <label>Enter password</label>
                <input type="password" name="password" class="form-control"></br>
                <span class="text-danger"><?php echo form_error('password'); ?></span>
            </div>
            <div class="form-group">

                <input type="submit" name="insert" value="Login"></br>
                <?php echo $this->session->flashdata("error"); ?>
            </div>



        </form>
    </div>
    </center>

   


</body>
</html>

