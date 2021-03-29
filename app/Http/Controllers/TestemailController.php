<?php

namespace App\Http\Controllers;

use App\Mail\Testmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestemailController extends Controller
{
    //Test Email Controller

    public function testEmail()
    {
       $emailData = [

            'name'      => 'testemail',
            'content'   => 'This Is Test Email content',
            'cell'      => '01714461547',
            'address'   => 'natore',
       ];

       Mail::to('cushytools20@gmail.com')->send(new Testmail($emailData));


    }

}
