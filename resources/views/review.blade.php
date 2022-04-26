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
    <div class = view_area>
      <div class = form_header>
        <h1>レビュー投稿</h1>
      </div>
      <div class=review_post_wrap>
        <div class=review>
          <div class=item_info_review>
            <h4>アイテム情報</h4>
            @foreach($itemView as $item)
            <?php $pass='storage/items/'.$item->id.'.jpg' ?>
            <div class=view_img_area>
              @if(File::exists($pass))
                <img class="item_img" src="{{$pass}}">
              @else
                <img class="item_img" src="img/items/0.jpg">
              @endif
            </div>
              <div class=item_info>No.{{$item->id}}</div>
              <div class=item_info>品名：{{$item->name}}</div>
              <div class=item_info>価格：¥{{$item->price}}(税込)</div>
              <div class=item_info>{!!nl2br(e($item->other))!!}</div>
              @foreach($c_name as $c_name)
                <div class=item_info>カテゴリ：{{$c_name->c_name}}</div>
              @endforeach
            @endforeach
          </div>
          <form id="reviewForm" name="reviewForm" action="review_confirm" method="POST">
            @csrf
            <input type="hidden" name="item_id" value="{{$item->id}}">
            <input type="hidden" name="c_name" value="{{$c_name->c_name}}">
              @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span><br>
                @endforeach
              @endif
              <h4>評価</h4>
              <div class="rate-form">
                  <input id="star5" type="radio" name="rate" value="5" {{ old('rate','5') == '5' ? 'checked' : '' }}>
                  <label for="star5">★</label>
                  <input id="star4" type="radio" name="rate" value="4" {{ old('rate','4') == '4' ? 'checked' : '' }}>
                  <label for="star4">★</label>
                  <input id="star3" type="radio" name="rate" value="3" {{ old('rate','3') == '3' ? 'checked' : '' }}>
                  <label for="star3">★</label>
                  <input id="star2" type="radio" name="rate" value="2" {{ old('rate','2') == '2' ? 'checked' : '' }}>
                  <label for="star2">★</label>
                  <input id="star1" type="radio" name="rate" value="1" {{ old('rate','1') == '1' ? 'checked' : '' }}>
                  <label for="star1">★</label>
                </div>
                <h4>レビュー</h4>
                 <textarea id='review' type="text" name="review">{{old('review')}}</textarea>
              <input type="submit" id="review_sub" name="review_sub" value="submit">
          </form>
        </div>
      </div>
      <div class="back_area">
        <button type="button" class="back_btn" onClick="history.back()">もどる</button>
      </div>
  </div>
</body>
</html>
