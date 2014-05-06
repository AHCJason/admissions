{jQueryReady}
	$("#hospital-search").autocomplete({
		minLength: 4,
		source: function(req, add) {
			$.getJSON(SITE_URL, { page: 'hospital', action: 'searchHospital', term: req.term}, function (json) {
				var suggestions = [];
				$.each (json, function(i, val) {
					var obj = new Object;
					obj.value = val.id;
					obj.label = val.name + " (" + val.state + ")";
					suggestions.push(obj);
				});
				add(suggestions);
			});
		}
		,select: function (e, ui) {
			e.preventDefault();
			$("#hospital").val(ui.item.value);
			e.target.value = ui.item.label;		
		}
	});
	
	$(".phone").mask("(999) 999-9999");

{/jQueryReady}

<div>
	<h1 class="text-center">Add a new Case Manager</h1>
	<br />
	<br />
	<form name="case_manager" id="form" method="post" action="{$SITE_URL}" id="add-cm">
		<input type="hidden" name="page" value="caseManager" />
		{if $isMicro}
			<input type="hidden" name="action" value="addShadowboxCaseManager" />
		{else}
			<input type="hidden" name="action" value="addCaseManager" />
		{/if}
		<table  id="edit-data" cellspacing="5" cellpadding="3">
			<tr id="add-cm">
				<td><strong>First Name</strong></td>
				<td><strong>Last Name</strong></td>
			</tr>
			
			<tr>
				<td><input type="text" name="first_name" /></td>
				<td><input type="text" name="last_name" /></td>
			</tr>
			<tr>
				<td><strong>Healthcare Facility</strong></td>
			</tr>
			<tr>
				<td><input type="text" id="hospital-search" style="width: 232px;" size="30" /></td>
				<input type="hidden" name="hospital" id="hospital" />
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
				<td><strong>Email</strong></td>
			</tr>
			<tr>
				<td><input type="text" name="email" /></td>
			</tr>
			<tr>
				<td colspan="3"><input type="submit" id="submit" value="Save" class="right" /></td>
			</tr>

		</table>
	</form>
</div>