<!-- importing content builder... -->
<?php
/* 
 * A general-use file for building common page elements on Herdmind, such as the header and footer, or links to topics.
 * 
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! WARNING TO ALL DEVELOPERS VIEWING THIS FILE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * !!! ANY EDIT TO THIS FILE WILL AFFECT THE ENTIRE SITE! IT'S RECOMMENDED THAT YOU USE BACKUPS AND TEST COPIES, FIRST !!!
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * 
 * @since 2013-03-01
 */

include $_SERVER['DOCUMENT_ROOT']."/_incl/config.php";
include $_SERVER['DOCUMENT_ROOT']."/_incl/styleSwitch.php";



/**
 * Builds the default content to go in every page's <HEAD> tag.
 * 
 * @param $tabText         [OPTIONAL] the text to go in the browser tab. If given, tab text will be "$tabText - Herdmind". Else,
 *                         		it will simply be "Herdmind"
 * @param $longDescription [OPTIONAL] the complete description of the page and its purpose
 * @param $keywords        [OPTIONAL] an array of keywords used by search engines to find this page
 * 
 * @author Kyli Rouge
 * @since 2013-03-14
 * @version 1.0.0 (2013-03-14)
**/
function buildDefaultHeadContent($tabText = null, $longDescription = null, $keywords = null) // !!!!!!!!!!!!!!!!!!!! CHANGE TITLE TAG BUILDING BEFORE FINAL IMPLEMENTATION
{
	if ($tabText && is_array($tabText)) // change an array of items into a dashed list
	{
		$temp = $tabText;
		$tabText = $temp[0];
		for($i = 1; $i < count($temp); $i++)
			$tabText .=  " &ndash; $temp[$i]";
	}
	echo '<TITLE>' . ($tabText ? $tabText . ' &ndash; ' : '') . 'Herdmind&nbsp;&beta;</TITLE>

<!-- BEGIN Meta data -->
<META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=utf-8" />
<META NAME="viewport"    CONTENT="' /*target-densitydpi=device-dpi, */ . 'width=device-width, initial-scale=1.0' /*, user-scalable=no*/ . '" /> <!-- If user is on mobile, suggest to not allow pinch-zoom -->
<META NAME="description" CONTENT="';
	if ($longDescription)
		echo $longDescription;
	else
		echo 'Herdmind, the headcanon database';
	echo '"/>
<META NAME="keywords"    CONTENT="Herdmind,Headcanon,Database';
	if ($keywords)
		if(is_array($keywords))
			foreach ($keywords as $keyword)
				echo "," . $keyword;
		else
			echo $keywords;
	else
		echo 'webpage,generic';
	echo '"/>
<META HTTP-EQUIV="X-UA-Compatible" CONTENT="chrome=IE8" /> <!-- INVALID: Consider altermatives. - If user is using IE 8 or older and has Chrome Frame, use Chrome Frame -->
<!-- END Meta data -->

<!-- BEGIN Representative images -->
<LINK REL="shortcut icon"                TYPE="image/x-icon"    HREF="/favicon.ico" />
<!--LINK REL="apple-touch-icon"             TYPE="image/png"       HREF="/touchIcon.png" /-->
<!--LINK REL="apple-touch-icon-precomposed" TYPE="image/png"       HREF="/touchIcon.png" /-->
<!-- END Representative images -->

<SCRIPT TYPE="text/javascript" SRC="//code.jquery.com/jquery.min.js">/* jQuery */</SCRIPT>
<SCRIPT TYPE="text/javascript" SRC="/_js/general.js">/* General Herdmind Javascript */</SCRIPT>
<SCRIPT TYPE="text/javascript" SRC="/_js/ajax.js">/* Herdmind Javascript for AJAX calls */</SCRIPT>

<LINK REL="stylesheet" TYPE="text/css" HREF="//prog.BHStudios.org/Husk/_css/Husk.css" /> <!-- layout assistant -->
<LINK REL="stylesheet" TYPE="text/css" HREF="//prog.BHStudios.org/Husk/_css/Flex.css" /> <!-- layout assistant -->
';
	
	buildStyleSwitcherHeadContent('/_css/visual_Dynamo.css');
	buildSidebarHeadContent();
	buildLoginHeadContent();
}



/** WILL BE DELETED. ONLY USE FOR TESTING PURPOSES
 * Builds the default content to go in test pages' <HEAD> tags.
 * 
 * @param $tabText         [OPTIONAL] the text to go in the browser tab. If given, tab text will be "$tabText - Herdmind". Else,
 *                         		it will simply be "Herdmind"
 * @param $longDescription [OPTIONAL] the complete description of the page and its purpose
 * @param $keywords        [OPTIONAL] an array of keywords used by search engines to find this page
 * 
 * @author Kyli Rouge
 * @since 2013-03-14
 * @version 1.1.0 (2014-02-21)
 * 		- 1.1.0 (2014-02-21)
 * 			- Kyli Rouge added Husk to aid layout
 * 		- 1.0.0 (2013-03-14)
**/
function buildNewDefaultHeadContent($tabText = null, $longDescription = null, $keywords = null) // !!!!!!!!!!!!!!!!!!!! CHANGE TITLE TAG BUILDING BEFORE FINAL IMPLEMENTATION
{
	if ($tabText && is_array($tabText)) // change an array of items into a dashed list
	{
		$temp = $tabText;
		$tabText = $temp[0];
		for($i = 1; $i < count($temp); $i++)
			$tabText .=  " &ndash; $temp[$i]";
	}
	echo "<TITLE>" . ($tabText ? $tabText . " &ndash; " : "") . "Herdmind&nbsp;&beta;</TITLE>

<!-- BEGIN Meta data -->
<META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html;charset=utf-8\" />
<META NAME=\"viewport\"    CONTENT=\"target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no\" /> <!-- If user is on mobile, suggest to not allow pinch-zoom -->
<META NAME=\"description\" CONTENT=\"";
	if ($longDescription)
		echo $longDescription;
	else
		echo "Herdmind, the headcanon database";
	echo "\"/>
<META NAME=\"keywords\"    CONTENT=\"Herdmind,Headcanon,Database";
	if ($keywords)
		if(is_array($keywords))
			foreach ($keywords as $keyword)
				echo "," . $keyword;
		else
			echo $keywords;
	else
		echo "webpage,generic";
	echo "\"/>
<META HTTP-EQUIV=\"X-UA-Compatible\" CONTENT=\"chrome=IE8\" /> <!-- INVALID: Consider altermatives. - If user is using IE 8 or older and has Chrome Frame, use Chrome Frame -->
<!-- END Meta data -->

<!-- BEGIN Representative images -->
<LINK REL=\"shortcut icon\"                TYPE=\"image/x-icon\"    HREF=\"/favicon.ico\" />
<!--LINK REL=\"apple-touch-icon\"             TYPE=\"image/png\"       HREF=\"/touchIcon.png\" /-->
<!--LINK REL=\"apple-touch-icon-precomposed\" TYPE=\"image/png\"       HREF=\"/touchIcon.png\" /-->
<!-- END Representative images -->

<SCRIPT TYPE=\"text/javascript\" SRC=\"//code.jquery.com/jquery.min.js\">/* jQuery */</SCRIPT>
<SCRIPT TYPE=\"text/javascript\" SRC=\"/_js/general.js\">/* General Herdmind Javascript */</SCRIPT>
<SCRIPT TYPE=\"text/javascript\" SRC=\"/_js/ajax.js\">/* Herdmind Javascript for AJAX calls */</SCRIPT>

<LINK REL=\"stylesheet\" TYPE=\"text/css\" HREF=\"//prog.BHStudios.org/Husk/_css/Husk.css\" /> <!-- layout assistant -->
<LINK REL=\"stylesheet\" TYPE=\"text/css\" HREF=\"//prog.BHStudios.org/Husk/_css/Flex.css\" /> <!-- layout assistant -->
";
	
	buildStyleSwitcherHeadContent("/_css/visual_Dynamo.css");
	buildSidebarHeadContent();
	buildLoginHeadContent();
}

/**
 * Builds the <HEAD> content necessary for the sidebar to properly function.
 * 
 * @author Kyli Rouge
 * @since 2013-03-18
 * @version 1.0.1 (2013-03-19)
**/
function buildSidebarHeadContent()
{
	echo "
<SCRIPT TYPE=\"text/javascript\" SRC=\"/_js/sidebar.js\">/* Sidebar Scripts */</SCRIPT>
";
}

/**
 * Builds the <HEAD> content for handling HTML5 dialogs.
 * 
 * @author Kyli Rouge
 * @since 2013-03-24
 * @version 1.0.0 (2013-03-24)
**/
function buildDialogHeadContent()
{
	echo "<!-- Deprecated Dialog API would go here -->";
	// echo "<SCRIPT TYPE=\"text/javascript\" SRC=\"/_js/dialogs.js\">/* Dialog handling */</SCRIPT>
// ";
}
function buildLoginHeadContent()
{
	echo "<SCRIPT TYPE=\"text/javascript\" SRC=\"/_js/login.js\">/* Login handling */</SCRIPT>
";
}

/**
 * Builds the <BODY> tag, with dynamic attributes depending on the user's cookies.
 * 
 * @author Kyli Rouge
 * @since 2013-03-19
 * @version 1.0.0 (2013-03-19)
**/
function buildBodyTagWithAttributes()
{
	require_once $_SERVER['DOCUMENT_ROOT']."/_incl/convenience.php";
	
	$classes = array();
	
	if (isset($_COOKIE["pinSidebar"]) && $_COOKIE["pinSidebar"] != "false")
		array_push($classes, "withSidebar");
	
	//$url = parse_url(getURL());
	//if ($url["fragment"] == "LOGGER_HOLDER")
	//	array_push($classes, "withDialog");
	
	echo "<BODY";
	if (count($classes) > 0)
	{
		echo " CLASS=\"";
		foreach($classes as $class)
			echo "$class ";
		echo "\"";
	}
	echo ">";
}

/**
 * Builds the header of all Herdmind public-facing pages.
 * 
 * @param $loggedIn [OPTIONAL] Specified whether to build a header for a logged-in or logged-out user. If the user is logged in,
 *                  	then pass the value true. Else, you may omit this argument or set it to false.
 * 
 * @author Kyli Rouge
 * @since 2013-03-01
 * @version 1.2.0 (2013-12-27)
 * 		- 1.2.0 (2013-12-27) - Kyli Rouge added $userid override to $userName
 * 		- 1.1.0 (2013-12-01)
**/
function buildHeader($mod = false)
{
   global $fandom; echo "<!-- fandom is ".$fandom->fandomname." -->";
	global $userName;
	global $userid;
	if (!$userName)
		$userName = $userid;
	//$userName = $_GET["login"]; // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! REMOVE WHEN IMPLEMENTING !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//	$mod = $_GET["mod"] == "true"; // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!! REMOVE WHEN IMPLEMENTING !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	echo "
<HEADER>
	<H1>
		<A HREF=\"/\">
			Herdmind
			<SMALL CLASS=\"slogan\">The ".$fandom->fandomname." Headcanon Database</SMALL>
		</A>
	</H1>
	<DIV CLASS=\"warning alert hideIfMediaQuery\">Your browser is unsupported!</DIV>
	<NAV ID=\"USERNAV\">";
	if ($userName)
		echo "
		<UL ID=\"LOGGED_IN_USERNAV\">
			<LI><A HREF=\"/fanfact/new/?fandom=".$fandom->fandomid."\" CLASS=\"button\">New Fanfact</A></LI>
			<LI><A HREF=\"/profile/?fandom=".$fandom->fandomid."&id=$userid\" CLASS=\"button\">" . $userName . "</A></LI>
			<LI><A ONCLICK=\"$('BODY').addClass('withDialog'); return true;\" HREF=\"#LOGGER_HOLDER\">Log Out</A></LI>
		</UL>";
	else
		echo "
		<UL ID=\"LOGGED_OUT_USERNAV\">
			<LI><A ONCLICK=\"$('BODY').addClass('withDialog'); return true;\" HREF=\"#LOGGER_HOLDER\" CLASS=\"button important\">Login | Register</A></LI>
		</UL>";
	echo "
	</NAV>
</HEADER>

";
}

/**
 * Builds the sidebar, customized for the given user.
 * 
 * @param $userName the name of the current user. Expected values are a string (username) and "false".
 * @param $mod      set whether this is for a moderator. Expected values are true and false.
 *                  This is ignored if $userName is false
 * 
 * @author Kyli Rouge
 * @since 2013-03-18
 * @version 1.0.1 (2013-03-20)
**/
function buildSidebar($userNameVar = false, $mod = false)
{
	global $userName;
	global $userid;
	global $fandom;	
	
	if (!$userNameVar)
		$userNameVar = $userid;
		
	$pinned = "true";
	if (isset($_COOKIE["pinSidebar"]))
		$pinned = $_COOKIE["pinSidebar"] != "false";
	
	echo "
<NAV ID=\"SIDEBAR\">
	<H2><LABEL FOR=\"SIDEBAR_PIN\">Navigation</LABEL></H2>
	<UL>
		<LI>
			<FORM ID=\"SEARCH_FORM\" ACTION=\"/search\" METHOD=\"get\">
				<LABEL CLASS=\"hideWhenMediaQuery\" FOR=\"SEARCH_BAR\">Search: </LABEL>
				<INPUT ID=\"SEARCH_BAR\" NAME=\"search\" TYPE=\"search\" AUTOCOMPLETE=\"on\" PLACEHOLDER=\"Search\"/>
				<!--INPUT TYPE=\"submit\" VALUE=\"Search!\"/-->
			</FORM>
		</LI>";
		/*
	echo  "<LI CLASS=\"expandable\"><A HREF=\"/\">Home</A>
			<UL>";
	if ($mod)
		echo "
				<LI><A HREF=\"/ApproveSubmission.php\">Approve Submissions</A></LI>
				<LI><A HREF=\"/Moderation.php\">Moderation</A></LI>
				<LI><A HREF=\"/ManageFlagged.php\">Manage Flagged</A></LI>
				<LI><A HREF=\"/private/Branch.php\">Fix branches</A></LI>
				<LI><A HREF=\"//beta.herdmind.net\">Beta portal</A></LI>";
	else
		echo "
				<LI><A HREF=\"//tardis.herdmind.net\">Doctor Who</A></LI>
				<LI><A HREF=\"//pony.herdmind.net\">Friendship is Magic</A></LI>
				<LI><A HREF=\"//ppg.herdmind.net\">Powerpuff Girls</A></LI>";
	echo "
				<LI><A HREF=\"//herdmind.net\">Site Portal</A></LI>
			</UL>
		</LI>";
		*/
		
		$PortalList = getCommunities('top');
	 
		if(!empty($PortalList->listing))
		{
			foreach ($PortalList->listing as $listing)
			{
				echo 
				"<LI CLASS=\"expandable\"><A HREF=\"../?fandom=$listing->fandomid\">$listing->fandomname</A>
					<UL>";
					foreach ($listing->subfandoms as $sub)
					{
						if(!(!$fandom->fandomid or $fandom->fandomid == '')) // Then a fandom is already selected
						{
							if($sub->fandomid == $fandom->fandomid)
							{

								
								$SmallList = getCommunities('bottom');
								
								if(!empty($SmallList->listing))
								{
									echo 
								"<LI CLASS=\"expandable\"><A HREF=\"../?fandom=$sub->fandomid\">$sub->fandomname</A>
									<UL>";
								
									foreach ($SmallList->listing as $SmallListing)
									{	
									//echo (string)$SmallListing;
										echo '<LI><A HREF="../?fandom='.$SmallListing->fandomid.'">'.$SmallListing->fandomname.'</A></LI>';
									}			
									echo
									"</UL>
								</LI>";						
								}
								else {
									echo '<LI><A HREF="../?fandom='.$sub->fandomid.'">'.$sub->fandomname.'</A></LI>';
								}												
							
							}
							else {
								echo '<LI><A HREF="../?fandom='.$sub->fandomid.'">'.$sub->fandomname.'</A></LI>';
							}
						}
						else {
							echo '<LI><A HREF="../?fandom='.$sub->fandomid.'">'.$sub->fandomname.'</A></LI>';
						}			
					
					}
				
				echo "</UL>
					</LI>";
			}
		}		
		
	/*	
	echo "<LI CLASS=\"expandable\"><A HREF=\"/\">Home</A>
			<UL>";
	if ($mod)
		echo "
				<LI><A HREF=\"/ApproveSubmission.php\">Approve Submissions</A></LI>
				<LI><A HREF=\"/Moderation.php\">Moderation</A></LI>
				<LI><A HREF=\"/ManageFlagged.php\">Manage Flagged</A></LI>
				<LI><A HREF=\"/private/Branch.php\">Fix branches</A></LI>
				<LI><A HREF=\"//beta.herdmind.net\">Beta portal</A></LI>";
	else
		echo "
				<LI><A HREF=\"//tardis.herdmind.net\">Doctor Who</A></LI>
				<LI><A HREF=\"//pony.herdmind.net\">Friendship is Magic</A></LI>
				<LI><A HREF=\"//ppg.herdmind.net\">Powerpuff Girls</A></LI>";
	echo "
				<LI><A HREF=\"//herdmind.net\">Site Portal</A></LI>
			</UL>
		</LI>";		
		
		*/
		
	if ($userName)
		echo "
		<LI CLASS=\"expandable\"><A HREF=\"/forum/index.php?action=profile\">$userName</A>
			<UL>
				<LI><A HREF=\"/profile/?fandom=".$fandom->fandomid."&id=".$userid."\">       Profile           </A></LI>
				<LI><A HREF=\"/profile/settings/?fandom=".$fandom->fandomid."\">       Profile Settings           </A></LI>
			</UL>
		</LI>";
/*	echo "
		<LI CLASS=\"expandable\"><A HREF=\"/browse/\">Browse</A>
			<UL>
				<LI><A HREF=\"/browse/index.php?fandom=".$fandom->fandomid."&type=Character\"> Characters </A></LI>
				<LI><A HREF=\"/browse/index.php?fandom=".$fandom->fandomid."&type=Species\">   Species    </A></LI>
				<LI><A HREF=\"/browse/index.php?fandom=".$fandom->fandomid."&type=Place\">     Places     </A></LI>
				<LI><A HREF=\"/browse/index.php?fandom=".$fandom->fandomid."&type=Event\">     Events     </A></LI>
				<LI><A HREF=\"/browse/index.php?fandom=".$fandom->fandomid."&type=Object\">    Objects    </A></LI>
				<LI><A HREF=\"/browse/index.php?fandom=".$fandom->fandomid."&type=Other\">     Other      </A></LI>
			</UL>
		</LI>
		<LI><A HREF=\"/forum/\">Forums</A></LI>
		"; */
		echo "
		<LI>
			";
		buildStyleSwitcherGUI(array(
		                        "Ponies"
		                      , 	new Stylesheet("/_css/visual_Dynamo_Orangejack.php"    , "Orangejack"    )
		                      , 	new Stylesheet("/_css/visual_Dynamo_Pinky.php"         , "Pinky"         )
		                      , 	new Stylesheet("/_css/visual_Dynamo_Rainblue.php"      , "Rainblue"      )
		                      , 	new Stylesheet("/_css/visual_Dynamo_Rarewhity.php"     , "Rarewhity"     )
		                      , 	new Stylesheet("/_css/visual_Dynamo_Twirple.php"       , "Twirple"       )
		                      , 	new Stylesheet("/_css/visual_Dynamo_Yellowshy.php"     , "Yellowshy"     )
		                      , 	new Stylesheet("/_css/visual_Dynamo_Whitelestia.php"   , "Whitelestia"   )
		                      , 	new Stylesheet("/_css/visual_Dynamo_LunaticBlue.php"   , "Lunatic Blue"  )
		                      , "Doctors"
		                      , 	new Stylesheet("/_css/visual_Dynamo_Sexy.php"          , "Sexy Blue"     )
		                      , 	new Stylesheet("/_css/visual_Dynamo_Fez.php"           , "Fez"           )
		                      , "Girls"
		                      , 	new Stylesheet("/_css/visual_Dynamo_Blossom.php"       , "Blossom"       )
		                      , 	new Stylesheet("/_css/visual_Dynamo_Bubbles.php"       , "Bubbles"       )
		                      , 	new Stylesheet("/_css/visual_Dynamo_Buttercup.php"     , "Buttercup "    )
		                      , "Elements"
		                      , 	new Stylesheet("/_css/visual_Dynamo_Earth.php"         , "Earth (WIP)"   )
		                      , 	new Stylesheet("/_css/visual_Dynamo_Fire.php"          , "Fire (WIP)"    )
		                      , 	new Stylesheet("/_css/visual_Dynamo_Air.php"           , "Air (WIP)"     )
		                      , 	new Stylesheet("/_css/visual_Dynamo_Water.php"         , "Water (WIP)"   )
		                      )); // Build the GUI for switching stylesheets
		echo "
		</LI>
	</UL>
	<INPUT TYPE=\"checkbox\"" . ($pinned ? " CHECKED" : "") . " ID=\"SIDEBAR_PIN\" ONCHANGE=\"setSidebarPinned(this.checked)\"".
	" TITLE=\"Click here to " . ($pinned ? "un" : "") . "pin the sidebar\"/>
	<SECTION ID=\"DEV_FOOTER\" STYLE=\"border:thin dashed rgba(128,128,128, 0.5);\">
		<BUTTON ONCLICK=\"DEV_FOOTER.style.display = 'none'; $('#DEV_FOOTER').remove();\">Hide developer controls</BUTTON>
		<LABEL STYLE='display:block'><INPUT TYPE=\"checkbox\" " . ($showDevAlerts = ($_COOKIE["showDevAlerts"] != "false") ? "CHECKED=\"checked\"" : "") . "ONCHANGE=\"return setDevAlertsShown(this.checked);\"/> Show developer alerts</LABEL>
	</SECTION>
</NAV>";
}

/**
 * Builds the footer at the bottom of the page. As of this version, it is not dynamic and always builds the same thing.
 * 
 * @author Kyli Rouge
 * @since 2013-03-01
 * @version 1.0.0 (2013-03-13)
**/
function buildFooter($mod = false)
{
	global $userName;
	global $userid;
	if (!$userName)
		$userName = $userid;
	//echo "Username is $userName";
	//if(!$userName)$userName=$_GET["login"]; // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! REMOVE WHEN IMPLEMENTING !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	//$mod = $_GET["mod"] == "true";
	echo buildSidebar($userName, $mod);
	echo buildLogger($userName, $mod);
	echo "
<FOOTER>
	<SECTION ID=\"META\" CLASS=\"links left\">
		<H2>Meta</H2>
		<UL CLASS=\"plain\">
			<LI><A HREF=\"/legal\">Legal</A></LI>
			<LI><A HREF=\"/contact\">Contact</A></LI>
		</UL>
	</SECTION>
	<SECTION>
		<!-- BEGIN Google+ Badge -->
		<div class=\"g-plus\" data-width=\"5em\" data-href=\"https://plus.google.com/115556066131792258384\" data-rel=\"publisher\"></div>

		<script type=\"text/javascript\">
		  (function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		  })();
		</script>
		<!-- END Google+ Badge -->
	</SECTION>
	<SECTION ID=\"DUNNO\" CLASS=\"links right\">
		<H2>More links</H2>
		<UL CLASS=\"plain\">
			<LI><A HREF=\"#\">Some</A></LI>
			<LI><A HREF=\"#\">More</A></LI>
			<LI><A HREF=\"#\">Links</A></LI>
			<LI><A HREF=\"#\">Here</A></LI>
		</UL>
	</SECTION>
</FOOTER>";
}

/**
 * Builds a list of links to Herdmind fanfact topics, given an xml object of topics.
 * 
 * @param $topics  		XML corresponding to Herdmind topics
 * @param $listClass    [OPTIONAL] I forget.
 * 
 * @author Ryan Young, Kyli Rouge
 * @since 2013-03-12
 * @version 2.0.0 (2013-05-29)
**/
function buildTopicLinkListFromXML($topics, $listClass = "")
{		

$xmltopics = new SimpleXMLElement(XMLWrapping($topics));
//var_dump($xmltopics);
	$ret = "
	<UL CLASS=\"topics " . $listClass . "\">";
	foreach($xmltopics->children() as $onetopic)
	{	$ret .= buildTopicLinkFromXML($onetopic, false);
	echo "Please.";
}
	$ret .= "
	</UL>";
	
	return $ret;
}


/**
 * Builds a single topic link, which contains the topic's thumbnail and all its defined names, with the most voted at the top.
 * You needn't worry about changing this based on where it is placed, as resizing is taken care of in CSS.
 * 
 * @param $topic 		XML data of a topic
 * @param $standalone   [OPTIONAL] defines whether this is a part of a list or a standalone. If it is in a list, then set this to
 *                    	true. If it is not in a list, you may omit this argument or set it to false.
 * 
 * @author Kyli Rouge, Ryan Young
 * @since 2013-03-12
 * @version 2.0.0 (2013-05-29)
**/
function buildTopicLinkFromXML($topic, $standalone = true)
{	
	$tagName = ($standalone ? "DIV" : "LI");
	global $fandom;
	$imgPath = "http://herdmind.net/" . $topic->picture;

	/* Doesn't work:
	if (!file_exists($imgPath))
		$imgPath = "http://pony.herdmind.net/Images/headshots/" . $topicIndex . ".jpg";
	if (!file_exists($imgPath))
		$imgPath = "http://placehold.it/256&text=No%20Image";*/
	$ret = "
		<" . $tagName . ">
			<A HREF=\"http://herdmind.net/topic?fandom=".$fandom->fandomid."&t=" . $topic->pageid . "\" CLASS=\"topic\">
				<FIGURE>
					<IMG CLASS=\"thumb\" SRC=\"" . $imgPath . "\"/>
					<FIGCAPTION>
						<UL>";
		// TODO: Make a foreach loop to add each alternate name
		$ret .= "
							<LI>" . $topic->pagename . "</LI>";
		$ret .= "
							<LI CLASS='devalert'>Alternate names</LI>";
	$ret .= "
						</UL>
					</FIGCAPTION>
				</FIGURE>
			</A>
		</" . $tagName . ">";
	echo "still here";
	return $ret;
}




/**
 * Builds the log window. If $userName is false, null, or unspecified, then this is a Log In window. Else, this is a Log Out
 * window. Please forgive me for using a Table to lay out the components...
 * 
 * @param $userName The user's username
 * @param $mod      Specifies whether the user is a moderator. So far, this does nothing.
 * 
 * @author Kyli Rouge
 * @since 2013-03-24
 * @version 1.1.0 (2013-12-27)
 * 		- 1.1.0 (2013-12-27) - Kyli Rouge finished logout system
 * 		- 1.0.0 (2013-03-24)
**/
function buildLogger($userName, $mod)
{
	echo "


<DIV CLASS=\"dialogHolder cssPopupHolder\" ID=\"LOGGER_HOLDER\">
	<DIALOG ID=\"LOGGER\" class=\"cssPopup\">
		<A CLASS=\"close button\" ONCLICK=\"$('BODY').removeClass('withDialog'); return true;\" HREF=\"#\" ID=\"LOGGER_CLOSE\">&times;</A>";
	if ($userName)
	{
		echo "
		<FORM METHOD='post' ACTION='#'>
			<INPUT TYPE=\"hidden\" NAME=\"logout\" VALUE=\"yesplease\"/>
			<TABLE>
				<TBODY>
					<TR><TH COLSPAN=\"2\"><H2>Log out</H2></TH></TR>
					<TR>
						<TD COLSPAN=\"2\">Are you sure you want to go, $userName?</TD>
					</TR>
					<TR>
						<TD><INPUT TYPE='SUBMIT' ID='LOGOUT' CLASS='important' VALUE='Log out'></TD>
						<TD><A CLASS='button' HREF='#' ID='CLOSE' ONCLICK=\"hideDialog('#LOGGER'); return true;\">Stay here</TD>
					</TR>
				</TBODY>
			</TABLE>";
	}
	else
	{
		echo "
		<FORM ACTION=\"#\" METHOD=\"post\" ACCEPT-CHARSET=\"ISO-8859-1\">
			<TABLE CLASS=\"collapsed\">
				<TBODY>
					<TR><TH COLSPAN=\"2\">Log in</TH></TR>
					<TR>
						<TH><LABEL FOR=\"LOGIN_USERNAME\">Username:&nbsp;</LABEL></TH>
						<TD><INPUT ID=\"LOGIN_USERNAME\" TYPE=\"text\" NAME=\"user\" PLACEHOLDER=\"Username\"/></TD>
					</TR>
					<TR>
						<TH><LABEL FOR=\"LOGIN_PASSWORD\">Password:&nbsp;</LABEL></TH>
						<TD><INPUT ID=\"LOGIN_PASSWORD\" TYPE=\"password\" NAME=\"password\" PLACEHOLDER=\"Password\"/></TD>
					</TR>
					<TR>
						<TD COLSPAN=\"2\">
							<INPUT TYPE=\"submit\" CLASS=\"important\" VALUE=\"Log in!\"/>
							|
							<A HREF=\"/register\" CLASS=\"alt\">Register</A>
						</TD>
					</TR>
				</TBODY>
			</TABLE>";
	}
	echo "
		</FORM>
	</DIALOG>
</DIV>";
}




function buildFacts($FactQueryResult, $HowMany = 1)
{
	$ret = '
		<UL CLASS="fanfacts">';
	
	for($i = 0; $i < $HowMany; $i++)
		$ret .= buildFact(mysqli_fetch_array($FactQueryResult), false);
	
	$ret .= '
		</UL>';
	
	return $ret;
}
function buildFactsXML($FactQueryResult, $HowMany = 1)
{
	$ret = '
		<UL CLASS="fanfacts">';
	
	for($i = 0; $i < $HowMany; $i++)
		$ret .= buildFactXML(mysqli_fetch_array($FactQueryResult), false);
	
	$ret .= '
		</UL>';
	
	return $ret;
}

function buildFactListXML($FactListInXML, $HowMany = 1)
{	
	$ret = '
		<UL CLASS="fanfacts">';
	foreach($FactListInXML->children() as $listitem)
	{
		$ret .= buildFactXML($listitem, false);
	}
	
	$ret .= '
		</UL>';
	
	return $ret;
}

/**
 * Builds a fact display. Assume the same query's column ordering is used for every call.
 * 
 * @param $fact       the fanfact, as an array.
 * 		Structure:
 * 			 - [0] the number of the fanfact
 * 			 - [1] the post date.
 * 			 - [2] the fact text.
 * 			 - [3] the sum of votes on the fact.
 * 			 - [4] the sum of the current user's votes.
 * @param $standalone [OPTIONAL] if true, this method assumes that this fact will not be part of a list. Defaults to true
 * @param $classes    [OPTIONAL] A string containing any extra classes to apply to the fact element
 * 
 * @author Ryan Young, Kyli Rouge
 * @since 2013-03-27
 * @version 1.1.0 (2013-12-27)
 * 		- 1.1.0 (2013-12-27) - Kyli Rouge added favorite star
 * 		- 1.0.2 (2013-05-22)
**/
function buildFact($fact, $standalone = true, $moreData = true, $classes = null)
{
	global $userid;
	global $fandom;
	//	TODO: Insert more of the result list here, and make it work for more queries.
	return
			'
			<' . ($standalone ? 'DIV' : 'LI') .
				' CLASS="' . ($fact[4] ? ($fact[4] == 0 ? '' : ($fact[4] < 0 ? 'down' :  'up')) . "voted " : "") . 'fanfact' . ($classes ? " " . $classes : "") . "\" TABINDEX=\"-1\">
				 <TABLE CLASS=\"vote\">
					<TBODY>
						<TR>
							<TD ROWSPAN=\"2\">
								<VAR CLASS=\"counter\">$fact[3]</VAR>
							</TD>
							<TD>
								<INPUT TYPE=\"button\" CLASS=\"upvote\" VALUE=\"&#x25B2;\" onClick='".'takeVote("'.$fact[0].'","+1")'."' / >
							</TD>
						</TR>
						<TR>
							<TD>
								<INPUT TYPE=\"button\" CLASS=\"downvote\" VALUE=\"&#x25BC;\" onClick='".'takeVote("'.$fact[0].'","-1")'."' />
							</TD>
						</TR>
					</TBODY>
				 </TABLE>
				 <DIV CLASS=\"fact\">$fact[2]</DIV>
				 <DIV CLASS=\"meta\">
					<SPAN CLASS=\"factNum\">$fact[0]</SPAN>
					" . ($userid ? '<I id="star-'.$fact[5].'" CLASS="fa fa-star' . ($fact[6] != 0 ? '' : '-o') . ($standalone ? ' fa-2x' : '') . '" DATA-FAVORITE="$userName" '."onclick='starClick(\"".$fact[5]."\")'".'></I>' : '') . 
					($moreData ? "<A HREF=\"/fanfact?fandom=".$fandom->fandomid."&id=$fact[0]\" CLASS=\"callToAction\">More data</A>" : "") . "
					<!-- This number must be sent to an ajax call to star or unstar: $fact[0] -->
			</DIV>
			</" . ($standalone ? "DIV" : "LI") . ">";
			var_dump($fact);
					
}
/**
 * Builds a fact display from XML data.
 * 
 * @param $fact       the fanfact, as an XML object.
 * 		Structure:
 * 			 <fanfact>		
 * 			 	<score>		- [3] the sum of votes on the fact.
 * 			 	<uservote>	- [4] the sum of the current user's votes.
 * 			 	<factid>	- [0] the number of the fanfact
 * 			 	<contents>	- [2] the fact text.
 * 			 	<dateposted>- [1] the post date.
 *           </fanfact>
 *
 * @author Ryan Young, Kyli Rouge
 * @since 2013-03-27
 * @version 1.1.0 (2013-12-27)
 * 		- 1.1.0 (2013-12-27) - Kyli Rouge added favorite star
 * 		- 1.0.2 (2013-05-22)
**/
function buildFactXml($fact, $standalone = true, $moreData = true, $classes = null, $shortlink = false)
{
	global $userid;
	global $userName;
	global $fandom;	
	
	//	TODO: Insert more of the result list here, and make it work for more queries.
	$factstring =
			'
			<' . ($standalone ? 'DIV' : 'LI') .
				' CLASS="' . ($fact->uservote ? ($fact->uservote < 0 ? "down" : "up") . "voted " : "") . "fanfact" . ($classes ? " " . $classes : "") . "\" TABINDEX=\"-1\">
				 ".($shortlink ? "" :"<TABLE CLASS=\"vote\">
					<TBODY>
						<TR>
							<TD ROWSPAN=\"2\">
								<VAR CLASS=\"counter devalert\">$fact->score</VAR>
							</TD>
							<TD>
								<INPUT TYPE=\"button\" CLASS=\"upvote\" VALUE=\"&#x25B2;\" onClick='".'takeVote("'.$fact->factid.'","+1")'."'/>
							</TD>
						</TR>
						<TR>
							<TD>
								<INPUT TYPE=\"button\" CLASS=\"downvote\" VALUE=\"&#x25BC;\" onClick='".'takeVote("'.$fact->factid.'","-1")'."'/>
							</TD>
						</TR>
					</TBODY>
				 </TABLE>")."
				 <DIV CLASS=\"fact\">$fact->contents</DIV>
				 <DIV CLASS=\"meta\">
					<SPAN CLASS=\"factNum" . ($shortlink ? ' shortlink' : '') . "\">$fact->factid</SPAN>
					" . ($userid ? '<I id="star-'.$fact->submissionid.'" CLASS="fa fa-star' . ($fact->isstarred != 0 ? '' : '-o') . ($standalone ? ' fa-2x' : '') . "\" DATA-FAVORITE='$userName' onclick='starClick(\"".$fact->submissionid."\")'></I>" : '') .
					($moreData ? "<A HREF=\"/fanfact?fandom=".$fandom->fandomid."&id=$fact->factid\" CLASS=\"callToAction\">More data</A>" : '') . "
					<!-- This number must be sent to an ajax call to star or unstar: $fact->submissionid
					<br/><sub>Edit buildFactXML() in _incl/contentBuilder.php</sub> -->
				</DIV>
			</" . ($standalone ? "DIV" : "LI") . ">";
	return $factstring;
}



function buildTrendingFacts($FactQueryResult, $HowMany = 1)
{
	$ret = '
		<UL CLASS="fanfacts">';
	
	for($i = 0; $i < $HowMany; $i++)
		$ret .=  buildFact(mysqli_fetch_array($FactQueryResult), false, true, null);

	$ret .= '
		</UL>';
	
	return $ret;
}




/**
 * @summary Grabs the highest voted name for a page, and replaces the page code with a link and title to that page.
 * 
 * @author Ryan Young
 * @since October 2012
 * @version 2.0.0 (5-29-2013)
**/
function TitleFiller($string, $dbc)
{

$xmlstring = TitleFinder($string, $dbc);

$xml = new SimpleXMLElement($xmlstring);

return XMLTitleFiller($string, $xml);

}

/**
 * Grabs the highest voted name for a page, and replaces the page code with a link and title to that page.
 * Call this function if TitleFinder's xml object already exists
 * 
 * @author Ryan Young
 * @since October 2012
 * @version 2.0.0 (5-29-2013)
**/
function XMLTitleFiller($string, $xml)
{
global $fandom;
$betafolder = "beta/";
$betafolder = "";
$strlist = '';

foreach($xml->children() as $child)
  {	
	// <topicinfo>
		// <pageid>
		// <pagename>
		// <type>
		// <reality>
		// <series>
		// <picture>
	// </topicinfo>
	

//Not sure what this is, probably safe to delete $Title
//$Title = htmlentities($rs[0],ENT_QUOTES);
		
		$string = str_replace("[p" . $child->pageid . "]","<div class=\"popname\">
			<a href=\"/topic?fandom=".$fandom->fandomid."&t=" . $child->pageid . "\" class=\"apagetitle\">" . $child->pagename . "</a><!-- These comments are here because there must be NO whitespace before, within, or after this fanfact, or else things like punctuation marks will not properly be placed flush with the fact
			--><div class=\"informinglink\"><!--
				--><img src=\"http://herdmind.net/".$betafolder . str_replace("../", "", $child->picture) . "\" ALT=\"A picture of " . $child->pagename . "\"/><!--
					--><DL><!--
						--><DT>Type</DT><!--
							--><DD>" . $child->type . "</DD><!--
						--><DT>Reality</DT><!--
							--><DD>" . $child->reality . "</DD><!--
						--><DT>Series</DT><!--
							--><DD>" . $child->series . "</DD><!--
					--></DL><!--
			--></div><!--
		--></div>", $string);
  }

	return $string;

}


/**
*Helper function intended to be universal. But I confused myself and abandoned it after using it only a few times.
*Is called by several versions of TitleFiller()
*/
function executeSQL($query, $error = "Query failed", $dbc = null)
{
	$result = mysqli_query($dbc, $query) or die($error.': ' . mysqli_error($dbc));

	while ($line = mysqli_fetch_array($result, MYSQL_ASSOC))
	{
		$results = array();
		$pos = 0;
		foreach ($line as $col_value)
		{
			$results[$pos] = "$col_value";
			$pos++;
		}	 
		return $results;
	}
}

/**
*Function used to show fanfacts in posts
*Replaces tags with information
*Examples:
	[fact:#] (only one implemented yet)
	[topic:#]
	[fanwork:#]
	
@param $PostContents	The html of the forum post.
	
	Todo: Optimize so I can send it a whole thread and do this just once.
*/
function formatReference($PostContents, $userid, $db_connection = null, $forceSmall = false)
{
//Find [fact:#]

$pos1 = strpos($PostContents, "[fact:");
if ($pos1 != false) {$pos1 = $pos1 + 6;}
$pos2 = strpos($PostContents , "]", $pos1);
$cou = 0;
 $factsShown = array();
 $factsShownCount = 0;
while($pos1 != false && $pos2 != -1 && $pos2 != "" && $cou < 50)
{
$factid = substr($PostContents,$pos1,$pos2-$pos1);
echo "<!--(Insert fact ".$factid."; code found at: $pos1 , $pos2 )-->";
if(is_numeric($factid))
{

$FactXML = new SimpleXMLElement(GetFanfactByID($factid,"", $userid, $db_connection)); //Get the fanfact in XML format

//Do an unneccicary loop to get the fact
		foreach($FactXML->children() as $fact)
		{	
			if (in_array($factid,$factsShown) || $forceSmall)
			{
				$PostContents = str_replace("[fact:".$factid."]",buildFactXML($fact,true,true,null,true),$PostContents);
			}
			else
			{
			//Build the fact with vote buttons and score, as usual
			$PostContents = preg_replace("[\[fact:".$factid."\]]",buildFactXML($fact,true),$PostContents, 1);
			//Add the fact number to the list, and increment the count
			$factsShown[$factsShownCount] = $factid;
			$factsShownCount = $factsShownCount + 1;
			}
		}


}
else
{
$PostContents = str_replace("[fact:".$factid."]","fact:".$factid,$PostContents);
}

$pos1 = strpos($PostContents, "[fact:");
if ($pos1 != false){$pos1 = $pos1 + 6;}
$pos2 = strpos($PostContents , "]", $pos1);
$cou = $cou + 1;

}

//return TitleFiller($PostContents, $db_connection);
return $PostContents;

}



/**
* Creates a comment box.
*	
* @param $factNum The fanfact ID that the user is commenting on.
*
* TODO: Make a better and fancier setup that can be used for other pages.
*/
function CommentBox($factNum, $type)
{

echo "
	<form method='POST'>
		<textarea id='commentbox'></textarea>
		<button type='button' onclick='PostComment($factNum)'>Submit</button>
	</form>
	";

}

/**
 * PageCodeHelper
 * Helps show page codes that can be added.
 *
 * Currently, calls the legacy helper.
 * Planned features include floating recently viewed pages, autocomplete, and search.
 *
 */
function PageCodeHelper()
{
	echo OldPageCodePicker();
}

/**
 * OldPageCodePicker
 * Helps show page codes that can be added.
 */
function OldPageCodePicker()
{
	global $userid;
	global $db_connection;
		?>
		<!--

		Shows a list of topics/pages and contains javascript that pastes the proper
		page code into a textbox with the id of "contents" existing on the page 
		this is imported into 

		-->
		<script type='text/javascript'>


		function togglebox(boxname)
		{
		if(document.getElementById(boxname).style.display == "none")
			{
			$("#"+boxname).slideDown(250);
			document.getElementById(boxname).style.overflow = "auto";
			document.getElementById(boxname).className = "wrapper uncollapsed";
			}
		else
			{
			$("#"+boxname).slideUp(250);
			document.getElementById(boxname).className = "wrapper collapsed";
			}
			
			
		}


		//Requries that you add an element with an ID of "fanfact" to the page calling for the code picker - not included in this file
		function addcode(insertval)
		{
		document.getElementById("fanfact").value = document.getElementById("fanfact").value + insertval;
		}

		function tabletmode()
		{
		if(document.getElementById("tabtab").checked == true)
			$("div#pagecodeboxheader").css({"height":"40px", "padding":"20px 5px 0px 5px"});
		else
			$("div#pagecodeboxheader").css({"height":"20px", "padding":"5px 5px 5px 5px "});
			}

		</script>
		<section>
		<label for='tabtab'><div style='text-align:right'><span class='spanright'><input type='checkbox' id='tabtab' onchange='tabletmode()'>
		Tablet Mode</span></div></label>

		<?php

		//$query = "select PageID, Picture, GridOrder, b.BranchName from Page join Branch as b on Page.Branch = b.BranchID order by Page.Branch, GridOrder";

	

		$query = "select * from 
		(select Page.PageID, Picture, GridOrder, b.BranchName, PrefTitle.Title as PrefferredTitle, PopTitle.Title as PopularTitle, COUNT( NSBTPop.UserPoint ) as counter, Page.Branch, b.ParentBranchID, b.subdomain, b.BranchPublic
		 from 
		(((Page left join Branch as b on Page.Branch = b.BranchID)

		left outer join
		(select PageTitles.Title, PageTitles.PageID from PageTitles 
		right join NameScoreByTally AS NSBT on NSBT.NameID = PageTitles.PageID 
		where NSBT.UserPoint = '$userid') as PrefTitle on PrefTitle.PageID = Page.PageID)

		left outer join PageTitles as PopTitle on Page.PageID = PopTitle.PageID)
		left outer join NameScoreByTally as NSBTPop on NSBTPop.NameID = PopTitle.ID

		Group by PopTitle.ID
		order by COUNT( NSBTPop.UserPoint ) desc) as TopicSelector
		left join SubmissionData as s on TopicSelector.PageID = s.SubmissionID
		 where s.IsPublic='1' and s.IsMature='0' and s.IsRemoved='0'  
		Group by PageID
		order by Branch, GridOrder";


		//echo "<br/><br/>";
		//echo $query;
		//echo "<br/><br/>";


		$result = mysqli_query($db_connection, $query) or die($error.': ' . mysqli_error($db_connection));
		$divcol = 1;
		$divcol2 = 0;
		$oldbranch = "";
		while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			$results = array();
			$pos = 0;
			foreach ($line as $col_value) {
				$results[$pos] = "$col_value";
				$pos++;
			}	 
		//	echo $results[9];
		//echo $cookie_params['path'];
			
				if($oldbranch != $results[3])
				{
					if($oldbranch != "")
					{
						echo "</div>";
						echo "</div>";
					}
					
					$oldbranch = $results[3];
				
				if($results[8] != "") $hidden = " style='display:none;' ";
				
					echo "<div class='pagecodelist' class='FixedHeightContainer'>
							<div id='pagecodeboxheader' class='pagecodeboxheader' onclick='togglebox(\"pagegroup".$results[7]."\")'>".$results[3]."</div>
							<div id='pagegroup".$results[7]."' class='wrapper' ".$hidden.">";
							
				
				}			
			
		echo "<div class='left3' style='width:200px;' onclick='addcode(\"[p".$results[0]."]\")'><span class='spanleft'><div><img width='50' height='50' src='/".$results[1]."'></div></span><span class='spanright'>".$results[5]."
				<br/>
				<sub>
				[p".$results[0]."]
				<a href='../topic.php?fandom=".$fandom->fandomid."&pageid=".$results[0]."' target='_blank' id='nonbutton'>View Page</a>
				</sub></span></div>";

		$divcol2++;
		if($divcol2 == 2)
		{
			$divcol2 = 0;
			//echo "<br/>";
			//echo "<div class='clear'></div>";
		}

		
		}
		echo "</div>
		</div>
		<br/></section>";

}
 
 
/*
BuildComments
Builds the comments that users have posted.

$comments is the comments object returned by startSession.php->getComments()
$threadIDnum is just to make "new comment" box work 
$type is to make sure not to post to the wrong thread type

since Mar 19 2004

*/
function buildComments($Items, $threadIDnum = "-1", $type = "NotAReply")
{
	global $user;
	global $userid;
	global $userName;
	global $db_connection;
	global $fandom;
	
	if(is_array($Items))
	{
		$comments = $Items;
	}
	elseif(get_class($Items) == "Stream")
	{
		$comments = $Items->commentthreads;
		$fanfacts = $Items->fanfacts;
	}

	//var_dump($comments);

	$pageEchoes = '
		<style type="text/css">

		.comments-list {
			list-style-type: none;
			margin: 0;
			padding: 0 8em 0 0;
		}
		.comments-list>li {
			display: table;
			width: 100%;
			margin-bottom: 1.5em;
		}
		.comments-list li>* {
			display: table-cell;
			vertical-align: top;
		}
		.comments .avatar {
			text-align: right;
			padding: 0 1em 0 0;
			width: 8em;
		}
		.comments .avatar img {
			border: thin solid rgba(0,0,0, .5);
			height: 3em;
			width: 3em;
		}
		.comments .comment-body {
			border: thin solid rgba(0,0,0, .5);
			border-radius: .25em;
			background: #FFF;
		}
		.comments .comment-input textarea {
			margin: 0;
			height: 5em;
			width: 100%;
			border-radius: inherit;
			border: thin solid rgba(0,0,0, .5);
		}
		*|* {
			box-sizing: border-box;
		}
		.comments .comment-form {}
		.comments .comment-input form {
			border-radius: inherit;
			text-align: right;
		}
		.comments .comment-input .comment-body {
			border-color: transparent;
		}
		.comments .avatar .username {
			font-size: smaller;
		}
		.comments .comment-body header {
				position: relative;
		}
		.comments .premium-header {
			background: #27B;
			color: #FFF;
			text-align: center;
		}
		.comments .comment-body .premium-header .premium-image {
				background-size: cover;
		}
		.comments .comment-controls {
			list-style-type: none;
			padding: 0;
			margin: 0 .5em;
			position: absolute;
			right: 0;
			top: 0;
			height: 100%;
		}
		.comments .comment-body .comment-controls>li {
			display: inline-block;
		}
		.comments .comment-text {
			padding: 0 .5em;
		}
		.bg-repeat-off {
			background-repeat: no-repeat !important;
		}
		.bg-pos-left {
			background-position: left !important;
		}
		.bg-pos-center {
			background-position: center !important;
		}
		.bg-pos-right {
			background-position: right !important;
		}
		.bg-size-contain {
			background-size: contain !important;
		}
		.bg-size-cover {
			background-size: contain !important;
		}
		.bg-size-original {
			background-size: auto !important;
		}
		.bg-size-stretch {
			background-size: 100% 100% !important;
		}
		</style>
		<SECTION ID="comments" CLASS="comments">
			<OL CLASS="comments-list">';

	if($type != "NotAReply")
	{
		$pageEchoes .= '
				<LI CLASS="comment-input">
					<FIGURE CLASS="avatar">
						<IMG SRC="../_img/uploaded/user/'.$userid.'/avatar64.png" />
						<FIGCAPTION CLASS="username">'.$userName.'</FIGCAPTION>
					</FIGURE>
					<DIV CLASS="comment-body">
						<FORM METHOD="post">
							<TEXTAREA id="commentbox" NAME="newComment" REQUIRED PLACEHOLDER="Type your comment here..."></TEXTAREA>
							'."<BUTTON TYPE='button' ONCLICK='PostMessage(\"$threadIDnum\", \"$type\")'>Comment</BUTTON> <!-- this will likely be hidden by CSS -->".'
						</FORM>
					</DIV>
				</LI>';
	}              

	if(isset($comments))
	{
		
		$counter = 0; //For mixing fanfacts with threads.
		$position = 0;//For mixing fanfacts with threads.
		
		foreach($comments as &$comment)
		{
			//Mix fanfacts with threads here.
			if(isset($fanfacts) && $counter % 3 == 0) {
				//Print fanfact
				$pageEchoes .= "
					<LI>".
						buildFactXml($fanfacts[$position])
					."</LI>";
				$position++;			
			}
			$counter++;
			
			/*
			$pageEchoes .=
				"Message ID:<br/>"            . $comment->getMessageID() .
				"<br/><br/>Topic ID:<br/>"    . $comment->getTopicID() .
				"<br/><br/>Topic Type:<br/>"  . $comment->getTopicType() .
				"<br/><br/>Member ID:<br/>"   . $comment->getMemberID() .
				"<br/><br/>Member Name:<br/>" . $comment->getMemberName() .
				"<br/><br/>Time Posted:<br/>" . $comment->getTimePosted() .
				"<br/><br/>Email:<br/>"       . $comment->getMemberEmail() .
				"<br/><br/>Member IP:<br/>"   . $comment->getMemberIP() .
				"<br/><br/>Post Body:<br/>"   . $comment->getPostBody() .
				"<hr/>";
				*/
			
			
			$pageEchoes .= "
				<LI>
					<FIGURE CLASS=\"avatar\">
						<A HREF=\"/profile/?fandom=".$fandom->fandomid."&id=".$comment->memberid.'">
							<IMG SRC="../_img/uploaded/user/'.$comment->memberid.'/avatar64.png" />
							<FIGCAPTION CLASS="username">'. $comment->membername .'</FIGCAPTION>
						</A>
					</FIGURE>
					<DIV CLASS="comment-body">';
			
			//Check for special banner user
			if($comment->bannersetting != NULL)
				$pageEchoes .= '
						<HEADER CLASS="premium-header">
							<DIV CLASS="premium-image bg-pos-right bg-size-original bg-repeat-off" STYLE="background-image:url(../_img/uploaded/user/'.$comment->memberid.'/premium-header.png)">'.$comment->bannertext.'</DIV><!-- In HTML5.1, this should be changed to a <DECORATOR> element -->';
			else
				$pageEchoes .= '
						<HEADER>';
			
			$pageEchoes .= '
							<UL CLASS="comment-controls">
								<LI><A CLASS="comment-flag"><I CLASS="fa fa-flag"></I></A></LI>
								<LI><A CLASS="comment-reply"><I CLASS="fa fa-reply"></I></A></LI>
							</UL>
						</HEADER>';
								
			$linkedpage = "";
			if($comment->topictype == "Thread" || $comment->topictype == "threadcomment")
				$linkedpage = "thread";      
			elseif($comment->topictype == "fanfact" || $comment->topictype == "profile")
				$linkedpage = $comment->topictype;      
							   
			$pageEchoes .= '
						<DIV CLASS="comment-text" id="comment'.$comment->messageid.'">'
							.$comment->postbody.
						"</DIV>
						<a href=\"/$linkedpage?fandom=".$fandom->fandomid."&id=".$comment->topicid.'">'.$comment->timeposted.'</a>
						<br/>';
			if($userid == $comment->memberid)
			{
				$pageEchoes .= "
						<button type='button' id='Edit".$comment->messageid."' onclick='EditComment(\"comment".$comment->messageid."\", \"".$comment->messageid."\")'>Edit</button>						
						";	
			}					
						
			$pageEchoes .=	'
					</DIV>';
	/*		if($comment->topictype == "Thread")
				$pageEchoes .= '<DIV><sub>Thread - please grab comments and place them here.</sub></DIV>';
			$pageEchoes .=	'</LI>';
			*/
		}
	}
	
	$pageEchoes .= '
			</OL>
		</SECTION>';
	$pageEchoes = formatReference($pageEchoes,$user, $db_connection, true);
	
	echo TitleFiller($pageEchoes, $db_connection);
}
 
?>
<!-- content builder imported -->
