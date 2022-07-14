@extends('layout.parent')

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmation</title>
</head>

<body>
  <h1 class="title">内容確認</h1>

  <table class="contact__form">
    <tr class="contact__form__row">
      <th class="contact__form__title">お名前</th>
      <td class="contact__form__content">{{$item['last_name']}} {{$item['first_name']}}</td>
    </tr>
    <tr class="contact__form__row">
      <th class="contact__form__title">性別</th>
      @if($item['gender'] == "1")
      <td class="contact__form__content">男性</td>
      @elseif($item['gender'] == "2")
      <td class="contact__form__content">女性</td>
      @endif
    </tr>
    <tr class="contact__form__row">
      <th class="contact__form__title">メールアドレス</th>
      <td class="contact__form__content">{{$item['email']}}</td>
    </tr>
    <tr class="contact__form__row">
      <th class="contact__form__title">郵便番号</th>
      <td class="contact__form__content">{{$item['postcode']}}</td>
    </tr>
    <tr class="contact__form__row">
      <th class="contact__form__title">住所</th>
      <td class="contact__form__content">{{$item['address']}}</td>
    </tr>
    <tr class="contact__form__row">
      <th class="contact__form__title">建物名</th>
      @if($item !== null)
      <td class="contact__form__content">{{$item['building_name']}}</td>
      @else
      <td></td>
      @endif
    </tr>
    <tr class="contact__form__row">
      <th class="contact__form__title">ご意見</th>
      <td class="contact__form__content">{{$item['opinion']}}</td>
    </tr>
  </table>
  <form action="/send" method="post">
  @csrf
    <input type="hidden" name="last_name" value="{{$item['last_name']}}">
    <input type="hidden" name="first_name" value="{{$item['first_name']}}">
    <input type="hidden" name="gender" value="{{$item['gender']}}">
    <input type="hidden" name="email" value="{{$item['email']}}">
    <input type="hidden" name="postcode" value="{{$item['postcode']}}">
    <input type="hidden" name="address" value="{{$item['address']}}">
    <input type="hidden" name="building_name" value="{{$item['building_name']}}">
    <input type="hidden" name="opinion" value="{{$item['opinion']}}">
    <div class="submit__button"><button class="send__button">送信</button></div>
  </form>
  <form action="/revise" method="post">
  @csrf
    <input type="hidden" name="last_name" value="{{$item['last_name']}}">
    <input type="hidden" name="first_name" value="{{$item['first_name']}}">
    <input type="hidden" name="gender" value="{{$item['gender']}}">
    <input type="hidden" name="email" value="{{$item['email']}}">
    <input type="hidden" name="postcode" value="{{$item['postcode']}}">
    <input type="hidden" name="address" value="{{$item['address']}}">
    <input type="hidden" name="building_name" value="{{$item['building_name']}}">
    <input type="hidden" name="opinion" value="{{$item['opinion']}}">
    <div class="submit__button"><button class="revise__button">修正する</button></div>
  </form>
</body>
</html>