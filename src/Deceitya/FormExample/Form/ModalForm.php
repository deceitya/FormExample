<?php
namespace Deceitya\FormExample\Form;

use pocketmine\form\Form;
use pocketmine\Player;

class ModalForm implements Form
{
    public function handleResponse(Player $player, $data): void
    {
        $player->sendMessage($data ?
            'では、偽ということですね' :
            'では、真ということですね');
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'modal',
            'title' => 'ModalForm',
            'content' => 'この文(の真偽)は偽である',
            'button1' => '真',
            'button2' => '偽'
        ];
    }
}
