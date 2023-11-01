<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route("testimonials.store")}}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <label for="titre">TITRE*</label><br><br>
   
    @error('titre')
        <p class="error-message">{{$message}}</p>
    @enderror
    
    <input type="text" name="titre" id="titre"><br><br>
   
   
    <label for="file"></label><br><br>
   
    @error('image')
      <p class="error-message">{{$message}}</p>
    @enderror
    
    <input type="file" name="image" id="file"><br><br>

    <label for="message"></label><br><br>
    
    @error('message')
                        <p class="error-message">{{$message}}</p>
    @enderror
    
    <textarea name="message" id="message" cols="30" rows="10"></textarea><br><br>
    
    
    <input type="submit" value="add new testimonial">

</form>


<img src="{{ asset('storage/images/il_794xN.4085471423_5uih.jpg') }}" alt="Image">


</body>


</html>