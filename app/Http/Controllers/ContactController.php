<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $item = '';
        return view('index', ['item'=>$items]);
    }
    // お問い合わせページに初期でアクセスした状態では、$itemを空で渡す

    public function confirm(Request $request)
    {
        $this -> validate($request, Contact::$rules);
        $item = $request -> all();
        return view('confirmation', ['item'=>$item]);
    }

    public function send(Request $request)
    // confirmationページのhiddenフォームで送られたお問い合わせ情報を受け取る
    {
        // 既にconfirmアクションの段階でvalidationはクリアしている為、sendアクションでは不要
        $item = $request -> all();
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
