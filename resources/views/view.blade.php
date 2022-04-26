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
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
 </head>
<body>
  <div class = header>
    @include('header1')
  </div>
  <div class = wrap>
    <div class = view_area>
      <div class = form_header>
        <h1>アイテム詳細</h1>
      </div>
        <div class = view_item>
            <?php $pass='storage/items/'.$itemView->id.'.jpg' ?>
            <div class=view_img_area>
              @if(File::exists($pass))
              <a href="{{$pass}}" data-lightbox="group"><img class="item_img" src="{{$pass}}"></a>
              @else
                <img class="item_img" src="img/items/0.jpg">
              @endif
            </div>
          <div class=item_info>
            <table class=item_view_table>
              <tr>
                <th><p>No.</p></th>
                  <td><div class=item_li_view>{{$itemView->id}}</div></td>
              </tr>
              <tr>
                <th><p>品名</p></th>
                  <td><div class=item_li_view>{{$itemView->name}}</div></td>
              </tr>
              <tr>
                <th><p>価格</p></th>
                  <td><div class=item_li_view>¥{{$itemView->price}}(税込)</div></td>
              </tr>
              <tr>
                @foreach($c_name as $c_name)
                  <th><p>カテゴリ</p></th>
                    <td><div class=item_li_view>{{$c_name->c_name}}</div></td>
                @endforeach
             </tr>
             <tr>
               <th>その他の情報</th>
                 <td><div class=item_li_view_other>{!!nl2br(e($itemView->other))!!}</div></td>
             </tr>
             </table>
              @if(!$alreadylike->isEmpty())
                <!--いいね済の場合ぬりつぶし-->
                <div class=likes_area>
                    <a class="toggle_wish" item_id="{{ $itemView->id }}" like_item="1">
                       <i class="fas fa-heart" style="color:red;">
                         <div id="like_counter">{{$itemlikes->likes_count}}</div>
                      </i>
                    </a>
                </div>
                @else
                <!--いいね済の場合ぬりつぶしじゃない-->
                <div class=likes_area>
                    <a class="toggle_wish " item_id="{{ $itemView->id }}" like_item="0">
                      <i class="far fa-heart">
                        <div id="like_counter">{{$itemlikes->likes_count}}</div>
                      </i>
                    </a>
                </div>
                @endif
          </div>
      </div>
      <hr>
      <div class=review_area>
        <h1>Review</h1>
        <div class=reviewcount>{{$count}}件</div>
          <form method="get" action="review" class=reviewPost>
            <input type="submit" class="review_post_btn" value=レビューを投稿する>
            <input type="hidden" name="item_id" value="{{$itemView->id}}">
            <input type="hidden" name="c_name" value="{{$c_name}}">
          </form>
      </div>
      @foreach($reviews as $review)
      <div class=review_view>
          <div class=user_area>
            <form method="get" action="user">
              <input type="hidden" name="id" value="{{$review->user_id}}">
              <?php $pass='storage/users/'.$review->user_id.'.jpg' ?>
              @if(File::exists($pass))
                <input type="image" class="view_icon" src="{{ $pass }}">
              @else
                <input type="image" class="view_icon" src="storage/users/0.jpg">
              @endif
            </form>
              {{$review->name}}
              <br>
              Pet:{{$review->dog_name}}
          </div>
          <div class= user_review_area>
            @if($review->star == 1)
            <div class=item_li>
              <i class=" fa-solid fa-star"></i>
              <i class=" fa-solid fa-star far-white"></i>
              <i class=" fa-solid fa-star far-white"></i>
              <i class=" fa-solid fa-star far-white"></i>
              <i class=" fa-solid fa-star far-white"></i>
            </div>
              @elseif($review->star == 2)
              <div class=item_li>
                <i class=" fa-solid fa-star"></i>
                <i class=" fa-solid fa-star"></i>
                <i class=" fa-solid fa-star far-white"></i>
                <i class=" fa-solid fa-star far-white"></i>
                <i class=" fa-solid fa-star far-white"></i>
              </div>
              @elseif($review->star == 3)
              <div class=item_li>
                <i class=" fa-solid fa-star"></i>
                <i class=" fa-solid fa-star"></i>
                <i class=" fa-solid fa-star"></i>
                <i class=" fa-solid fa-star far-white"></i>
                <i class=" fa-solid fa-star far-white"></i>
              </div>
              @elseif($review->star == 4)
              <div class=item_li>
                <i class=" fa-solid fa-star"></i>
                <i class=" fa-solid fa-star"></i>
                <i class=" fa-solid fa-star"></i>
                <i class=" fa-solid fa-star"></i>
                <i class=" fa-solid fa-star far-white"></i>
              </div>
              @elseif($review->star== 5)
              <div class=item_li>
                <i class=" fa-solid fa-star"></i>
                <i class=" fa-solid fa-star"></i>
                <i class=" fa-solid fa-star"></i>
                <i class=" fa-solid fa-star"></i>
                <i class=" fa-solid fa-star"></i>
              </div>
            @endif
            <div class=review_body>
              {!!nl2br(e($review->review))!!}
            </div>

            @if (Auth::id() == $review->user_id)
            <form method="get" action="review_edit">
              <input type="hidden" name="review_id" value="{{$review->review_id}}">
              <input type="hidden" name="item_id" value="{{$itemView->id}}">
              <input type="submit" class="fa review_edit" value=&#xf044;>
            </form>
            @else
            @endif
          </div>
      </div>
      <hr class = reviewhr>
      @endforeach
      <div class="back_area">
        <button type="button" class="back_btn_review" onClick="history.back()">もどる</button>
      </div>
  </div>
</body>
</html>

<script src="js/index.js"></script>
