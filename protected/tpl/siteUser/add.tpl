{jQueryReady}
	$('.phone').mask('(999) 999-9999');
	
{/jQueryReady}
<h1 class="text-center">Add a New User</h1>

<form action="{$SITE_URL}" method="post">
	<input type="hidden" name="page" value="siteUser" />
	<input type="hidden" name="action" value="submitAddUser" />
	
	<table id="edit-data" cellpadding="5" cellspacing="5">
		<tr>
			<td>First Name:</td>
			<td><input type="text" name="first" size="30" /></td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td><input type="text" name="last" size="50" /></td>
		</tr>
		<tr>
			<td>Username (Email Address):</td>
			<td><input type="text" name="email" size="30" /></td>
		</tr>
		<tr>
			<td>New Password:</td>
			<td><input type="password" value="{$user->password}" name="password1" /></td>
		</tr>
		<tr>
			<td>Verify Password:</td>
			<td><input type="password" value="{$user->password}" name="password2" /></td>
		</tr>
		<tr>
			<td>Phone:</td>
			<td><input type="text" name="phone" size="10" class="phone" /></td>
		</tr>
		<tr>	
			<td>Facility:</td>
			<td>
				<select name="facility">
					<option value="">Select a facility...</option>
					{foreach $facilities as $f}
						<option value="{$f->pubid}">{$f->name}</option>
					{/foreach}
				</select>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input id="is-coordinator" type="checkbox" name="is_coordinator" value="1"> Is an Admissions Coordinator</td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="submit" value="Add User" /></td>
		</tr>


	</table>
	
</form>