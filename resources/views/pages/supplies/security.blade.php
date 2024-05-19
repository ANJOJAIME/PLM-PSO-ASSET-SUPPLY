<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <title>PLM | SECURITY</title>

        <style>
             body {
                font-family: Arial;
                background-color: #4F74BB;
                margin: 0;
                padding: 20px;
                overflow: hidden;
            }
            .custom-header {
                position: absolute;
                left: 0px; /* Adjust as needed */
                top: 0px;
                width: 100%;
                height: 65px;
                flex-shrink: 0;
                background: #FFF;
                border-radius: 0px 0px 12px 12px;
                box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                display: flex;
                justify-content: space-between;
                padding: 0 20px;
                z-index: 2;
            }
            .side-bar{
                position: absolute;
                left: 0px;
                top: 45px;
                width: 16.5%;
                height: 100%;
                flex-shrink: 0;
                background: #2D349A;
                z-index: 1;
            }
            .container{
                position: absolute;
                left: 5%;
                top: 100px;
                width: 80%;
                height: 100%;
                flex-shrink: 0;
                z-index: 1;
            }
            h2{
                color: white;
                text-align: center;
                font-size: 20px;
                padding-top: 80px;   
            }
            .btn1{
                position: absolute;
                left: 27%;
                top: 27%;
                width: 100px;
                height: 25px;
                background: #4F74BB;
                color: white;
                border-radius: 12.5px;
                outline: 1px solid white;
                border: none;
            }
            .btn2{
                position: absolute;
                left: 35%;
                top: 27%;
                width: 100px;
                height: 25px;
                background: #4F74BB;
                color: white;
                border: none;
            }
            .text{
                position: absolute;
                left: 19%;
                top: 5%;
                color: white;
                font-size: 16px;
            }
            .text2{
                position: absolute;
                left: 19%;
                top: 17%;
                color: white;
                font-size: 16px;
            }
            .text3{
                position: absolute;
                left: 19%;
                top: 29%;
                color: white;
                font-size: 16px;
            }
            .btn-primary{
                position: absolute;
                top: 370px;
                left: 250px;
                border-radius: 8px;
                border: 0.5px solid #000;
                background: #D1DFFF;
                width: 140px;
                height: 38px;
                flex-shrink: 0;
                color: black;
            }
            .btn1-primary{
                position: absolute;
                top: 370px;
                left: 400px;
                border-radius: 8px;
                border: 0.5px solid #000;
                background: #D1DFFF;
                width: 100px;
                height: 38px;
                flex-shrink: 0;
                color: black;
            }
            .btn-primary:hover{
                background-color: blue;
                color: white;
                border: none;
            }
            .btn1-primary:hover{
                background-color: red;
                color: white;
                border: none;
            }
           
        </style>

<body>
        <header class="custom-header">
            <img src="/image/PLMLogo.png" alt="logo">
        </header>
        <div class="side-bar">
            <h2 ><strong>Settings</strong></h2>
            <a class="main" href="/supplies-view" style="color: #4F74BB; background-color: transparent; display: block; text-align: right; padding-right: 40px; font-family: Arial">Profile</a>
            <a class="delivered" href="/delivered-supplies-view" style="color: white; background-color: transparent; display: block; text-align: right; padding-right: 40px; font-family: Arial">Security</a>
        </div>
        <form action="/update-profile" method="POST">
            @csrf
            <div>
            <h2 class="text">Username</h2>
            <div class="search-bar" style="position: fixed; top: 21%; left: 250px; border-radius: 9.574px; background: #EFF0FF; display: flex; width: 25%; height: 40px; padding: 4.608px ; justify-content: space-between; align-items: center; flex-shrink: 0;">
                <div style="display: flex; align-items: center;">
                <input type="text" style="border: none; background-color: transparent; width: 430px; outline: none;" name="name" autocomplete=off placeholder="">
                </div> 
            </div>
            </div>
            <div>
            <h2 class="text2">New Password</h2>
            <div class="search-bar" style="position: fixed; top: 33%; left: 250px; border-radius: 9.574px; background: #EFF0FF; display: flex; width: 25%; height: 40px; padding: 4.608px ; justify-content: space-between; align-items: center; flex-shrink: 0;">
                <div style="display: flex; align-items: center;">
                <input type="email" style="border: none; background-color: transparent; width: 430px; outline: none;" name="email" autocomplete=off placeholder="">
                </div> 
            </div>
            </div>
            <div>
            <h2 class="text3">Confirm New Password</h2>
            <div class="search-bar" style="position: fixed; top: 45%; left: 250px; border-radius: 9.574px; background: #EFF0FF; display: flex; width: 25%; height: 40px; padding: 4.608px ; justify-content: space-between; align-items: center; flex-shrink: 0;">
                <div style="display: flex; align-items: center;">
                <input type="text" style="border: none; background-color: transparent; width: 430px; outline: none;" name="contact" autocomplete=off placeholder="">
                </div> 
            </div>
            </div>
            <div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
        </form>
        </div>
        <div>
            <button class="btn btn1-primary">Cancel</button>
        </div>
            
        
      

</body>
</html>


