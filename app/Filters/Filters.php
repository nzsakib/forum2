<?php 

namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class Filters 
{
	protected $request, $builder;

	protected $filters = [];

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function apply(Builder $builder) : Builder
	{
		$this->builder = $builder;

		foreach ($this->getFilters() as $filter => $value) {
			if(method_exists($this, $filter)) {
				$this->$filter($value);
			}
		}

		return $this->builder;
	}

	protected function getFilters() : array 
	{
		return $this->request->only($this->filters);
	}
}