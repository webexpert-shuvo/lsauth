<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    //All Users Show

    public function index()
    {
        return view('backend.users');
    }
    //User Add

    public function create(Request $request)
    {

        /**
         * Profile Photo Upload
         */
        $fileuname = ' ';
        if($request -> hasFile('photo')){
            $file =  $request -> file('photo');
            $fileuname = md5(time()).'.'.$file->getClientOriginalExtension();
            $file -> move(public_path('media/users/') , $fileuname );

        }


        return User::create([
            'name'          => $request -> name,
            'uname'         => $request -> uname,
            'email'         => $request -> email,
            'cell'          => $request -> cell,
            'photo'         => $fileuname,
            'password'      => password_hash('1234', PASSWORD_DEFAULT),
        ]);

    }

    //All User Show

    public function allusers()
    {

        $allusers_data =  User::latest()->get();

        $output = '' ;
        $i = 1 ;
        foreach ($allusers_data as $users) {


            //Status show
            if($users -> status == 'Active'){
                $status_badge =   '<span class="badge badge-success">Active</span>';
            }else{
                $status_badge =   '<span class="badge badge-danger">Inactive</span>';
            }

            //Staus Update

            if($users -> status == 'Active'){
                $status_btn =     ' <a user_status="'.$users ->id.'"  class="btn btn-sm btn-danger status_btn_cls"  href="" ><i class="fa fa-eye-slash">  </i></a>';
            }else{
                $status_btn =     ' <a user_status="'.$users ->id.'"  class="btn btn-sm btn-success status_btn_cls"  href="" ><i class="fa fa-eye">  </i></a>';
            }

            $output .=  '<tr>';
            $output .=  '<td> '.$i.'</td>';
            $output .=  '<td> '.$users -> name.'</td>';
            $output .=  '<td> '.$users -> uname.'</td>';
            $output .=  '<td> '.$users -> email.'</td>';
            $output .=  '<td> '.$users -> cell.'</td>';
            $output .=  '<td> <img style="width:70px; height:70px;" src="media/users/'.$users -> photo.'"  /> </td>';
            $output .=  '<td> '.$status_badge.'</td>';
            $output .=  '<td> '.$status_btn.'
                        <a  user_edit="'.$users ->id.'"  class="btn btn-sm btn-info user_edit_cls  "  href="" ><i class="fa fa-edit"></i></a>
                        <a  user_edit="'.$users ->id.'"  class="btn btn-sm btn-danger user_delete_cls"  href="" ><i class="fa fa-trash"></i></a>
            </td>';
            $output .=  '</tr>';

            $i ++;
        }

        echo $output;

    }

    //User Update

    public function uupdate($id)
    {

        $finded_data =  User::find($id);

        if($finded_data -> status == 'Active'){

            $finded_data -> status = 'Inactive';
            $finded_data ->  update();

        }else{

            $finded_data -> status = 'Active';
            $finded_data ->  update();

        }

    }

    //User Modal Update

    public function updateform($id)
    {

       $users_edit =   User::find($id);
       return [

            'name'      => $users_edit -> name,
            'uname'     =>  $users_edit -> uname,
            'email'     =>  $users_edit -> email,
            'cell'     =>  $users_edit -> cell,
            'id'       => $users_edit -> id,
       ];
    }

    //User Update With Form

    public function updatewithform( Request $request)
    {

        $edit_id =     $request -> ueditid;

        $udata =  User::find($edit_id);


        $udata -> name  = $request -> name;
        $udata -> uname  = $request -> uname;
        $udata -> email  = $request -> email;
        $udata -> cell  = $request -> cell;
        $udata -> update();
    }

    //User Delete

    public function delete($id)
    {
        $deleted_id =    User:: find($id);
        $deleted_id -> delete();
    }





}
