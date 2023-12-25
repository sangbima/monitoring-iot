<?php
/**
 * Filename: Formatter.php
 * Class Formatter
 *
 * @author: Khairil <sangbima.net@gmail.com>
 * Date: 22/01/21
 * Time: 20.35
 * @package app\i18n
 */


namespace common\i18n;

use yii\helpers\Html;
use yii\helpers\StringHelper;

class Formatter extends \yii\i18n\Formatter
{
    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 9;
    const STATUS_DELETED = 0;

    public function asDaysTotal($start, $end)
    {
        $startDate = new \DateTime($start);
        $endDate = new \DateTime($end);

        return $startDate->diff($endDate)->days;
    }

    public function asAge($start, $end)
    {
        $startDate = new \DateTime($start);
        $endDate = new \DateTime($end);

        $y = $startDate->diff($endDate)->y;
        $m = $startDate->diff($endDate)->m;
        $d = $startDate->diff($endDate)->d;

        return $y . ' years ' . $m . ' month ' . $d . ' days';
    }

    /**
     * Next harus dibuat
     * @param $number
     * @return string
     */
    public function asNegativeNumber($number)
    {
        if ($number >= 0) {
            return $number;
        }

        return "(" . $number . ")";
    }

    /**
     * Truncate a string to to the 10 words
     *
     * @param string $value the value to be formatted.
     * @return string the formatted result.
     * @author: Khairil <sangbima.net@gmail.com>
     * Date: 13/03/2023
     * Time: 16.51
     */
    public function asTruncateText($value)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }

        return StringHelper::truncateWords($value, 10, '...');
    }

    /**
     * Convert number to textual month
     *
     * @param string | number | null $month
     * @return string
     */
    public function asTextualMonth($month = null)
    {
        $monthText = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];

        $index = $month == null ? (int) date("m") : (int) $month;
        return array_key_exists($index, $monthText) ? $monthText[$index] : 'Invalid Month';
    }

    /**
     * Convert datetime to Period
     *
     * For This month
     * ```php
     * \Yii::$app->formatter->asPeriod()
     * ```
     *
     * For Quarter
     * ```php
     * \Yii::$app->formatter->asPeriod(new \DateTime())
     * ```
     *
     * For Semester
     * ```php
     * \Yii::$app->formatter->asPeriod(new \DateTime(), 'SEM')
     * ```
     *
     * For 1 Year
     * ```php
     * \Yii::$app->formatter->asPeriod(new \DateTime(), '1Y')
     * ```
     * @param \DateTime|null $datetime
     * @param string | null $period 'SEM' | '1Y'
     * @return array
     * @throws \Exception
     * @author: Khairil <sangbima.net@gmail.com>
     * Date: 10/03/2023
     * Time: 14.53
     */
    public function asPeriod(\DateTime $datetime = null, $period = null)
    {
        $y = $datetime ? $datetime->format('Y') : 'invalid';
        $m = $datetime ? $datetime->format('m') : 'invalid';

        switch ($m) {
            case $m >= 1 && $m <= 12 && $period == "1Y":
                $start = $y . '-01-01 00:00:00';
                $end = (new \DateTime($y . '-12-01'))->setTime(23, 59, 59)->modify('Last day of this month')->format('Y-m-d H:i:s');
                $title = '1Y of ' . $y;
                break;
            case $m >= 1 && $m <= 6 && $period == "SEM":
                $start = $y . '-01-01 00:00:00';
                $end = (new \DateTime($y . '-06-01'))->setTime(23, 59, 59)->modify('Last day of this month')->format('Y-m-d H:i:s');
                $title = 'S1 of ' . $y;
                break;
            case $m >= 7 && $m <= 12 && $period == "SEM":
                $start = $y . '-07-01 00:00:00';
                $end = (new \DateTime($y . '-12-01'))->setTime(23, 59, 59)->modify('Last day of this month')->format('Y-m-d H:i:s');
                $title = 'S2 of ' . $y;
                break;
            case $m >= 1 && $m <= 3 && $period == null:
                $start = $y . '-01-01 00:00:00';
                $end = (new \DateTime($y . '-03-01'))->setTime(23, 59, 59)->modify('Last day of this month')->format('Y-m-d H:i:s');
                $title = 'Q1 of ' . $y;
                break;
            case $m >= 4 && $m <= 6 && $period == null:
                $start = $y . '-04-01 00:00:00';
                $end = (new \DateTime($y . '-06-01'))->setTime(23, 59, 59)->modify('Last day of this month')->format('Y-m-d H:i:s');
                $title = 'Q2 of ' . $y;
                break;
            case $m >= 7 && $m <= 9 && $period == null:
                $start = $y . '-07-01 00:00:00';
                $end = (new \DateTime($y . '-09-01'))->setTime(23, 59, 59)->modify('Last day of this month')->format('Y-m-d H:i:s');
                $title = 'Q3 of ' . $y;
                break;
            case $m >= 10 && $m <= 12 && $period == null:
                $start = $y . '-10-01 00:00:00';
                $end = (new \DateTime($y . '-12-01'))->setTime(23, 59, 59)->modify('Last day of this month')->format('Y-m-d H:i:s');
                $title = 'Q4 of ' . $y;
                break;
            default:
                $start = (new \DateTime())->setTime(00, 00, 00)->modify('First day of this month')->format('Y-m-d H:i:s');
                $end = (new \DateTime())->setTime(23, 59, 59)->modify('Last day of this month')->format('Y-m-d H:i:s');
                $title = 'This month';
                break;
        }

        return [
            'start' => $start,
            'end' => $end,
            'title' => $title,
            'start_unix_time' => strtotime($start),
            'end_unix_time' => strtotime($end),
        ];
    }

    /**
     * @param string | number | null $month
     * @return string
     * @author: Khairil <sangbima.net@gmail.com>
     * Date: 10/03/2023
     * Time: 14.54
     */
    public function asRome($month = null)
    {
        $listOfRomeNumber = [1 => "I", 2 => "II", 3 => "III", 4 => "IV", 5 => "V", 6 => "VI", 7 => "VII", 8 => "VIII", 9 => "IX", 10 => "X", 11 => "XI", 12 => "XII"];
        $index = $month == null ? (int) date("m") : (int) $month;
        return array_key_exists($index, $listOfRomeNumber) ? $listOfRomeNumber[$index] : 'Invalid Month';
    }

    public function asBooleanLabel($value)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }

        return $value ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-info">No</span>';
    }

    public function asStatusLabel($value)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }

        $statusLabel = [
            self::STATUS_ACTIVE => '<span class="badge bg-success">Active</span>',
            self::STATUS_INACTIVE => '<span class="badge bg-warning">Inactive</span>',
            self::STATUS_DELETED => '<span class="badge bg-danger">Deleted</span>',
        ];

        return $statusLabel[$value] ?? null;
    }
}