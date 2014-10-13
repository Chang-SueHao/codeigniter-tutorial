<body>
	<div class="container">
		<h1>Hello Book.<small>hello everyone.</small></h1>
		<a class="btn btn-info" href=<?php echo site_url('book/add_book'); ?>>新增書本</a>		
		
		<?php
			$message_data = $this->session->flashdata('message_data');
			if($this->session->flashdata('message_data'))
				echo '<div class="alert-'.$message_data['type'].' alert alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$message_data['message'].'</div>';

		?>

		<table class="table table-hover" id="table-content">
			<thead>
				<tr>
					<th>id</th>
					<th>book_name</th>
					<th>ISBN</th>
					<th>修改</th>
					<th>刪除</th>					
				</tr>
			</thead>
			<tbody>
				<?php
				if($book_data)  //若book_data有資料（資料庫不為空）
				foreach($book_data->result() as $row) {

					$str = '<tr><td>'.$row->id.'</td>';
					$str .= '<td>'.$row->book_name.'</td>';
					$str .= '<td>'.$row->book_isbn.'</td>';
					// 把連結當成按鈕，只要把class加上按鈕的樣式，連結為controller驅動的重要部分
					$str .= '<td><a class="btn btn-warning" href='.site_url("book/edit_book").'/'.$row->id.'>修改</a></td>';
					$str .= '<td><a class="btn btn-danger" href='.site_url("book/delete_book").'/'.$row->id.'>刪除</a></td></tr>';
					
					echo $str;
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>