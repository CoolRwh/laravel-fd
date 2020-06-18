<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends BaserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $article = Article::query()->where('user_id',auth()->id())->orderBy('id','desc')->get();
        return view('web.article.index',compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('web.article.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //
        Article::query()->create(
            [
                'user_id' => auth()->id(),
                'title'   => $request->input('title'),
                'desc'    => $request->input('desc'),
                'pic'     => $request->input('pic'),
                'type'     => 0,
                'content' => $request->input('content')
            ]
        );
        session()->flash('success','添加成功！');
        return redirect()->route('article.index');
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
        $article = Article::query()->find($id);
        return view('web.article.edit',compact('article'));
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
        $res =  Article::query()->where('id',$id)
            ->update($request->only(['title','desc','pic','content']));
        if ($res) {
            session()->flash('success','ok');
            return redirect()->route('article.index');
        }else{
            session()->flash('error','no');
            return back();
        }
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
       $res =  Article::query()->where('id',$id)->delete();
       if ($res){
           return response()->json([
               'msg' => 'success',
               'code' =>1
           ]);
       }
    }
}
