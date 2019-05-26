<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;

session_start();

use Session;

class AdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->checkAdminAuth();
        return view('admin.admin_login');
    }

    public function adminLogin(Request $request) {

        $email = $request->admin_email;
        $password = $request->admin_password;

        $result = DB::table('admin')->where('admin_email', $email)->where('admin_password', md5($password))->first();
        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('/dashboard');
        } else {
            $exception = Session::put('exception', 'Email or Password invalid!!');
            return Redirect::to('/admin');
        }
    }

    public function checkAdminAuth() {
        $admin = Session::get('admin_id');
        if ($admin) {
            return Redirect::to('/dashboard')->send();
        } else {
            return;
        }
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }

}
