<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Access {
    public $KEY;
    public $ALL_ACCESS;
    public $CONTROLLER;
    public $DATE_CREATE;
    public $DATE_MODIFIED;

    function __construct(
        $KEY, $ALL_ACCESS, $CONTROLLER
    ) {
        $this->KEY = $KEY;
        $this->ALL_ACCESS = $ALL_ACCESS;
        $this->CONTROLLER = $CONTROLLER;
        $this->DATE_CREATE = new DateTime(date("Y-m-d H:i:s"));
        $this->DATE_MODIFIED = new DateTime(date("Y-m-d H:i:s"));
    }
}