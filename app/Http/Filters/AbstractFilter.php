<?php namespace App\Http\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter
{
    protected $request;
    protected $builder;

    protected $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function filter(Builder $builder)
    {
        foreach($this->getFilters() as $filter => $value)
        {
            $this->resolveFilter($filter)->filter($builder, $value);
        }
        $this->setBuilder($builder);
        return $this;
    }

    protected function setBuilder($builder)
    {
        $this->builder = $builder;
    }
    protected function getFilters()
    {
        return array_filter($this->request->only(array_keys($this->filters)));
    }

    protected function resolveFilter($filter)
    {
        return new $this->filters[$filter];
    }

    public function orderBy($sortBy,$direction)
    {
        return $this->builder->orderBy($sortBy,$direction);
    }
    public function sort($sortBy = 'id', $direction ='DESC' )
    {
        $sortBy = $this->request->input('sortBy', $sortBy);
        $direction = $this->request->input('direction', 'DESC');
        $this->builder->orderBy($sortBy,$direction);
        return $this;
    }
    public function paginate()
    {
        return $this->builder->paginate( 
            $this->request->input(
                'per_page',
                config('sede.items_per_page')
            )
        );
    }

}