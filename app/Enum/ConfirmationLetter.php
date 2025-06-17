<?php

namespace App\Enum;

class ConfirmationLetter
{
    const  ONE = "បញ្ជាក់ប្រាក់បៀវត្ស";
    const  TWO = "បញ្ជាក់ជាកម្មសិក្សា";
    const  THREE = "បញ្ជាក់ជាមន្ត្រី";
    const  FOUR = "បញ្ជាក់អំពីតួនាទីការងារ";
    const  FIVE = "ប្រគល់សិទ្ធចុះហត្ថលេខា";
    const  SIX = "បញ្ជាក់បេសកកម្ម";
    const  SEVEN = "បញ្ជាក់ផ្សេងៗ";

    const DRAFTED = 0;
    const SUBMITTED = 1;
    const APPROVED = 2;
    const REJECTED = 3;
    const PENDING = 4;
    const CANCELLED = 5;
    const DELETED = 6;

    public static function getAllTypes()
    {
        return [
            self::ONE,
            self::TWO,
            self::THREE,
            self::FOUR,
            self::FIVE,
            self::SIX,
            self::SEVEN,
        ];
    }

    public static function getTypeByValue($value)
    {
        $types = self::getAllTypes();
        return in_array($value, $types) ? $value : null;
    }

    public static function getTypeByKey($key)
    {
        $types = self::getAllTypes();
        return array_key_exists($key, $types) ? $types[$key] : null;
    }
}
