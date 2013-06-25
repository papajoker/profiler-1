@if(!empty($config))
	<table>
		<tr>
			<th>Key</th>
			<th>Value</th>
		</tr>
		@foreach($config as $key => $value)
			<tr>
				<td>{{ $key }}</td>
				<td>
					@if (is_array($value))
						<pre>{{ print_r($value, true) }}</pre>
					@else
						{{ $value }}
					@endif
				</td>
			</tr>
		@endforeach
	</table>
@else
	<span class="anbu-empty">There are no config entries.</span>
@endif
