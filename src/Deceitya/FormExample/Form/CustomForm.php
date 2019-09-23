<?php
namespace Deceitya\FormExample\Form;

use pocketmine\form\Form;
use pocketmine\Player;

class CustomForm implements Form
{
    public function handleResponse(Player $player, $data): void
    {
        $shobon = ['(´・ω・｀)', '(｀・ω・´)', '|ω・｀)'];
        $steps = ['1', '10', '100', '千', '万'];
        $bool = $data[5] ? "オン" : "オフ";
        $player->sendMessage(
            "選んだ顔は§e {$shobon[$data[0]]} §fです。\n".
            "入力した文字は§e {$data[1]} §fです。\n".
            "なめらかで指定した数値は§e {$data[3]} §fです。\n".
            "区切ったやつで指定したのは§e {$steps[$data[4]]} §fです。\n".
            "スイッチを§e {$bool} §fにしました。"
        );
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'custom_form',
            'title' => 'CustomForm',
            'content' => [
                [
                    'type' => 'dropdown',
                    'text' => '選択肢的な',
                    'options' => [
                        '(´・ω・｀)',
                        '(｀・ω・´)',
                        '|ω・｀)'
                    ],
                    'default' => 1
                ],
                [
                    'type' => 'input',
                    'text' => '入力するやつ',
                    'placeholder' => '後ろにうっすらと表示される文字',
                    'default' => '最初から入力されてる文字'
                ],
                [
                    'type' => 'label',
                    'text' => '文字を表示するだけ'
                ],
                [
                    'type' => 'slider',
                    'text' => 'なめらかに動くやつ(語彙力来い)',
                    'min' => 0,
                    'max' => 100,
                    'default' => 50
                ],
                [
                    'type' => 'step_slider',
                    'text' => '上の区切られたverみたいな',
                    'steps' => ['1', '10', '100', '千', '万'],
                    'default' => 2
                ],
                [
                    'type' => 'toggle',
                    'text' => 'onかoffかみたいな',
                    'default' => true
                ]
            ]
        ];
    }
}
