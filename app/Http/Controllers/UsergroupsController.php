<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Usergroup;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class UsergroupsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usergroups = Usergroup::latest()->get();
		return view('admin.usergroups.index', compact('usergroups'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.usergroups.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		usergroup::create($request->all());
		return redirect('admin/usergroups')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$usergroup = Usergroup::findOrFail($id);
		return view('admin.usergroups.show', compact('usergroup'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usergroup = Usergroup::findOrFail($id);
		return view('admin.usergroups.edit', compact('usergroup'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if needed.
		$usergroup = Usergroup::findOrFail($id);
		$usergroup->update($request->all());
		return redirect('admin/usergroups')->with('success', Lang::get('message.success.update'));
	}

	/**
    	 * Delete confirmation for the given Usergroup.
    	 *
    	 * @param  int      $id
    	 * @return View
    	 */
    	public function getModalDelete($id = null)
    	{
            $error = '';
            $model = '';
            $confirm_route =  route('admin.usergroups.delete',['id'=>$id]);
            return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

    	}

    	/**
    	 * Delete the given Usergroup.
    	 *
    	 * @param  int      $id
    	 * @return Redirect
    	 */
    	public function getDelete($id = null)
    	{
    		$usergroup = Usergroup::destroy($id);

            // Redirect to the group management page
            return redirect('admin/usergroups')->with('success', Lang::get('message.success.delete'));

    	}

}