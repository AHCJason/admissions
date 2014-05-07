<!DOCTYPE html>
<html>
<head>
{include file="$cms_template_dir/_head.tpl"}
{include file="$cms_template_dir/_javascript_auto.tpl"}
<script type="text/javascript" src="{$ENGINE_URL}/js/jquery/jquery-validate/jquery.validate.min.js"></script>
<script type="text/javascript" src="{$ENGINE_URL}/js/jquery/jquery.hoverintent.r5.js"></script>
<script type="text/javascript" src="{$ENGINE_URL}/js/jquery/jquery-validate/additional-methods.js"></script>
<script type="text/javascript" src="{$ENGINE_URL}/js/jquery/jquery.alerts-1.1/jquery.alerts.js"></script>
<script type="text/javascript" src="{$ENGINE_URL}/js/jquery/jquery.maskedinput-011748c/src/jquery.maskedinput.js"></script>
<script type="text/javascript" src="{$SITE_URL}/js/jquery-ui-1.8.12.advancedhc/js/jquery-ui-1.8.12.custom.min.js"></script>
<script type="text/javascript" src="{$SITE_URL}/js/jquery-ui-1.8.12.advancedhc/development-bundle/external/jquery.cookie.js"></script>
<script type="text/javascript" src="{$SITE_URL}/js/jquery-ui-1.8.12.advancedhc/js/jquery.qtip.min.js"></script>
<link rel="stylesheet" href="{$SITE_URL}/js/jquery-ui-1.8.12.advancedhc/css/jquery.qtip.min.css" type="text/css" />
<script type="text/javascript" src="{$ENGINE_URL}/js/jquery/jquery-ui-timepicker-addon.js"></script>
<link rel="stylesheet" type="text/css" href="{$SITE_URL}/js/jquery-ui-1.8.12.advancedhc/css/custom-theme/jquery-ui-1.8.12.custom.css" />
<link rel="stylesheet" type="text/css" href="{$ENGINE_URL}/js/jquery/jquery.alerts-1.1/jquery.alerts.css" />
<script type="text/javascript" src="{$SITE_URL}/js/shadowbox-3.0.3/shadowbox.js"></script>
<link rel="stylesheet" href="{$SITE_URL}/js/shadowbox-3.0.3/shadowbox.css" type="text/css">
<script type="text/javascript" src="{$SITE_URL}/js/modernizr.js"></script>
<script>
	Shadowbox.init({
		height: 425,
		width: 450,
		handleOversize: "resize",
		overlayColor: "#666",
		overlayOpacity: "0.25"
	});
</script>
{if ($page == "patient" && $action == "printInquiry") || ($page == "patient" && $action == "printNursing")}



</head>
<body>
{include file="$content_tpl"}
</body>
</html>
{else}
<link rel="stylesheet" type="text/css" href="{$SITE_URL}/css/modal.css" media="screen" />
{if $isPrint != 1}<link type="text/css" rel="stylesheet" href="{$SITE_URL}/css/styles.css" media="all" />{/if}
{if $isTV == 1}<link rel="stylesheet" href="{$SITE_URL}/css/tv.css" type="text/css" media="all" />{/if}
{$if $CSS != ""}<link rel="stylesheet" href="{$SITE_URL}/css/{$CSS}.css" type="text/css" media="all" />{/if}
{if $isPrint == 1}<link rel="stylesheet" href="{$SITE_URL}/css/print.css" type="text/css" media="all" />{/if}
{jQueryReady}
// date formats
Date.firstDayOfWeek = 0;
Date.format = 'mm/dd/yyyy';

// date picker
$(".date-picker").datepicker({
	startDate: '01/01/2008',
	clickInput: true,
	createButton: false
});

// time picker
$(".time-picker").datetimepicker({
	ampm: true
});
$(".datetime-picker").datetimepicker({
	ampm: true
});

$(".dialog").dialog({
	autoOpen: false,
	width: 'auto',
	height: 'auto',
	modal: true
});

$(".remote-dialog").live("click", function(e) {
	e.preventDefault();
	
	var href = $(this).attr("href");
	
	$("#remote-dialog").dialog({
		width: 'auto', 
		height: 'auto',
		modal: 'true',
		open: function() {
			$("#remote-dialog-frame").load(href + "&isMicro=1");
		}
	}).dialog("open")
	
	return false;
});

$("li#facility-dashboard").hoverIntent(
	function() {
		$("ul#facility-dashboard-dropdown").stop().fadeIn(500, function() {
			$("ul#facility-dashboard-dropdown").show();	
		});	
	}, function() {
		$("ul#facility-dashboard-dropdown").hide();
	}
);


$(".dropdown dt a").click(function() {

    // Change the behaviour of onclick states for links within the menu.
	var toggleId = "#" + this.id.replace(/^link/,"ul");

    // Hides all other menus depending on JQuery id assigned to them
	$(".dropdown dd ul").not(toggleId).hide();
	$(".dropdown dt a").not(toggleId).css("z-index", "1");
	$(".dropdown dt").not(toggleId).css("z-index", "1");
	$(".dropdown").not(toggleId).css("z-index", "1");

    //Only toggles the menu we want since the menu could be showing and we want to hide it.
	$(toggleId).toggle();
	$(toggleId).parent().parent().css("z-index", 5000);
	$(toggleId).parent().css("z-index", 5000);
	$(toggleId).css("z-index", 5000);

    //Change the css class on the menu header to show the selected class.
	if($(toggleId).css("display") == "none"){
		$(this).removeClass("selected");
	}else{
		$(this).addClass("selected");
	}

});

$(".dropdown dd ul li a").click(function() {

    // This is the default behaviour for all links within the menus
    var text = $(this).html();
    $(".dropdown dt a span").html(text);
    $(".dropdown dd ul").hide();
});

$(document).bind('click', function(e) {

    // Lets hide the menu when the page is clicked anywhere but the menu.
    var $clicked = $(e.target);
    if (! $clicked.parents().hasClass("dropdown")){
        $(".dropdown dd ul").hide();
		$(".dropdown dt a").removeClass("selected");
	}

});

$(".admit-error-details").click(function() {
	var msg = $(this).attr("title");
	jAlert(msg);
});

$(".approve-admit-link").click(function(e) {
	e.preventDefault();
	var anchor = this;
	jConfirm('Are you sure you want to approve this request? If you click OK, you will be prompted to assign this patient to a room.', 'Confirmation Required', function(r) {
		if (r == true) {
			location.href = $(anchor).attr("href");
		} else {
			return false;
		}
	});

	return false;
});
$(".cancel-admit-link").click(function(e) {
	e.preventDefault();
	var anchor = this;
	jConfirm('Are you sure you want to cancel this inquiry? This action cannot be undone.', 'Confirm Cancellation', function(r) {
		if (r == true) {
			location.href = $(anchor).attr("href");
		}
	});
	return false;
});

{/jQueryReady}
<body>
{if $isMicro == 1}
	{include file="_feedback.tpl"}
	<br />
	{include file="$content_tpl"}
{else}
	<div id="header-container">
	
		{if $auth->valid()}
		{$defaultFacility = $auth->getRecord()->getDefaultFacility()}
		<div id="header">
		
			<div id="user-info">
			
				Welcome, <a href="{$SITE_URL}/?page=userInfo">{$auth->getRecord()->getFullName()}</a>{if $isTV == 1} | <a href="{setURLVar(currentURL(), 'resOverride', 'desktop')}">Desktop Mode</a>{else} | <a href="{setURLVar(currentURL(), 'resOverride', 'TV')}">TV Mode</a>{/if} | <a href="{$SITE_URL}/?page=login&amp;action=logout">Logout</a>
			
			</div>
			
			<img src="{$SITE_URL}/images/{$logo}" alt="AptitudeCare Logo" class="logo" />
			
			
			<div id="nav">
			
				<ul>
					
						<li><a href="#">Data</a>
							<ul>
								<li><a href="{$SITE_URL}/?page=caseManager&amp;action=manage">Case Managers</a></li>
								<li><a href="{$SITE_URL}/?page=hospital&amp;action=manage">Healthcare Facilities</a></li>
								<li><a href="{$SITE_URL}/?page=pharmacy&amp;action=manage">Pharmacies</a></li>
								<li><a href="{$SITE_URL}/?page=physician&amp;action=manage">Physicians/Surgeons</a></li>
								{if $auth->getRecord()->isAdmissionsCoordinator() == 1}
									<li><a href="{$SITE_URL}/?page=siteUser&amp;action=manage">Users</a></li>
								{/if}
							</ul>
						</li>	
					<li><a href="#">Facility Info</a>
						<ul>
							<li><a href="{$SITE_URL}/?page=facility&amp;action=census&amp;facility={$facility->pubid}">Census</a></li>
							<li><a href="{$SITE_URL}/?page=report&action=index&facility={$facility->pubid}">Reports</a></li>
						</ul>
					</li>
					<li><a href="#">Discharges</a>
						<ul>
							<li><a href="{$SITE_URL}/?page=facility&amp;action=schedule_discharges">Schedule Discharge(s)</a></li>
							<li><a href="{$SITE_URL}/?page=facility&amp;action=manage_discharges">Manage Discharges</a></li>
							<li><a href="{$SITE_URL}/?page=coord&amp;action=trackHospitalVisits&amp;facility={$facility->pubid}">Return to Hospital</a></li>
						</ul>
					</li>		
					<li><a href="#">Admissions</a>
						<ul>
							<li><a href="{$SITE_URL}/?page=coord&amp;action=admit">New Admit Request</a></li>
							<li><a href="{$SITE_URL}/?page=coord&action=pending_admissions&facility={$facility->pubid}">Pending Admissions</a></li>
							{if $auth->getRecord()->id == 8 || $auth->getRecord()->id == 9}
								<li><a href="{$SITE_URL}/?page=coord&action=pending_transfers">Pending Transfers</a></li>
							{/if}
				
						</ul>
					</li>	
					<li id="facility-dashboard"><a href="{$SITE_URL}/?page=facility&amp;id={$defaultFacility->pubid}">{$defaultFacility->name} Dashboard</a>
						<ul id="facility-dashboard-dropdown">
						{foreach $myFacilities as $f}
							<li><a href="{$SITE_URL}/?page=facility&amp;id={$f->pubid}">{$f->name} Dashboard</a></li>
						{/foreach}
						</ul>
					</li>

					{if $auth->getRecord()->isAdmissionsCoordinator() == 1}<li><a href="{$SITE_URL}/?page=coord">Home</a></li>{/if}
				</ul>
			
			</div>
		
		</div>
		
	</div>
	{else}
		<div id="header">
		
			<div id="user-info">
			
				<a href="{$SITE_URL}/?page=login">Login</a>			
			</div>
	
			<img src="{$SITE_URL}/images/{$logo}" alt="AptitudeCare Logo" class="logo" />
					
		</div>
		
	</div>
	{/if}
		
	<div id="content">
	
		<div class="right" style="margin-top: -12px;">{if $isTV == 1}<a href="{setURLVar(currentURL(), 'resOverride', 'desktop')}">Desktop Mode</a>{/if}</div>
	
		{include file="_feedback.tpl"}
		
		{include file="$content_tpl"}

		<div style="display:  none;">
			<div id="remote-dialog">
				<div id="remote-dialog-frame"></div>
				{*<iframe id="remote-dialog-frame" width="100%" height="100%" marginwidth=0 marginheight=0 scrolling=yes frameborder=0></iframe>*}
			</div>
		</div>
	</div>

{/if}
<JAVASCRIPT_BOTTOM>
</body>
</html>
{/if}