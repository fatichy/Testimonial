<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('main.css')}}">
    <title>Document</title>
</head>
<body>
<div class="container">
            @if(Session::has('success'))
            <div class="flash-msg success">
                <p> {{ Session::get('success') }} </p>     
            </div>
        @endif
        @if(Session::has('error'))
            <div class="flash-msg error">
                <p> {{ Session::get('error') }} </p>    

            </div>
        @endif
        
       <form class="testimonial-form" action="{{route('testimonials.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="titre">Titre <span style="color: red;">*</span></label>
                @error('titre')
                    <p class="error-message">{{$message}}</p>
                @enderror
                <input type="text" name="titre" id="titre">
            </div>

            <div>
                <label for="file">Avatar</label>
                @error('image')
                    <p class="error-message">{{$message}}</p>
                @enderror
                <input type="file" name="image" id="file">
            </div>

            <div>
                <label for="message">Message <span style="color: red;">*</span></label>
                @error('message')
                    <p class="error-message">{{$message}}</p>
                @enderror
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
            </div>
       
            <input type="submit" value="Add a new testimonial">
       </form>

       <h1>Testimonials</h1>

       <div class="testimonials">
           @foreach ($testimonials as $testimonial)
           <div class="tesmonial-container">
            @if($testimonial->image )

               <img src="{{ asset('storage/images/'.$testimonial->image) }}" alt="Avatar" >
            @else 
            <img src="{{ asset('placeholder.png') }}" alt="Avatar" >

            @endif

                <h2>{{$testimonial->titre}}</h2>
                <p>{{$testimonial->message}}</p>
            </div>
            @endforeach
       </div>
   </div> 

</body>


</html>