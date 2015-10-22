<?php
require_once 'vendor/autoload.php';

//for mac
$ifconfig  = `/sbin/ifconfig`;

//for pidora
//$ifconfig  = `/usr/sbin/ifconfig`;

$shout = new Shout();
$shout->setIfcfg($ifconfig);
echo $shout->getIpAddr(2);


Class Shout {

    public $ifconfig = null;

    public function setIfcfg($ifconfig){
        $this->ifconfig = $ifconfig;
    }

    /*
      GetIpAddr
    */
    public function getIpAddr($num=0)
    {
        preg_match_all('/^inet\ ?([^ ]+)/', $this->ifconfig, $ipaddr);
        if(isset($ipaddr[1][$num])){
            return $ipaddr[1][$num];
        }else{
            return '127.0.0.1';
        }

    }
}


