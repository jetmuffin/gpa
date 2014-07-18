<?php 
	include 'student.php';
	
	header("Content-type: text/html; charset=utf-8"); 
	$stu = new student();
	session_start();
	$stu = unserialize($_SESSION['stu']);
	// var_dump($stu);
 ?>
 <?php include'header.php' ?>
 <table class="ui table segment table-sheet sortable">
 	<thead>
  		<tr>
  			<th>课程名称</th>
  			<th>课程性质</th>
  			<th>考核方式</th>
  			<th>学分</th>
 		 	<th>成绩</th>
 		 	<th>绩点</th>
 		 	<th>排名(前百分比)</th>
  		</tr>
  	</thead>
	<?php 
		foreach ($stu->report as $k => $v) {
		 	echo '<tr>';
		 	echo '<td>'.$v->title.'</td>';
		 	echo '<td>'.$v->type.'</td>';
		 	echo '<td>'.$v->test.'</td>';
		 	echo '<td>'.$v->credit.'</td>';
		 	
		 	if($v->score>=90||$v->score=="优秀")
		 		echo '<td class="green">'.$v->score.'</td>';
		 	elseif($v->score<60||$v->score=="合格") 
		 		echo '<td class="red">'.$v->score.'</td>';
		 	else
		 		echo '<td>'.$v->score.'</td>';

		 	if($v->gpa!=null)
		 		echo '<td>'.$v->gpa.'</td>';
		 	else
		 		echo '<td>/</td>';
		 	if($v->rank!=null)
		 		echo '<td><p>'.sprintf("%.2f",$v->rank/$v->totnum*100).'%('.$v->rank.'/'.$v->totnum.')</p><div class="rank_i">
		 			<i style="width:'.(100-$v->rank/$v->totnum*100).'%"></i></div></td>';
		 	else 
		 		echo '<td></td>';
		 	echo '</tr>';
		 }
	?>
</table>
 <?php include'footer.php' ?>