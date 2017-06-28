<?php namespace App\Http\Controllers;


use Sentinel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Eventcategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class EventcategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Sentinel::check()) {
			if (Sentinel::inRole('admin')) {
				$eventcategories = Eventcategory::latest()->get();
				return view('admin.eventcategories.index', compact('eventcategories'));
			}
		}
		else if (Sentinel::check()) {
			if (Sentinel::inRole('user')) {
				$eventcategories = Eventcategory::latest()->get();
				return view('admin.eventcategories.index', compact('eventcategories'));
			}
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.eventcategories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		eventcategory::create($request->all());
		return redirect('admin/eventcategories')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$eventcategory = Eventcategory::findOrFail($id);
		return view('admin.eventcategories.show', compact('eventcategory'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$eventcategory = Eventcategory::findOrFail($id);
		return view('admin.eventcategories.edit', compact('eventcategory'));
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
		$eventcategory = Eventcategory::findOrFail($id);
		$eventcategory->update($request->all());
		return redirect('admin/eventcategories')->with('success', Lang::get('message.success.update'));
	}

	/**
    	 * Delete confirmation for the given Eventcategory.
    	 *
    	 * @param  int      $id
    	 * @return View
    	 */
    	public function getModalDelete($id = null)
    	{
            $error = '';
            $model = '';
            $confirm_route =  route('admin.eventcategories.delete',['id'=>$id]);
            return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

    	}

    	/**
    	 * Delete the given Eventcategory.
    	 *
    	 * @param  int      $id
    	 * @return Redirect
    	 */
    	public function getDelete($id = null)
    	{
    		$eventcategory = Eventcategory::destroy($id);

            // Redirect to the group management page
            return redirect('admin/eventcategories')->with('success', Lang::get('message.success.delete'));

    	}

}