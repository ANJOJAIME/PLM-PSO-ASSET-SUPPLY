<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="app.css">
  <title>PLM | PSO Portal</title>
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
  .btn1
  {
    position: absolute;
    background-color: #4F74BB;
    top: 60%;
    left: 8.3%;
    font-size: 12px;
    border: none;
    height: 40px; 
    width: 310px;
    border-radius: 5px;
    font-size: 15px;
  }
  .btn1 a{
    color: white;
    text-decoration: none;
  }
  .btn1:hover, .btn2:hover{
    background-color: #2D6B9A;
  }
  .btn2
  {
    position: absolute;
    background-color: #4F74BB;
    top: 50%;
    left: 8.3%;
    font-size: 15px;
    border: none;
    height: 40px; 
    width: 310px;
    cursor: pointer;
    border-radius: 5px;
  }
  .btn2 a{
    color: white; 
    text-decoration: none;
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
    left: 127px;
    top: 256px;
    font-family: Arial;
    font-style: normal;
    font-weight: bold;
    font-size: 24px;
    line-height: 36px;
    color: #2D6B9A;
  }
  
</style>

<body class="plmbg">
    
    <div class="Rectangle3"></div>
    <img src="/image/PLMLogo.png" alt="plmlogo ">
    <div class="text">
      <h1>PLM Asset<br></h1>
    </div>
    <div class="text2">
      <h1>and Supplies</h1>
    </div>
    <div><button class="btn1"><a href="/Asset-login"><strong>Login for PLM Assets</strong></a></button></div>
    <div><button class="btn2"><a href="/Supply-login"><strong>Login for PLM Supply</strong></a></button></div>

  
</body>

</html>





