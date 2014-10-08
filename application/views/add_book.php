<body>
	<div class="container">
		<h1>Hello Add Book.<small>hello evetyone.</small></h1>


		<?php echo form_open('book/add_book', array('role' => 'form')); ?>
			<?php
			$message_data = $this->session->flashdata('message_data');
			if($this->session->flashdata('message_data'))
				echo '<div class="alert-'.$message_data['type'].' alert alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$message_data['message'].'</div>';

			?>

			<?php echo validation_errors('<div class="error alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>','</div>'); ?>

			<div class="form-group">
				<label for="book_name">書名</label>
				<input type="text" class="form-control" id="book_name" placeholder="書名" name="book_name">
			</div>
			<div class="form-group">
				<label for="book_isbn">ISBN</label>
				<input type="text" class="form-control" id="book_isbn" placeholder="ISBN" name="book_isbn">
			</div>

			<button type="submit" class="btn btn-danger">Submit</button>
		</form>

	</div>
</body>
</html>