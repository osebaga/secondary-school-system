<?php
/**
 * Created by PhpStorm.
 * User: DOTO OSEBAGA
 * Date: 10/25/2018
 * Time: 1:52 PM
 */

namespace App\Repositories\Common;


interface IRepository
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function insert(array $data);
    public function update(array  $data,$id);
    public function  delete($column,$value);
    public function  destroy($id);
}