<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Helpers\StorageHelper;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class UserController extends Controller
{

    private $storage;

    public function __construct(Request $request)
    {
        view()->composer('crm.layouts.link', function ($view){
            $view->with(['active_name' => 'users']);
        });
        $this->storage = new StorageHelper('avatar', $request->file('file'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = User::get();
       return view('crm.users', ['users' => $users]);
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


       $name = $this->storage->model(new User())->image()->saveImage();
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'avatar' => $name
        ]);

        return response()->redirectTo('/crm');
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
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        if(!$data['password']){
            unset($data['password']);
        }
        else{
            $data['password'] = Hash::make($data['password']);
        }

        $data['avatar'] = $this->storage->model(User::find($id))->image()->saveImage();
        User::where('id', $id)->update($data);

        return response()->redirectTo('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->storage->model(User::find($id))->destroyImage();
        User::destroy($id);
        return response()->redirectTo('/user');
    }
}
