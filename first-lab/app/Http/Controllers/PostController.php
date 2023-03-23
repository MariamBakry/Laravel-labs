<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $allPosts = [
            [
                'id' => 1,
                'title' => 'Laravel',
                'posted_by' => 'Mariam',
                'created_at' => '2023-03-02 10:00:00'
            ],
            [
                'id' => 2,
                'title' => 'PHP',
                'posted_by' => 'Muhammad',
                'created_at' => '2021-11-20 11:00:00'
            ],
            [
                'id' => 3,
                'title' => 'Javascript',
                'posted_by' => 'Bakry',
                'created_at' => '2022-08-01 12:00:00'
            ]
        ];

        return view('post.index', ['posts' => $allPosts]);
    }

    public function create(){
        $allPosts = [
            [
                'id' => 1,
                'title' => 'Laravel',
                'posted_by' => 'Mariam',
                'created_at' => '2023-03-02 10:00:00'
            ],
            [
                'id' => 2,
                'title' => 'PHP',
                'posted_by' => 'Muhammad',
                'created_at' => '2021-11-20 11:00:00'
            ],
            [
                'id' => 3,
                'title' => 'Javascript',
                'posted_by' => 'Bakry',
                'created_at' => '2022-08-01 12:00:00'
            ]
        ];
        return view('post.create', ['posts' => $allPosts]);
    }

    public function store(){
        return to_route('posts.index');
    }

    public function edit(){
        $allPosts = [
            [
                'id' => 1,
                'title' => 'Laravel',
                'posted_by' => 'Mariam',
                'created_at' => '2023-03-02 10:00:00'
            ],
            [
                'id' => 2,
                'title' => 'PHP',
                'posted_by' => 'Muhammad',
                'created_at' => '2021-11-20 11:00:00'
            ],
            [
                'id' => 3,
                'title' => 'Javascript',
                'posted_by' => 'Bakry',
                'created_at' => '2022-08-01 12:00:00'
            ]
        ];
        return view('post.edit', ['posts' => $allPosts]);
    }

    public function update(){
        return to_route('posts.index');
    }


    public function show($id){

        $post = [
            'id' => 2,
            'title' => 'PHP',
            'posted_by' => 'Muhammad',
            'created_at' => '2021-11-20 11:00:00',
            'description' => 'Hello from PHP'
        ];
        return view('post.show', ['post' => $post]);
    }

}
