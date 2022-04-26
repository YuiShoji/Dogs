<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inview/1.0.0/jquery.inview.min.js"></script>
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="js/index.js"></script>
</head>
<body>
  <div class = header>
    @include('header1')
  </div>
  <div class = top_gazo_area>
    <img class="top_img" src="/img/maindog.jpg">
  </div>
  <div class = owner_main_wrap>
    <h5>Items</h5>
    <div class=search_area>
      <div class="btn01">
        <a href="/item_register">ITEM登録→</a>
      </div>
      <table>
        <form id="item_search" name="signupForm" action="owner_main" method="get">
          <tr>
            <th>カテゴリで絞込</th>
          </tr>
          <tr>
            <th><select name="search_category_id">
              <option value=”0” @if($cate_id == 0) selected @endif>All</option>
              @foreach($categories as $categories)
              <option value="{{ $categories->id }}" @if($cate_id ==  $categories->id) selected @endif>{{ $categories->name }}</option>
              @endforeach
            </select></th>
            <td><input type="submit" id="search_btn" class="fas" value="&#xf002;"></td>
          </tr>
        </form>
      </table>
      <div class="message">
          <?php print_r($count); ?>件
      </div>
    </div>
    <div class = item_area>
      @foreach($items as $item)
      <?php $pass='storage/items/'.$item->id.'.jpg' ?>
      <div class=item>
        <div class=img_area>
          <form method="get" action="item_edit">
            @csrf
            <input type="hidden" name="item_id" value="{{$item->id}}">
            @if(File::exists($pass))
            <input type="image" class="item_img" src="{{$pass}}">
            @else
            <input type="image" class="item_img" src="img/items/0.jpg">
            @endif
          </form>
        </div>
        <div class=item_li>{{ $item->name }}</div>

        <div class=likeandreview>
          <div class=item_rl>
            <i class="fa-solid fa-comment" style="color:skyblue;"></i>
            @if(empty($item->r_count))
            0
            @else
            {{ $item->r_count }}
            @endif
          </div>

          <div class=item_l>
            <i class="fas fa-heart" style="color:hotpink;">
            </i>
            @if(empty($item->l_count))
            0
            @else
            {{ $item->l_count }}
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
    {{ $items->links()}}
  </div>
</body>
</html>
