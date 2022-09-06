<html>
<head> 
<title>WEBSITE</title>
</head>
<body>
    <meta charset="UTF-8">
<header style="background-color: black; margin-bottom: 10px;">
      <div class="topnav">
        <IMG src="logo.png" height="16%"/>
        <a href="login.php"><p>ВХОД</p>
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
              src="forbooking.png"/>
      </p>

<?php
    require "db.php";

  $data = $_POST;
  if (isset($data['do_booking'])) {
    $errors = array();        //checking by erorrs
    if (trim($data['login'])=='') {    //if there is empty space instead of entered login
      $errors[] = 'Введите логин!'; //enter login 
    }

    if (trim($data['phone_number'])=='') {    //if there is empty space instead of entered phone number
      $errors[] = 'Введите ваш номер телефона!'; //enter your phone number
    }

    if (trim($data['quest'])=='') {    //if there is empty space instead of picked quest
      $errors[] = 'Выберите квест!'; //choose the quest from 4 options given
    }

    if (trim($data['number_of_people'])=='') {    //if there is empty space instead of entered number of people in the group
      $errors[] = 'Выберите количество человек в группе!'; //choose the number of people in the group
    }

    if (trim($data['date'])=='') {    //if there is empty space instead of entered date of quest
      $errors[] = 'Выберите день!'; //choose the date of the quest
    }

    if (trim($data['time'])=='') {    //if there is empty space instead of entered time
      $errors[] = 'Выберите время!'; //choose the time of the quest
    }

    if ( R::count('users', "login = ?", array($data['login'])) == 0 ) //if entered login is not registered
    {
      $errors[] = 'Пользователь с таким логином не существует! Без аккаунта вы не можете забронировать квест!'; //show message to make aware user that without account cannot book the quest
    }

    if ( R::count('places', "date = ?", array($data['date'])) > 0 ) &&  ( R::count('places', "time = ?", array($data['time'])) > 0 )//if the data and time is taken
    {
      $errors[] = 'Данный квест уже забронирован!'; //show message  that quest is already taken
    }
  


    if (empty($errors)) //if there is no error
{ 
      $place = R::dispense('places');
      $place -> login = $data['login'];
      $place -> phone_number = $data['phone_number'];
      $place -> quest = $data['quest'];
      $place -> number_of_people = $data['number_of_people'];
      $place -> date = $data['date'];
      $place -> time = $data['time'];

      R::store($place); //store the user in database
      echo '<div style="color: green; font-size: 26px;">Квест успешно забронирован! Цена с каждого: 1500 тенге.</div><hr>'; //make aware user that booking is success
      


    } else
    {
      echo '<div style="color: red; font-size: 26px;">'.array_shift($errors).'</div><hr>'; //make red color messages that show errors 
    }
}

?>


</div> 

<div class="book" style="width: 35%; float:right">
<form action="booking.php" method="POST">
  <p><strong>Ваш логин</strong>:</p>
  <input type="text" name="login" value="<?php echo @$data['login']; ?>">  <!--enter login--> 
  <p><strong>Номер телефона</strong>:</p>
  <input type="varchar" name="phone_number" value="<?php echo @$data['phone_number']; ?>">  <!--enter E-mail--> 
  <p><strong>Квест</strong>:</p>
  <input type="radio" name="quest"
  <?php if (isset($quest) && $quest=="Побег  из  тюрьмы") echo "checked";?>
  value="Побег  из  тюрьмы">Побег  из  тюрьмы
  <input type="radio" name="quest"
  <?php if (isset($quest) && $quest=="Дом-призрак") echo "checked";?>
  value="Дом-призрак">Дом-призрак<br>
  <input type="radio" name="quest"
  <?php if (isset($quest) && $quest=="Ограбление банка") echo "checked";?>
  value="Ограбление банка">Ограбление банка
  <input type="radio" name="quest"
  <?php if (isset($quest) && $quest=="Логово Маньяка") echo "checked";?>
  value="Логово Маньяка">Логово Маньяка
  <p><strong>Количество человек</strong>:
  <input type="number" min="2" max="6" name="number_of_people" value="<?php echo @$data['number_of_people']; ?>"></p>

     <p><strong>Дата</strong>:</p>
  <input list="date" name="date">
  <datalist id="date">
    <option value="06.01.2020">
    <option value="07.01.2020">
    <option value="09.01.2020">
    <option value="10.01.2020">
    <option value="11.01.2020">
    <option value="12.01.2020">
  </datalist>

    <p><strong>Время</strong>:</p>
  <input list="time" name="time">
  <datalist id="time">
    <option value="13:00">
    <option value="14:15">
    <option value="15:30">
    <option value="16:45">
    <option value="18:00">
    <option value="19:15">
    <option value="20:30">
  </datalist>



  <p><button type="submit" name="do_booking">Забронировать</button></p> <!--click on the register button in order to save personal data if there is no errors-->
</form>
</div> 

<style type="text/css">
  .picture {
    width: 100%;
    padding: 0;

    }
  .book {
    text-align: left;
    font-size: 120%; /*text size*/
    text-indent: 30px;
  }
  .book input {
    margin-left: 30px;
    font-size: 120%;
  } 
  .book button {
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


</html>