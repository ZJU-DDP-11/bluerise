<?php include 'header.php'; ?>
	<table>
		<tr>
			<td><h2>Title</h2></td>		
		</tr>
		<tr>
			<td><input method="POST", placeholder="Give your decices a Name",type="text",size="500"></td>
		</tr>
		<tr>
			<td><h2>Tags</h2></td>		
		</tr>
		<tr>
			<td><input method="POST", placeholder="Use comma separated tags(CSV) to describe your Arduino.",type="text",size="1000"></td>
		</tr>
		<tr>
			<td><input type="submit" value="Create" ,name="a" method="GET"></td>
		</tr>
	</table>
<?php include 'footer.php'; ?>