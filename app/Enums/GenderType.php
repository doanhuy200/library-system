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
     * @param $gender
     * @return string
     */
    public static function getDisplayGender($gender)
    {
        switch ($gender) {
            case self::FEMALE:
                return 'Female';
            case self::MALE:
                return 'Male';
            default:
                return 'Unknown';
        }
    }
}
