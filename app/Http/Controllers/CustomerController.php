<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Jobs\NextJob;

class CustomerController extends Controller
{

    public function home()
    {
        $cruds = Customer::all();
        return view('home',compact('cruds'));
    }

    public function viewForm()
    {
        return view('form');
    }
    
    public function formIn(Request $request)
    {
        Customer::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
        ]);  
        return redirect('home');
     }
     
     public function nextQueue()
     {
        $users = Customer::all();
        $job = new NextJob($users,0);
         dispatch($job);
       
       return redirect('home');
     }
}
