<?php

namespace App\Enums;

/**
 * Class BorrowStatus
 *
 * @package App\Enums
 */
final class BorrowStatus
{
    /**
     * Status is borrow
     */
    const IS_BORROW = 0;

    /**
     * Status is return
     */
    const IS_RETURN = 1;

    /**
     * Gender text
     */
    const BORROW_TEXT = 'Borrow';
    const RETURN_TEXT   = 'Return';

    const ARRAY_STATUS_BORROW = [
        self::IS_BORROW => self::BORROW_TEXT,
        self::IS_RETURN   => self::RETURN_TEXT,
    ];

    /**
     * @param $status
     * @return string
     */
    public static function getDisplayStatusBorrow($status)
    {
        switch ($status) {
            case self::IS_BORROW:
                return self::BORROW_TEXT;
            case self::IS_RETURN:
                return self::RETURN_TEXT;
            default:
                return 'Unknown';
        }
    }
}
