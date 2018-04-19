<?php
require_once ('connection/connectdb.php');
require_once ('helpers/check-user.php');
?>

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
                <div class="col-lg-12 col-lg-offset-0 text-left">
                <h2 class="section-heading" style="text-align: center">General Description and Purpose of the Survey</h2>
                    <hr/>
                </div>
        
                <div class="col-lg-12 col-lg-offset-0 text-left">
                    <p align="justify"><b>Overview</b></p>
                    <p align="justify" style="margin-bottom: 40px;">In this job, you will annotate a set of tweets in terms of their speech. More precisely, you will try to classify tweets that contain inappropriate speech into the most appropriate category.</p>
                    
                    <p align="justify"><b>Steps</b></p>
                    <ol style="margin-bottom: 40px;">
                        <li>Read the tweet.</li>
                        <li>Determine if the tweet is relevant to the topic.</li>
                        <li>Click all links found in the text for additional context if necessary.</li>
                        <li>In the case that the tweet is relevant to the topic, classify that into a category.</li>
                    </ol>

                    <p align="justify"><b>Definitions and Indicative examples</b></p>
                    <ul style="margin-bottom: 40px;">
                        <li><b>Abusive Language</b>: Any strongly impolite, rude or hurtful language using profanity, that can show a debasement of someone or something, or show intense emotion.
                            <br/> <u>Example 1</u>: “Um...? I swear armys are so fucking retarded. BTS collab with Selena? Are yall dumb?.how did u even get to dis. Let… https://t.co/pOcCz4m2c9”
                            <br/> <u>Example 2</u>: "@cIoudtears They're absolutely fucking pathetic I need to know what the hell is going on so I can sort out transpo... https://t.co/ekvTudMbHO"
                            <br/> <u>Example 3</u>: "Cannot wait till I leave this working hell hole. A person never hates their job, they hate their supervisors."
                            <br/><br/>
                        </li>
                        <li><b>Hate Speech</b>: Language used to express hatred towards a targeted individual or group, or is intended to be derogatory, to humiliate, or to insult the members of the group, on the basis of attributes such as race, religion, ethnic origin, sexual orientation, disability, or gender.
                        <br/> <u>Example 1</u>: “I'm in CA. Illegals have raped everything they can get their hands on.Theyve destroyed schools,hospitals etc..”
                            <br/> <u>Example 2</u>: “Not to add... Truckloads of Islamists will come out saying Islam treats women very fairly & equally... https://twitter.com/IndiaTodayFLASH/status/848804793619492864”
                            <br/> <u>Example 3</u>: "When a Nigerian calls you 'idiot' you feel it in your liver I swear"
                            <br/><br/>
                        </li>
                        <li><b>Spam</b>: Posts that are consisted of related or unrelated advertising / marketing, selling products of adult nature, linking to malicious websites, phishing attempts and other kinds of unwanted information, usually executed repeatedly.
                        <br/> <u>Example 1</u>: “I wanna be fucked ! meet me here https://t.co/NCxKH1Iga0 https://t.co/ojjaVRHvo7”
                            <br/> <u>Example 2</u>: “@Andy_love1234: Awesome gift, buy now!!! https://t.co/56NxDQL3Te #playstation #playstationlive https://t.co/SCHfGKGgNP”
                            <br/> <u>Example 3</u>: "Click here to watch the movie:  https://t.co/eGINrFSIB7 The only way to get out of detention and go home https://t.co/QDiwjk2zbZ"
                            <br/><br/>
                        </li>
                        <li><b>Normal</b>: None of the above.</li>
                    </ul>

                    <p align="justify"><b>Important Notes</b></p>
                    <ul>
                        <li>This survey may involve occasional exposure to adult content and other somewhat disturbing content.</li>
                        <li>As soon as you make a selection, the test moves forward.</li>
                    </ul>
                </div>
                <br/>
                <div class="col-lg-12 col-lg-offset-0 text-center">
					<form role="form" method="post" action="about-save.php">
					   <button type="submit" class="btn btn-primary">
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

