<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Registration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $comments = Comment::all()->load(['author', 'post']);
        return view('comments.index')->with('comments', $comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create')->with('authors', Registration::all())->with('posts', Post::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ccontent' => 'required',
            'rid' => 'required',
            'pid' => 'required',
        ]);
        $comment  = new Comment();
        $comment->ccontent = $request['ccontent'];
        $comment->rid = $request['rid'];
        $comment->pid = $request['pid'];
        $comment->save();

        return redirect()->route('comments.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('comments.edit')->with('authors', Registration::all())->with('posts', Post::all())->with('comment', Comment::all()->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ccontent' => 'required',
            'rid' => 'required',
            'pid' => 'required',
        ]);
        $comment  = Comment::all()->find($id);
        $comment->ccontent = $request['ccontent'];
        $comment->rid = $request['rid'];
        $comment->pid = $request['pid'];
        $comment->save();

        return redirect()->route('comments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Comment::all()->find($id)->delete();

        return redirect()->route('comments.index');
    }
}
