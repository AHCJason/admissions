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

$("#search-states").autocomplete(
	{
		minLength: 0,
		source: states,
		focus: function( event, ui ) {
			$( "#search-states" ).val( ui.item.label );
			return false;
		},
		select: function( event, ui ) {
			$( "#search-states" ).val( ui.item.label );
			$( "#state_id" ).val( ui.item.value );
			return false;
		}
	}).data( "autocomplete" )._renderItem = function( ul, item ) {
		return $( "<li></li>" )
		.data( "item.autocomplete", item )
		.append( "<a>" + item.label + "</a>" )
		.appendTo( ul );
	};
	
$(".phone").mask("(999)-999-9999");
$(".fax").mask("(999)-999-9999");

{/jQueryReady}

<div class="lightbox">
	<h1>Add a new {$physicianType|capitalize|default: 'Physician'}</h1>
	<form name="physician" method="post" action="{$SITE_URL}" id="add-physician">
		<input type="hidden" name="page" value="physician" />
		{if $isMicro}
			<input type="hidden" name="action" value="addShadowboxPhysician" />
		{else}
			<input type="hidden" name="action" value="addPhysician" />
		{/if}
		<table id="edit-data" cellspacing="5" cellpadding="5">
			<tr>
				<td><strong>First Name</strong></td>
				<td colspan="2"><strong>Last Name</strong></td>
			</tr>
			
			<tr>
				<td><input type="text" name="first_name" /></td>
				<td colspan="2"><input type="text" name="last_name" size="50" /></td>
			</tr>
			<tr>
				<td colspan="3"><strong>Address</strong></td>
			</tr> 
			<tr>
				<td colspan="3"><input type="text" name="address" size="80" /></td>
			</tr>
			<tr>
				<td><strong>City</strong></td>
				<td><strong>State</strong></td>
				<td><strong>Zip</strong></td>
			</tr>
			<tr>
				<td><input type="text" name="city" size="20" /></td>
				<td><input type="text" id="search-states" size="16" /></td>
				<input type="hidden" name="state_id" id="state_id" />
				<td><input type="text" name="zip" size="8" /></td>
			</tr>
			<tr>
				<td><strong>Phone</strong></td>
				<td><strong>Fax</strong></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><input type="text" name="phone" class="phone" /></td>
				<td><input type="text" name="fax" class="fax" /></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3"><input type="submit" value="Save" class="right" /></td>
			</tr>

		</table>
	</form>
</div>