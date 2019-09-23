<?php
namespace Deceitya\FormExample\Form;

use pocketmine\form\Form;
use pocketmine\Player;

class SimpleForm implements Form
{
    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }

        $forms = ["ModalForm", "CustomForm", "SimpleForm"];
        $class = "\\Deceitya\\FormExample\\Form\\{$forms[$data]}";
        $player->sendForm(new $class());
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => 'SimpleForm',
            'content' => '表示したいフォームを選んでね',
            'buttons' => [
                [
                    'text' => 'はいかいいえかみたいなフォーム',
                    'image' => [
                        'type' => 'url',
                        'data' => 'https://enjoynet.co.jp/icon/icon_menherachan04_01.jpg'
                    ]
                ],
                [
                    'text' => 'カスタムフォーム',
                    'image' => [
                        'type' => 'url',
                        'data' => 'https://enjoynet.co.jp/icon/icon_menherachan04_02.jpg'
                    ]
                ],
                [
                    'text' => 'このフォーム'
                ]
            ]
        ];
    }
}
