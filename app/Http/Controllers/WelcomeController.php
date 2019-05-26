<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $published_post = DB::table('post')->where('publication_status', 1)->orderBy('post_id', 'desc')->get();
        $home = view('pages.home')->with('published_post', $published_post);
        return view('maseter')->with('main_content', $home);
    }

    public function postDetails($post_id) {
        $post_info = DB::table('post')->where('post_id', $post_id)->first();
        $data['hit_counter'] = $post_info->hit_counter + 1;
        DB::table('post')->where('post_id', $post_id)->update($data);
        $post_deatils = view('pages.post_details')->with('post_info', $post_info);
        return view('maseter')->with('main_content', $post_deatils);
    }

    public function categoryBlog($category_id) {
        $published_post = DB::table('post')->where('publication_status', 1)->where('category_id', $category_id)->orderBy('post_id', 'desc')->get();
        $home = view('pages.home')->with('published_post', $published_post);
        return view('maseter')->with('main_content', $home);
    }

    public function contact() {
        $contact = view('pages.contact');
        return view('maseter')->with('main_content', $contact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
