<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Permission;

class AuthorizeMiddleware {

	public function __construct(Guard $auth, Permission $permission)
	{
		$this->auth = $auth;
		$this->permission = $permission;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user = $this->auth->user();

		$permissions = $this->permission->all();

		$uri = $request->route()->uri();

		foreach($permissions as $permission)
		{
			if( ! $user->can($permission->name) && $permission->route == $uri)
			{
				return redirect('/');
			}
		}

		return $next($request);
	}

}
