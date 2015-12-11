<?php
  require_once ( '../class.floodblocker.php' );
  $flb = new FloodBlocker ( '../floods/' );
  $flb->rules = array (
    10=>10,    // rule 1 - maximum 10 requests in 10 secs
    60=>30,    // rule 2 - maximum 30 requests in 60 secs
    300=>50,   // rule 3 - maximum 50 requests in 300 secs
    3600=>200  // rule 4 - maximum 200 requests in 3600 secs
  );
  if ( ! $flb->CheckFlood ( ) )
    die ( 'Too many requests! Please try later.' );
?>
