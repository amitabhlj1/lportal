<?php
/*
 * Generic functions for models
 * 1)select
 * 2)insert
 * 3)update
 * 4)delete
 * 5)countRows
 * 6)freeResult
 */

class My_model extends CI_Model {

    public function __construct() {
        parent::__construct();
		$this->load->database();
        $this->load->library('email');
    }

	public function getNumRows($table,$field,$val)
    {
       $query = $this->db->get_where($table, array($field => $val) );
	   return $query->num_rows();
    }
	
    public function selectRecord($tabelName, $fieldsName, $where=null , $orderBy = '', $limit = '') {
        $flds = '';
        if($where) {
            $this->db->where($where);
        }
       // $this->db->where('fld_visibility', '1');
	    if(is_array($fieldsName))
		{
			if (!in_array('*', $fieldsName)) {
				for ($i = 0; $i < count($fieldsName) - 1; $i++) {
					$flds .=$fieldsName[$i] . ",";
				}
				$flds .= $fieldsName[$i];
				$this->db->select($flds);
			}
		}
        if ($orderBy === '') {
            //$this->db->order_by("fld_id", "desc");
        } else {
            $this->db->order_by($orderBy['criteria'], $orderBy['order']);
        }
        if ($limit !== '' && is_array($limit)) {
            $this->db->limit($limit[1], $limit[0]);
            //limit(10, 20);->LIMIT 20, 10
        } elseif ($limit !== '' && !is_array($limit)) {
            $this->db->limit($limit);
        }
        $query = $this->db->get($tabelName);
        if ($query->num_rows()) {
            return $query->result();;
        } else {
            return FALSE;
        }
    }

    public function selectRecordIn($tabelName, $formData, $where, $otherWhere = array()) {
        if (!in_array('*', $formData)) {
            $this->db->select(implode(',', $formData));
        }
        $this->db->where_in($where['key'], $where['value']);
        $this->db->where('fld_visibility', '1');
        if ($otherWhere) {
            $this->db->where($otherWhere);
        }
        $this->db->order_by('fld_id', 'DESC');
        $reult = $this->db->get($tabelName);
        if ($reult->num_rows() > 0) {
            return $reult;
        } else {
            return FALSE;
        }
    }

    public function updateRecord($tabelName, $aData, $where) {
        $this->db->where($where);
        $result = $this->db->update($tabelName, $aData);
		$iRes = $this->db->affected_rows();
        return $iRes;
    }  

    public function insertRecord($tabelName, $fieldsName) {
        $this->db->insert($tabelName, $fieldsName);
        return $this->db->insert_id();
    }

    public function deleteRecord($tabelName, $where) {
        $this->db->where($where);
//        $reult = $this->db->delete($tabelName);
        //update table and set visibility to false
        $reult = $this->db->update($tabelName, array('fld_visibility' => '0'));
        return ($reult) ? TRUE : FALSE;
    }

    public function deleteRecordPerm($tabelName, $where) {
        $this->db->where($where);
        $reult = $this->db->delete($tabelName);
        return ($reult) ? TRUE : FALSE;
    }

    public function deleteRecordIn($tabelName, array $where) {
        $this->db->where_in($where['key'], $where['value']);
//        $reult = $this->db->delete($tabelName);
        $reult = $this->db->update($tabelName, array('fld_visibility' => '0'));
        return ($reult) ? TRUE : FALSE;
    }

    public function countRows($resultSet) {
        return $resultSet->num_rows();
    }

    public function freeResult($resultSet) {
        $resultSet->free_result();
    }

    public function getAdminEmail() {
        $result = $this->selectRecord('tbl_admin', array('fld_email'));
        $row = $result->first_row();
        return $row->fld_email;
    }

    /* Return single column value or false on fail */

    public function getValueByTableName($tableName, $field, $where) {
//        $this->selectRecord($tableName, array($field), $where);
        $this->db->select($field);
        $this->db->where($where);
        $result = $this->db->get($tableName);
        if ($result) {
            $row = $result->first_row('array');
            return $row[$field];
        } else {
            return FALSE;
        }
    }

    public function getVisibleValue($tableName, $field, $where) {
        $result = $this->selectRecord($tableName, array($field), $where);
        if ($result) {
            $row = $result->first_row('array');
            return $row[$field];
        } else {
            return FALSE;
        }
    }

    public function printQuery() {
        echo $this->db->last_query();
        die;
    }

    public function CurrentQuarter() {
        $n = date('n');
        if ($n < 4) {
            $return = "1";
        } elseif ($n > 3 && $n < 7) {
            $return = "2";
        } elseif ($n > 6 && $n < 10) {
            $return = "3";
        } elseif ($n > 9) {
            $return = "4";
        }
        return $return;
    }

    public function getInvoiceno($orderId) {
        //check for if inoice no exists or not
        $invoice = $this->getValueByTableName('tbl_transaction', 'fld_invoiceno', array('fld_id' => $orderId));
        if ($invoice) {
            $invoiceNo = $invoice;
        } else {
            //select current quater greated invoice no
            $cno = date('Y') . $this->CurrentQuarter();
            $this->db->select('max(`fld_invoiceno`) as fld_invoiceno');
            $this->db->like('fld_invoiceno', $cno, 'both');
            $this->db->order_by('fld_ID', 'DESC');
            $this->db->limit(1);
            $result = $this->db->get('tbl_transaction');
            if ($result && $result->num_rows()) {
                $invoiceNo = $result->first_row()->fld_invoiceno;
                $invoiceNo = ($invoiceNo == NULL) ? $cno . '001' : ++$invoiceNo;
            } else {
                $invoiceNo = $cno . '001';
            }
        }
//        echo $this->db->last_query();
//        echo ($invoiceNo);die;
        return $invoiceNo;
    }

    public function updateProductQty($productId, $quantity, $sign = '-') {//fld_orderedQuantity
        $this->db->query("update tbl_product set fld_quantity=fld_quantity $sign $quantity Where fld_id=$productId");
    }

    public function getProductQty($productID) {
        $qty = 0;
        $result = $this->selectRecord('tbl_product', array('fld_mngquentity', 'fld_quantity'), array('fld_id' => $productID));
        if ($result && $result->num_rows()) {
            $product = $result->first_row();
            if ($product->fld_mngquentity == 0) {
                $qty = 100000;
            } elseif ($product->fld_mngquentity == 1 && ($product->fld_quantity >= 0)) {
                $qty = $product->fld_quantity;
            }
            return $qty;
        }
    }

    public function getCountry() {
        $result = $this->selectRecord('tbl_countries', array('fld_id', 'fld_name'), '1', array('criteria' => 'fld_name', 'order' => 'ASC'));
        $response = array();
        foreach ($result->result() as $row) {
            $response[$row->fld_id] = $row->fld_name;
        }
        return $response;
    }

    public function getState($countryId = '231') {
        $result = $this->selectRecord('tbl_states', array('fld_id', 'fld_name'), array('country_id' => $countryId), array('criteria' => 'fld_name', 'order' => 'ASC'));
        $response = array();
        foreach ($result->result() as $row) {
            $response[$row->fld_id] = $row->fld_name;
        }
        return $response;
    }

    public function getRandomString($length = null) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		$randomString .= time();
		return $randomString;
    }
	
	/*
	** password generator
	*/
	 public function passwordString($length = null) {
        $characters = '123456789abcdefghjklmnopqrstuvwxyz';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
		}		
		return $randomString;
    }

    public function selectMax($tableName, $fieldName) {
        $response = FALSE;
        $this->db->select_max($fieldName);
        $this->db->where('fld_visibility', '1');
        $query = $this->db->get($tableName);
        if ($query && $query->num_rows()) {
            $row = $query->first_row('array');
            $response = $row[$fieldName];
        }
        return $response;
    }

    public function getServingStaffDeviceId($zip) {
        $response = array();
        $sql = "SELECT fld_deviceid FROM `tbl_staff` where find_in_set('$zip',fld_servingzip) AND fld_deviceid!='' AND fld_visibility='1'";
        $query = $this->db->query($sql);
        if ($query && $query->num_rows()) {
            foreach ($query->result() as $row) {
                $response[] = $row->fld_deviceid;
            }
        }
        return $response;
    }

    public function selectMobileMessage() {
        $response = array();
        $sql = "SELECT fld_phone FROM `tbl_mobile_message` where fld_status='1' AND fld_visibility='1'";
        $result = $this->db->query($sql);
        if ($result && $result->num_rows()) {
            foreach ($result->result() as $row) {
                $response[] = $row->fld_phone;
            }
        }
        return $response;
    }

}
