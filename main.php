<html>
<head> 
<title>WEBSITE</title>
</head>
<body>
    <meta charset="UTF-8">
<header style="background-color: black; margin-bottom: 10px;">
      <div class="topnav">
        <IMG src="logo.png" height="16%"/>
        <?php require "db.php"; ?>
        <?php
          if (isset($_SESSION['logged_user'])):?>
        <a href="logout.php"><p>ВЫЙТИ</p>
        <?php else: ?> 
        <a href="login.php"><p>ВХОД</p>
        <?php endif; ?>
        <?php
          if ($_SESSION['login']==='admin'):?>
            <a href="booked_places.php"><p>ЗАБРОНИРОВАННЫЕ МЕСТА</p></a>
            <?php else: ?> 
        <a href="booking.php"><p>БРОНИРОВАНИЕ</p></a>
         <?php endif; ?>
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


  <div class="main" style="width: 38%; float:left;"> 
      <p><img class="picture"
                src="graph.png"/></p>
      <p><img class="picture"
                src="slogan.png"/></p>
  </div> 

  <div class="main" style="width: 56%; float:right">
      <p><font color="#000000">
      <p style="font-size: 32px"><b>Реалити-квест #1 в Костанае</b></p>
      <p style="font-size: 22px">Очень занимательная, завораживающая и просто потрясающая игра!</br>Его суть основана на поиске предметов, которые спрятаны в самых разных и неожиданных местах, и чтобы их найти, игроку надо не только проявить наблюдательность, но и суметь решить ряд мини головоломок, которые сопровождают квест на разных уровнях.</br>Помимо этого, все найденные предметы могут взаимодействовать друг с другом.</br>Эта игра для любителей игр на логику и мышление, где не нужно тупо ходить с пушкой и мочить все подряд, и к тому же это все в живую!</br> </br>Вам предоставляется возможность пройти одну из локаций:</br> "Дом-призрак", "Побег из тюрьмы", "Логово Маньяка" и "Ограбление банка".</br></br>
      <strong>Мы находимся по адресу г. Костанай, ул. Пушкина 140/1.</br>Телефон: +7(705)-558-18-66</strong></br></br>
      <code><font color="#2E2E2E">Игры проводятся только по предварительной записи.</code></p></br></br></br>
      <p style="font-size: 32px"> <font color="##ff0000"><strong>Правила и условия прохождения квеста:</strong></font></p>
      <p><font color="#000000"><ul type="disc" style="font-size: 22px">
              <li>Количество участников: от 2 до 6 человек;</li>
              <li>Возраст: от 14 до 60 лет – самостоятельно, от 7 лет в сопровождении родителей;</li>
              <li>Участники обязаны при записи оставить свои реальные имена и номера телефонов;</li>
              <li>Подтверждение брони происходит только после телефонного звонка со стороны администрации квеста;</li>
              <li>В случае возникновения непредвиденных обстоятельств игры могут быть отменены в одностороннем порядке, о чем игроки будут уведомлены.</li>
          </ul>
      </p>
      <p style="font-size: 22px"><font color="#000000">В квестах запрещено:
            <ol style="font-size: 22px">
                <li>Участвовать в игре в состоянии алкогольного или наркотического опьянения;</li>
                <li>Проводить фото- и видеосъемку, а также использовать любые гаджеты во время игры. Их вас попросят сдать в камеру хранения перед игрой;</li>
                <li>Применять грубую физическую силу по отношению к актерам/персоналу, причинение вреда реквизиту квеста.</li>
            </ol>
      </p>
  </div>

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
