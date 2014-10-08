<body>
	<div class="container">
		<h1>Hello Book.<small>hello evetyone.</small></h1>

		



		<table class="table table-hover" id="table-content">
			<thead>
				<tr>
					<th>id</th>
					<th>book_name</th>
					<th>ISBN</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Android</td>
					<td>12345</td>
				</tr>
				<?php		
				foreach($book_data->result() as $row) {

					$str = '<tr><td>'.$row->id.'</td>';
					$str .= '<td>'.$row->book_name.'</td>';
					$str .= '<td>'.$row->book_isbn.'</td></tr>';
					
					echo $str;
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>