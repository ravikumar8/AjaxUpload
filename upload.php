<?php
class Upload	{

	public function __construct( $args )	{

		$this->args 	=	array(
			'file'				=>	'file',
			'upload_path'		=>	'uploads/',
			'allowed_formats'	=>	array( 'jpg', 'png' ),
			'allowed_size'		=>	1024 * 1024
		);

		$this->args = array_merge( $this->args, $args );
	}

	public function process()	{

		if( isset( $_POST ) and $_SERVER['REQUEST_METHOD'] == 'POST' )	{

			$name		=	$_FILES[ $this->args['file'] ]['name'];
			$type		=	$_FILES[ $this->args['file'] ]['type'];
			$tmp_name	=	$_FILES[ $this->args['file'] ]['tmp_name'];
			$error		=	$_FILES[ $this->args['file'] ]['error'];
			$size		=	$_FILES[ $this->args['file'] ]['size'];

			if( strlen( $name ) == 0 )	{
				echo 'Please select image...';
				exit;
			}

			list( $filename, $ext )	=	explode('.', $name);
			if( ! in_array( $ext, $this->args['allowed_formats'] ) )	{
				echo 'Invalid file format';
				exit;
			}

			if( $size > $this->args['allowed_size'] )	{
				echo 'Invalid file size';
				exit;
			}

			if( ! is_dir( $this->args['upload_path'] ) )	{
				echo 'Upload directory not exist';
				exit;
			}

			if( ! move_uploaded_file( $tmp_name, $this->args['upload_path'] . $name ) )	{
				echo 'File upload failed';
				exit;	
			}

			echo "<img src='".$this->args['upload_path'] . $name."'  class='preview'>";
			exit;
		}
		
	}
}