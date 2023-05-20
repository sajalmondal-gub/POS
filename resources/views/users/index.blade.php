@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
            <div class="card">
                   <div class="card-header"> 
                    <a href="#" Style="float:right" class="btn "
                     data-bs-toggle="modal" data-bs-target="#adduser">
                    <i class="fa fa-plus"></i> Add New User</a></div>
                    <div class="card-body">
                        <table class=" table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td> {{ $key+1 }}</td>
                                    <td> {{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    
                                    <td>@if($user->is_admin==1)Admin
                                        @endif Cashire

                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editUser{{ $user->id }}"><i class="fa fa-edit">
                                                 </i> Edit</a>
                                                 <a href="#" class="btn btn-sm btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteUser{{ $user->id }}"> <i class="fa fa-trash"></i> remove</a>
                                        </div>
                                    </td>
                                    
                                </tr>

                                <!-- model of user details start-->

<div class="modal right fade" id="editUser{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="staticBackdropLabel">Edit User</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        {{ $user->id }}
      </div>
      <div class="modal-body">
        <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" id="" value="{{ $user->name}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" id="" value="{{ $user->email}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" id="" readonly value="{{ $user->password}}" class="form-control">
        </div>
       
        <div class="form-group">
            <label for="">Role</label>
             <select name="is_admin" id=""  class="form-control">
                <option value="1" @if($user->is_admin == 1) 
                    selected 
                  @endif >Admin</option>
                <option value="2" @if($user->is_admin == 1) 
                    selected 
                    @endif >Cashire</option>
             </select>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary btn-block">Update</button>
        </div>
        </form>

        
      </div>
      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
-->
    </div>
  </div>
</div>
<!-- model of user details end-->

                          <!-- remove  start-->

                          <div class="modal right fade" id="deleteUser{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="staticBackdropLabel">Delete User</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        {{ $user->id }}
      </div>
      <div class="modal-body">
        <form action="{{ route('users.destroy', $user->id) }}" method="post">
        @csrf
        @method('delete')
       
        <p>Are you sure? {{ $user->name}} </p>
        <div class="modal-footer">
            <button class="btn btn-primary btn-block" data-dismis="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btn-block" >remove</button>
        </div>
        </form>

        
      </div>
   
    </div>
  </div>
</div>
<!-- remove end-->

                                @endforeach
                            </tbody>
                        </table>
                    
                    </div>
            </div>

            </div>
            <div class="col-md-3">
            <div class="card">
                   <div class="card-header"> <h4>Search user</h4></div>
                    <div class="card-body">
                       
                    ...........
                    </div>
            </div>
            </div>
          
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal right fade" id="adduser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="staticBackdropLabel">Add User</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Phone</label>
            <input type="text" name="Phone" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" name="confirm_password" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Role</label>
             <select name="is_admin" id="" class="form-control">
                <option value="1">Admin</option>
                <option value="2">Cashire</option>
             </select>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary btn-block">Save</button>
        </div>
        </form>

        
      </div>
      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
-->
    </div>
  </div>
</div>



<Style>

    .modal.right .modal-dialog{
        top:0;
        right:0;
        margin-right:18vh;
    }
    .modal.fade:not(.in).right .modal-dialog{
        -webkit-transform:translate3d(25%,0,0);
        transform:translate3d(25%,0,0);
    }
</Style>
@endsection