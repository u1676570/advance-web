<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Home Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link href="{{ url('/')}}/public/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <!-- Header section -->
  <section id="headerSec">
    <table>
      <tr>
        <td><header>
          <h1>Advanced Web Programming</h1>
          <h2>CHT2520</h2>
        </header></td>
        <!-- Navigation Menu -->
        <td><nav>
          <ul>
          	<!-- Home menu -->
            <li><a href="{{ url('/') }}">Home</a></li>
            <!-- Add new book menu -->
            <li><a href="{{ url('/book-add') }}">Add</a></li>

            <!-- login and logout button -->
            @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                       @else
                       <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout {{ Auth::user()->name }}</a></li>
                       
                    @endif
            
          </ul>
        </nav></td>
      </tr>
    </table>
  </section>
  <hr>
  <hr>

  <hr>
  @yield('content')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>