@props(["typ"=>null])


@if($typ=='a')


        <div class="navbar-start bg-amber-900"> 
            <a href="/" class="btn btn-ghost text-xl">{{$slot}}</a> 
        </div> 

    

    @else
      
    <div class="navbar-start"> 
            <button type="button" typ="a" href="/" class="btn btn-ghost text-xl">{{$slot}}</button> 
        </div> 
        @endif



