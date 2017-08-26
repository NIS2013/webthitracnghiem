<!--<center> <h1> Congrats! You have logged in successfully </h1>-->
<br/>
<table class="details bordered" align="center" style="width: 400px; margin: 0 auto; text-align: center">
	<tr>
		<td colspan="2"> <h5> Thông tin AdminBoard</h5> </td>
	</tr>
	<tr>
		<td> Họ và tên: </td>
		<td> <?php echo $userdata['name']; ?> </td>
	</tr>
	<tr>
		<td> MSSV: </td>
		<td> <?php echo $userdata['username']; ?> </td>
	</tr>
	<tr>
		<td> Email: </td>
		<td> <?php echo $userdata['email']; ?> </td>
	</tr>
	<tr>
		<td> Lớp: </td>
		<td> <?php echo $userdata['location']; ?> </td>
	</tr>
	<tr>
		<td> Giới tính: </td>
		<td> <?php echo $userdata['gender']; ?> </td>
	</tr>
	
</table>

</center>