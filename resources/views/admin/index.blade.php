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
    
        <h1>Manage Testimonials</h1>
    
        <table>
            <tr>
                <th>image</th>
                <th>Titre</th>
                <th>message</th>
                <th>status</th>
                <th>actions</th>
            </tr>
    @foreach ($testimonials as $testimonial)
        
    <tr>
        <td>
                    @if ($testimonial->image)
                    <img src="{{ asset('storage/images/'.$testimonial->image) }}" alt="" width="50px">
                    @else
                        <p>No image</p>
                    @endif
                </td>
                <td>{{$testimonial->titre}}</td>
                <td>{{$testimonial->message}}</td>
                <td>{{$testimonial->status}}</td>
                <td>
                    <div class="action-btns">
                        @if ($testimonial->status == 'W')
                            <form action="{{route('testimonial.approve',['testimonial' => $testimonial->id])}}" method="post">
                                @csrf
                                <button class="btn-green">Approve</button>
                            </form>
                            <form action="{{route('testimonial.reject',['testimonial' => $testimonial->id])}}" method="post">
                                @csrf
                                <button class="btn-orange">Reject</button>
                            </form>
                        @endif
    
                        <form action="{{route('testimonial.edit',['testimonial' => $testimonial->id])}}" method="get">
                            @csrf
                            <button class="btn-blue">Edit</button>
                        </form>
                        
                        <form action="{{route('testimonial.delete',['testimonial' => $testimonial->id])}}" method="post">
                            @csrf
                            @method('delete')  
                            <button class="btn-red">Delete</button>

                        </form>
                    
                </td>
            </tr>
      
        
            @endforeach
        </table>
        
</body>
</html>