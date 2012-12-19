<?php
class Book{
	function getBooks(){
		$data = Database::execute('SELECT * FROM book');
		return $data;
	}
}
?>