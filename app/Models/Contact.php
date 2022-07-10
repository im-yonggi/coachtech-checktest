<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $rules = array(
        'fullname' => 'required',
        'gender' => 'required',
        // ViewでFormを作成の際、1 or 2のみPostするように設定するため、Validationはrequired以外不要。
        'email' => 'required|email',
        'postcode' =>  'regex:/^[0-9]{3}-[0-9]{4}$/',
        // 数値3桁 - 数値4桁の正規表現チェック
        'address' => 'required',
        'building_name' => 'nullable',
        'opinion' => 'max:120',
    );
}
