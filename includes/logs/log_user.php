<?php
#-- class LogUser
class LogUser {
  public $uid_;
  public $uname_;
  public $urole_;

  function __construct($id,$name,$role)
  {
    $this->uid_ = $id;
    $this->uname_ = $name;
    $this->urole_ = $role;
  }
}
?>