<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GlobalModel extends CI_Model {

	function __construct() {
	
		parent::__construct();
	}

	public function insertData($table,$data)
	{
		return $this->db->insert($table,$data);
	}

	public function getDataRow($table,$where)
	{
		$dataReturn = $this->db->get_where($table,$where)->row_array();
		return $dataReturn;
	}
	public function getData($table,$where)
	{
		$dataReturn = $this->db->get_where($table,$where)->result_array();
		return $dataReturn;
	}
	public function getDataLike($table,$where)
	{
		$dataReturn = $this->db->like($where)->get($table)->result_array();
		return $dataReturn;
	}
	public function getDataSort($table,$where,$kolom,$sort)
	{
		$dataReturn = $this->db->order_by($kolom,$sort)->get_where($table,$where)->result_array();
		return $dataReturn;
	}
	public function getDataSortLimit($table,$where,$kolom,$sort,$limit)
	{
		$dataReturn = $this->db->order_by($kolom,$sort)->limit($limit)->get_where($table,$where)->result_array();
		return $dataReturn;
	}
	public function queryManual($query)
	{
		$dataReturn = $this->db->query($query)->result_array();
		return $dataReturn;
	}
	public function queryManualRow($query)
	{
		$dataReturn = $this->db->query($query)->row_array();
		return $dataReturn;
	}
	public function deleteData($table,$data)
	{
		$this->db->delete($table, $data);
	}
	public function updateData($table,$where,$data)
	{
		$this->db->where($where);
		return $this->db->update($table, $data);
	}
}