<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::paginate(5);
        return view('users.index',['users'=>$users]);
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
      
        $users= new User;
        $users->name=$request->name;
        $users->email=$request->email;
        $users->password=md5($request->name);
        $users->is_admin=$request->is_admin;
       $users->save();
        

        if($users){
            return redirect()->back()->with('User Create Succeffuly');
        }
        return redirect()->back()->with('User Fail Create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $users =User::find($id);
        if(!$users){
            return back()->with('Eroor','usre Not Found');

        }
        $users->update($request->all());
        return back()->with('Success','User update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $users =User::find($id);
        if(!$users){
            return back()->with('Eroor','usre Not Found');

        }
        $users->update($request->all());
        return back()->with('Success','User update Successfully');
    }
}
