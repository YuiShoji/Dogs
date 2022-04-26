<?php ini_set("memory_limit", "3072M");?>
<html>
<head>
 <meta charset="UTF-8">
 <link rel="stylesheet" href="css/bootstrap.css">
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
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
        <h1>レビュー編集</h1>
      </div>
      <div class=review_post_wrap>
        <div class=review>
          <div class=item_info_review>
            <h4>アイテム情報</h4>
              <div class=item_info>No.{{$itemView->id}}</div>
              <div class=item_info>品名：{{$itemView->name}}</div>
              <div class=item_info>価格：¥{{$itemView->price}}(税込)</div>
              <div class=item_info>{!!nl2br(e($itemView->other))!!}</div>
          </div>
          <form id="reviewForm" name="reviewForm" action="re_confirm" method="POST">
            @csrf
            <input type="hidden" name="review_id" value="{{$review->id}}">
            <input type="hidden" name="item_id" value="{{$itemView->id}}">
              @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span><br>
                @endforeach
              @endif
              <h4>評価</h4>
              <div class="rate-form">
                  <input id="star5" type="radio" name="rate" value="5" {{ old('rate',$review->star) == '5' ? 'checked' : '' }}>
                  <label for="star5">★</label>
                  <input id="star4" type="radio" name="rate" value="4" {{ old('rate',$review->star) == '4' ? 'checked' : '' }}>
                  <label for="star4">★</label>
                  <input id="star3" type="radio" name="rate" value="3" {{ old('rate',$review->star) == '3' ? 'checked' : '' }}>
                  <label for="star3">★</label>
                  <input id="star2" type="radio" name="rate" value="2" {{ old('rate',$review->star) == '2' ? 'checked' : '' }}>
                  <label for="star2">★</label>
                  <input id="star1" type="radio" name="rate" value="1" {{ old('rate',$review->star) == '1' ? 'checked' : '' }}>
                  <label for="star1">★</label>
                </div>
                <h4>レビュー</h4>
                 <textarea id='review' type="text" name="review">{{old('review',$review->review)}}</textarea>
              <input type="submit" id="review_sub" name="review_edit" value="submit">
          </form>
        </div>
      </div>
      <div class="back_area">
        <button type="button" class="back_btn" onClick="history.back()">もどる</button>
      </div>

    </div>
  </div>
</body>
</html>
