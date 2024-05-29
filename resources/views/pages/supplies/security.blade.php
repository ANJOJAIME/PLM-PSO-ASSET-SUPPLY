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
            .name{
                color: white;
            }
            .email{
                color: white;
            }
            .contact{
                color: white;
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
        <div class="card" style="position: fixed; top: 15%; left: 230px; width: 25%; background-color: #4F74BB; padding: 20px; border-radius: 10px; border: none;">
        <form action="/update-profile" method="POST">
            @csrf
            <div class="form-group">
            <label class="name">Old Password</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your old password">
            </div>
            <div class="form-group">
            <label class="email">New Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your new password">
            </div>
            <div class="form-group">
            <label class="contact">Confirm New Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your new password">
            </div>
            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to save changes?')">Save Changes</button>
            <a href="/user-profile" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel?')">Cancel</a>
        </form>
    </div>
        
      

</body>
</html>


