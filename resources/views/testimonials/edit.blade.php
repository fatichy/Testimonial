<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    
        <form class="testimonial-form" action="{{route("testimonial.update", ['testimonial' => $testimonial->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div>
                <label for="titre">Titre <span style="color: red;">*</span></label>
                @error('titre')
                    <p class="error-message">{{$message}}</p>
                @enderror
                <input type="text" name="titre" id="titre" value="{{$testimonial->titre}}">
            </div>

            @if ($testimonial->image)
                <img src="{{ asset('storage/images/'.$testimonial->image) }}" alt="Avatar" width="100px" >
            @endif
            <div>
                <img src="avatar.png" width="100px" alt="">
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
                <textarea name="message" id="message" cols="30" rows="10">{{$testimonial->message}}</textarea>
            </div>

            <div>
                <label for="status">Status</label>
                @error('status')
                    <p class="error-message">{{$message}}</p>
                @enderror
                <select name="status" id="status">
                    <option {{$testimonial->status == 'w' ? 'selected' : ''}}  value="W">en attente</option>
                    <option {{$testimonial->status =='A' ? 'selected' : ''}} value="A">Approuvè</option>
                    <option {{$testimonial->status =='R' ? 'selected' : ''}} value="R">Rejeter</option>
                </select>
            </div>

            <input type="submit" value="update">
        </form>
    </div>
</body>

   

</html>