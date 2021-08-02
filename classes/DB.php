<?php
class DB{
	private static $_instance=null;
	private  $_pdo,
	          $_query,
	          $_error=false,
	          $_results,
	          $_count=0;

	          private function __construct() {
	          	try {
	          		$this->_pdo=new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username') , Config::get('mysql/password'));
	          	} catch (PDOException $e) {
	          		die($e->getMessage());
	          	}
	          }

	          public static function getInstance(){
	          	if(!isset(self::$_instance)){
	          		self::$_instance = new DB();
	          	}
	          	return self::$_instance;
	          }


               /**non binding */
		      public function gen_query($sql) {
				$this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
				$this->_query = $this->_pdo->prepare($sql);
				if ($this->_query->execute()) {
					$this->_lastID = $this->_pdo->lastInsertId();
					return $this;
				}
			}

              public function select_query($sql) {
                $this->_query = $this->_pdo->prepare($sql);
                if ($this->_query->execute()) {
                    $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                    $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->_count = $this->_query->rowCount();
                } else {
                    return false;
                }
                return $this;
            }
			/**non binding */


             public function query($sql, $params=array()){
             	$this->_error=false;
             	if($this->_query=$this->_pdo->prepare($sql)){
             		$x=1;
             		if(count($params)){
             		foreach($params as $param){
             			$this->_query->bindValue($x, $param);
             			$x++;
             		}
             	}
             	if($this->_query->execute()){
					$this->_count=$this->_query->rowCount();
             	} else {
             		echo $this->_error=true;
             	}

             	}
             	return $this;
             }
			 
			 public function action($action, $table, $where = array()){
				 if(is_iterable($where)){
					 $operators = array('=', '>', '<', '>=', '<=', '<>', '!<', '!>');
					 
					 $field    = $where[0];
					 $operator = $where[1];
					 $value    = $where[2];
					 
					 if(in_array($operator, $operators)){
						 $sql="{$action} FROM {$table} WHERE {$field} {$operator} ? ";
						 if(!$this->query($sql, array($value))->error()){
							  $this->_results=$this->_query->fetchAll(PDO::FETCH_OBJ);
							  return $this;
						 }
					 }
				 }
				 return false;
				 
			 }
			 
			 public function get($table, $where){
				 return $this->action('SELECT *', $table, $where);
			 }
			 
			 public function delete($table, $where){
				return $this->action('DELETE', $table, $where); 
			 }
             
			  public function insert($table, $fields=array()){
				  if(count($fields)){
					  $keys = array_keys($fields);
					  $values = '';
					  $x=1;
					  foreach($fields as $field){
						  $values.= '?';
						  if($x < count($fields)){
							  $values.=', ';
						  }
						  $x++;
					  }
					  $sql="INSERT INTO {$table}(`" . implode('`, `', $keys) . "`) VALUES({$values})";
					  
					  if(!$this->query($sql, $fields)->error()){
						  return true;
					  }
				  }
				 return false;
			 }
			 
			  public function update($table, $idfield, $id, $fields=array()){
				$set="";
				$x=1;
				foreach($fields as $name=>$value){
					$set.="{$name}=?";
					if($x< count($fields)){
						$set.=", ";
					}
					$x++;
				}
				$sql="UPDATE {$table} SET {$set} WHERE {$idfield}={$id}";
				if(!$this->query($sql, $fields)->error()){
					return true;
				}
			 }

         


            public function error() {
	          	return $this->_error;
	          }

	          public function count() {
	          	return $this->_count;
	          }

	           public function results() { 
	          	return $this->_results;
	          }

}