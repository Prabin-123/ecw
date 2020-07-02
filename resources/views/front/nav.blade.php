<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0c5460">
<a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('shop') }}">Shop</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categories
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php $cats=DB::table('categories')->get(); ?>
            @foreach ($cats as $cat)
              <a class="dropdown-item" href="{{ url('category',$cat->id) }}">{{ucwords($cat->name)}}</a>
            @endforeach
            
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/wishlist')}}"><i class="fa fa-star"></i> 
            WishList <span style="color: green; font-weiht: bold;">({{App\Wishlist_model::count()}})</span></a>
        </li>
        <li class="nav-item" style="list-style-type: none;">
          <a class="nav-link" href="{{ url('/cart') }}">Cart&nbsp;({{Cart::count()}} items)&nbsp;($ {{Cart::total()}})</a>
        </li>
        <?php if (Auth::check()) {?>
          <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a href="#" class="dropdown-item">{{ Auth::user()->name }}</a>
              <a href="{{ url('/') }}/profile" class="dropdown-item">Profile</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </div>
          </li>
        <?php }else{ ?>
          <li class="nav-item">
            <a href="{{ url('/login') }}" class="nav-link">LogIn</a>
          </li>
        <?php } ?>
      </ul>
      {{-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> --}}
    </div>
</nav>