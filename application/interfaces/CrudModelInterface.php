<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
interface CrudModelInterface 
{
    public function get($id);
    public function create($array);
    public function update($array);
    public function delete($id);
    public function getall();
}