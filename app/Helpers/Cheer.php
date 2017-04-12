<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 10.04.2017
 * Time: 21:49
 */

namespace App\Helpers;



abstract class Cheer
{
    private static $hash_100 = [
        "Молодец! Так держать! Эта сессия - ничто для тебя!"
    ];
    private static $hash_99_90 = [
        "Круто! Еще немного подготовки - и стольник тебе обеспечен!"
    ];

    private static $hash_89_75 = [
        "Я знаю, ты можешь лучше"
    ];

    private static $hash_74_60 = [
        "Ну ничего, в другой раз повезет"
    ];

    private static $hash_59_50 = [
        "Слабовато, но стоит тебе подготовиться, и оценка будет выше!"
    ];

    private static $hash_49 = [
        "Ну как же так? Это ведь легкий тест"
    ];

    public static function getComment(int $value) {
        $collection = [];
        if ($value == 100) {
            $collection = self::$hash_100;
        } elseif ($value >= 90) {
            $collection = self::$hash_99_90;
        } elseif ($value >= 75) {
            $collection = self::$hash_89_75;
        } elseif ($value >= 60) {
            $collection = self::$hash_74_60;
        } elseif ($value >= 50) {
            $collection = self::$hash_59_50;
        } else {
            $collection = self::$hash_49;
        }
        $collection = collect($collection);
        return $collection->random();
    }
}