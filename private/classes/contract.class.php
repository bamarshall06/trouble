<?php

class Contract extends DatabaseObject {

static protected $table_name = 'contract';
static protected $db_columns = ['contractid', 'paymentDate', 'contractLength', 'paymentAmt', 'blogid', 'endContract'];

public $contractid;
public $paymentDate;
public $contractLength;
public $paymentAmt;
public $blogid;
public $endContract;

// construct method
public function __construct($args=[]) {
  $this->contractid = $args['contractid'] ?? NULL;
  $this->paymentDate = $args['paymentDate'] ?? '';
  $this->contractLength = $args['contractLength'] ?? '';
  $this->paymentAmt = $args['paymentAmt'] ?? '';
  $this->blogid = $args['blog'] ?? '';
  $this->endContract = $args['endContract'] ?? '';
}

// remember to return out a value since this is a function.
static public function find_contract($id) {
  $sql = "SELECT * FROM contracts WHERE blogid='" . $id . "'";
  return static::find_by_sql($sql);
  }

}
?>
