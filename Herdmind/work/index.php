<?php
session_start();
?>
<!DOCTYPE HTML>
<!--
[PAGE SOURCE DESCRIPTION HERE]

This page is copyright Herdmind.net ©2013
-->
<?php
include $_SERVER['DOCUMENT_ROOT']."/_incl/contentBuilder.php"; // Also includes config.php and styleSwitch.php
include $_SERVER['DOCUMENT_ROOT']."/_incl/startSession.php";   // Start session and determine subdomain - do this second



$work = isset($_GET["w"]) && preg_match('/^\d+$/', $_GET["w"]) ? $_GET["w"] : false; // if it's set and is only digits
?>
<HTML>
<HEAD>
<?php
buildDefaultHeadContent(
	"Work",
	"A work used as a citation, inspiration, or support for a fanfact",
	array(
		  "Fanwork"
		, "Citation"
		, "Inspiration"
		, "Supporting"
	)
);
?>
</HEAD>



<?php
buildBodyTagWithAttributes(); // <BODY ...>
buildHeader(); // Don't pass variables to this; it will automatically detect login cookies
?>



<SECTION>
	<H1>Work</H1>
</SECTION>
<!--

Viewing page for fan works.


-->

<style>



#fanthumbs{
	columns: 4;
	-o-columns: 4;
	-ms-columns: 4;
	-moz-columns: 4;
	-webkit-columns: 4;
	column-gap: 0;
	-o-column-gap: 0;
	-ms-column-gap: 0;
	-moz-column-gap: 0;
	-webkit-column-gap: 0;
	margin-top: 15px;
	margin-bottom: 15px;
	text-align: center;
}

#fanthumbs section.fanwork {
	background: white;
	border-style: none;
	box-shadow: 0 0.25em 0.5em rgba(0,0,0, 0.25);
	display: inline-block;
	margin: 0 0.5em 1em;
	max-width: 90%;
	padding: 0.5em;
}
	#fanthumbs section.fanwork IMG {
		width: 50%
	}
	#fanthumbs section.fanwork HR {
		background: none;
		color: transparent;
		border-color: rgba(0,0,0, 0.1);
		border-width: thin 0 0;
	}

.gallerycontrols{
width: 100%;
height: 34px;
overflow: hidden;
margin: auto;
text-align: center;
}

button.greybutton{
background: #ddd;
width: 150px;

font-size: 16px;
line-height: 1;
border: 1px solid #ccc;
border-radius: 0;
height: 34px;
-webkit-appearance: none;
-moz-appearance: none;
}

</style>

<section>

	<div id="content" style='width:100%'>

	  <div id="character" class="block">

	    <div class="block-header">
		Fanworks Gallery
	    </div>
		<div class='gallerycontrols'>
		<button class='greybutton' name="Prev">Previous</button>
		<button class='greybutton' name="Next">Next</button>
		</div>
	
		<hr/>
		
		<div id="fanthumbs" class="block-content support">
		
		<section class='fanwork'>
			<div style="position: absolute; z-index:5000;">
				<img style="width:30px; height:30px;" src="../Images/RepresentiveIcons/YoutubeLogo.jpg">
			</div>
			<a href='./index.php?id=55'><img src='http://img.youtube.com/vi/cdtF_7Ff3og/mqdefault.jpg'>
				<hr/>Video Name
			</a>
		</section>
		
		<section class='fanwork'>
			<a href='http://www.fanfiction.net/s/7006690/1/Interview-with-a-Derpy' target='_blank'>
				<svg xmlns="http://www.w3.org/2000/svg"
					style="width: 100%; height: 6em;"
					viewBox="0 0 512 512"
					><!-- make sure you set the proper height and width! -->
					<title>Red Quill with Brown Book</title>
					<desc>A red quill above a brown book, by Blue Husky Art for Herdmind.net</desc>
					<defs>
						<!-- Page shading -->
						<linearGradient id="PAGE_SHADE" x1="57" x2="452" y1="319" y2="319" gradientUnits="userSpaceOnUse">
							<stop style="stop-color:#ffffff" offset="0%"/>
							<stop style="stop-color:#ffffff" offset="30%"/>
							<stop style="stop-color:#cccccc" offset="49.9%"/>
							<stop style="stop-color:#ffffff" offset="50%"/>
							<stop style="stop-color:#ffffff" offset="80%"/>
							<stop style="stop-color:#cccccc" offset="100%"/>
						</linearGradient>
					</defs>
					
					<!-- BEGIN Book -->
						<!-- Book Base -->
						<path
							d="m 480 448l -192 -8c -16.06 10.5 -48 10.44 -64 0l -192 8 64 -208 144 -8c 8 4 23 4 32 0l 144 8 64 208 z"
							id="PATH6"
							style="fill:#772b1a;fill-rule:evenodd"
						/>
						
						<!-- Pages -->
						<path
							d="m 447 432c -95 0 -127 -33 -191 0 -65 -33 -97 0 -193 0l 49 -192c 64 0 80 -32 144 0 64 -32 79 0 144 0l 47 192 z"
							id="PATH7"
							style="fill:url(#PAGE_SHADE);fill-rule:evenodd"
						/>
					<!-- END Book -->
					
					<!-- BEGIN Quill -->
						<!-- Quill Base -->
						<path
							d="
								m 432 440c -17 -22 -25 -19 -39 -32 -7 -6 -6.5 -33 -17.58 -49.83 -100.92 -151.17 -274.42 -284.17 -336.42 -310.17 99 36 375.5 265 393 392m
								-11.67 -30.67c -6.67 -14 -22.33 -26.33 -12.33 -25.67 4 0 9.33 17.33 12.33 25.67m
								-43.83 -37.33c -39.24 -10.52 -72.3 -26.27 -100.84 -46.12 9.09 2.62 39.84 5.62 51.84 3.87 -13.5 -1.25 -37.5 -6.5 -67.6 -15.27 -101.32 -75.75 -144.21 -195.65 -219.4 -262.48 68.5 31 267 196.5 336 320m
								16 -27.5c -70 -106 -254 -265.5 -344 -296.5 121 41 345 203.5 344 296.5 z
							"
							id="QUILL"
							style="fill: rgba(196, 0, 0, 1); fill-rule: evenodd;"
						/>
						
						<!-- Bold Shine -->
						<path
							d="
								m 135.33 105c 84 63.33 167.67 134 201.33 182.67 -45.67 -50.33 -105 -108.67 -201.33 -182.67m
								79.3 169.36c -15.6 -16.12 -29.71 -33.21 -42.91 -50.64 34.28 -12.71 48.28 -3.71 71.83 -13.27 15.87 15.45 31.41 31.35 46.17 47.39 -27.73 13.17 -44.73 6.17 -75.09 16.53m
								93.05 -31.37c -13.52 -13.86 -27.73 -27.73 -42.33 -41.34 -3.69 -12.31 5.98 -12.98 3.68 -22.63 11.76 9.59 23.09 19.35 33.79 29.17 9.17 12.48 -1.16 17.81 4.86 34.8 z
							"
							id="SHINE1"
							style="fill: rgba(255, 0, 0, 0.6); fill-rule: evenodd;"
						/>
						
						<!-- Thin Shine -->
						<path
							d="
								m 226.51 286.16c -1.94 -1.85 -3.85 -3.71 -5.75 -5.59 27.23 -11.57 45.98 -2.07 72.36 -19.03 1.65 1.81 3.28 3.62 4.91 5.42 -20.79 15.78 -46.29 9.53 -71.52 19.2m
								87.97 -36.14c -1.42 -1.48 -2.85 -2.97 -4.29 -4.45 -2.79 -12.37 1.21 -21.77 -0.77 -31.24 0.77 0.73 1.54 1.46 2.31 2.19 2.67 10.28 -2.13 17.48 2.75 33.5 z
							"
							id="SHINE2"
							style="fill: rgba(255, 0, 0, 0.6); fill-rule: evenodd;"
						/>
					<!-- END Quill -->
				</svg>
				<hr/>
				Fanfic Title				
				</a>
			</section>
			
			
	<section class='fanwork'>
		<a href='./index.php?id=13'>
			<img src='url to image'>
		</a>
	</section>
		
	<div class='MoreToLoadCheck'>More</div><div class='MoreToLoadCheck'>More</div>	
		</div> <!-- block content -->
		
		
		<hr/>
		<div class='gallerycontrols'>
		<button class='greybutton' name="Prev">Previous</button>
		<button class='greybutton' name="Next">Next</button>
		</div>
	
	<div class="clear"></div>	
				
		
	  </div> <!-- character -->

	</div> <!-- content -->

<div class='clear'></div>
            
</section>


<?php
buildFooter();
?>
</BODY>
</HTML>
