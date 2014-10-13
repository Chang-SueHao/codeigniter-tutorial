<body>
	<div class="container">
		<h1>Hello Edit Book.<small>hello everyone.</small></h1>
		<a class="btn btn-info" href=<?php echo site_url('book'); ?>>書本列表</a>		
		
		<!-- 配合form action導向的網址，把book的id也放進去 -->
		<?php echo form_open('book/edit_book'.'/'. $book_data->id, array('role' => 'form')); ?>
			<?php
			$message_data = $this->session->flashdata('message_data');
			if($this->session->flashdata('message_data'))
				echo '<div class="alert-'.$message_data['type'].' alert alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$message_data['message'].'</div>';

			?>

			<?php echo validation_errors('<div class="error alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>','</div>'); ?>
			<!-- 配合value屬性把從資料庫得到的資料用echo放到input裡面 -->
			<div class="form-group">
				<label for="book_name">書名</label>
				<input type="text" class="form-control" id="book_name" placeholder="書名" name="book_name" value=<?php echo $book_data->book_name ?>>
			</div>
			<div class="form-group">
				<label for="book_isbn">ISBN</label>
				<input type="text" class="form-control" id="book_isbn" placeholder="ISBN" name="book_isbn" value=<?php echo $book_data->book_isbn ?>>
			</div>

			<button type="submit" class="btn btn-danger">Submit</button>
		</form>

	</div>
</body>
</html>