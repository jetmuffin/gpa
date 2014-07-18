<?php
/**
 * ajax业务处理中的接口转发层，解决ajax跨域访问的问题
 *   工作原理：问请求通过本程序做中转，在本地服务器层完成与远程服务接口的交互
 *   备注：使用时 URL_ROOT 这个参数需要根据你的目标接口地址进行修改，本转发层之能用于单接口的Web Service接口服务
 *        程序支持POST数据与GET数量的同时转发;
 * @version 1.0.0.2
 * @author JerryLi lijian@dzs.mobi
 * @copyright b.dzs.mobi 2012-11-16
 * */
class interface_relay
{
	/**接口根地址(此处是需要修改的地方)*/
	const URL_ROOT = 'http://jwxt.hhu.edu.cn:7778/pls/wwwbks/bks_login2.login';
	/**字符集*/
	const CHARSET = 'UTF-8';
	/**stuid*/
	private $stuid = '';
	/**pwd*/
	private $pwd = '';

	function __construct()
	{
		$this->getData();
		if($this->stuid != '' || $this->pwd != '')
		{	//存在输入数据
			
			$sUrl = self::URL_ROOT .'?stuid='. $this->stuid . '&pwd=' . $this->pwd;

			header('Content-Type: text/html; charset='. self::CHARSET);
			$this->getContent($sUrl);
		}
		else
		{
			header('Content-Type: text/html; charset='. self::CHARSET);
			$this->getContent(self::URL_ROOT);
		}
		var_dump($this->stuid);
		var_dump($this->pwd);
	}

	function __destruct()
	{
		unset($pwd, $stuid);
	}

	/**
	 * 获取数据
	 * @return bool
	 * */
	private function getData()
	{
		$this->stuid =  $_POST['stuid'];
		$this->pwd =  $_POST['pwd'];
	}

	/**
	 * 读取远程接口返回的内容
	 * @return string
	 * */
	private function getContent($sGetUrl)
	{
/**/	var_dump($sGetUrl);
		$ch = curl_init($sGetUrl);
		var_dump($ch);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回  

		$ch2 = curl_init();
		curl_setopt($ch2, CURLOPT_URL, 'http://jwxt.hhu.edu.cn:7778/pls/wwwbks/bks_login2.loginmessage');
		curl_setopt($ch2, CURLOPT_HEADER, false);
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
		$return = curl_exec($ch2);
		echo $return;
		$sData = curl_exec($ch);
		curl_close($ch);
		unset($ch);
		echo $sData.'123';
		//return $sData;
	}
}

$o = new interface_relay();
unset($o);
?>