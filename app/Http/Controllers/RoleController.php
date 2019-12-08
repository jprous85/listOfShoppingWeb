<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Util\Json;

class RoleController extends Controller
{

    public function view()
    {
        $user = Auth::user();
        return view('role.role', compact('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $roles = Role::all();
        return new JsonResponse([
            'data' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        try
        {
            $role = new Role();

            $role->role = $request->role;
            $role->save();

            return new JsonResponse(['data' => 'ok']);
        }
        catch (\Exception $e)
        {
            return new JsonResponse(['data' => $e]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        try{
            Role::findOrFail($id)->update($request->all());
            return new JsonResponse(['data' => 'ok']);
        }
        catch (\Exception $e) {
            return new JsonResponse(['data' => 'ko']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        try {
            Role::findOrFail($id)->delete();
            return new JsonResponse(['data' => 'ok']);
        }
        catch (\Exception $e) {
            return new JsonResponse(['data' => 'ko']);
        }
    }
}
