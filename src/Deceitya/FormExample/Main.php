<?php
namespace Deceitya\FormExample;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use Deceitya\FormExample\Form\SimpleForm;

class Main extends PluginBase
{
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if (!($sender instanceof Player)) {
            return true;
        }

        $sender->sendForm(new SimpleForm());

        return true;
    }
}
