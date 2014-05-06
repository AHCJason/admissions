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
			$( "#state" ).val( ui.item.value );
			return false;
		},
		select: function( event, ui ) {
			$( "#search-states" ).val( ui.item.label );
			$( "#state" ).val( ui.item.value );
			return false;
		}
	}).data( "autocomplete" )._renderItem = function( ul, item ) {
		return $( "<li></li>" )
		.data( "item.autocomplete", item )
		.append( "<a>" + item.label + "</a>" )
		.appendTo( ul );
		console.log($("#search-states").val());
	};
	
	
	
{/jQueryReady}
<div class="lightbox">
	<h1>Add a new Location</h1>
	<form name="location" method="post" action="{$SITE_URL}" id="add-location">
		<input type="hidden" name="page" value="hospital" />
		<input type="hidden" name="action" value="addLocation" />
		<input type="hidden" name="_path" value="{urlencode(currentURL())}" />
		{if $isMicro}
			<input type="hidden" name="isMicro" value="1" />
		{/if}
		<table id="info-data" cellpadding="5" cellspacing="5">
			<tr>
				<td colspan="2"><strong>Location Name:</strong></td>
				<td><strong>Location Type:</strong></td>
			</tr>
			<tr>
				<td colspan="2"><input type="text" name="name" size="50" /></td>
				<td>
					<select name="type">
						<option value="">Select type...</option>
						{foreach $locationTypes as $type}
							<option value="{$type}" {if $type == $inputType} selected{/if}>{$type}</option>
						{/foreach}
					</select>
				</td>
			</tr>
			<tr>
				<td><strong>Address</strong></td>
			</tr>
			<tr>
				<td colspan="3"><input type="text" name="address" size="50" /></td>
			</tr>
			<tr>
				<td><strong>City</strong></td>
				<td><strong>State</strong></td>
				<td><strong>Zip</strong></td>
			</tr>
			<tr>
				<td><input type="text" name="city" size="20" /></td>
				<td><input type="text" id="search-states" size="8" /></td>
				<input type="hidden" name="state" id="state" />
				<td><input type="text" name="zip" size="8" /></td>
			</tr>
			<tr>
				<td><strong>Phone</strong></td>
				<td><strong>Fax</strong></td>
			</tr>
			<tr>
				<td><input type="text" name="phone" /></td>
				<td><input type="text" name="fax" /></td>
			</tr>
			<tr>
				<td colspan="3"><input type="submit" value="Save" class="right" /></td>
			</tr>
		</table>
	</form>
</div>