<!DOCTYPE html>
<html>
    <head>
        <style>
            h1{
                color: green;
            }
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
            }

            li {
                float: left;
            }

            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            li a:hover:not(.active) {
                background-color: #4CAF50;
            }
            
            

            .active {
                background-color: #4CAF50;
            }
            #current a { background-color: <?php echo $colorh; ?>; }
            #current2 a { background-color: <?php echo $colorn; ?>; }
            #current3 a { background-color: <?php echo $colorc; ?>; }
            
        </style>
    </head>
    <body>
        <ul>
            <li id="current"><a  href="<?php echo base_url() . 'login/home'; ?>">Home</a></li>
            <li id="current2"><a href="<?php echo base_url() . 'login/news'; ?>">News</a></li>
            <li id="current3"><a href="<?php echo base_url() . 'login/contacts'; ?>">Contact</a></li>
            <li style="float:right"><a class="active" href="<?php echo base_url() . 'login/log_out'; ?>">Logout</a></li>
        </ul>
    <center><h1><?php echo $title; ?>  </h1></center>
    
</body>
</html>
