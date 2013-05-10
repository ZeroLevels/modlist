<table>
	<thead>
		<tr>
			<th>Username</th>
			<th>E-mail</th>
			<th>Access Level</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($valid as &$user) {
			echo '<tr>';
			echo '<td>'.base64_decode($user[0]).'</td>';
			echo '<td>'.base64_decode($user[1]).'</td>';
			echo '<td>'.textlevel(base64_decode($user[0])).'</td>';
			echo '</tr>';
		}
		?>
	</tbody>
</table>