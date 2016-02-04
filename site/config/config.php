<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'K2-PERSONAL-c0cf577a408470ebfd3eb96d6a566b21');

/*
---------------------------------------
Kirby Configuration
---------------------------------------
*/

//Removeing the "home" from the url when viewing projects
c::set('routes', array(
  array(
    'pattern' => '(:any)',
    'action'  => function($uid) {

      $page = page($uid);

      if(!$page) $page = page('home/' . $uid);
      if(!$page) $page = site()->errorPage();

      return site()->visit($page);

    }
  ),
  array(
    'pattern' => 'home/(:any)',
    'action'  => function($uid) {
      go($uid);
    }
  )
));