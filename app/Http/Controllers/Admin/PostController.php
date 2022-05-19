<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{

    private function getValidator($model) {
        return [
            'title'      => 'required|max:100',
            'image'      => 'required|url|max:100',
            'content'    => 'required',
            'slug'       => [
                'required',
                Rule::unique('posts')->ignore($model),
                'max:100'
            ],
        ];
    }

    public function index()
    {
        $elements = Post::paginate(20);
        return view('admin.posts.index', compact('elements'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->getValidator(null));

        $post = Post::create($request->all());

        return redirect()->route('admin.posts.show', $post->slug)->with('status', 'Completed with success!');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate($this->getValidator($post));

        $post->update($request->all());

        return redirect()->route('admin.posts.show', $post->slug)->with('status', 'Completed with success!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('deleted', 'Deleted comic id: ' . $post->id);
    }
}
