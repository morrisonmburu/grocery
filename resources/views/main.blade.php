@include('includes.head')
@include('includes.nav')

<div class="container" style="padding-top: 80px;">
   @include('includes.messages')
   </div>
   <div class="container">
   	  @yield('content')
   </div>
 

   <footer style="color: #000" ><p class="text-center">Copyright groceryshop@2018 - All Rights Reserved </p></footer>

    </body>
</html>
@yield('scripts')
