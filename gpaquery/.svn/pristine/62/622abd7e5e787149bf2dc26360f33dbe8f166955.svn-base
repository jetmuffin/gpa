<?php 
	function shareUrlWeibo($gpa)
	{
		$url = 'http://gpaquery.sinaapp.com';
		$url = urlencode($url);
		$title = '我正在用成绩查询代理系统查询这学期的成绩(gpaquery.sinaapp.com)，这学期我的绩点达到了'.$gpa.'，崇拜我吧！哈哈哈哈哈！';
		$title = urlencode(mb_convert_encoding($title,'gb2312','utf-8' ));
	 	$share_url_weibo = 'http://service.weibo.com/share/share.php?url='.$url.'&type=icon&language=zh_cn&appkey=5gBsE5&title='.$title.'&searchPic=true&style=simple';		
		return $share_url_weibo;
	}
	function shareUrlRenren($gpa)
	{
		$url = 'http://gpaquery.sinaapp.com';
		$url = urlencode($url);
		$description = urlencode('我正在用成绩查询代理系统查询这学期的成绩(gpaquery.sinaapp.com)，这学期我的绩点达到了'.$gpa.'，崇拜我吧！哈哈哈哈哈！');
		$title = urlencode('成绩查询代理系统-河海大学');
		$share_url_renren = 'http://widget.renren.com/dialog/share?resourceUrl='.$url."&title=".$title."&description=".$description;
		return $share_url_renren;
	}
	function shareUrlQzone($gpa)
	{
		$url = 'http://gpaquery.sinaapp.com';
		$url = urlencode($url);
		$title = urlencode('成绩查询代理系统-河海大学');
		$summary = urlencode('我正在用成绩查询代理系统查询这学期的成绩(gpaquery.sinaapp.com)，这学期我的绩点达到了'.$gpa.'，崇拜我吧！哈哈哈哈哈！');
		$share_url_qzone = 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='.$url.'&title='.$title.'&summary='.$summary;
		
		return $share_url_qzone;
	}
 ?>