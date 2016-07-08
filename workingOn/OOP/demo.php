<?php
require 'Address_inc.php';
/**
 * Created by PhpStorm.
 * User: saresa
 * Date: 7/6/16
 * Time: 9:32 AM
 */

//title
echo '<h2> Instantiating Address</h2>';

//create instance of new class
$address = new Address();

// used for debuggin to display properties for Address class
echo '<h2>Empty Address</h2>';
echo '<tt><pre>'.var_export($address, TRUE) . '</pre></tt>';

//setting the properties and outputting them
echo '<h2> Setting Properties </h2>';
$address->street_address_1 = '1234 Apple Lane';
$address->city = 'Detroit';
$address->subdivision = 'MI';
$address->postal_code = '12345';
$address->country = 'United States of America';
echo '<tt><pre>'.var_export($address, TRUE) . '</pre></tt>';

//display information using method from class
echo '<h2> Display Address </h2>';
echo $address->display();

//test ma
echo '<h2> Testing Magic __get and __set</h2>';
unset($address->postal_code);
echo $address->display();

