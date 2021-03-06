<html>
<head>
  <meta charset="UTF-8">
 <link rel="stylesheet" href="css/bootstrap.css">
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
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
        <form action="view" method="post">
          <input type="hidden" name="item_id" value="{{$item_id}}">
          <input type="hidden" name="user_id" value="{{$user_id}}">
          <input type="hidden" name="review" value="{{$review}}">
          <input type="hidden" name="star" value="{{$rate}}">
          <input type="hidden" name="c_name" value="{{$c_name}}">
          @csrf
          <div class= item_edit_confirm_info>
            <table>
              <tr>
              <th><h2>評価</h2></th>
                @if($rate==1)
                <td>
                  <i class=" fa-solid fa-star"></i>
                  <i class=" fa-solid fa-star far-white"></i>
                  <i class=" fa-solid fa-star far-white"></i>
                  <i class=" fa-solid fa-star far-white"></i>
                  <i class=" fa-solid fa-star far-white"></i>
                </td>
                @elseif($rate==2)
                <td>
                  <i class=" fa-solid fa-star"></i>
                  <i class=" fa-solid fa-star"></i>
                  <i class=" fa-solid fa-star far-white"></i>
                  <i class=" fa-solid fa-star far-white"></i>
                  <i class=" fa-solid fa-star far-white"></i>
                </td>
                @elseif($rate==3)
                <td>
                  <i class=" fa-solid fa-star"></i>
                  <i class=" fa-solid fa-star"></i>
                  <i class=" fa-solid fa-star"></i>
                  <i class=" fa-solid fa-star far-white"></i>
                  <i class=" fa-solid fa-star far-white"></i>
                </td>
                @elseif($rate==4)
                <td>
                  <i class=" fa-solid fa-star"></i>
                  <i class=" fa-solid fa-star"></i>
                  <i class=" fa-solid fa-star"></i>
                  <i class=" fa-solid fa-star"></i>
                  <i class=" fa-solid fa-star far-white"></i>
                </td>
                @elseif($rate==5)
                <td>
                  <i class=" fa-solid fa-star"></i>
                  <i class=" fa-solid fa-star"></i>
                  <i class=" fa-solid fa-star"></i>
                  <i class=" fa-solid fa-star"></i>
                  <i class=" fa-solid fa-star"></i>
                </td>
                @endif
              </tr>
              <tr>
                <th style="border-bottom: none;"><h2>レビュー</h2></th>
                <td style="border-bottom: none;"><p>{!!nl2br(e($review))!!}</p></td>
              </tr>
              </div>
            </table>
          <input type="submit" name="review_complete_btn" id ="signup_btn" value="OK" >
          </form>
      </div>
    </div>
  </div>
</body>
</html>
