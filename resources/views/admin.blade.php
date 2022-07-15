<style>
  .title {
  text-align: center;
}

.search__container{
  width: 90%;
  border: 2px solid;
  margin: 0 auto 48px auto;
  padding: 10px 24px 10px 24px;
}

table{
  width: 100%;
  border-collapse: collapse;
}

.search__row{
  height: 100px;
  width: 100%;
}

.search__title{
  text-align: left;
  width: 12%;
  font-size: 18px;
}

.search__content__first-line{
  width: 40%;
}

.search__check-box {
  width: 36px;
  height: 36px;
  vertical-align: middle;
  accent-color:black;
}

label{
  margin-right: 20px;
  vertical-align: middle;
}

.search__content__box{
  width: 320px;
  height: 48px;
  font-size: 18px;
  border-radius: 5px;
  border: 2px solid #afafb0;
}

td > span{
  font-size: 18px;
  margin: 0 10px 0 10px;
}

.button {
  width: 15%;
  height: 60px;
  margin: 20px auto 10px auto;
}

.search__button {
  width: 100%;
  margin: 0 auto;
  background-color: black;
  color: white;
  font-weight: bold;
  cursor: pointer;
  height: 100%;
  border-radius: 5px;
  font-size: 20px;
}

.reset__anker{
  margin: 0 auto 0 auto;
  width: 10%;
  display: block;
  color: black;
  text-align: center;
}

/* Search__container終わり */

.list__container {
  width: 90%;
  margin: 0 auto;
}

.list__title__row, .list__content__row{
  height: 60px;
}

.list__title, .opinion__title{
  border-bottom: 2px solid;
}

.list__content, .opinion__content{
  text-align: center;
}

.opinion__content{
  text-align: left;
  width: 450px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 25em;
}

.opinion__content:hover{
  overflow: visible;
  word-break: break-all;
  white-space: normal;
}

.pagination__container{
  display:flex;
  justify-content: space-between;
  width: 90%;
  margin: 0 auto;
}

.delete__button{
  background-color: black;
  color: white;
  font-weight: bold;
  cursor: pointer;
  border-radius: 5px;
  font-size: 12px;
}
</style>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin.css" />
  <title>Admin</title>
</head>
<body>
  <h1 class="title">管理システム</h1>
  <div class="search__container">
    <form action="/search" method="get">
      @csrf
      <table>
        <tr class="search__row">
          <!-- 名前フォーム -->
          <th class="search__title">お名前</th>
          @if(!empty($fullname))
          <td class="search__content__first-line"><input type="text" name="fullname" class="search__content__box" value="{{$fullname}}"></td>
          @else
          <td class="search__content__first-line"><input type="text" name="fullname" class="search__content__box"></td>
          @endif

          <!-- 性別フォーム -->
          <th class="search__title">性別</th>
          @if(!empty($gender) && $gender == 1)
          <td class="search__content__first-line"><input type="radio" name="gender" value="" id="button__0" class="search__check-box"><label for="button__0">全て</label><input type="radio" name="gender" class="search__check-box" value="1" id="button__1" checked><label for="button__1">男性</label><input type="radio" name="gender" class="search__check-box" value="2" id="button__2"><label for="button__2">女性</label></td>
          @elseif(!empty($gender) && $gender == 2)
          <td class="search__content__first-line"><input type="radio" name="gender" value="" id="button__0" class="search__check-box"><label for="button__0">全て</label><input type="radio" name="gender" class="search__check-box" value="1" id="button__1" ><label for="button__1">男性</label><input type="radio" name="gender" class="search__check-box" value="2" id="button__2" checked><label for="button__2">女性</label></td>
          @else
          <td class="search__content__first-line"><input type="radio" name="gender" value="" id="button__0" class="search__check-box" checked><label for="button__0">全て</label><input type="radio" name="gender" class="search__check-box" value="1" id="button__1" ><label for="button__1">男性</label><input type="radio" name="gender" class="search__check-box" value="2" id="button__2"><label for="button__2">女性</label></td>
          @endif
        </tr>

        <!-- 登録日フォーム -->
        <tr class="search__row">
          <th class="search__title">登録日</th>
          @if(!empty($from_date) && !empty($until_date))
          <td colspan="3"><input type="date" name="from_date" class="search__content__box" value="{{$from_date}}"><span>〜</span><input type="date" name="until_date" class="search__content__box" value="{{$until_date}}"></td>
          @elseif(!empty($from_date) && empty($until_date))
          <td colspan="3"><input type="date" name="from_date" class="search__content__box" value="{{$from_date}}"><span>〜</span><input type="date" name="until_date" class="search__content__box"></td>
          @elseif(empty($from_date) && !empty($until_date))
          <td colspan="3"><input type="date" name="from_date" class="search__content__box"><span>〜</span><input type="date" name="until_date" class="search__content__box" value="{{$until_date}}"></td>
          @else
          <td colspan="3"><input type="date" name="from_date" class="search__content__box"><span>〜</span><input type="date" name="until_date" class="search__content__box"></td>
          @endif
        </tr>

        <!-- メールアドレスフォーム -->
        <tr class="search__row">
          <th class="search__title">メールアドレス</th>
          @if(!empty($email))
          <td class="search__content"><input type="email" name="email" class="search__content__box" value="{{$email}}"></td>
          @else
          <td class="search__content"><input type="email" name="email" class="search__content__box"></td>
          @endif
        </tr> 
      </table>
      <div class="button"><button class="search__button">検索</button></div>
    </form>
    <a href="/reset" class="reset__anker">リセット</a>
  </div>

  <div class="pagination__container">
    <p>全{{$items->total()}}件中  {{($items->currentPage() -1) * $items->perPage() + 1}} - 
       {{ (($items->currentPage() -1) * $items->perPage() + 1) + (count($items) -1)  }}件</p>
    <div>{{$items->appends(request()->query())->links('pagination::bootstrap-4')}}</div>
    <!-- bootstrap-4のCSSの初期表示がうまくいかないため、views/vendor/bootstrap-4.phpに直接styleを記載 -->
    <!-- appendsの中は,controllerからURL(?pageの直前)に残しておきたい検索条件をパラメーターで引っ張ってくるでも可 -->

  </div>
  <div class="list__container">
    <table class="list__table">
      <tr class="list__title__row">
        <th class="list__title">ID</th>
        <th class="list__title">お名前</th>
        <th class="list__title">性別</th>
        <th class="list__title">メールアドレス</th>
        <th class="list__title">ご意見</th>
        <th class="opinion__title"></th>
      </tr>
      @foreach($items as $item)
      <form action="/delete" method="post">
      @csrf
        <tr class="list__content__row">
          <td class="list__content">{{$item->id}}</td>
          <td class="list__content">{{$item->fullname}}</td>
          @if($item->gender == 1)
          <td class="list__content">男性</td>
          @elseif($item->gender == 2)
          <td class="list__content">女性</td>
          @endif
          <td class="list__content">{{$item->email}}</td>
          <td class="opinion__content">{{$item->opinion}}</td>
          <input type="hidden" name="id" value="{{$item->id}}">
          <td class="list__content"><button class="delete__button">削除</button></td>
        </tr>
      @endforeach
      </form>
    </table>
  </div>
</body>
</html>