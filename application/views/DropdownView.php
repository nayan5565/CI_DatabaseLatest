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
        </style>
    </head>
    <body>

    <center>
        <label for='formCountries[]'>Select the countries that you have visited:</label><br>

        <select  name="formCountries[]">

            <option value="US">United States</option>

            <option value="UK">United Kingdom</option>

            <option value="France">France</option>

            <option value="Mexico">Mexico</option>

            <option value="Russia">Russia</option>

            <option value="Japan">Japan</option>

        </select>



    </center>
</body>
</html>