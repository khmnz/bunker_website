<html>
<head> 
<title>WEBSITE</title>
</head>
<body>
    <meta charset="UTF-8">
<header style="background-color: black; margin-bottom: 10px;">
      <div class="topnav">
        <IMG src="logo.png" height="16%"/>
       <a href="signup.php"><p>ВХОД</p></a>    
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




<div class="main" style="width: 65%; float:left;"> 
      <p><img class="picture"
              src="welcome.png"/>
      </p>


<?php
    require "db.php";

  $data = $_POST;
  if (isset($data['do_signup'])) {
    $errors = array();        //checking by erorrs
    if (trim($data['login'])=='') {    //if there is empty space instead of entered login
      $errors[] = 'Введите логин!'; //enter login 
    }

    if (trim($data['Email'])=='') {    //if there is empty space instead of entered E-mail
      $errors[] = 'Введите Email!'; //enter E-mail
    }

    if ( $data['password']=='' ) {      //if there is empty space instead of entered password
      $errors[] = 'Введите пароль!'; //enter password
    }

    if ( $data['password_2'] != $data['password'] ) {     // if repeated password is not same as first entered password
      $errors[] = 'Повторный пароль введен не верно!'; //show message to make aware user that repeated password was wrong
    }

    if ( R::count('users', "login = ?", array($data['login'])) > 0 ) //if there is another registreated user in the system wuth the same login
    {
      $errors[] = 'Пользователь с таким логином уже существует!'; //show message to make aware user
    }

    if ( R::count('users', "Email = ?", array($data['Email'])) > 0 ) //if there is another registreated user in the system with the same E-mail
    {
      $errors[] = 'Пользователь с таким E-mail уже существует!'; //show message to make aware user
    }

    if (empty($errors)) //if there is no error
    { 
      $user = R::dispense('users');
      $user -> login = $data['login'];
      $user -> Email = $data['Email'];
      $user -> password = password_hash($data['password'], PASSWORD_DEFAULT); //hash password to save in the database
      R::store($user); //store the user in database
      echo '<div style="color: green; font-size: 26px;">Вы успешно зарегистрированы!</div><hr>'; //make aware user that registration is success
    } else
    {
      echo '<div style="color: red; font-size: 26px;">'.array_shift($errors).'</div><hr>'; //make red color messages that show errors 
    }
}
?>


</div> 

<div class="reg" style="width: 35%; float:right">
<form action="signup.php" method="POST">
	<p><strong>Ваш логин</strong>:</p>
	<input type="text" name="login" value="<?php echo @$data['login']; ?>">  <!--enter login--> 
	<p><strong>Ваш E-mail</strong>:</p>
	<input type="Email" name="Email" value="<?php echo @$data['Email']; ?>">  <!--enter E-mail--> 

	<p><strong>Ваш пароль</strong>:</p>  
	<input type="password" name="password"> <!--enter password--> 

	<p><strong>Введите ваш пароль еще раз</strong>:</p> <!--repeat password-->
	<input type="password" name="password_2">

	<p><button type="submit" name="do_signup">Зарегистрироваться</button></p> <!--click on the register button in order to save personal data if there is no errors-->
  <a href="login.php"><p style="color: blue; margin-left: 50px;">У меня уже есть аккаунт</p></a>
</form>
</div> 

<style type="text/css">
	.picture {
    width: 100%;
    padding: 0;

    }
	.reg {
    text-align: left;
    font-size: 120%; /*text size*/
    text-indent: 30px;
	}
	.reg input {
    margin-left: 30px;
    font-size: 120%;
	}	
  .reg button {
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