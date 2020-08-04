<?php

namespace App\Helpers;

class SuanMing
{
	protected static $first_year = 1924;

    function sizhu($yea,$mon,$dat,$hou,$minut,$gzlei)
	{
	$a[21] = "��";$a[22] = "��";$a[23] = "��";$a[24] = "��";$a[25] = "��";$a[26] = "��";$a[27] = "��";$a[28] = "��";$a[29] = "��";$a[20] = "��";
		
	//ʮ����֧
		
	$a[31] = "��";$a[32] = "��";$a[33] = "��";$a[34] = "î";$a[35] = "��";$a[36] = "��";$a[37] = "��";$a[38] = "δ";$a[39] = "��";$a[40] = "��";$a[41] = "��";$a[30] = "��";
		
	//���ˣ������ũ����������ת��
		
	$bzyear=$yea;
	$bzmonth=$mon;
	$bzday=$dat;
	$bztime=$hou;
		
	//mdȷ������ yz ��֧  ���˻��� qyjs
	$md=$bzmonth * 100 + $bzday;
	if($md>=204 && $md<= 305) 
	{ 
		$mz = 3;
		$qyjs = floor((($bzmonth - 2) * 30 + $bzday - 4) / 3);
	}
		
	if($md>=306 && $md<=404)
	{
		$mz = 4;
		$qyjs =floor((($bzmonth - 3) * 30 + $bzday - 6) /3);
	}
		
	if($md>=405 && $md<= 504) 
	{
		$mz = 5;
		$qyjs =floor((($bzmonth - 4) * 30 + $bzday - 5) / 3);
	}
		
	if($md>=505 && $md<= 605) 
	{
		$mz = 6;
		$qyjs =floor((($bzmonth - 5) * 30 + $bzday - 5) /3);
	}
		
	if($md>=606 && $md<= 706)
	{
		$mz = 7;
		$qyjs = floor((($bzmonth - 6) * 30 + $bzday - 6) /3);
	}
		
	if($md>=707 && $md<= 807) 
	{
		$mz = 8;
		$qyjs = floor((($bzmonth - 7) * 30 + $bzday - 7) /3);
	}
		
	if($md>=808 && $md<=907)
	{
		$mz = 9;
		$qyjs = floor((($bzmonth - 8) * 30 + $bzday - 8) / 3);
	}
		
	if($md>=908 && $md<=1007)
	{
		$mz = 10;
		$qyjs = floor((($bzmonth - 9) * 30 + $bzday - 8) / 3);
	}
		
	if($md>=1008 && $md<= 1106) 
	{
		$mz = 11;
		$qyjs = floor((($bzmonth - 10) * 30 + $bzday - 8) / 3);
	}
		
	if($md>=1107 && $md<=  1207) 
	{
		$mz = 0;
		$qyjs = floor((($bzmonth - 11) * 30 + $bzday - 7) / 3);
	}
		
	if($md>=1208 && $md<=  1231)
	{
		$mz = 1;
		$qyjs = floor(($bzday - 8) / 3);
	}
		
	if($md>=101 && $md<= 105)
	{
		$mz = 1;
		$qyjs = floor((30 + $bzday - 4) / 3);
	}
		
	if($md>=106 && $md<=  203) 
	{
		$mz = 2;
		$qyjs = floor((($bzmonth - 1) * 30 + $bzday - 6) / 3);
	}
		
	//ȷ����ɺ���֧ yg ��� yz ��֧
	if($md>=204 && $md<=1231) 
	{
		$yg = ($bzyear - 3) % 10;
		$yz = ($bzyear - 3) % 12;
	}
	if($md>=101 && $md<=203 ) 
	{
		$yg = ($bzyear - 4) % 10;
		$yz = ($bzyear - 4) % 12;
	}
		
	//ȷ���¸� mg �¸�
		
	if( $mz > 2 && $mz <= 11) 
	{
		$mg = ($yg * 2 + $mz + 8) % 10;
	}
	else
	{
		$mg = ($yg * 2 + $mz) % 10;
	}
		
	//�ӹ�Ԫ0�굽Ŀǰ��ݵ����� yearlast
		
	$yearlast = ($bzyear - 1) * 5 + floor(($bzyear - 1) / 4)- floor(($bzyear - 1) / 100) + floor(($bzyear - 1) / 400);
	//����ĳ��ĳ���뵱��1��0�յ�ʱ������Ϊ��λ��yearday
	$yearday=0;
	for ($i = 1 ;$i<= $bzmonth - 1;$i++)
	{
		switch($i)
		{
			case 1: 
			$yearday += 31;
			break;
			case 3:
			$yearday += 31;
			break;
			case 5:
			$yearday += 31;
			break;
			case 7:
			$yearday += 31;
			break;
			case 8:
			$yearday += 31;
			break;
			case 10:
			$yearday += 31;
			break;
			case 12:
			$yearday += 31;
			break;
			case 4: 
			$yearday+=  30;
			break;
			case  6:
			$yearday +=  30;
			break;
			case 9:
			$yearday +=  30;
			break;
			case 11:
			$yearday +=  30;
			break;
			case 2:
			if($bzyear % 4 == 0 && $bzyear % 100 <> 0 || $bzyear % 400 == 0 )
			{
				$yearday += 29;
				break;
			}
			else{
				$yearday +=  28;
				break;
			}
		}
	}
	$yearday = $yearday + $bzday;
		
	//�����յ���ʮ������ day60
	$day60 = ($yearlast + $yearday + 6015) % 60;
		
	//ȷ�� �ո� dg  ��֧  dz
	$dg = $day60 % 10;
	$dz = $day60 % 12;
	//ȷ�� ʱ�� tg ʱ֧ tz
	$tz = floor(($bztime + 3) /2) % 12;
	//tg = (dg * 2 + tz + 8)% 10
	if($tz == 0)
	{
		$tg = ($dg * 2 + $tz) % 10;
	}else{
		$tg = ($dg * 2 + $tz + 8) % 10;
	}
		
		
	//�� ������ʱ ת����Ϊ ��������
	switch($yz)
	{
		case 1:$yzg = 0;break;
		case 2:$yzg = 6;break;
		case 8:$yzg = 6;break;
		case 3:$yzg = 1;break;
		case 4:$yzg = 2;break;
		case 5:$yzg = 5;break;
		case 11:$yzg = 5;break;
		case 6:$yzg = 3;break;
		case 7:$yzg = 4;break;
		case 9:$yzg = 7;break;
		case 10:$yzg = 8;break;
		case 0:$yzg = 9;break;
	}
	//��֧�ɸ� mzg
	switch($mz)
	{
		case 1:$mzg = 0;break;
		case 2:$mzg = 6;break;
		case 8:$mzg = 6;break;
		case 3:$mzg = 1;break;
		case 4:$mzg = 2;break;
		case 5:$mzg = 5;break;
		case 11:$mzg = 5;break;
		case 6:$mzg = 3;break;
		case 7:$mzg = 4;break;
		case 9:$mzg = 7;break;
		case 10:$mzg = 8;break;
		case 0:$mzg = 9;break;
	}
		
	//��֧�ɸ� dzg
		
	switch($dz)
	{
		case 1:$dzg = 0;break;
		case 2:$dzg = 6;break;
		case 8:$dzg = 6;break;
		case 3:$dzg = 1;break;
		case 4:$dzg = 2;break;
		case 5:$dzg = 5;break;
		case 11:$dzg = 5;break;
		case 6:$dzg = 3;break;
		case 7:$dzg = 4;break;
		case 9:$dzg = 7;break;
		case 10:$dzg = 8;break;
		case 0:$dzg = 9;break;
	}
		
	//'ʱ֧�ɸ� tzg
		
	switch($tz)
	{
		case 1:$tzg = 0;break;
		case 2:$tzg = 6;break;
		case 8:$tzg = 6;break;
		case 3:$tzg = 1;break;
		case 4:$tzg = 2;break;
		case 5:$tzg = 5;break;
		case 11:$tzg = 5;break;
		case 6:$tzg = 3;break;
		case 7:$tzg = 4;break;
		case 9:$tzg = 7;break;
		case 10:$tzg = 8;break;
		case 0:$tzg = 9;break;
	}
		
		//'���ˣ���ɸ���֧������ɵ�ȷ������
		$yg1=$a[20 + $yg];
		$yz1=$a[30 + $yz];
		$mg1=$a[20 + $mg];
		$mz1=$a[30 + $mz];
		$dg1=$a[20 + $dg];
		$dz1=$a[30 + $dz];
		$tg1=$a[20 + $tg];
		$tz1=$a[30 + $tz];
		$ygz=$a[20 + $yg].$a[30 + $yz];
		$mgz=$a[20 + $mg].$a[30 + $mz];
		$dgz=$a[20 + $dg].$a[30 + $dz];
		$tgz=$a[20 + $tg].$a[30 + $tz];
		if($gzlei=="nian")
		{
			return($ygz);
		}
		if($gzlei=="yue")
		{
			return($mgz);
		}
		//��֧����
		if($gzlei=="ri")
		{
			return($dgz);
		}
		//'��ø�֧����
		if($gzlei=="shi")
		{
			return($tgz);
		}
	}
		
		
		
	function xunkong($gz1,$shou)
	{
		$path=PATH_DATA."/paipan/qmdj/xunkong.txt";
		$fopx=fopen($path,"r");
		$fns=file($path);
		for($i=0;$i<=5;$i++)
		{
			$str=$fns[$i]; 
			$strarr=explode("-",$str);
			$y=array_search($gz1,$strarr);
			if($strarr[$y]==$gz1)
			{
				$xunk=$strarr[10];
				$xunshou=$strarr[0];
			}
		}
		if($shou=="no")
		{
			return($xunk);
		}
		if($shou=="yes")
		{
			return($xunshou);
		}
		fclose($fopx);
	}
		
		
	function CbtoI($biangindex)
	{
		$CbtoI=substr($biangindex,1)*32+substr($biangindex,1,1)*16+substr($biangindex,2,1)*8+substr($biangindex,3,1)*4+substr($biangindex,4,1)*2+substr($biangindex,5,1);
		return ($CbtoI);
	}
		
		
	function Cfan($strs)
	{
		$str=$strs;
		$leng=strlen($str);
		$str2="";
		for($i=1;$i<=$leng;$i++){
			$bit=substr($str,1);
			$str=substr($str,-($leng-$i));
			$bit=$bit xor "1";
			$str2=$str2.$bit;
			return($str2);
		}
	}
		
	function Tgorder($gzx)  //'��������
	{
		$tg=array("��","��","��","��","��","��","��","��","��","��");
		$tgs=substr($gzx,0,3);
		$xu=array_search($tgs,$tg);
		return $xu ;
	}
		
	function DzOrder($gzx)  //'���֧���
	{ 
		$dzs=substr($gzx,-3);
		$dz=array("��","��","��","î","��","��","��","δ","��","��","��","��");
		$xu=array_search($dzs,$dz);
		return $xu;
	}
		
	function makejq($y,$m,$d,$h,$mins)//$PreJq,$NJq)
	{
	$jq=array("����","��ˮ","����" ,"����" ,"����" ,"����" ,"����" ,"С��","â��","����","С��","����","����" ,"����","��¶","���" ,"��¶" ,"˪��" ,"����","Сѩ" ,"��ѩ","����","С��" ,"��");
	$times=mktime($h,$mins,0,intval($m),intval($d),$y);
	$path=PATH_DATA."/paipan/qmdj/cal.txt";
	$fopn=fopen($path,"r");
	$cal=file($path);
	$i=0;
	do
	{
		$str=$cal[$i];
		$strarr=explode(",",$str);
		if($strarr[1]==$y&&$strarr[2]==$m){
			$time1=mktime($strarr[6],$strarr[7],0,$strarr[2],$strarr[3],$strarr[1]);
			$time2=mktime($strarr[10],$strarr[9],0,$strarr[2],$strarr[8],$strarr[1]);
			if($times<$time1){
				$str=$cal[$i-1];
				$strarr=explode(",",$str);
				$jiaoj=mktime($strarr[10],$strarr[9],0,$strarr[2],$strarr[8],$strarr[1]);
				$j=(($i-2)%12)*2+1;
				break;
			}
			if ($times>=$time1 && $times<$time2 )
			{
				$j=(($i-1)%12)*2;
				$jiaoj=$time1;
				break;
			}
			if ($times>=$time2)
			{
				$j=(($i-1)%12)*2+1;
				$jiaoj=$time2;
				break;
			}
		}
		$i++;
	}
	while($i<=1332);
	$jieqq=date("Y",$jiaoj)."��".date("m",$jiaoj)."��".date("d",$jiaoj)."��".date("H",$jiaoj)."ʱ".date("i",$jiaoj)."��".$jq[$j];
	$Njq=$jieqq;
	return($Njq);
	fclose($fopn);
	}


	
	function sanyuan($gz)
	{
			$tg=array("��","��","��","��","��","��","��","��","��","��");
			$dz=array("��","��","��","î","��","��","��","δ","��","��","��","��");
			$j=0;
			for($i=0;$i<=59;$i++)
			{ 
				$TgIndex=$i%10;
				$DzIndex=$i%12;
				if($tg[$TgIndex].$dz[$DzIndex]==$gz) break;
					$j++;
				}
				$j=floor($j/5);
				switch($j){
				case 0:$yuan="��Ԫ";break;
				case 3:$yuan="��Ԫ";break;
				case 6:$yuan="��Ԫ";break;
				case 9:$yuan="��Ԫ";break;
				case 1:$yuan="��Ԫ";break;
				case 4:$yuan="��Ԫ";break;
				case 7:$yuan="��Ԫ";break;
				case 10:$yuan="��Ԫ";break;
				case 2:$yuan="��Ԫ";break;
				case 5:$yuan="��Ԫ";break;
				case 8:$yuan="��Ԫ";break;
				case 11:$yuan="��Ԫ";break;
			}//��Ԫ�������
		return $yuan;
	}
		
	function dunju($y,$m,$d,$h,$f)
	{
		$dgz=self::sizhu($y,$m,$d,$h,$f,"ri");
		$jieqq=self::makejq($y,$m,$d,$h,$f);
		$jieqi=substr(trim($jieqq),-6);
		switch($jieqi)
		{
			case "����":$YyJu="һ����";break;
			case "����":$YyJu="һ����";break;
			case "С��":$YyJu="������";break;
			case "��":$YyJu="������";break;
			case "����":$YyJu="������";break;
			case "��ˮ":$YyJu="������";break;
			case "����":$YyJu="��һ��";break;
			case "����":$YyJu="��һ��";break;
			case "����":$YyJu="�����";break;
			case "����":$YyJu="�����";break;
			case "С��":$YyJu="�����";break;
			case "â��":$YyJu="������";break;
			case "����":$YinJu="������";break;
			case "��¶":$YinJu="������";break;
			case "С��":$YinJu="�˶���";break;                     
			case "����":$YinJu="��һ��";break;
			case "���":$YinJu="��һ��";break;
			case "����":$YinJu="�����";break;
			case "��¶":$YinJu="������";break;
			case "����":$YinJu="������";break;
			case "����":$YinJu="һ����";break;
			case "˪��":$YinJu="��˶�";break;
			case "Сѩ":$YinJu="��˶�";break;
			case "��ѩ":$YinJu="����һ";break;
		}
		$yuan=self::sanyuan($dgz);
		if(!empty($YyJu))
		{
			switch($yuan)
			{
				case "��Ԫ": $JuXu=substr($YyJu,3,3);break;
				case "��Ԫ": $JuXu=substr($YyJu,0,3);break;
				case "��Ԫ":$JuXu=substr($YyJu,-3);break;
			}
			$dunju="����".$JuXu."��";
			$yinyang=true; //����
		}else{
			$yinyang=false;//'����
			switch($yuan)
			{
				case "��Ԫ": $JuXu=substr($YinJu,3,3);break;
				case "��Ԫ": $JuXu=substr($YinJu,0,3);break;
				case "��Ԫ": $JuXu=substr($YinJu,-3);break;
			} 
			$dunju="����".$JuXu."��";
		}
		return $dunju."-".$yinyang;
	}

	function get_cang_gan($year, $month, $day, $time) {
        $cangGan = config('arrays.cang_gan');
        $diZi = config('arrays.di_zi');
        $cangGanArray = [];
        array_push($cangGanArray, $cangGan[array_search($year, $diZi)]);
        array_push($cangGanArray, $cangGan[array_search($month, $diZi)]);
        array_push($cangGanArray, $cangGan[array_search($day, $diZi)]);
        array_push($cangGanArray, $cangGan[array_search($time, $diZi)]);
        return $cangGanArray;
    }

	function get_wu_xing($day) {
        $wuXing = config('arrays.wu_xing');
        $wuXingDetail = config('arrays.wu_xing_detail');
        $wuXingArray = [];
        array_push($wuXingArray, $wuXing[array_search($day, $wuXing)]);
        array_push($wuXingArray, $wuXingDetail[array_search($day, $wuXing)]);
        return $wuXingArray;
    }

	function get_cheng_gu_ge($year, $month, $day, $time) {
        $chengGuGe = config('arrays.cheng_gu_ge');
        $chengGuGeArray = [];
        $yearWeight = $chengGuGe['gz_year_weight'][$year];
        $monthWeight = $chengGuGe['gz_month_weight'][$month];
        $dayWeight = $chengGuGe['gz_day_weight'][$day];
        $timeWeight = $chengGuGe['gz_time_weight'][$time];
        $totalWeight = $yearWeight + $monthWeight + $dayWeight + $timeWeight;
        array_push($chengGuGeArray, $chengGuGe['cheng_gu_ge_detail'][$totalWeight][0]);
        array_push($chengGuGeArray, $chengGuGe['cheng_gu_ge_detail'][$totalWeight][1]);
        return $chengGuGeArray;
    }

	function get_xing_zuo($strToTimeDate) {
        $xingZuo = config('arrays.xing_zuo');
        $xingZuoArray = [];
        $date = date('m/d', $strToTimeDate);
        if (($date >= date('m/d', strtotime('3/21/2020'))) && ($date <= date('m/d', strtotime('4/19/2020')))) {
            $xingZuoArray = $xingZuo[0];
        } elseif (($date >= date('m/d', strtotime('4/20/2020'))) && ($date <= date('m/d', strtotime('5/20/2020')))) {
            $xingZuoArray = $xingZuo[1];
        } elseif (($date >= date('m/d', strtotime('5/21/2020'))) && ($date <= date('m/d', strtotime('6/21/2020')))) {
            $xingZuoArray = $xingZuo[2];
        } elseif (($date >= date('m/d', strtotime('6/22/2020'))) && ($date <= date('m/d', strtotime('7/22/2020')))) {
            $xingZuoArray = $xingZuo[3];
        } elseif (($date >= date('m/d', strtotime('7/23/2020'))) && ($date <= date('m/d', strtotime('8/22/2020')))) {
            $xingZuoArray = $xingZuo[4];
        } elseif (($date >= date('m/d', strtotime('8/23/2020'))) && ($date <= date('m/d', strtotime('9/22/2020')))) {
            $xingZuoArray = $xingZuo[5];
        } elseif (($date >= date('m/d', strtotime('9/23/2020'))) && ($date <= date('m/d', strtotime('10/23/2020')))) {
            $xingZuoArray = $xingZuo[6];
        } elseif (($date >= date('m/d', strtotime('10/24/2020'))) && ($date <= date('m/d', strtotime('11/21/2020')))) {
            $xingZuoArray = $xingZuo[7];
        } elseif (($date >= date('m/d', strtotime('11/22/2020'))) && ($date <= date('m/d', strtotime('12/20/2020')))) {
            $xingZuoArray = $xingZuo[8];
        } elseif (($date >= date('m/d', strtotime('12/21/2020'))) && ($date <= date('m/d', strtotime('1/20/2020')))) {
            $xingZuoArray = $xingZuo[9];
        } elseif (($date >= date('m/d', strtotime('1/21/2020'))) && ($date <= date('m/d', strtotime('2/19/2020')))) {
            $xingZuoArray = $xingZuo[10];
        } elseif (($date >= date('m/d', strtotime('2/20/2020'))) && ($date <= date('m/d', strtotime('3/20/2020')))) {
            $xingZuoArray = $xingZuo[11];
        }
        return $xingZuoArray;
    }

	function get_shi_ye($year) {
        $shiYe = config('arrays.shi_ye');
        $jiaZi = config('arrays.jia_zi');
        $diZi = config('arrays.di_zi');
        $shiYeArray = [];
        $currentYear = date('Y');
        $jiaZiIdx = ($currentYear - self::$first_year) % 60;
        $dzJiaZi = mb_substr($jiaZi[$jiaZiIdx], 1, 1); 
        array_push($shiYeArray, $shiYe['di_zi'][$dzJiaZi][0]);
        array_push($shiYeArray, $shiYe['di_zi'][$dzJiaZi]['shi_ye_detail'][array_search($year, $diZi)]);
        return $shiYeArray;
    }
}