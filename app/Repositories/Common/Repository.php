<?php
/**
 * Created by PhpStorm.
 * User: DOTO OSEBAGA
 * Date: 10/25/2018
 * Time: 1:54 PM
 */

namespace App\Repositories\Common;


use Illuminate\Database\Eloquent\Model;

class Repository implements IRepository
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model=$model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
    public function findWhere($column,$value)
    {
        return $this->model->where($column,'=',$value);
    }
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

    public function update(array $data, $id)
    {
        $record=$this->find($id);
        return $record->update($data);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
    public function delete($column,$value)
    {
      return $this->model->where($column,$value)->delete();
    }

    public function getModel(){
        return $this->model;
    }

    public function setModel($model){
        $this->model=$model;
        return $this;
    }
    public function with($relations){
        return $this->model->with($relations);
    }
}