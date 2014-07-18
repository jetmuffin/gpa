<?php
class subject
{
	 public $title;
	 public $type;
	 public $credit;
	 public $test;
	 public $id;
	 public $score;
	 public $search_url;
	 public $rank;
	 public $totnum;
}
class student
{
	private $name;
	private $college;
	private $major;
	private $id;
	private $credit;
	private $report = Array();

	function __construct()
	{
		header("Content-type: text/html; charset=utf-8"); 
		mb_internal_encoding("UTF-8");
		$this->getData();	
		$this->calCredit();
		var_dump($this);
	}

	function __destruct()
	{
		unset($name, $college,$major,$id);
	}

	private function getData()
	{
		$cookie_file = tempnam('./temp','cookie');
		$login_url  = 'http://jwxt.hhu.edu.cn:7778/pls/wwwbks/bks_login2.login';
		$post_fields = 'stuid='.$_POST['stuid'].'&pwd='.$_POST['pwd'];

		$ch = curl_init($login_url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
		curl_exec($ch);
		curl_close($ch);

		//连接信息资源
		$info_url='http://jwxt.hhu.edu.cn:7778/pls/wwwbks/bks_login2.loginmessage';
		$ch = curl_init($info_url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
		$info_contents = curl_exec($ch);
		if(strlen($info_contents)<500) 
		{
			echo "账号或密码错误!";
			return;
		}
		$info_contents = mb_convert_encoding($info_contents, "utf-8", "gb2312");
		$this->getInfo($info_contents);

		//连接成绩资源
		$score_url='http://jwxt.hhu.edu.cn:7778/pls/wwwbks/bkscjcx.curscopre';
		$ch = curl_init($score_url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
		$score_contents = curl_exec($ch);
		$score_contents = mb_convert_encoding($score_contents, "utf-8", "gb2312");
		$this->getScore($score_contents);
 		curl_close($ch);

 		$rank_url = $this->getRankUrl();
 		//连接排名资源
		$ch = curl_init($rank_url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
		$rank_contents = curl_exec($ch);
		$rank_contents = mb_convert_encoding($rank_contents, "utf-8", "gb2312");
		//echo $rank_contents;
		$this->getRank($rank_contents);
 		curl_close($ch);
	}

	private function getInfo($info_contents)
	{
		$info_contents = preg_replace('/\r|\n/', '', $info_contents);
		preg_match('/<h4><font color=\"#9900FF\">(.*?)<\/font><\/h4>/',$info_contents,$info_str);
		$info = explode(' ',$info_str[1]);
		//获取学院
		$this->college = $info[0];
		//获取专业
		$this->major = $info[1];
		preg_match('/(.*?)\(/', $info[2],$name);
		//获取姓名
		$this->name = $name[1];
		preg_match('/\((.*)\)/',$info[2],$id);
		//获取学号
		$this->id = $id[1];
	}

	//获取查询排名地址
	private function getRankUrl()
	{
		$url='http://jwxt.hhu.edu.cn:7778/pls/wwwbks/bkscjcx.cursco?';
		foreach ($this->report as $k => $v) {
			if($v->search_url)
			{
				if($k!=0)
				{
					$url = $url.'&';
				}
				$url = $url.'p_pm=';
				$url = $url.$v->search_url;		
			}
		}
		return $url;
	}

	//获取分数
	private function getScore($score_contents)
	{
		$tmp = "/<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#F2EDF8\">[\s\S]*<\/table>/";
		preg_match($tmp, $score_contents,$table);
		$table = preg_replace('/\r|\n/', '', $table);
		$tmp = '/<tr>(.*?)<\/tr>/si';
		preg_match_all($tmp, $table[0],$tr);
		$tmp = '/<p align="center">(.*?)<\/p>/si';
		//遍历表格获取成绩单
		foreach ($tr[1] as $k=>$v)
		{
			$subject = new subject();
			preg_match_all($tmp, $v,$td_temp);
			$td = $td_temp[1];
			$url = substr($td[0], 42,-2);
			$subject->search_url=urlencode(mb_convert_encoding($url,'gb2312','utf-8' ));
			$subject->title = $td[2];
			$subject->id = $td[1];
			$subject->credit = $td[4];
			$subject->score = $td[10];
			$subject->test = $td[13];
			$subject->type = $td[11];
			array_push($this->report, $subject);
		}
	}

	private function getRank($rank_contents)
	{
		$tmp = "/<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#F2EDF8\">[\s\S]*<\/table>/";
		preg_match($tmp, $rank_contents,$table);
		$tmp = '/<tr>(.*?)<\/tr>/si';
		preg_match_all($tmp, $table[0],$tr);
		//var_dump($tr);
		$tmp = '/<p align="center">(.*?)<\/p>/si';
		foreach ($tr[1] as $k=>$v)
		{

			preg_match_all($tmp, $v,$td_temp);
			$td = $td_temp[1];
			//var_dump($td);
			foreach ($this->report as $s => $k) {
				if($k->id == $td[0])
				{
					$k->rank = $td[6];
					$k->totnum = $td[3];
				}
			}
		}
	}
	//绩点计算
	private function calCredit()
	{
		$totScore = 0;
		$totCredit = 0;
		$credit = 0;
		foreach ($this->report as $k=>$v)
		{
			if($v->type == '任选') {continue;}
			else
			{
				if($v->score == '优秀') $credit = 5.0;
				elseif ($v->score == '良好') $credit = 4.5;
				elseif ($v->score == '合格') $credit = 3.0;
				elseif($v->score<65) $credit = 2.0;
				elseif($v->score<70) $credit = 2.5;
				elseif($v->score<75) $credit = 3.0;
				elseif($v->score<80) $credit = 3.5;
				elseif($v->score<85) $credit = 4.0;
				elseif($v->score<90) $credit = 4.5;
				else $credit = 5.0;
			}

	//		echo $v->title." 绩点：".$credit." 学分:".$v->credit;
	//		echo "<br/>";
			$totScore +=  $credit * $v->credit;
			$totCredit += $v->credit;
		}
		if($totCredit!=0)
			$this->credit = $totScore/$totCredit;
		else 
			$this->credit = 0;
	//	var_dump($this->credit);
	}

}

$stu = new student();
unset($stu);
?>