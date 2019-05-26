<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\PrettyPrinter\Standard;
use DB;

session_start();

use Session;
use Symfony\Component\HttpFoundation\File\File;

class SuperAdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->checkAuth();
        $admin_home = view('admin.pages.admin_home');
        return view('admin.admin_master')->with('main_content', $admin_home);
    }

    public function addCategory() {
        $this->checkAuth();
        $add_category_page = view('admin.pages.admin_add_category');
        return view('admin.admin_master')->with('admin_main_content', $add_category_page);
    }

    public function saveCategory(Request $request) {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;
        DB::table('category')->insert($data);
        Session::put('message', 'Category Save Successfully!');
        return Redirect::to('/add-category');
    }

    public function manageCategory() {
        $this->checkAuth();
        $all_category = DB::table('category')->get();
        $manage_category_page = view('admin.pages.admin_manage_category')->with('all_category', $all_category);
        return view('admin.admin_master')->with('admin_main_content', $manage_category_page);
    }

    public function unpublishCategory($category_id) {
        //echo $category_id;
        DB::table('category')->where('category_id', $category_id)->update(['publication_status' => 0]);
        return Redirect::to('/manage-category');
    }

    public function publishCategory($category_id) {
        DB::table('category')->where('category_id', $category_id)->update(['publication_status' => 1]);
        return Redirect::to('/manage-category');
    }

    public function deleteCategory($category_id) {
        DB::table('category')->where('category_id', $category_id)->delete();
        return Redirect::to('/manage-category');
    }

    public function editCategory($category_id) {
        $category_info = DB::table('category')->where('category_id', $category_id)->first();
        $edit_category_page = view('admin.pages.admin_edit_category')->with('category_info', $category_info);
        return view('admin.admin_master')->with('admin_main_content', $edit_category_page);
    }

    public function updateCategory(Request $request) {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $category_id = $request->category_id;
        DB::table('category')->where('category_id', $category_id)->update($data);
        Session::put('message', 'Category Updated Successfully!');
        return Redirect::to('/manage-category');
    }

//****************** Blog            *************//
    public function addBlog() {
        $this->checkAuth();
        $all_category = DB::table('category')->get();
        $add_blog_page = view('admin.pages.admin_add_blog')->with('all_category', $all_category);
        return view('admin.admin_master')->with('admin_main_content', $add_blog_page);
    }

    public function savePost(Request $request) {
        $data = array();
        $data['post_title'] = $request->post_title;
        $data['category_id'] = $request->category_id;
        $data['post_short_description'] = $request->post_short_description;
        $data['post_long_description'] = $request->post_long_description;
        $data['author_name'] = $request->author_name;
        $data['publication_status'] = $request->publication_status;

        $files = $request->file('post_image');
        $file_name = $files->getClientOriginalName();
        $file_extension = $files->getClientOriginalExtension();
        $picture = date('His') . $file_name;
        $image_url = 'public/post_image/' . $picture;
        $destination_path = base_path() . '/public/post_image/';
        $success = $files->move($destination_path, $picture);
        if ($success) {
            $data['post_image'] = $image_url;
            DB::table('post')->insert($data);
            Session::put('message', 'Post Save Successfully!');
            return Redirect::to('/add-blog');
        } else {
            $error = $files->getErrorMessage();
        }
    }

    public function managePost() {
        $this->checkAuth();
        $all_post = DB::table('post')->get();
        $manage_post_page = view('admin.pages.admin_manage_post')->with('all_post', $all_post);
        return view('admin.admin_master')->with('admin_main_content', $manage_post_page);
    }

    public function unpublishPost($post_id) {
        //echo $category_id;
        DB::table('post')->where('post_id', $post_id)->update(['publication_status' => 0]);
        return Redirect::to('/manage-blog');
    }

    public function publishPost($post_id) {
        DB::table('post')->where('post_id', $post_id)->update(['publication_status' => 1]);
        return Redirect::to('/manage-blog');
    }

    public function deletePost($post_id) {
        DB::table('post')->where('post_id', $post_id)->delete();
        return Redirect::to('/manage-blog');
    }

    public function editPost($post_id) {
        $post_info = DB::table('post')->where('post_id', $post_id)->first();
        $all_category = DB::table('category')->get();
        $edit_post_page = view('admin.pages.admin_edit_post')->with('post_info', $post_info)->with('all_category', $all_category);
        return view('admin.admin_master')->with('admin_main_content', $edit_post_page);
    }

    public function updatePost(Request $request) {
        $data = array();
        $data['post_title'] = $request->post_title;
        $data['category_id'] = $request->category_id;
        $data['post_short_description'] = $request->post_short_description;
        $data['post_long_description'] = $request->post_long_description;
        $data['author_name'] = $request->author_name;
        $data['publication_status'] = $request->publication_status;
        $post_id = $request->post_id;

        if ($_FILES['post_image']['name'] == '') {
            $data['post_image'] = $request->post_image;
            DB::table('post')->where('post_id', $post_id)->update($data);
            Session::put('message', 'Post updated Successfully!');
            return Redirect::to('/manage-blog');
        } else {
            $files = $request->file('post_image');
            $file_name = $files->getClientOriginalName();
            $file_extension = $files->getClientOriginalExtension();
            $picture = date('His') . $file_name;
            $image_url = 'public/post_image/' . $picture;
            $destination_path = base_path() . '/public/post_image/';
            $success = $files->move($destination_path, $picture);

            if ($success) {
                $data['post_image'] = $image_url;
                DB::table('post')->where('post_id', $post_id)->update($data);
                Session::put('message', 'Post updated Successfully!');
                //unlink($data['post_image']);
                return Redirect::to('/manage-blog');
            } else {
                $error = $files->getErrorMessage();
            }
        }
    }

    public function logout() {
        Session::put('admin_name', '');
        Session::put('admin_id', '');
        Session::put('message', 'You are successfully Logout!');
        return Redirect::to('/admin');
    }

    public function checkAuth() {
        $admin = Session::get('admin_id');
        if ($admin) {
            return;
        } else {
            return Redirect::to('/admin')->send();
        }
    }

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
