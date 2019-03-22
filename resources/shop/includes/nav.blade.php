<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
      <div class="topbar">
        <div class="topbar-social">
          <a href="#" class="topbar-social-item fa fa-facebook"></a>
          <a href="#" class="topbar-social-item fa fa-instagram"></a>
          <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
          <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
          <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
        </div>

        <span class="topbar-child1">
          Free shipping for standard order over $100
        </span>

        <div class="topbar-child2">
          <span class="topbar-email">
            grocery@gmail.com
          </span>

          <div class="topbar-language rs1-select2">
            <select class="selection-1" name="time">
              <option>KSH</option>
            </select>
          </div>
        </div>
      </div>

      <div class="wrap_header">
        <!-- Logo -->
        <a href="/shop" style="color: #000;" class="logo">
          <h3>Grocery Shop</h3>
        </a>
        <img class="logo_img" src="images/icons/logo.png" alt="IMG-LOGO">

        <!-- Menu -->
        <div class="wrap_menu">
          <nav class="menu">
            <ul class="main_menu">
              <li>
                <a class="{{ Request::is('/') ? 'Active' : '' }}" href="/">Home</a>
              </li>

              <li>
                <a class="{{ Request::is('/shop') ? 'Active' : '' }}" href="/shop">Shop</a>
              </li>

              <li class="sale-noti">
                <a class="{{ Request::is('/products-front') ? 'Active' : '' }}" href="/products-front">Sale</a>
              </li>

              <li>
                <a href="cart.html">Features</a>
              </li>

              <li>
                <a href="about.html">About</a>
              </li>

              <li>
                <a href="contact.html">Contact</a>
              </li>
            </ul>
          </nav>
        </div>

        <!-- Header Icon -->
        <div class="header-icons">
          <a href="#" class="header-wrapicon1 dis-block">
            <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
          </a>

          <span class="linedivide1"></span>

          <div class="header-wrapicon2">
            <img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
            <span class="header-icons-noti">{{ Cart::instance('shopping')->count() }}</span>

            <!-- Header cart noti -->
            <div class="header-cart header-dropdown">
              <ul class="header-cart-wrapitem">
                @foreach ($cartscontent as $cart)
                <li class="header-cart-item">
                  <div class="header-cart-item-img">
                    {{ Html::image('images/'. $cart->options->image, 'alt IMG-PRODUCT',  array('class' => 'img')) }}
                  </div>

                  <div class="header-cart-item-txt">
                    <a href="#" class="header-cart-item-name">
                      {{ $cart->name }}
                    </a>

                    <span class="header-cart-item-info">
                      {{ $cart->qty }} x ksh{{ $cart->price }}
                    </span>
                  </div>
                </li>
                @endforeach
              </ul>

              <div class="header-cart-total">
                Total: ksh{{ Cart::total() }}
              </div>

              <div class="header-cart-buttons">
                <div class="header-cart-wrapbtn">
                  <!-- Button -->
                  <a class="{{ Request::is('/carts') ? 'Active' : '' }}" href="/carts" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    View Cart
                  </a>
                </div>

                <div class="header-cart-wrapbtn">
                  <!-- Button -->
                  <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    Check Out
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
      <!-- Logo moblie -->
      <a href="/shop" style="color: #000;" class="logo-mobile">
        <h3>Grocery Shop</h3>
      </a>
      {{-- <img class="logo_mobile_img" src="images/icons/logo.png" alt="IMG-LOGO"> --}}

      <!-- Button show menu -->
      <div class="btn-show-menu">
        <!-- Header Icon mobile -->
        <div class="header-icons-mobile">
          <a href="#" class="header-wrapicon1 dis-block">
            <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
          </a>

          <span class="linedivide2"></span>

          <div class="header-wrapicon2">
            <img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
            <span class="header-icons-noti">{{ Cart::instance('shopping')->count() }}</span>

            <!-- Header cart noti -->
            <div class="header-cart header-dropdown">
              <ul class="header-cart-wrapitem">
                @foreach ($cartscontent as $cart)
                <li class="header-cart-item">
                  <div class="header-cart-item-img">
                    {{ Html::image('images/'. $cart->options->image, 'alt IMG-PRODUCT',  array('class' => 'img')) }}
                  </div>

                  <div class="header-cart-item-txt">
                    <a href="#" class="header-cart-item-name">
                      {{ $cart->name }}
                    </a>

                    <span class="header-cart-item-info">
                      {{ $cart->qty }} x ksh{{ $cart->price }}
                    </span>
                  </div>
                </li>
                @endforeach
              </ul>

              <div class="header-cart-total">
                Total: ksh{{ Cart::total() }}
              </div>
              <div class="header-cart-buttons">
                <div class="header-cart-wrapbtn">
                  <!-- Button -->
                  <a class="{{ Request::is('/carts') ? 'Active' : '' }}" href="/carts" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    View Cart
                  </a>
                </div>

                <div class="header-cart-wrapbtn">
                  <!-- Button -->
                  <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    Check Out
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </div>
      </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu" >
      <nav class="side-menu">
        <ul class="main-menu">
          <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
            <span class="topbar-child1">
              Free shipping for standard order over $100
            </span>
          </li>

          <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
            <div class="topbar-child2-mobile">
              <span class="topbar-email">
                groceryshop2019@gmail.com
              </span>

              <div class="topbar-language rs1-select2">
                <select class="selection-1" name="time">
                  <option>KSH</option>
                </select>
              </div>
            </div>
          </li>

          <li class="item-topbar-mobile p-l-10">
            <div class="topbar-social-mobile">
              <a href="#" class="topbar-social-item fa fa-facebook"></a>
              <a href="#" class="topbar-social-item fa fa-instagram"></a>
              <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
              <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
              <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
            </div>
          </li>

          <li class="item-menu-mobile">
            <a class="{{ Request::is('/') ? 'Active' : '' }}" href="/">Home</a>
            <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
          </li>

          <li class="item-menu-mobile">
            <a class="{{ Request::is('/shop') ? 'Active' : '' }}" href="/shop">Shop</a>
          </li>

          <li class="item-menu-mobile">
            <a class="{{ Request::is('/products-front') ? 'Active' : '' }}" href="/products-front">Sale</a>
          </li>

          <li class="item-menu-mobile">
            <a href="cart.html">Features</a>
          </li>

          <li class="item-menu-mobile">
            <a href="blog.html">Blog</a>
          </li>

          <li class="item-menu-mobile">
            <a href="about.html">About</a>
          </li>

          <li class="item-menu-mobile">
            <a href="contact.html">Contact</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>