<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Crowdsourcing</title>
    
    <!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/creative.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

	<script>
		window.location.hash="no-back-button";
		window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
		window.onhashchange=function(){window.location.hash="no-back-button";}
		
		window.onload = function() {
			var $recaptcha = document.querySelector('#g-recaptcha-response');

			if($recaptcha) {
				$recaptcha.setAttribute("required", "required");
			}
		};
	</script> 
	
	<!-- Recaptcha -->
	<script src='https://www.google.com/recaptcha/api.js'></script>

</head>

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
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Tell us about yourself.</h2>
                    <p id="color-grey">We use this information to look for trends in responses.</p>
                    <hr/>
                    
                     <form role="form" method="post" action="respondent-save.php">
						 
					  <div class="form-group">
						  <select class="form-control" id="selected-gender" name="selected-gender" required>
							<option value="" selected disabled>Gender</option>
							<option value="female">Female</option>
							<option value="male">Male</option>
							<option value="other">Other</option>
						  </select>
					  </div>
					   
					  <div class="form-group">
						  <select class="form-control" id="selected-age" name="selected-age" required>
							<option value="" selected disabled>Age</option>
							<option value="18_24">18-24</option>
							<option value="25_31">25-31</option>
							<option value="32_38">32-38</option>
							<option value="39_45">39-45</option>
							<option value="46_52">46-52</option>
							<option value="53_59">53-59</option>
							<option value="60_66">60-66</option>
							<option value="67_73">67-73</option>
							<option value="74_80">74-80</option>
							<option value="81_87">81-87</option>
							<option value="over87">Over 87</option>
						  </select>
					   </div>
					   
					   <div class="form-group">
						<select class="form-control bfh-countries" data-country="US" id="selected-country" name="selected-country" required></select>
					   </div>
					   
					   <div class="form-group">
						  <select class="form-control" id="selected-education" name="selected-education" required>
							<option value="" selected disabled>Education</option>
							<option value="secondary">Secondary education degree or similar</option>
							<option value="bachelor">Bachelor degree or similar</option>
							<option value="master">Master degree or similar</option>
							<option value="phd">Ph.D.</option>
						  </select>
					   </div>
					   
					   <div class="form-group">
						  <select class="form-control" id="selected-salary" name="selected-salary" required>
							<option value="" selected disabled>Annual income</option>
							<option value="less9999">Less than $9,999</option>
							<option value="10to19">$10,000 to $19,999</option>
							<option value="20to29">$20,000 to $29,999</option>
							<option value="30to39">$30,000 to $39,999</option>
							<option value="40to49">$40,000 to $49,999</option>
							<option value="50to59">$50,000 to $59,999</option>
							<option value="60to69">$60,000 to $69,999</option>
							<option value="70to79">$70,000 to $79,999</option>
							<option value="80to89">$80,000 to $89,999</option>
							<option value="90to99">$90,000 to $99,999</option>
							<option value="more100">More than $100,000</option>
						  </select>
					   </div>
					   
					   <!-- <div class="g-recaptcha" data-sitekey="key"></div>-->
					   
					   <button type="submit" class="btn btn-primary pull-right">
						  Continue <i class="glyphicon glyphicon-arrow-right"></i>
					   </button>
					</form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/js/bootstrap-formhelpers.min.js"></script>
</body>

</html>
