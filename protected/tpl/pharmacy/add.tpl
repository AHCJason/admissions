{jQueryReady}
{$states = getUSAStates()}
var states = [
{foreach $states as $abbr => $state}
{if $state != ''}
	{
		value: "{$abbr}",
		label: "({$abbr}) {$state}"
	}
	{if $state@last != true},{/if}
{/if}
{/foreach}
];

$("#state-search").autocomplete(
	{
		minLength: 0,
		source: states,
		focus: function( event, ui ) {
			$( "#state-search" ).val( ui.item.label );
			return false;
		},
		select: function( event, ui ) {
			$( "#state-search" ).val( ui.item.label );
			$( "#state" ).val( ui.item.value );
			return false;
		}
	}).data( "autocomplete" )._renderItem = function( ul, item ) {
		return $( "<li></li>" )
		.data( "item.autocomplete", item )
		.append( "<a>" + item.label + "</a>" )
		.appendTo( ul );
	};
	
	$(".phone").mask("(999) 999-9999");

{/jQueryReady}
<div class="lightbox">
	<h1>Add a new Pharmacy Location</h1>
	<form name="location" method="post" action="{$SITE_URL}" id="add-location">
		<input type="hidden" name="page" value="pharmacy" />
		{if $isMicro}
			<input type="hidden" name="action" value="addShadowboxLocation" />
		{else}
			<input type="hidden" name="action" value="addLocation" />
		{/if}
		<table id="edit-data" cellpadding="5" cellspacing="5">
			<tr>
				<td colspan="3"><strong>Pharmacy Name:</strong></td>
			</tr>
			<tr>
				<td colspan="2"><input type="text" name="name" size="60" /></td>
			</tr>
			<tr>
				<td><strong>Address</strong></td>
			</tr>
			<tr>
				<td colspan="3"><input type="text" name="address" size="60" /></td>
			</tr>
			<tr>
				<td><strong>City</strong></td>
				<td><strong>State</strong></td>
				<td><strong>Zip</strong></td>
			</tr>
			<tr>
				<td><input type="text" name="city" size="20" /></td>
				<td><input type="text" id="state-search" size="8" /></td>
				<input type="hidden" name="state" id="state" />
				<td><input type="text" name="zip" size="8" /></td>
			</tr>
			<tr>
				<td><strong>Phone</strong></td>
				<td><strong>Fax</strong></td>
			</tr>
			<tr>
				<td><input type="text" name="phone" class="phone" /></td>
				<td><input type="text" name="fax" class="phone" /></td>
			</tr>
			<tr>
				<td colspan="3"><input type="submit" value="Save" class="right" /></td>
			</tr>
		</table>
	</form>
</div>