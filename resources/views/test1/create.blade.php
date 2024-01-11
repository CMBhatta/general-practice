<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Blade</title>
</head>
<body>
<h3>Fill the given form to submit your date</h3>
</body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action = "{{route('test1.store')}}" method ="post">
    @csrf
    <div>
       <label for ="name">Full Name:</label> <br>
       <input type ="text" id = "name" name = "name"> <br>
    </div>
    <div>
        <label for="contact">Contact Number:</label><br>
        <input type="tel" id="contact" name="contact" pattern="[0-9]{10}" required><br>
    </div>
    
     <div>
        <label for="email">Email:</label> <br>
        <input type="email" name="email" id="email"> <br>
     </div>
      <div>
        <input type="submit">
      </div>
</form>
</html>