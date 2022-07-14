<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $rules = array(
        'first_name' =>'required',
        'last_name' =>'required',
        // fullnameはインプットしないため、Validationは不要
        'gender' => 'required',
        // ViewでFormを作成の際、1 or 2のみPostするように設定するため、Validationはrequired以外不要。
        'email' => 'required|email',
        'postcode' =>  'required|postcode',
        // 数値3桁 - 数値4桁の正規表現チェック→serviceproviderを自作
        'address' => 'required',
        'building_name' => 'nullable',
        'opinion' => 'required|max:120',
    );
}
