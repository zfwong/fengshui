<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\GanZi;
use App\Helpers\QiangRuo;
use App\Helpers\SolarLunarConverter;
use App\Helpers\SuanMing;
use Auth;
use App;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['show']]);
    }
    
    public function root()
    {
        return view('pages.root');
    }

    public function show(User $user)
    {
        $this->authorize('show', $user);
        $sl_conv = new SolarLunarConverter();
        $sm_calc = new SuanMing();
        $gz_calc = new GanZi();
        $qr_calc = new QiangRuo();
        // 页面所需要的数据
        $data = [
            'dob' => strtotime($user->date_of_birth),
            'nl_year' => '',
            'gz_year' => '',
            'gz_year_str' => '',
            'cg_year' => '',
            'nl_month' => '',
            'gz_month' => '',
            'cg_month' => '',
            'nl_day' => '',
            'gz_day' => '',
            'cg_day' => '',
            'nl_time' => '',
            'gz_time' => '',
            'cg_time' => '',
            'sx' => '',
            'wu_xing' => '',
            'wu_xing_detail' => '',
            'cheng_gu_ge_weight' => '',
            'cheng_gu_ge_detail' => '',
            'xing_zuo' => '',
            'qiang_ruo' => '',
            'shi_ye' => '',
        ];

        $year = date('Y', $data['dob']);
        $month = date('m', $data['dob']);
        $day = date('d', $data['dob']);
        $time = date('H', $data['dob']);

        $nlArray = $sl_conv->convertSolarToLunar($year, $month, $day);
        $data['nl_year'] = $nlArray[0];
        $data['gz_year'] = $nlArray[3];
        $data['gz_year_str'] = $sl_conv->appendYearWord($nlArray[3]);
        $data['nl_month'] = $nlArray[1];
        $data['gz_month'] = '';
        $data['nl_day'] = $nlArray[2];
        $data['gz_day'] = '';
        $data['sx'] = $nlArray[6];

        $data['gz_month'] = $gz_calc->sizhu($year, $month, $day, $time, 0, "yue");
        $data['gz_day'] = $gz_calc->sizhu($year, $month, $day, $time, 0, "ri");
        $data['gz_time'] = $gz_calc->sizhu($year, $month, $day, $time, 0, "shi");
        $data['nl_time'] = $gz_calc->appendTimeWord(mb_substr($data['gz_time'], 1, 1));

        $cgArray = $sm_calc->get_cang_gan(mb_substr($data['gz_year'], 1, 1), mb_substr($data['gz_month'], 1, 1), mb_substr($data['gz_day'], 1, 1), mb_substr($data['gz_time'], 1, 1));
        $data['cg_year'] = $cgArray[0];
        $data['cg_month'] = $cgArray[1]; 
        $data['cg_day'] = $cgArray[2];
        $data['cg_time'] = $cgArray[3];

        $wxArray = $sm_calc->get_wu_xing(mb_substr($data['gz_day'], 0, 1));
        $data['wu_xing'] = $wxArray[0];
        $data['wu_xing_detail'] = $wxArray[1];

        $ccgArray = $sm_calc->get_cheng_gu_ge($data['gz_year'], $data['nl_month'], $data['nl_day'], $data['nl_time']);
        $data['cheng_gu_ge_weight'] = $ccgArray[0];
        $data['cheng_gu_ge_detail'] = $ccgArray[1];

        $xzArray = $sm_calc->get_xing_zuo($data['dob']);
        $data['xing_zuo'] = $xzArray;

        $qrArray = $qr_calc->get_qiang_ruo($data['gz_day']);
        $data['qiang_ruo'] = $qrArray;

        $syArray = $sm_calc->get_shi_ye(mb_substr($data['gz_year'], 1, 1));
        $data['shi_ye'] = $syArray;

        $data['user'] = [$user->id, $user->name, $user->email, $user->date_of_birth, $user->sex];
        $data['title'] = config('arrays.title');
        //dd($data);

        return view('pages.bazi', compact('data'));
    }
}