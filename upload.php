<?php
class Upload {

	protected $args = array();

	public function __construct($args) {

		$this->args = [
			'file'				=>	'file',
			'upload_path'		=>	'uploads/',
			'allowed_formats'	=>	['jpg', 'png'],
			'allowed_size'		=>	1024 * 1024,
			'errors'			=>	[
				'select_file'			=>	'Please select file...',
				'file_already_exists'	=>	'Sorry, file already exists',
				'invalid_file_format'	=>	'Invalid file format',
				'invalid_file_size'		=>	'Invalid file size',
				'path_not_exist'		=>	'Upload directory not exist',
				'upload_failed'			=>	'File upload failed'
			]
		];

		$this->args = array_merge($this->args, $args);
	}

	public function process() {

		if (isset($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {

			$name		= $_FILES[$this->args['file']]['name'];
			$tmp_name = $_FILES[$this->args['file']]['tmp_name'];
			$size		= $_FILES[$this->args['file']]['size'];

			if (strlen($name) == 0) {
				die($this->args['errors']['select_file']);
			}

			if ( ! is_dir($this->args['upload_path'])) {
				die($this->args['errors']['path_not_exist']);
			}

			if (file_exists($this->args['upload_path'].$name)) {
				die($this->args['errors']['file_already_exists']);
			}

			list(, $ext) = explode('.', $name);
			if ( ! in_array($ext, $this->args['allowed_formats']) || getimagesize($tmp_name) === false) {
				die($this->args['errors']['invalid_file_format']);
			}

			if ($size > $this->args['allowed_size']) {
				die($this->args['errors']['invalid_file_size']);
			}

			if ( ! move_uploaded_file($tmp_name, $this->args['upload_path'].$name)) {
				die($this->args['errors']['upload_failed']);
			}

			echo "<img src='".$this->args['upload_path'].$name."'  class='preview'>";
		}
	}
}
