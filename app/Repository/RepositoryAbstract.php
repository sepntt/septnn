<?php

namespace App\Repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
* 
*/
abstract class RepositoryAbstract
{
	
	public $model;

	public $paginate = 10;

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$where = [];
		$model = $this->model::where($where)->orderBy('updated_at', 'desc');
		$res = [$model->count(), $model->paginate($this->paginate)];
		return $res;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$model = new $this->model($request->post());
		if($model->save()) {
			return $model->id;
		}
		return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		return $this->model::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	return $this->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$model = new $this->model;
    	return $model->where('id', $id)->update($request->only($model->fillable));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->model::destroy($id);
    }


    public function model($model = false)
    {
        if($model) {
            $this->model = $model;
        }
        return $this->model;
    }

	public function test($request)
	{
		dd($request->post());
		\DB::connection()->enableQueryLog();
		$model = $this->model::find(1);
		if(empty($model)) {
			dd(1);
			$model->create($request->post());
		}
		// dd(\DB::getQueryLog());
		return $model->save($request->post());
	}
}