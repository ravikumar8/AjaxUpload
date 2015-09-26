<?php
class Upload	{

	protected $args 	=	array();

	public function __construct( $args )	{

		$this->args 	=	[
			'file'				=>	'file',
			'upload_path'		=>	'uploads/',
			'allowed_formats'	=>	['jpg', 'png'],
			'allowed_size'		=>	1024 * 1024,
			'errors'			=>	[
				'select_file'	=>	'Please select file...',
				'invalid_file_format'	=>	'Invalid file format',
				'invalid_file_size'		=>	'Invalid file size',
				'path_not_exist'		=>	'Upload directory not exist',
				'upload_failed'			=>	'File upload failed'
			]
		];

		$this->args = array_merge( $this->args, $args );
	}

	public function process()	{

		if( isset( $_POST ) && $_SERVER['REQUEST_METHOD'] == 'POST' )	{

			$name		=	$_FILES[ $this->args['file'] ]['name'];
			$tmp_name	=	$_FILES[ $this->args['file'] ]['tmp_name'];
			$size		=	$_FILES[ $this->args['file'] ]['size'];

			if( strlen( $name ) == 0 )	{
				echo $this->args['errors']['select_file'];
			}

			list( , $ext )	=	explode('.', $name);
			if( ! in_array( $ext, $this->args['allowed_formats'] ) )	{
				echo $this->args['errors']['invalid_file_format'];
			}

			if( $size > $this->args['allowed_size'] )	{
				echo $this->args['errors']['invalid_file_size'];
			}

			if( ! is_dir( $this->args['upload_path'] ) )	{
				echo $this->args['errors']['path_not_exist'];
			}

			if( ! move_uploaded_file( $tmp_name, $this->args['upload_path'] . $name ) )	{
				echo $this->args['errors']['upload_failed'];
			}

			echo "<img src='".$this->args['upload_path'] . $name."'  class='preview'>";
		}
	}
}
