<?php
	$file_name = "swwsc-post-pic.sqlite3";
	if (! $db = new PDO($file_name)) {
  		die("DB Connection Failed.");
	}

	$q = sprintf('insert into %s values(key="%s", name="%s", count="0")', $file_name, '001', 'namae desu');
	if (! $db->query($q)) {
  	die("DB Insert Error.");
	}
	
	$q = sprintf('select * from %s where key="001"', $file_name);
	if (! $db->query($q)) {
  		die("DB Select Error.");
	}
	
	
	class db_sqlite extends SQLite3
	{
		public $db_name = "swwsc-post-pic";
		public $file_name = "swwsc-post-pic.sqlite3";
		public $dbhandle;
		
		function __construct() {
			
			//echo $_SERVER['SCRIPT_FILENAME'];
			//$array = array('a', 'b', 'v');
			//$full_path = preg_grep('{swwsc}', $_SERVER);
			//$full_path = preg_replace('{indexDB.php}', $this->file_name, $_SERVER['SCRIPT_FILENAME']);
			$full_path = sprintf('%s', $this->file_name);
			
			echo "<br>db name:";
			print_r($full_path);
			$this->open($full_path);
			print_r($this);

			/*$dbhandle = new SQLiteDatabase($full_path);
			
			if ($this->dbhandle = sqlite3_open($full_path)) {
			} else {
				echo $err;
				die($err);
			}
			 */
		}
		
	}
	
	class table_test
	{
		public $dbhandle;
		public $table_name = "test";
		public $debug = true;
		
		function __construct($handle) {
			$this->$dbhandle = $handle;
		}
		
		/*
			レコードの存在チェック
		 */
		public function check_record($key)
		{
			return true;
		}
		
		/*
			
		 */
		public function get_record_data($key)
		{
			$ret = array('name'=>'', 'count'=> '0', 'find' => '0');
			return $ret;
		}
		
		/*
			レコードの追加
		 */
		public function insert_record($key, $name, $count)
		{
			$query = sprintf('insert into %s values("%s", "%s", "%s")', 
																								$this->table_name, 
																								$key, 
																								$name,
																								$count
												);
			
			$exe = sqlite_exe($this->dbhandle, $query, $error);
			if ($exe) {
				return true;
				
			} else {
				if ($this->debug) {
					echo "databese insert error:". $error;
				}
				return false;
			}
			
		}
		
		/*
			レコードの変更
		 */
		public function update_record($key, $name, $count)
		{
		}
		
		/*
			レコードの削除
		 */
		public function delete_record($key)
		{
		}
		
		/*
			テーブルの作成
		 */
		public function create_table()
		{
		}
		
		/*
			テーブルの削除
		 */
		public function drop_table()
		{
		}
		
	}
?>