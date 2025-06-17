<?php

namespace App\Util;

use DateTime;
use DateInterval;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class Utils
{

    protected static $instance  = null;

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function generateUuId()
    {
        return (string) Str::uuid();
    }

    public function getDatesByPeriodName($period, $currentDate)
    {
        $dates = ["", ""];

        if ($period == 'today') {
            $dates = [$currentDate->format('Y-m-d'), $currentDate->format('Y-m-d')];
        } elseif ($period == 'sat_sun_of_week') {
            $currentDateTime = Carbon::parse($currentDate);
            $currentDateTime->modify('last Sunday');
            $saturday = clone $currentDateTime;
            $saturday->modify('last Saturday');
            $sunday = clone $currentDateTime;
            $dates = [$saturday->format('Y-m-d'), $sunday->format('Y-m-d')];
        } elseif ($period == 'yesterday') {

            $yesterday = $currentDate->sub(new DateInterval('P1D'));
            $currentDateTime = new DateTime();

            $dates = [$yesterday->format('Y-m-d'), $currentDateTime->format('Y-m-d')];
        } elseif ($period == 'this_week') {

            $startDate = date('Y-m-d', strtotime('Monday this week'));
            $endDate = date('Y-m-d', strtotime('Sunday this week'));
            $dates = [$startDate, $endDate];
        } elseif ($period == 'last_week') {

            $startDate = date('Y-m-d', strtotime('Monday last week'));
            $endDate = date('Y-m-d', strtotime('Sunday last week'));
            $dates = [$startDate, $endDate];
        } elseif ($period == 'last_month') {

            $year = date('Y');

            if ($currentDate->format('M') == 'Jan') {
                $year = $currentDate->subYears(1)->format('Y');
            }

            $month = $currentDate->subMonths(1)->format('M');
            $endOfMonth = new DateTime("last day of $month $year");
            $endDate = $endOfMonth->format('Y-m-d');

            $startOfMonth = new DateTime("first day of $month $year");
            $startDate = $startOfMonth->format('Y-m-d');

            $dates = [$startDate, $endDate];
        } elseif ($period == 'this_month') {

            $year = date('Y');
            $month = $currentDate->format('M');

            $startOfMonth = new DateTime("first day of $month $year");
            $startDate = $startOfMonth->format('Y-m-d');

            $endOfMonth = new DateTime("last day of $month $year");
            $endDate = $endOfMonth->format('Y-m-d');

            $dates = [$startDate, $endDate];
        } elseif ($period == 'last_30_days') {

            $endDate = $currentDate->format('Y-m-d');
            $startDate = $currentDate->subDays(30)->format('Y-m-d');
            $dates = [$startDate, $endDate];
        } elseif ($period == 'this_year') {

            $year = date('Y');
            $endOfYear = new DateTime("last day of December $year");
            $endDate = $endOfYear->format('Y-m-d');

            $startOfYear = new DateTime("first day of January $year");
            $startDate = $startOfYear->format('Y-m-d');

            $dates = [$startDate, $endDate];
        } elseif ($period == 'last_year') {

            $year = $currentDate->subYears(1)->format('Y');
            $endOfYear = new DateTime("last day of December $year");
            $endDate = $endOfYear->format('Y-m-d');

            $startOfYear = new DateTime("first day of January $year");
            $startDate = $startOfYear->format('Y-m-d');

            $dates = [$startDate, $endDate];
        }
        return $dates;
    }

    public function getDateByQuarter($quarter, $year)
    {
        if ($year == null) {
            $year = date('Y');
        }

        if ($quarter < 1 || $quarter > 4) {
            return [
                'startDate' => '',
                'endDate' => ''
            ];
        }
        if ($quarter == 1) {
            $startDate = "$year-01-01";
            $endDate = "$year-03-31";
        } elseif ($quarter == 2) {
            $startDate = "$year-04-01";
            $endDate = "$year-06-30";
        } elseif ($quarter == 3) {
            $startDate = "$year-07-01";
            $endDate = "$year-09-30";
        } elseif ($quarter == 4) {
            $startDate = "$year-10-01";
            $endDate = "$year-12-31";
        }
        return [
            'startDate' => $startDate,
            'endDate' => $endDate
        ];
    }

    public function getDateByMonth($month, $year)
    {
        if ($year == null) {
            $year = date('Y');
        }

        $startDate = "$year-$month-01";

        $endDate = date("Y-m-t", strtotime($startDate));

        return [
            'startDate' => $startDate,
            'endDate' => $endDate
        ];
    }

    public function getKhmerNumber($number)
    {
        $khmerNumbers = [
            '0' => '០',
            '1' => '១',
            '2' => '២',
            '3' => '៣',
            '4' => '៤',
            '5' => '៥',
            '6' => '៦',
            '7' => '៧',
            '8' => '៨',
            '9' => '៩'
        ];

        return strtr($number, $khmerNumbers);
    }

    public function getMonthByNumber($number)
    {
        $months = [
            '1' => 'មករា',
            '2' => 'កុម្ភៈ',
            '3' => 'មិនា',
            '4' => 'មេសា',
            '5' => 'ឧសភា',
            '6' => 'មិថុនា',
            '7' => 'កក្កដា',
            '8' => 'សីហា',
            '9' => 'កញ្ញា',
            '10' => 'តុលា',
            '11' => 'វិច្ឆិកា',
            '12' => 'ធ្នូ'
        ];

        return $months[$number] ?? '';
    }

    public function getNumByCurrency($currency)
    {
        return str_replace(',', '', $currency);
    }
}
