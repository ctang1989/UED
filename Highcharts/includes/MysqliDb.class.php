<?php
/**
 * MysqliDb Class
 *
 * @category  Database Access
 * @package   MysqliDb
 * @author    Tang Chao <mchina_tang@qq.com>
 * @copyright Copyright (c) 2015
 * @version   1.0
 **/
class MysqliDb{
	
	private $mysqli;
	private static $host = SAE_MYSQL_HOST_M;
	private static $user = SAE_MYSQL_USER;
	private static $password = SAE_MYSQL_PASS;
	private static $db = SAE_MYSQL_DB;
	private static $port = SAE_MYSQL_PORT;

	//构造函数
	function __construct(){
	
		$this->mysqli = new MySQLi(self::$host,self::$user,self::$password,self::$db,self::$port);

		if($this->mysqli->connect_error){
			die("Connect Error".$this->mysqli->connect_error);
		}

		$this->mysqli->query("set names utf8");
	}

	//查询操作
	public function _query($sql){
		$res = $this->mysqli->query($sql) or die("数据查询失败".$this->mysqli->error);
		return $res;
		$this->mysqli->close();
	}

	//增删改操作
	public function _dml($sql){
			
		$res = $this->_query($sql) or die("数据操作失败".$this->mysqli->error);

		if(!$res){
			return 0; //数据操作失败
		}else{
			if($this->mysqli->affected_rows>0){
				return 1; //操作成功
			}else{
				return 2;	//0行数据受影响
			}
		}
		$this->mysqli->close();
	}
	
	//获取指定数据集一条数据组
	public function _fetch_array($sql){
		return $this->_query($sql)->fetch_array();
	}
	
	//获取指定数据集所有数据
	public function _fetch_array_list($result){
		$res = $result->fetch_array();
		return $res;
	}
	
	//表示影响到的记录数
	public function _affected_rows(){
		return $this->mysqli->affected_rows;
	}
	
	//取得结果集中行的数目
	public function _num_rows($result){
		return $result->num_rows;
	}
	
	//释放结果集
	function _free_result($result){
		$result->free();
	}
	
}

?>