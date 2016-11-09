<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Auth;

class RolePermissionController extends Controller {

    /**
     * @var Role
     */
    private $role;
    /**
     * @var Permission
     */
    private $permission;

    /**
     * @param Role $role
     * @param Permission $permission
     */
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $roles = $this->role->where('level', '<=', Auth::user()->getLevelMax())->get();
        $permissions = $this->permission->all();
        return view('roles_permissions.index')->with(compact(['roles','permissions']));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $roles = $this->role->all();

        $levelMaxLoggedUser = Auth::user()->getLevelMax();

        foreach($roles as $role)
        {
            if( $role->level <= $levelMaxLoggedUser)
            {
                $permissions_sync = isset($input['roles'][$role->id]) ? $input['roles'][$role->id]['permissions'] : [];

                $role->permissions()->sync($permissions_sync);
            }
        }

        return redirect('admin/role_permission');
    }

}