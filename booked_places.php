<html>
<head> 
<title>WEBSITE</title>
</head>
<body>
    <meta charset="UTF-8">
  <header style="background-color: black; margin-bottom: 10px;">
      <div class="topnav">
        <IMG src="logo.png" height="16%"/>

        <a href="login.php"><p>ВЫЙТИ</p></a> <!--click the link in order to authorize-->
        <a href="booking.php"><p>ЗАБРОНИРОВАННЫЕ МЕСТА</p></a>
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



<style>
th, td {
  border: 2px solid black;
}
table {
  width: 100%;
  padding-bottom: 20px;
  padding-top: 20px;
  padding-left: 30px;
  padding-right: 30px;
  font-size: 26px;
}

th {
  height: 50px;
  text-align: left;
  padding-left: 10px;
}
td {
    text-align: left;
  padding-left: 10px;
}

</style>
<?php
require_once 'db.php'; // refer to the file
 
$link = mysqli_connect('localhost', 'admin', 'khm0304', 'bunker') 
    or die("Ошибка " . mysqli_error($link)); 
     
$query ="SELECT * FROM places";
 
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // amount of received lines
     
    echo "<table 
><tr><th>ID</th><th>Логин</th><th>Номер телефона</th><th>Квест</th><th>Количество человек</th><th>Дата</th><th>Время</th></tr>"; //create table
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 7 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }


    echo "</table>";
     
    // clean result
    mysqli_free_result($result);
}
 
mysqli_close($link); // close database
?>



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