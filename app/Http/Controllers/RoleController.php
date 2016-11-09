<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller {

    private $role;
    private $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $roles = $this->role
            ->with('permissions')
            ->paginate(10);
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = $this->permission->all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'display_name' => 'required',
            'level' => 'required|unique:roles'
        ]);

        $role = $this->role->create($request->all());

        $role->savePermissions($request->get('perms'));

        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $role = $this->role->find($id);
        if($role->id == 1)
        {
            abort(403);
        }
        $permissions = $this->permission->all();
        $rolePerms = $role->permissions();
        return view('roles.edit', compact('role', 'permissions', 'rolePerms'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'display_name' => 'required',
            'level' => 'required']);

        $role = $this->role->find($id);
        $role->update($request->all());

        $role->savePermissions($request->get('perms'));

        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        if($id == 1)
        {
            abort(403);
        }

        $this->role->destroy($id);

        return redirect()->route('roles.index');
    }

}