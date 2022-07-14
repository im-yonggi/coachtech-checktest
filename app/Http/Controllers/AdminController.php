<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    public function admin()
    {
        $items = Contact::all();
        $items = Contact::Paginate(10);
        return view('admin', ['items'=>$items]);
    }

    public function search(Request $request)
    {
        $query = Contact::query();

        if(!empty($request->fullname))
        {
            $query -> where('fullname', 'LIKE',"%{$request['fullname']}%");
        }

        if(!empty($request->gender))
        {
            $query -> where('gender', $request->gender);
        }

        if(!empty($request->from_date))
        {
            $query -> whereDate('created_at', '>=',$request->from_date);
        }

        if(!empty($request->until_date))
        {
            $query ->  whereDate('created_at', '<=',$request->until_date);
        }

        if(!empty($request->email))
        {
            $query -> where('email', 'LIKE',"%{$request->email}%");
        }

        $items = $query -> get();
        $items = $query -> Paginate(10);
        return view('admin',['items'=>$items]);
    }

    public function reset()
    {
        return redirect('/admin');
    }

    public function delete(Request $request)
    {
        Contact::find($request -> id)->delete();
        return redirect('/admin');
    }
}
