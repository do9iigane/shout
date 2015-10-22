<?php
echo GetIpAddr();

/*
  GetIpAddr
*/
function GetIpAddr()
{
    preg_match_all('/inet ?([^ ]+)/', `/usr/sbin/ifconfig`, $ipaddr);
//  var_dump($ipaddr);
    return $ipaddr[1][0];
}
