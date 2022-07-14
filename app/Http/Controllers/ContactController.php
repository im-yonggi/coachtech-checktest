<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $item = '';
        return view('index', ['item'=>$item]);
    }
    // お問い合わせページに初期でアクセスした状態では、$itemを空で渡す

    public function confirm(Request $request)
    {
        $postcode = mb_convert_kana($request->postcode, "ah" );
        $request['postcode'] = $postcode;
        $this -> validate($request, Contact::$rules);
        $item = $request -> all();
        return view('confirmation', ['item'=>$item]);
    }

    public function send(Request $request)
    // confirmationページのhiddenフォームで送られたお問い合わせ情報を受け取る
    {
        // 既にconfirmアクションの段階でvalidationはクリアしている為、sendアクションでは不要
        $lastname = $request -> last_name;
        $firstname = $request -> first_name;
        $fullname = $lastname." ".$firstname;
        unset($request['first_name']);
        unset($request['last_name']);
        $item = $request -> all();
        $item['fullname'] = $fullname;
        Contact::create($item);
        return redirect('/thanks');
    }

    public function revise(Request $request)
    {
        $item = $request -> all();
        return view('index', ['item'=>$item]);
    }

    public function thanks()
    {
        return view('thanks');
    }
    
}
