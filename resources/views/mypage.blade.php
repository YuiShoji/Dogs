<html>
<head>
 <meta charset="UTF-8">
 <link rel="stylesheet" href="css/bootstrap.css">
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <script src="js/index.js"></script>
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
    <div class = view_area>
      <div class = form_header>
        <h1>{{$user->name}}さん</h1>
      </div>
        <div class = mypage>
          <form action="mypageEdit" method="POST" enctype="multipart/form-data" onSubmit="return mypageCheck()">
            @csrf
            <div class= mypage_img_area>
              <?php $pass='storage/users/'.$user->id.'.jpg' ?>
              @if(File::exists($pass))
                <img id="preview" src="{{$pass}}" class="mypageicon">
              @else
                <img id="preview" src="storage/users/0.jpg" class="mypageicon">
              @endif
              <label class =fileup>
                <input onchange="previewImage(this)" type="file" name="pic" class="img_form" >
                ファイルを選択
              </label>
            </div>
            <div class= mypage_info_area>
              <table>
              <tr>
                <th><p>Name</p></th>
                  <td><input type="text" class='mypage_info' name="name" value="{{old('name',$user->name)}}"></td>
              </tr>
              <tr>
                <th><p>Email</p></th>
                <td><input type="email" class='mypage_info' name="email" value="{{old('email',$user->email)}}"></td>
              </tr>
              <tr>
                <th><p>Pet</p></th>
                <td><select name="pet_id" class=item_edit_cate>
                  @foreach($mypagedogs as $dog)
                      <option value="{{ $dog->id }}" @if($dog->id == $user->dog_id) selected @endif>{{ $dog->name }}</option>
                  @endforeach
                </select></td>
              </tr>
              <tr>
                <th></th>
                  <td><input type="submit" id="mypage_btn" value="変更する" ></td>
              </tr>
          </table>
          <!-- フラッシュメッセージ -->
          @if (session('flash_message'))
              <div class="flash_message">
                  <span>{{ session('flash_message') }}</span>
              </div>
          @endif
          @foreach($errors->all() as $error)
            <span>{{$error}}</span>
          @endforeach

            </div>
          </form>
          <div class=like_review_btn_area>
            <a class="modal_item_btn" data-toggle="modal" data-target="#testModal">レビュー</a>
            <a class="modal_item_btn" data-toggle="modal" data-target="#likesModal">いいね</a>
          </div>
          <div class="back_area">
            <button type="button" class="back_btn" onClick="history.back()">もどる</button>
          </div>
        </div>
      </div>
    </div>

<!--レビューアイテム一覧-->
      <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content_my">
              <div class=my_review>
                <h1>レビュー</h1>
                <div class=my_review_area>
                  @if($review_item->isEmpty())
                    <p>レビューはありません。</p>
                  @else
                  @foreach($review_item as $r_item)
                  <div class=my_item>
                    <div class=my_img_area>
                      <?php $pass='storage/items/'.$r_item->item_id.'.jpg' ?>
                      <form method="get" action="view">
                        <input type="hidden" name="item_id" value="{{$r_item->item_id}}">
                        @csrf
                        @if(File::exists($pass))
                          <input type="image" class="item_img" src="{{$pass}}">
                        @else
                          <input type="image" class="item_img" src="img/items/0.jpg">
                        @endif
                      </form>
                    </div>
                    <div class=item_li>{{$r_item->item_name}}</div>
                    @if($r_item->star == 1)
                        <div class=item_li>
                          <i class=" fa-solid fa-star"></i>
                          <i class=" fa-solid fa-star far-white"></i>
                          <i class=" fa-solid fa-star far-white"></i>
                          <i class=" fa-solid fa-star far-white"></i>
                          <i class=" fa-solid fa-star far-white"></i>
                        </div>
                      @elseif($r_item->star == 2)
                        <div class=item_li>
                          <i class=" fa-solid fa-star"></i>
                          <i class=" fa-solid fa-star"></i>
                          <i class=" fa-solid fa-star far-white"></i>
                          <i class=" fa-solid fa-star far-white"></i>
                          <i class=" fa-solid fa-star far-white"></i>
                        </div>
                      @elseif($r_item->star == 3)
                          <div class=item_li>
                            <i class=" fa-solid fa-star"></i>
                            <i class=" fa-solid fa-star"></i>
                            <i class=" fa-solid fa-star"></i>
                            <i class=" fa-solid fa-star far-white"></i>
                            <i class=" fa-solid fa-star far-white"></i>
                          </div>
                      @elseif($r_item->star == 4)
                          <div class=item_li>
                            <i class=" fa-solid fa-star"></i>
                            <i class=" fa-solid fa-star"></i>
                            <i class=" fa-solid fa-star"></i>
                            <i class=" fa-solid fa-star"></i>
                            <i class=" fa-solid fa-star far-white"></i>
                          </div>
                      @elseif($r_item->star == 5)
                      <div class=item_li>
                        <i class=" fa-solid fa-star"></i>
                        <i class=" fa-solid fa-star"></i>
                        <i class=" fa-solid fa-star"></i>
                        <i class=" fa-solid fa-star"></i>
                        <i class=" fa-solid fa-star"></i>
                      </div>
                    @endif
                  </div>
                  <div class=mymyreview>
                    <div class=myreview>
                      {{$r_item->review}}
                    </div>
                    <div class=myreview>
                      {{$r_item->updated_at}}
                    </div>
                  </div>
                  <hr>
                  @endforeach
                  @endif
                </div>
              </div>
            </div>
          </div>
      </div>

    <!--いいねしたアイテム一覧-->
    <div class="modal fade" id="likesModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content_my">
            <div class=my_review>
              <h1>いいねしたアイテム一覧</h1>
              <div class=my_review_area>
                @if($likes_item->isEmpty())
                  <p>いいねしたアイテムはありません。</p>
                @else
                @foreach($likes_item as $l_item)
                <div class=my_item>
                  <div class=my_img_area>
                    <?php $pass='storage/items/'.$l_item->item_id.'.jpg' ?>
                    <form method="get" action="view">
                      <input type="hidden" name="item_id" value="{{$l_item->item_id}}">
                      @csrf
                      @if(File::exists($pass))
                        <input type="image" class="item_img" src="{{$pass}}">
                      @else
                        <input type="image" class="item_img" src="img/items/0.jpg">
                      @endif
                    </form>
                  </div>
                  <div class=item_li>{{$l_item->name}}</div>
                </div>
                @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>
