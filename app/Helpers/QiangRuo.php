<?php

namespace App\Helpers;

class QiangRuo
{
    function get_qiang_ruo($day) {
        $qiangRuo = config('arrays.qiang_ruo');
        $qiangRuoArray = [];
        $good = '';
        $bad = '';
        $tg = mb_substr($day, 0, 1);
        $dz = mb_substr($day, 1, 1);
        $tg_idx = $qiangRuo['gan'][$tg];
        $dz_idx = $qiangRuo['zi'][$dz];
        $good = $qiangRuo['qiang_xiang'][$tg_idx].'，'.$qiangRuo['qiang_xiang'][$dz_idx];
        $bad = $qiangRuo['ruo_xiang'][$tg_idx].'，'.$qiangRuo['ruo_xiang'][$dz_idx];
        array_push($qiangRuoArray, $good);
        array_push($qiangRuoArray, $bad);
        return $qiangRuoArray;
    }
}
