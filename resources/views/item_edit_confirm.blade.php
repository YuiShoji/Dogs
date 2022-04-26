<html>
<head>
  <meta charset="UTF-8">
 <link rel="stylesheet" href="css/bootstrap.css">
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </head>
<body>
  <div class = header>
    @include('header1')
  </div>
  <div class = wrap>
    <div class = signup_form>
      <div class = form_header>
        <h1>Confirm</h1>
      </div>
      <div class =confirm>
        <p class =comment>
          内容を確認し、OKボタンを押してください。
        </p>
        <form action="itemedit" method="post">
          @csrf
          <input type="hidden" name="item_id" value="{{$post_data->item_id}}">
          <input type="hidden" name="item_name" value="{{$post_data->item_name}}">
          <input type="hidden" name="category_id" value="{{$post_data->category_id}}">
          <input type="hidden" name="price" value="{{$post_data->price}}">
          <input type="hidden" name="item_other" value="{{$post_data->item_other}}">
          <input type="hidden" name="img_url" value="{{ $img_url }}">

            @if(!empty($img_url))
            <div class= item_edit_confirm_img>
              <img class= item_edit_confirm_img src="storage/items/tmp/{{ $img_url }}" alt="">
            </div>
              @else
              @endif


          <div class= item_edit_confirm_info>
            <table>
              <tr>
                <th><h2>品名</h2></th>
                <td><p>{{$post_data->item_name}}</p></td>
            </tr>
              <tr>
                <th><h2>カテゴリ</h2></th>
                  <td><p>{{$item_cate->name}}</p></td>
              </tr>
              <tr>
                <th><h2>価格</h2></th>
                  <td><p>¥{{$post_data->price}}</p></td>
              </tr>
              <tr>
                <th style="border-bottom: none;"><h2>その他情報</h2></th>
                <td style="border-bottom: none;"><p>{!!nl2br(e($post_data->item_other))!!}</p></td>
              </tr>
              {{$item_cate->pic}}
             </table>
            </div>
            <input type="submit" name="review_complete_btn" id ="signup_btn" value="OK" >
            <div class="back_area">
              <button type="button" class="back_btn" onClick="history.back()">修正する</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
