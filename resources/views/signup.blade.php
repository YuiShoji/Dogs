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
        <h1>Signup</h1>
      </div>
    <form id="signupForm" name="signupForm" action="confirm" method="POST">
      @csrf
      <p>必要事項を記入の上、送信してください。</p>
      <label for="">Name</label>
        @if ($errors->has('name'))
          <span>{{$errors->first('name')}}</span>
        @endif
        <input type="text" id="name" name="name" placeholder="" value="{{old('name')}}">
      <label for="">Email</label>
        @if ($errors->has('email'))
          <span>{{$errors->first('email')}}</span>
        @endif
        <input type="text" id="email" name="email" value="{{old('email')}}" placeholder="">
      <label for="password">Password</label>
        @if ($errors->has('password'))
            <span>{{$errors->first('password')}}</span>
        @endif
        <input type="password" id="password" name="password" placeholder="" value="{{old('password')}}">
      <label for="password_confirm">Password(再入力)</label>
        @if ($errors->has('password_confirm'))
          <span>{{$errors->first('password_confirm')}}</span>
        @endif
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" value="{{old('password_confirm')}}">
      <label for="pet">Pet dog</label>
      <select name="pet_id">
        @foreach($dogs as $dog)
            <option value="{{ $dog->id }}" @if(old('pet_id') == $dog->id) selected @endif>{{ $dog->name }}</option>
        @endforeach
      </select>
        <input type="submit" id="signup_btn" name="login" value="submit">
      </form>
  </div>
</div>
</body>
</html>
