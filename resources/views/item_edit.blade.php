<html>
<head>
 <meta charset="UTF-8">
 <link rel="stylesheet" href="css/bootstrap.css">
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <script src="js/index.js"></script>
 <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
 </head>
<body>
  <div class = header>
    @include('header1')
  </div>
  <div class = wrap>
    <div class = view_area>
      <div class = form_header>
        <h1>アイテム編集</h1>
      </div>
        <div class = item_edit_view>
          <form action="item_edit_confirm" method="POST" enctype="multipart/form-data">
            @csrf
              <input type="hidden" name="item_id" value="{{$item->id}}">
                <div class= item_edit_img_area>
                  <div class=item_edit_img>
                    <?php $pass='storage/items/'.$item->id.'.jpg' ?>
                    @if(File::exists($pass))
                      <img id="preview" src="{{$pass}}" class="itemedit_icon">
                    @else
                      <img id="preview" src="img/items/0.jpg" class="itemedit_icon">
                    @endif
                  </div>
                  <label class =fileup>
                    <input onchange="previewImage(this)" type="file" name="pic" class="img_form" >
                    ファイルを選択
                  </label>
                </div>
            <div class= item_edit_info_area>
              @if(!empty($errors))
                @foreach($errors->all() as $error)
                  <span>{{$error}}</span>
                @endforeach
              @else
              @endif
              <table>
                <tr>
                  <th><p>品名</p></th>
                    <td><input type="text" class='mypage_info' name="item_name" value="{{old('name',$item->name)}}"></td>
                </tr>
                <tr>
                  <th><p>価格(税込)</p></th>
                    <td><input type="text" class='mypage_info' name="price" value="{{old('price',$item->price)}}"></td>
                </tr>
                <tr>
                  <th><p>カテゴリ</p></th>
                    <td>
                      <select name="category_id" class=item_edit_cate>
                        @foreach($category as $cate)
                          <option  value="{{ $cate->id }}" @if($cate->id == $item->category_id) selected @endif>{{ $cate->name }}</option>
                        @endforeach
                      </select>
                    </td>
                </tr>
                <tr>
                  <th><p>その他情報</p></th>
                    <td><textarea id='item_other' type="text" name="item_other">{{old('item_other',$item->other)}}</textarea></td>
                </tr>
                <tr>
                  <th></th>
                    <td><input type="submit" id="itemedit_btn" value="内容確認へ" ></td>
                </tr>
              </table>
            </div>
          </form>
      </div>
      <div class=item_del_area>
        <form action="item_delete" method="post" onSubmit="return submitCheck()">
          @csrf
          <input type="submit" name="item_delete_btn" id ="item_delete_btn" value="このアイテムを削除する" >
          <input type="hidden" name="item_id" value="{{$item->id}}">
        </form>
      </div>
      <button class=back_btn type="button" onClick="history.back()">一覧へ戻る</button>
    </div>
  </div>
</body>
