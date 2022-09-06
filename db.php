<?php
 	
require "libs/rb.php";
R::setup( 'mysql:host=localhost;dbname=bunker',
        'admin', 'khm0304' ); //link to the database

session_start(); //start of regiatration and authorization sessions