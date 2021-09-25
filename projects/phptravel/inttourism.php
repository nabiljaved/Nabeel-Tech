<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TOURISM WORLDWIDE</title>
 
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/lightbox.css" rel="stylesheet"/>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <style>


.parallax{
min-height:500px;
background:transparent;
}

#fluid{
background:#f9f9f9;
font-size:24px;
padding:25px;
}

#fluid h1{
text-align:center;
color:blue;
font-size:2em
}

label{
background-color:#337AB7; 
color:yellow;
margin-top:8px;	
margin-right:8px;	
}
 

  </style>
  </head>
  <body style="color:grey">
  
     <div class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
	<div class="navbar-header">
	<button class="navbar-toggle" id="btt" data-toggle="collapse" data-target=".navbar-collapse ">
	<span class="sr-only"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	</button>
	<a href="#" class="navbar-brand">Nabeel Travel Guide</a>
	</div>
	<div class="collapse navbar-collapse">
	<ul class="nav navbar-nav">
	<li  class="text-center"><a href="index.php">Home</a></li>
	<li  class="text-center"><a href="gallery.php">Gallery</a></li>
	<li  class="text-center"><a href="inttourism.php">International</a></li>
	<li  class="text-center"><a href="promotion.php">Tickets</a></li>
	</ul>
	<?php
	if(isset($_SESSION['u_uid'])){
		$username = $_SESSION["u_uid"];
		echo '
			
			<form  method = "POST" action="includes/logout.inc.php" class="navbar-form navbar-right">
			<div class="form-group">
					<label>'.$username.'<label>
				</div>
				<div class="form-group">
					<button type="submit" name ="submit" class="btn btn-success">Log Out</button>
				</div>
				
			</form>
		';	
	}
	else{
		
	echo '
	
	<form method = "POST" action="includes/login.inc.php" class="navbar-form navbar-right">
	<div class="form-group">
	<input type="text" name="uid" placeholder="UserName" class="form-control" >
	</div>
	<div class="form-group">
	<input type="password" name="pwd" placeholder="password" class="form-control" >
	</div>
	<button type="submit" name ="submit" class="btn btn-success">Log In</button>
	<a href="signup.php" class="btn btn-default btn-warning">Signup</a>
	</form>
	'; 	
	}
	?>
	
	</div>
	</div>
	</div>
  
	<div class="container-fluid" id="fluid">
		<h1>United Kingdom</h1>
			<p>
				The United Kingdom, made up of England, Scotland, Wales and Northern Ireland, is an island nation in northwestern Europe. England – birthplace 
				of Shakespeare and The Beatles – is home to the capital, London, a globally influential centre of finance and culture. 
				England is also site of Neolithic Stonehenge, Bath’s Roman spa and centuries-old universities at Oxford and Cambridge.
			</p>
		<div class="parallax" data-parallax="scroll" data-z-index="1" data-image-src="images/london.jpg">
		
		</div>
		<h3 style="color:hotpink">Visit UK destinations:</h3>
		<p>Whether you’re in the United Kingdom (UK) for the first time, or have lived here your whole life and are looking for new places to visit, UK travel is all about variety.
		It’s about unearthing a mixture of iconic sights and hidden gems, ticking famous landmarks off your bucket-list one day and stumbling across a quirky local museum the next. <br><br>
		It’s about taking the plunge into a vast wealth of activities, whether you’re an adrenalin-junkie, a die-hard hobbyist or simply fancy trying your hand at something new – from abseiling and mountain-biking 
		to hiking and pony trekking, seal spotting, bird watching and more. And, of course, the UK’s diversity is mirrored in its landscape too.</p>
		
				<h1 style="text-align:center; color:green; font-size:2em">PRAGUE</h1>
			<p>
				Prague, capital city of the Czech Republic, is bisected by the Vltava River. Nicknamed “the City of a Hundred Spires,” 
				it's known for its Old Town Square, the heart of its historic core, with colorful baroque buildings, Gothic churches 
				and the medieval Astronomical Clock, which gives an animated hourly show. Completed in 1402, pedestrian Charles Bridge 
				is lined with statues of Catholic saints.
			</p>
		<div class="parallax" data-parallax="scroll" data-z-index="1" data-image-src="images/prague.jpg">
		
		</div>
		<h3 style="color:blue">Visit prague destinations:</h3>
		<p>Because Prague wasn’t severely damaged during WWII, many of its most impressive historical buildings remain intact today. 
		Thus, Prague has another major advantage going for it: while many major European capitals were rebuilt and destroyed during 
		the 17th and 18th centuries, Prague’s buildings were left untouched. As a result, the city is a breathtaking mix of baroque, 
		gothic and renaissance architecture, hard to find anywhere else in Europe. The Our Lady Before Týn church in Old Town Square is 
		a magnificent example of gothic architecture, while Schwarzenberg Palace inside the Prague Castle’s grounds is a perfect example of 
		renaissance design. Examples of cubism and neoclassicism also abound, with touches of Art Nouveau in places, such as the Municipal House.</p>
		
		<h1 style="text-align:center; color:red; font-size:2em">CANADA</h1>
			<p>
				Canada is a vast and rugged land. From north to south it spans more than half the Northern Hemisphere. 
				From east to west it stretches almost 4,700 miles (7,560 kilometers) across six time zones. 
				It is the second largest country in the world, but it has only one-half of one percent of the world's population.
			</p>
		<div class="parallax" data-parallax="scroll" data-z-index="1" data-image-src="images/canada.jpg">
		
		</div>
		<h3 style="color:dodgerblue">Visit canada destinations:</h3>
		<p>In some ways Canada is many nations in one. Descendents of British and French immigrants make up about half the population. 
		They were followed by other European and Asian immigrants. First Nations peoples make up about four percent of the population.<br><br>
		Inuit people live mostly in the Northwest Territories and Nunavut. Many Native Canadians live on their traditional lands, but many 
		others have moved to cities across Canada. First Nations artwork is widely recognized and is seen as a symbol of Canadian culture.</p>
		
		<h1 style="text-align:center; color:yellow; font-size:2em">AUSTRALIA</h1>
			<p>
				Australia is a country and continent surrounded by the Indian and Pacific oceans. Its major cities – 
				Sydney, Brisbane, Melbourne, Perth, Adelaide – are coastal. Its capital, Canberra, is inland. The country is 
				known for its Sydney Opera House, the Great Barrier Reef, a vast interior desert wilderness called the Outback, 
				and unique animal species like kangaroos and duck-billed platypuses.
			</p>
		<div class="parallax" data-parallax="scroll" data-z-index="1" data-image-src="images/australia.jpg">
		
		</div>
		<h3 style="color:red">Visit Australia destinations:</h3>
		<p>This photogenic six kilometre (3.7 mile) walking track will take you through scenic Eastern Sydney beaches, 
		including , Tamarama, Bronte, Clovelly, and, finally, Coogee Beach. The trail begins at Bondi Icebergs pool, 
		winds past Aboriginal rock carvings at Marks Park, and offers plenty of opportunities for a swim along the way. At the end of your walk,
		enjoy lunch at seaside eatery Coogee Pavilion – its rooftop boasts beautiful 270 degree views. Every October the Bondi to Coogee coastal 
		walk plays host to the free  exhibition, with 520,000 visitors viewing 100 unique sculptures by artists from around the world. Express buses 
		operate from Bondi and Coogee to the city centre.</p>
		
	</div>
			

    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/parallax.min.js"></script>
 
</html>