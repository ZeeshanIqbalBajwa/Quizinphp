<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>



<!DOCTYPE html>
<html>
<head>

<title>Home Page</title>
<link rel="stylesheet" type="text/css"  href="bootstrap.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" ></script>

</head>



<body>
	<div class="container">
		
		<br><h1 class="text-center text-primary">Software Quality Quiz</h1></br>
		
		
<div class="col-lg-8 m-auto d-block">


<br><h2 class="text-center text-success">Welcome <?php echo $_SESSION['username']; ?> You have select only one of the best option (Best of Luck)</h2></br>	

<form action="check.php" method="post">

<?php
for( $i=1; $i<6; $i++){
$q="select *from questions where qid=$i";
$query=mysqli_query($con, $q);

	while($rows=mysqli_fetch_array($query)){

	?>

		<div  class="card">
			
			<h4 class="card-header"> <?php   echo $rows['question']?></h4>
		</div>
		
		<?php

$q="select *from answers where ans_id=$i";
$query=mysqli_query($con, $q);

	while($rows=mysqli_fetch_array($query)){
?>

		<div class="card-body">

			<input type="radio" name="quizcheck[<?php echo $rows['ans_id'];?>]" value="<?php echo $rows['aid'];?>">
			<?php echo $rows['answer'];?>

		</div>

	
<?php
}}

}
?>

<input type="submit" name="submit" value="Submit" class="btn btn-success m-auto d-block">


			
</form>
</div>
</div>

<br>
<br>
<div class="m-auto d-block">
<a href="index.php" class="btn btn-primary m-auto d-block">Logout</a>

</div>


</div>
	
</body>
</html>