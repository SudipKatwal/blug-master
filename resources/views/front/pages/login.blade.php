@extends('front.layout.master')
@section('content')
<div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name" name="name"/>
      <input type="email" placeholder="Your Email" name="email"/>
      <input type="password" placeholder="Password" name="password"/>
      <input type="text" placeholder="Address" name="address"/>
      <input type="text" placeholder="Phone Number" name="phone"/>
      <input type="text" placeholder="Interest for eg. Travel, Sport, Gaming" name="interest"/>

      Gender
      <select name="gender">
          <option value="male" name="male">Male</option>
          <option value="female" name="female">Female</option>
          <option value="other" name="other">other</option>
      </select>
      <input type="file" name="profile">
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form">
      <h2>Blug<strong>Master</strong></h2>&nbsp;
       
      <input type="text" placeholder="username"/>
      <input type="password" placeholder="password"/>
      <button>login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>

</body>

@endsection