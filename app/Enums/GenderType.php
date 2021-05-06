<?php

namespace App\Enums;

/**
 * Class UserRoles
 *
 * @package App\Enums
 */
final class GenderType
{
    /**
     * Gender type is female
     */
    const FEMALE = 0;

    /**
     * Gender type is male
     */
    const MALE = 1;

    /**
     * Gender text
     */
    const FEMALE_TEXT = 'Female';
    const MALE_TEXT   = 'Male';

    const ARRAY_GENDER = [
        self::FEMALE => self::FEMALE_TEXT,
        self::MALE   => self::MALE_TEXT,
    ];

    /**
     * @param $gender
     * @return string
     */
    public static function getDisplayGender($gender)
    {
        switch ($gender) {
            case self::FEMALE:
                return self::FEMALE_TEXT;
            case self::MALE:
                return self::MALE_TEXT;
            default:
                return 'Unknown';
        }
    }
}
