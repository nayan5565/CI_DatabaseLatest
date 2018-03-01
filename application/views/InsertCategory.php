<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test insert/update</title>

        <style> 
            input[type=text] {
                width: 100%;
                box-sizing: border-box;
                border: 2px solid #ccc;
                margin: 8px 0;
                border-radius: 4px;
                font-size: 16px;
                background-color: white;

                background-position: 10px 10px; 
                background-repeat: no-repeat;

                padding: 12px 20px 12px 40px;
                /*                -webkit-transition: width 0.4s ease-in-out;
                                transition: width 0.4s ease-in-out;*/
            }
            h1{
                color: mistyrose;
            }
            input[type=text]:focus {
                width: 100%;

            }
            button[type=submit]{
                margin: 8px 0;
                background-color: greenyellow;
                border-radius: 10px;
            }

            table{
                width: 40%;
                height: 70%;
                box-sizing: border-box;
                border: 2px solid #ccc;
                margin: 8px 0;

                border-radius: 4px;
                font-size: 16px;
                background-color: moccasin;
                background-image: url('searchicon.png');
                background-position: 10px 10px; 
                background-repeat: no-repeat;
                padding: 12px 20px 12px 40px;
            }
            /*             tr {
            
                            width: 60%;
                            
                        } 
                         td {
            
                            width: 60%;
                            
                        } */
            select {

                width: 100%;
                height: 70%;
                line-height:30px;
                background:#f4f4f4;
            } /*
            option {
                color: red;
            }*/
            /*            .bootstrap-select.formCountries.show-tick .dropdown-menu option.selected a span.check-mark{
                            position: absolute;
                            display: inline-block;
                            left: 5px; changed from right:15
                            margin-top: 5px;
                        }*/
        </style>
    </head>
    <body>

    <center>

        <form  method="Post" name="inser">


            <table>

                <h1>Data Insert</h1>
                <tr class="row">
                    <td>
                        <input type="text" name="title" placeholder="Title"><br/>
                        <?php
                        if (isset($error_msg['title'])) {

                            echo $error_msg['title'];
                        }
                        ?> 
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        <input type="text" name="details" placeholder="Details"><br/>
                    </td>
                </tr>
              
                <tr class="row">
                    <td>
                        <input value="" type="text" name="status" placeholder="Status"><br/>
                    </td>
                </tr>
                



<!--<input type="text" name="cat" placeholder="Category"><br/>-->

            </table>



            </br>
            <button id="one" type="submit" name="submit" value="save">Save</button>

        </form>


    </center>
</body>
</html>