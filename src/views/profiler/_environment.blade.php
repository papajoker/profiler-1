<table>
	<tr>
		<th>Key</th>
		<th>Value</th>
	</tr>
	<tr>
		<td>Timezone</td>
		<td>{{ Config::get('app.timezone') }}</td>
	</tr>
	<tr>
		<td>Locale</td>
		<td>{{ Config::get('app.locale') }}</td>
	</tr>
	<tr>
		<td>Php</td>
		<td>{{ phpversion() }}</td>
	</tr>
</table>

