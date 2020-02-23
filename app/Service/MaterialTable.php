<?php

namespace App\Service;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class MaterialTable
{
    protected $pageSize;
    protected $order;
    protected $orderField = 'id';
    protected $request;
    protected $builder;
    protected $columns;
    protected $page;

    public function __construct(Request $request, Builder $builder)
    {
        $this->request = $request;
        $this->builder = $builder;
        $this->pageSize = ($request->has('pageSize') && !empty($request->get('pageSize'))) ? (int)$request->get('pageSize') : 15;
        $this->order = ($request->has('orderDirection') && !empty($request->get('orderDirection'))) ? $request->get('orderDirection') : 'asc';
        $this->page = ($request->has('page') && !empty($request->get('page'))) ? (int)$request->get('page') : 1;
    }

    public function setColumns(array $columns = []): self
    {
        $this->columns = $columns;
        return $this;
    }

    protected function search(): void
    {
        if ($this->request->has('search') && !empty($this->request->get('search'))) {
            $search = $this->request->get('search');
            $this->builder->whereLike($this->columns, $search);
        }
    }

    protected function orderBy(): void
    {
        if ($this->request->has('orderBy') && !empty($this->request->get('orderBy'))) {
            $data = json_decode($this->request->get('orderBy'), true);
            $this->orderField = $data['field'];
        }

        $this->builder->orderBy($this->orderField, $this->order);
    }

    public function pagination()
    {
        $this->search();
        $this->orderBy();

        return $this->builder->paginate($this->pageSize, ['*'], 'page', $this->page);
    }
}
