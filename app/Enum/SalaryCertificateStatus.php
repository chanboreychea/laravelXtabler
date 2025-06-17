<?php

namespace App\Enum;

class SalaryCertificateStatus
{
    const DRAFTED = 0;
    const SUBMITTED = 1;
    const APPROVED = 2;
    const REJECTED = 3;
    const PENDING = 4;
    const CANCELLED = 5;

    public static function getStatusName($status)
    {
        switch ($status) {
            case self::DRAFTED:
                return 'Drafted';
            case self::SUBMITTED:
                return 'Submitted';
            case self::APPROVED:
                return 'Approved';
            case self::REJECTED:
                return 'Rejected';
            case self::PENDING:
                return 'Pending';
            case self::CANCELLED:
                return 'Cancelled';
            default:
                return 'Unknown Status';
        }
    }

    public static function getSalaryCertificateStatus()
    {
        return [
            self::DRAFTED => 'Drafted',
            self::SUBMITTED => 'Submitted',
            self::APPROVED => 'Approved',
            self::REJECTED => 'Rejected',
            self::PENDING => 'Pending',
            self::CANCELLED => 'Cancelled',
        ];
    }

    public static function getStatusNameByKey($key){
        $status = self::getSalaryCertificateStatus();
        return $status[$key] ?? 'Unknown Status';
    }
}
