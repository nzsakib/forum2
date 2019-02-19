<?php 

namespace App\Filters;

use App\User;

class ThreadFilters extends Filters
{
	protected $filters = ['by', 'popular'];
	/**
	 * Filter the query by given username
	 */
	protected function by(string $username) 
	{
		$user = User::where('name', $username)->firstOrFail();
		
		return $this->builder->where('user_id', $user->id);
	}

	protected function popular()
	{
		return $this->builder->orderBy('replies_count', 'desc');
	}
}