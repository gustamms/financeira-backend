<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AbstractRepository implements RepositoryInterface
{
    /**
     * @var string $class
     */
    protected $class;

    /**
     * @var Model $model
     */
    protected $model;

    /**
     * AbstractRepository constructor.
     */
    public function __construct()
    {
        if ($this->class) {
            $this->model = new $this->class();
        }
    }

    public function index()
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function get(int $id): ?Model
    {
        return $this->model::find($id);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function create(Request $request)
    {
        return $this->model::create($request->input());
    }

    /**
     * @param array $data
     * @param Model $model
     * @return Model
     */
    public function update(array $data, Model $model): Model
    {
        $model->fill($data)->save();
        return $model;
    }

    /**
     * @param $id
     * @return bool
     * @throws \Exception
     */
    public function delete(int $id): bool
    {
        return $this->model::destroy($id);
    }
}
