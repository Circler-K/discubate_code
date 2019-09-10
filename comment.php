<?php
/*require("dbconfig.php");
	$sql = "select * from comment_free where co_no=co_order AND b_no='$b_No'";
   @$result = mysql_query($sql);*/
?>


<?php
$testno=$bNo;
?>
<?php
	require_once("dbconfig.php");
	
	
	
		$paging .= '</ul>';
		
		$currentLimit = ($onePage * $page) - $onePage;
		$sqlLimit = ' limit ' . $currentLimit . ', ' . $onePage; 
		/*. $sqlLimit;               order by co_no desc'*/ 
		$sql = "select * from comment_free where comment_no='$testno'";   
		$result = $db->query($sql);
	
?>


<div id="commentView"><form action="comment_update.php" method="post">
	<input type="hidden" name="bno" value="<?php echo $bNo?>">
	<table>
		<tbody>
		
			<tr>
				<th scope="row"><label for="coContent">내용</label></th>
				<td><textarea name="coContent" id="coContent"></textarea></td>
			</tr>
		<td width=400 >
  <select name="co_type" class="box"> <!-- = 찬성 ==반대-->
   <option value="찬성">찬성
   <option value="반대">반대
  </select>
		
		</tbody>
	
	</table>
	<div class="btnSet">
		<input type="submit" value="코멘트 작성">
	</div>
</form>

</div>










<article class="boardArticle">
	</br></br></br>
		<h3>댓글</h3>
		<div id="boardList">
			<table>
				<thead>
					<tr>
						<th scope="col" class="no">찬/반</th>
						<td scope="col" class="title">의견<?php echo $testno;?></td>
						<th scope="col" class="author">작성자</th>
						<th scope="col" class="no">순서</th>
					</tr>
				</thead>
				<tbody>
						<?php
						if(isset($emptyData)) {
							echo $emptyData;
						} else {
							while($row = $result->fetch_assoc())
							{
								$datetime = explode(' ', $row['b_date']);
								$date = $datetime[0];
								$time = $datetime[1];
								if($date == Date('Y-m-d'))
									$row['b_date'] = $time;
								else
									$row['b_date'] = $date;
						?>
						<tr>
							<td class="no"><?php echo $row['co_type']?></td>
							<td class="title"><?php echo $row['co_content']?></td>
							<td class="author"><?php echo $row['co_id']?></td>
							<td><?php echo $row['co_no']?></td>
						</tr>
						<?php
							}
						}
						?>
				</tbody>
			</table>
			<div class="paging">
				<?php/* echo $paging*/ ?>
			</div>
			
		</div>
	</article>