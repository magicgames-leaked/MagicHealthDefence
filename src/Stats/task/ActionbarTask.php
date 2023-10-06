<?php

namespace Stats\task;

use Stats\Main;
use Stats\player\MagicPlayer;
use pocketmine\scheduler\Task;

class ActionbarTask extends Task
{
    public function onRun(): void
    {
        foreach (Main::getInstance()->getServer()->getOnlinePlayers() as $player) {
            if ($player instanceof MagicPlayer) {
                $playerHealth = $player->getHealth();
                $playerMaxHealth = $player->getMaxHealth();
                $playerDefence = $player->getArmorPoints() * 5;
                $playerMana = $playerDefence/20 * $playerHealth;
                $player->sendActionBarMessage("§c❤ ".$playerHealth . "§7/§c" . $playerMaxHealth." §a".$playerDefence."§a Defence §b".$playerMana." Mana");
            }
        }
    }
}
