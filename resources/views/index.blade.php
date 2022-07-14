@extends('layout.parent')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
</head>
<body>
  <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
  <!-- 郵便番号から住所自動検索用のOpen resourceを読み込み -->
  <h1 class="title">お問い合わせ</h1>

  @empty($item)
  <form class="h-adr" action="/confirm" method="post">
    @csrf
    <span class="p-country-name" style="display:none;">Japan</span>
    <table class="contact__form">
      <tr class="contact__form__row">
        <th class="contact__form__title">お名前<span>※</span></th>
        <td class="contact__form__half-content"><input type="text" class="form__half-box" name="last_name" value = "{{old('last_name')}}"></td>
        <td class="contact__form__half-content"><input type="text" class="form__half-box" name="first_name" value = "{{old('first_name')}}"></td>
      </tr>
      @if($errors->has('last_name') && $errors->has('first_name'))
      <tr class="contact__form__row">
        <th class="contact__form__title error__message">↑エラー</th>
        <td class="error__message">入力内容に誤りがあります。</td>
        <tdclass="error__message">入力内容に誤りがあります。</td>
      </tr>
      @elseif($errors->has('last_name'))
      <tr class="contact__form__row">
        <th class="contact__form__title error__message">↑エラー</th>
        <td class="error__message">入力内容に誤りがあります。</td>
        <td></td>
      </tr>
      @elseif($errors->has('first_name'))
      <tr class="contact__form__row">
        <th class="contact__form__title error__message">↑エラー</th>
        <td></td>
        <td class="error__message">入力内容に誤りがあります。</td>
      </tr> 
      @endif
      <tr>
        <th></th>
        <td class="contact__form__content__sample">例）山田</td>
        <td class="contact__form__content__sample">例）太郎</td>
      </tr>
      <tr class="contact__form__row">
        <th class="contact__form__title">性別<span>※</span></th>
        <td colspan="2" class="contact__form__content"><input type="radio" class="form__check-box" value="1" id="button__1" name="gender" {{old('gender') == 1 ? 'checked' : '' }}><label for="button__1">男性</label><input type="radio" name="gender" class="form__check-box" value="2" id="button__2" {{old('gender') == 2 ? 'checked' : '' }}><label for="button__2">女性</label></td>
      </tr>
      @if($errors -> has('gender'))
      <tr class="contact__form__row">
        <th class="contact__form__title error__message">↑エラー</th>
        <td colspan="2" class="error__message">いずれかを選択してください。</td>
      </tr>
      @endif
      <tr class="contact__form__row">
        <th class="contact__form__title">メールアドレス<span>※</span></th>
        <td colspan="2" class="contact__form__content"><input type="email" class="form__box" name="email" value = "{{old('email')}}"></td>
      </tr>
      @if($errors -> has('email'))
      <tr class="contact__form__row">
        <th class="contact__form__title error__message">↑エラー</th>
        <td colspan="2" class="error__message">入力内容に誤りがあります。</td>
      </tr>
      @endif
      <tr>
        <th></th>
        <td colspan="2" class="contact__form__content__sample">例）test@example.com</td>
      </tr>
      <tr class="contact__form__row">
        <th class="contact__form__title">郵便番号<span>※</span></th>
        <td colspan="2" class="contact__form__content"><span class="post__icon">〒</span><input type="text" class="form__box p-postal-code" name="postcode" value = "{{old('postcode')}}"></td>
      </tr>
      @if($errors -> has('postcode'))
      <tr class="contact__form__row">
        <th class="contact__form__title error__message">↑エラー</th>
        <td colspan="2" class="error__message">入力内容に誤りがあります。ハイフンも入力してください。</td>
        <!--全角で入力時も、半角には自動で変更されるため、エラーメッセージはハイフンに対するCautionのみ -->
      </tr>
      @endif
      <tr>
        <th></th>
        <td colspan="2" class="contact__form__content__sample"><span class="post__icon--blank"></span>例）123-4567</td>
      </tr>
      <tr class="contact__form__row">
        <th class="contact__form__title">住所<span>※</span></th>
        <td colspan="2" class="contact__form__content"><input type="text" class="form__box p-region p-locality p-street-address p-extended-address" name="address" value = "{{old('address')}}"></td>
      </tr>
      @if($errors->has('address'))
      <tr class="contact__form__row">
        <th class="contact__form__title error__message">↑エラー</th>
        <td colspan="2" class="error__message">入力内容に誤りがあります。</td>
      </tr>
      @endif
      <tr>
        <th></th>
        <td colspan="2" class="contact__form__content__sample">例）東京都渋谷区千駄ヶ谷1-2-3</td>
      </tr>
      <tr class="contact__form__row">
        <th class="contact__form__title">建物名</th>
        <td colspan="2" class="contact__form__content"><input type="text" class="form__box" name="building_name" value="{{old('building_name')}}"></td>
      </tr>
      <tr>
        <th></th>
        <td colspan="2" class="contact__form__content__sample">例）千駄ヶ谷マンション101</td>
      </tr>
      <tr class="contact__form__row">
        <th class="contact__form__title">ご意見<span>※</span></th>
        <td colspan="2" class="contact__form__content"><textarea name="opinion" class="form__box" cols="30" rows="5" >{{old('opinion')}}</textarea></td>
      </tr>
      @if($errors -> has('opinion'))
      <tr class="contact__form__row">
        <th class="contact__form__title error__message">↑エラー</th>
        <td colspan="2" class="error__message">120文字以内で必ずご記入ください。</td>
      </tr>
      @endif
    </table>
    <div class="submit__button"><button class="send__button">確認</button></div>
  </form>

  <!-- confirmation.blade.phpで修正をクリックした場合は、$itemに情報が入っているため、以下の処理 -->
  @else
  <form class="h-adr" action="/confirm" method="post">
    <span class="p-country-name" style="display:none;">Japan</span>
    @csrf
    <table class="contact__form">
      <tr class="contact__form__row">
        <th class="contact__form__title">お名前<span>※</span></th>
        <td class="contact__form__half-content"><input type="text" class="form__half-box" name="last_name" value = "{{old('last_name', $item['last_name'])}}"></td>
        <td class="contact__form__half-content"><input type="text" class="form__half-box" name="first_name" value = "{{old('first_name', $item['first_name'])}}"></td>
      </tr>
      @if($errors->has('last_name') && $errors->has('first_name'))
      <tr class="contact__form__row">
        <th class="contact__form__title error__message">↑エラー</th>
        <td class="error__message">入力内容に誤りがあります。</td>
        <tdclass="error__message">入力内容に誤りがあります。</td>
      </tr>
      @elseif($errors->has('last_name'))
      <tr class="contact__form__row">
        <th class="contact__form__title error__message">↑エラー</th>
        <td class="error__message">入力内容に誤りがあります。</td>
        <td></td>
      </tr>
      @elseif($errors->has('first_name'))
      <tr class="contact__form__row">
        <th class="contact__form__title error__message">↑エラー</th>
        <td></td>
        <td class="error__message">入力内容に誤りがあります。</td>
      </tr> 
      @endif
      <tr>
        <th></th>
        <td class="contact__form__content__sample">例）山田</td>
        <td class="contact__form__content__sample">例）太郎</td>
      </tr>
      @if($item['gender'] == 1)
      <tr class="contact__form__row">
        <th class="contact__form__title">性別<span>※</span></th>
        <td colspan="2" class="contact__form__content"><input type="radio" class="form__check-box" value="1" id="button__1" name="gender" {{old('gender') == 1 ? 'checked' : '' }} checked><label for="button__1">男性</label><input type="radio" name="gender" class="form__check-box" value="2" id="button__2" {{old('gender') == 2 ? 'checked' : '' }}><label for="button__2">女性</label></td>
      </tr>
      @endif
      @if($item['gender'] == 2)
      <tr class="contact__form__row">
        <th class="contact__form__title">性別<span>※</span></th>
        <td colspan="2" class="contact__form__content"><input type="radio" class="form__check-box" value="1" id="button__1" name="gender" ><label for="button__1">男性</label><input type="radio" name="gender" class="form__check-box" value="2" id="button__2" checked><label for="button__2">女性</label></td>
      </tr>
      @endif
      @if($errors -> has('gender'))
      <tr class="contact__form__row">
        <th class="contact__form__title error__message">↑エラー</th>
        <td colspan="2" class="error__message">いずれかを選択してください。</td>
      </tr>
      @endif
      <!-- ifで$item->Xなら男をchecked、といった形で条件分岐 -->
      <tr class="contact__form__row">
        <th class="contact__form__title">メールアドレス<span>※</span></th>
        <td colspan="2" class="contact__form__content"><input type="email" class="form__box" name="email" value = "{{old('email', $item['email'])}}"></td>
      </tr>
      @if($errors -> has('email'))
      <tr class="contact__form__row">
        <th class="contact__form__title error__message">↑エラー</th>
        <td colspan="2" class="error__message">入力内容に誤りがあります。</td>
      </tr>
      @endif
      <tr>
        <th></th>
        <td colspan="2" class="contact__form__content__sample">例）test@example.com</td>
      </tr>
      <tr class="contact__form__row">
        <th class="contact__form__title">郵便番号<span>※</span></th>
        <td colspan="2" class="contact__form__content"><span class="post__icon">〒</span><input type="text" class="form__box  p-postal-code" name="postcode" value = "{{old('postcode', $item['postcode'])}}"></td>
      </tr>
      @if($errors -> has('email'))
      <tr class="contact__form__row">
        <th class="contact__form__title error__message">↑エラー</th>
        <td colspan="2" class="error__message">入力内容に誤りがあります。</td>
      </tr>
      @endif
      <tr>
        <th></th>
        <td colspan="2" class="contact__form__content__sample"><span class="post__icon--blank"></span>例）123-4567</td>
      </tr>
      <tr class="contact__form__row">
        <th class="contact__form__title">住所<span>※</span></th>
        <td colspan="2" class="contact__form__content"><input type="text" class="form__box p-region p-locality p-street-address p-extended-address" name="address" value = "{{old('address', $item['address'])}}"></td>
      </tr>
      @if($errors->has('address'))
      <tr class="contact__form__row">
        <th class="contact__form__title error__message">↑エラー</th>
        <td colspan="2" class="error__message">入力内容に誤りがあります。</td>
      </tr>
      @endif
      <tr>
        <th></th>
        <td colspan="2" class="contact__form__content__sample">例）東京都渋谷区千駄ヶ谷1-2-3</td>
      </tr>
      <tr class="contact__form__row">
        <th class="contact__form__title">建物名</th>
        <td colspan="2" class="contact__form__content"><input type="text" class="form__box" name="building_name" value="{{old('building_name', $item['building_name'])}}"></td>
      </tr>
      <tr>
        <th></th>
        <td colspan="2" class="contact__form__content__sample">例）千駄ヶ谷マンション101</td>
      </tr>
      <tr class="contact__form__row">
        <th class="contact__form__title">ご意見<span>※</span></th>
        <td colspan="2" class="contact__form__content"><textarea name="opinion" class="form__box" cols="30" rows="5">{{old('opinion', $item['opinion'])}}</textarea></td>
      </tr>
      @if($errors -> has('opinion'))
      <tr class="contact__form__row">
        <th class="contact__form__title error__message">↑エラー</th>
        <td colspan="2" class="error__message">120文字以内で必ずご記入ください。</td>
      </tr>
      @endif
    </table>
    <div class="submit__button"><button type="submit" class="send__button">確認</button></div>
  </form>
  @endempty
</body>
</html>