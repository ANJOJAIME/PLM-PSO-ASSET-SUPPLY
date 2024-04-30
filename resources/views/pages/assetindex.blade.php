<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PLM | Asset Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<style>
*{
        margin: 0;
        padding: 0;
    
    } 
    .plmbg{
        background-image: url("/image/gradientbg.png");
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        background-size: 100% 100%;
        height: 100vh;
    }
    .Rectangle3{
        position: absolute;
        width: 375px;
        height: 540px;
        left: 100px;
        top: 60px;
        background: #FFFFFF;
        border-radius: 20px;  
    }
    img{
        position: absolute;
        width: 330px;
        height: 80px;
        left: 120px;
        top: 80px;
    }
    .text{
    position: absolute;
    width: 350px;
    height: 170px;
    left: 127px;
    top: 210px;
    font-family: Arial;
    font-style: normal;
    font-weight: bold;
    font-size: 24px;
    line-height: 36px;
    color: #2D6B9A;
    }
    .text2{
        position: absolute;
        width: 350px;
        height: 170px;
        left: 110px;
        top: 30px;
        font-family: Arial;
        font-style: normal;
        font-size: 15px;
        line-height: 36px;
        color: white;
    }
    .text2 a{
        color: white;
        text-decoration: none;
    }
    </style>
<body class="plmbg">


        <div class="Rectangle3"></div>  
        <img src="/image/PLMLogo.png" alt="plmlogo">
        <div class="text">
        <h1><strong>PLM Assets</strong> <br></h1>
        <h3>Sign In </h3> </div>
    <div class=" row"></div>
        <div class="col-lg-3">
            <div class="card-body">
                <div class="field-group" style="top: 280px; position: fixed; left: 250px;">
                <form action="{{ route('login', 'asset') }}" method="POST">
                        @csrf
                        <input type="hidden" name="portal" value="asset">
                        @if(Session::has('error'))
                            <div class="alert alert-danger text-center" role="alert">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <div  class="field-group" style="top: 320px; position: fixed; left: 120px; width: 330px;">
                            <div class="mb-3" style="position: relative">
                                <label for="first_name" class="form-label">Username</label>
                                <input type="text" name="first_name" class="form-control" id="first_name" required>
                            </div>
                            <div class="mb-3" style="position: relative">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <div class="mb-3" style="position: relative">
                                <div class="d-grid">
                                    <button class="btn btn-primary float-start">Login</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <div class="text2"><a href="/mainpage">  <span> &#8592; </span> Back to Main</div>        
</body>
</html>