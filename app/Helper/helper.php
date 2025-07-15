<?php

use Carbon\Carbon;
use Morilog\Jalali\Jalalian;

function slugify(string $name): string
{
    return implode('-', explode(' ', $name));
};

function toGregorian(string $jalaliDatetime): string
{
    $carbon = Jalalian::fromFormat('Y/m/d H:i:s', $jalaliDatetime)->toCarbon();
    return $carbon->toDateTimeString();
}

function toJalali(string $gregorianDatetime)
{
    $carbon = Carbon::createFromFormat('Y-m-d H:i:s', $gregorianDatetime);
    $jalali = Jalalian::fromCarbon($carbon);
    return $jalali->format('Y/m/d H:i:s');
}
