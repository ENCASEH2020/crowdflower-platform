<?php
require_once ('connection/connectdb.php');
require_once ('helpers/default.php');

global $id, $control;
	
function parse_json($json) {
	$obj = json_decode($json, true);
		
	echo "<table><tbody>";
	echo "<tr class='spaceUnder'><td><b>Tweet</b>: <i>" . $obj['case']['content'] . "</i></td></tr>";
	echo "<tr class='spaceUnder'><td><b>Tweet URL</b>: <a id='color-grey' href=" .  $obj['case']['url'] . " target='_blank'>" .  $obj['case']['url'] . "</a></td></tr>";
	echo "</tbody></table><br/>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Twitter crowdsourcing</title>
    
    <!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/creative.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
    <script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip({placement: "top"});
		});
		
		window.location.hash="no-back-button";
		window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
		window.onhashchange=function(){window.location.hash="no-back-button";}
	</script> 
	
</head>

<script>
	function toggleTextbox(x) {
		var res = x.value.split("_")[1];
		if (x.value.indexOf("other") >= 0) {
			document.getElementById('text_other').style.display = "inline";
			document.getElementById("other-selection").required = true;
		} else {
			document.getElementById('text_other').style.display = "none";
			document.getElementById("other-selection").required = false;
			document.getElementById(x).value = '';
		}
	}	
</script>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="index.php">ENCASE</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="about.php">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="user.php">Take a test</a>
                    </li>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <section id="contact">
        <div class="container">
            <div class="row">
				
				<div class="col-s-8 col-lg-offset-1 text-center">
                    <h2 class="section-heading">How do you characterize the following tweet?</h2>
                    <p id="color-grey">Progress: <?php $page = $_SESSION['questCount'] + 1; echo $page . "/" . $num_pages; ?></p>
                    <hr/>
                 </div>
			
				
				<div class="col-sm-9">

					 <div class="col-lg-12 col-lg-offset-0 text-center">
						<?php
							### control == 1: control case
							### control == 0: general batch

							$responded = array();
							$sql = "SELECT id_user, id_batch from session WHERE id_user = '". $_SESSION['userId'] ."'";

							foreach ($conn->query($sql) as $row) {
								array_push($responded, $row['id_batch']);
							}
							
							if($_SESSION['position'] == $_SESSION['questCount'] + 1){
								$sql = "SELECT id, batch, counter, control FROM batches WHERE id NOT IN ( '" . implode($responded, "', '") . "' ) AND control = 1 ORDER BY rand() LIMIT " . $max_batches . "";
								if($conn->query($sql)->fetchColumn() == 0){
									header('location:exit.php');
									exit();
								}

								foreach ($conn->query($sql) as $row) {
									parse_json($row['batch']);
									$id = $row['id'];
								}
								
								$control = 1;
							}else{
								$sql = "SELECT id, batch, counter, control FROM batches WHERE id NOT IN ( '" . implode($responded, "', '") . "' ) AND counter < ". $max_annotations ." AND control = 0 ORDER BY rand() LIMIT " . $max_batches . "";
								if($conn->query($sql)->fetchColumn() == 0){
									$_SESSION['warning_msg'] = "There are not any other questions available.";
									header('location:exit.php');
									exit();
								}
								
								foreach ($conn->query($sql) as $row) {
									parse_json($row['batch']);
									$id = $row['id'];
								}
								
								$control = 0;
							}
						?>
					 </div>
					 
					  <div class="col-lg-12 col-lg-offset-0 text-center">
						<form role="form" method="post" action="question-save.php">
							<label class="checkbox-inline"><input type="radio" value="abusive" name="user-selection" required><a id="a-tooltip" href="#" data-toggle="tooltip" title="Any strongly impolite, rude or hurtful language using profanity, that can show a debasement of someone or something, or show intense emotion."> Abusive Language</a></label>
							<label class="checkbox-inline"><input type="radio" value="hateful" name="user-selection"><a id="a-tooltip" href="#" data-toggle="tooltip" title="Language used to express hatred towards a targeted individual or group, or is intended to be derogatory, to humiliate, or to insult the members of the group, on the basis of attributes such as race, religion, ethnic origin, sexual orientation, disability, or gender."> Hate Speech</a></label>
							<label class="checkbox-inline"><input type="radio" value="spam" name="user-selection"><a id="a-tooltip" href="#" data-toggle="tooltip" title="Posts that are consisted of related or unrelated advertising / marketing, selling products of adult nature, linking to malicious websites, phishing attempts and other kinds of unwanted information, usually executed repeatedly."> Spam</a></label>
							<label class="checkbox-inline"><input type="radio" value="normal" name="user-selection"> Normal</label>

							<input type="hidden" name="batch-id" value="<?php echo $id ?>"> 
							<input type="hidden" name="control-val" value="<?php echo $control ?>"> 
							
							<br/><br/><br/>
							
							<button type="submit" class="btn btn-primary pull-center">
								<?php if($_SESSION['questCount'] < $num_pages - 1){ ?>
									Next
								<?php }else{ ?>
									End
								<?php } ?>
						   </button>
						   
						</form>
					  </div>
                </div>
                
                <div class="col-sm-3" style="background-color:#fff8e5;">
					<b>Abusive Language</b>
					<p>Any strongly impolite, rude or hurtful language using profanity, that can show a debasement of someone or something, or show intense emotion.</p>
					<br/>
					
					<b>Hate Speech</b>
					<p>Language used to express hatred towards a targeted individual or group, or is intended to be derogatory, to humiliate, or to insult the members of the group, on the basis of attributes such as race, religion, ethnic origin, sexual orientation, disability, or gender.</p>
					<br/>
					
					<b>Spam</b>
					<p>Posts that are consisted of related or unrelated advertising / marketing, selling products of adult nature, linking to malicious websites, phishing attempts and other kinds of unwanted information, usually executed repeatedly.</p>
                </div>
              
            </div>
        </div>
    </section>
</body>

</html>

