<?php
/**
 * Created by PhpStorm.
 * User: Kevin Glatz
 * Date: 24.05.2017
 * Time: 13:04
 */

interface DatabaseObject{
    public function get($id);
    public function getList();
    public function create();
    public function save();
    public function delete();
}
