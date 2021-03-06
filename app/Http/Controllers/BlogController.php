<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repository\Blogs\PostsInterface;

class BlogController extends Controller
{

    public $Posts;

    public function __construct(PostsInterface $PostsInterface)
    {
        $this->Posts = $PostsInterface;//构造函数的注入等于下面make
        // $PostsInterface = app()->make(PostsInterface::class);

        # code...
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        list($count, $list) = $this->Posts->index($request);
        // \DB::connection()->enableQueryLog();
        $notice = $this->Posts->getNotice();
        // $log = \DB::getQueryLog();
        return view('blog.index', ['list' => $list, 'count' => $count, 'notice' => $notice]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $show = $this->Posts->show($id);

        if(empty($show)) {
            return redirect('blog');
        }

        return view('blog.show', ['show' => $show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
