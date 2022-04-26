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
  @include('header2')
</div>
  <div class = wrap>
    <div class = signup_form>
      <div class = form_header>
        <h1>Confirm</h1>
      </div>
      <div class =confirm>
        <form action="{{ url('/main') }}" method="post">
          @csrf
          <input type="hidden" name="name" value="{{$name}}">
          <input type="hidden" name="email" value="{{$email}}">
          <input type="hidden" name="password" value="{{$password}}">
          <input type="hidden" name="dog_id" value="{{$dogs->id}}">
      <div class= item_edit_confirm_info>
        <table>
         <tr>
          <th><h2>Name</h2></th>
            <td><p>{{$name}}</p></td>
          </tr>
          <tr>
            <th><h2>Email</h2></th>
            <td><p>{{$email}}</p></td>
          </tr>
          <tr>
            <th><h2>Password</h2></th>
              <td><p>**********</p></td>
          </tr>
          <tr>
            <th><h2>Pet dog</h2></th>
              <td><p>{{$dogs->name}}</p></td>
          </tr>
        </table>
        </div>
            <input type="submit" name="complete_btn" id ="signup_btn" value="OK" >
        </form>
      </div>
    </div>
  </div>
</body>
</html>
