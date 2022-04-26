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
        <h1>ユーザ一覧</h1>
      </div>
      <div class=user_wrap>
          <div class=user_search_area>
            <h4>Search</h4>
            <table class=user_search>
              <form id="signupForm" name="signupForm" action="users" method="get">
                <tr>
                  <th>ペットの種類で絞込</th>
                </tr>
                <th><select name="search_pet_id">
                  <option value=”0” @if($pet_id == 0) selected @endif>すべて表示</option>
                    @foreach($dogs as $dog)
                      <option value="{{ $dog->id }}" @if($pet_id ==  $dog->id) selected @endif>{{ $dog->name }}</option>
                    @endforeach
                </select></th>
                <td><input type="submit" id="search_btn" class="fas" value="&#xf002;"></td>
              </form>
            </table>
            <div class="message">
                {{$count}}件
            </div>
          </div>


        <div class=user_list>
          @foreach($users as $user)
          <div class=user>
            <div class=user_list_img>
              <form method="get" action="user">
                <input type="hidden" name="id" value="{{$user->id}}">
                <?php $pass='storage/users/'.$user->id.'.jpg' ?>
                @if(File::exists($pass))
                  <input type="image" class="view_icon" src="{{ $pass }}">
                @else
                  <input type="image" class="view_icon" src="storage/users/0.jpg">
                @endif
              </form>
            </div>
            <div class = users_list_info>
              <table class = users_list_table>
              <tr>
              <th ><p>NAME</p></th>
                <td style="border-bottom: none;"><div class = users_list_yoso>{{$user->name}}</div></td>
              </tr>
              <tr>
              <th><p>PET</p></th>
                <td><div class = users_list_yoso>{{$user->d_name}}</div></td>
              </tr>
                @if(Auth::user()->owner == '1')
                  <tr>
                  <th><p>MAIL</p></th>
                    <td><div class = users_list_yoso>{{$user->email}}</div></td>
                  </tr>
                  <tr>
                    <th><form action="user_delete" method="post" onSubmit="return submitCheck()">
                      @csrf
                      <input type="submit" name="user_delete_btn" id ="item_delete_btn" value="削除" >
                      <input type="hidden" name="user_id" value="{{$user->id}}">
                    </form></th>
                    <td></td>
                  </tr>
                @else
                @endif
              </table>
            </div>
          </div>
            @endforeach
        </div>

        <br>
        {{ $users->links()}}
        <div class="back_area">
          <button type="button" class="back_btn" onClick="history.back()">もどる</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
