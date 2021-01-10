<!DOCTYPE html>
<html>
<head>
	<title>Hello</title>
</head>
<body>
 <?php if ($this->session->userdata('logged_in') != null) {
	 $data = $this->session->userdata('logged_in');

  echo '<h1>Welcome to'.' '.$data['us_name'].'</h1>';
}
else{
	redirect("user/login.htm");
} ?>

</body>
</html>