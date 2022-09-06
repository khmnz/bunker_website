<html>
<head> 
<title>WEBSITE</title>
</head>
<body>
    <meta charset="UTF-8">
<header style="background-color: black; margin-bottom: 10px;">
      <div class="topnav">
        <IMG src="logo.png" height="16%"/>
        <a href="login.php"><p>ВХОД</p></a>
        <a href="booking.php"><p>БРОНИРОВАНИЕ</p></a>
        <a href="quests.php"><p>КВЕСТЫ</p></a>
        <a href="main.php"><p>ГЛАВНАЯ</p></a>
      </div>
      <style type="text/css">
      /* Add a black background color to the top navigation */
      .topnav {
        background-color: #000000;
        overflow: hidden;
        top: 0;
        width: 100%;
      }
      /* Style the links inside the navigation bar */
      .topnav a {
        float: right;
        color: #f2f2f2;
        text-align: center;
        padding: 24px 26px;
        text-decoration: none;
        font-size: 17px;
      }
      /* Change the color of links on hover */
      .topnav a:hover {
        background-color: #ddd;
        color: black;
      }
      .picture {
        width: 550px;
      }
      </style>
  </header>




<div class="main" style="width: 64%; float:left;"> 
      <p><img class="picture"
              src="welcome.png"/>
      </p>
      <?php
    require "db.php";

  $data = $_POST;
  if (isset($data['do_login'])) 
  {
    $errors = array();
    $user = R::findOne('users', 'login = ?', array($data['login'])); //there is the same login in database as the entered login
      if ($user )
      { 
        if (password_verify($data['password'], $user -> password)) {
          //checking password 
          $_SESSION['logged_user'] = $user; //authorization user
          echo '<div style="color: green; font-size: 26px;">Вы авторизованы! Можете перйти на <a href="main.php"; style="color: blue; font-size: 26px;">главную страницу</a>!</div><hr>'; //offer to go to home page
        } else
        {
          $errors[] = 'Пароль непраавильно введен!'; //show message that password is wrong

        }
      } else
      {
        $errors[] = 'Пользователь с таким логином не существует!'; //show message that there is no user with the entered login
      }

    if ( ! empty($errors)) 
      {
      echo '<div style="color: red; font-size: 26px; text-align: center;">'.array_shift($errors).'</div><hr>'; //make red color messages that show errors 
      }
     }
    ?>
</div> 

<div class="autho" style="width: 35%; float:right">
 <form action="login.php" method="POST">
	<p>
		<p><strong>Логин</strong>:</p>
	<input type="text" name="login" value="<?php echo @$data['login']; ?>"> <!--enter login-->

		<p><strong>Пароль</strong>:</p>
	<input type="password" name="password">  <!--enter password-->

		<p><button type="submit" name="do_login">Войти</button></p> <!--click the botton log in in order to get access to account-->
    <a href="signup.php"><p style="color: blue; margin-left: 50px;">У меня еще нет аккаунта</p></a>
	</p> 
 </form>
</div>

<style type="text/css">
	.picture {
    width: 100%;
    padding: 0;

    }
	.autho {
    text-align: left;
    margin-top: 5%;
    font-size: 120%; /*text size*/
    text-indent: 30px;
	}
	.autho input {
    margin-left: 30px;
    font-size: 120%;
	}	
  .autho button {
  font-size: 120%;
  text-align: center;
  width: 60%;
  height: 8%;
  }
</style>


<div class="footer">
  <div class="column-left">
<p style="font-size: 22px">
    <img class="icon" src="location_icon.png"/>
      <a href="https://www.google.com/maps/place/%D1%83%D0%BB.+%D0%9F%D1%83%D1%88%D0%BA%D0%B8%D0%BD%D0%B0+140,+%D0%9A%D0%BE%D1%81%D1%82%D0%B0%D0%BD%D0%B0%D0%B9+110000/@53.2260417,63.6165177,17z/data=!3m1!4b1!4m5!3m4!1s0x43cc8a7a4d589455:0xf80c3fffa97531ee!8m2!3d53.2260385!4d63.6187064?hl=ru" target="_blank"> Адрес: город Костанай, улица Пушкина 140/1</a>
</p>
<p style="font-size: 22px">
    <img class="icon" src="phone_icon.png"/> Телефон: +7(705)-558-18-66</p>
  </div>
  <div class="column-right">
<p style="font-size: 22px">
    <img class="icon" src="vk_icon.png"/>
      <a href="https://vk.com/bunkerkst" target="_blank"> Сообщество "БУНКЕР" </p>
<p style="font-size: 22px">
    <img class="icon" src="insta_icon.png"/>
      <a href="https://www.instagram.com/bunkerkst/" target="_blank"> @bunkerkst</p> 
  </div>         
</div>

   <style>
      .footer{
        left: 0;
        float: left;
        width: 98.5%;
        background-color: black;
        color: white;
        text-align: center;
        padding-left: 2%;
      }
      .icon{
        width: 3%;
      }
      .column-left{ float: left; width: 40%; text-align: left;
      }
      .column-right{ float: right; width: 40%; text-align: left;
      }
      a:link { text-decoration: none; color: white;
      }
      a:visited { text-decoration: none; color: white; 
      }
      a:hover { text-decoration: underline; color: blue;
      }
      a:active { text-decoration: underline; color: blue;
      }
    </style>
</body>
</html>