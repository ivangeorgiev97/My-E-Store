<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;
use App;

abstract class BaseRepository {

    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function getAll() {
        return $this->model::all();
    }

    public function getById($id) {
        // return $this->model::where('id',$id)->get();
        return $this->model::find($id);
    }

    public function getLastOne() {
        return $this->model::orderBy('id', 'desc')->first();
    }

    public function add($resource) {
        $this->model::create($resource);
    }

    public function update($resource) {
        $resource->save();
    }

    public function delete($resource) {
        $resource->delete();
    }

}
