<?php

namespace OnlyJaiden\ScrimAS;

use OnlyJaiden\ScrimAS\Main;
use pocketmine\utils\Config;
use pocketmine\player\Player;


class User{
    public $User = [];
    
    public function checkAlert(Player $player) : void
    {
        $config = new Config('plugin_data/ScrimAS/'."user.yml", Config::YAML);
        $new = Main::getInstance()->getConfig();
        if($config->get($player->getName()) == true) 
        {
            $config->set($player->getName(), false);
            $player->SendMessage($new->get("AntiCheat.prefix")." Your alerts are now ENABLED!");
        } elseif($config->get($player->getName()) == false) {
            $config->set($player->getName(), true);
            $player->SendMessage($new->get("AntiCheat.prefix")." Your alerts are now DISABLED!");
        }
        $config->save();
        
    }
    
    public function getUser(Player $staff) : string
    {
         if($this->config($staff) == "false") 
         {
           return "false";
         }
         
    }

    private function config(Player $staff)
    {
        $config = new Config('plugin_data/ScrimAS/'."user.yml", Config::YAML);
        if($config->get($staff->getName()) == false) 
        {
          return "false";
        }
    }

}