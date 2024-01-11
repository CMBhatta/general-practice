<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Validation</title>
    <style>
        table, th, td {
          border:1px solid black;
        }
        </style>
</head>
<table style="width:100%">
    Hello This is Index Page. <br>
    <a href="{{route('test1.create')}}">Go to Create Page</a>
    <br><br>
    <table>
        <thead>
            <th style="width: 1%">
                ID
            </th>
            <th style="width: 20%">
                 Name
            </th>
            <th style="width: 30%">
                Contact No
            </th>
            <th>
                Email
            </th>
            <th style="width: 8%" class="text-center">
              Action
          </th>
    </thead>
    <tbody>
     @foreach ($contacts as $contact)
     <tr>
        <td>{{$contact->id}}</td>
        <td>{{$contact->name}}</td>
        <td>{{$contact->contact}}</td>
        <td>{{$contact->email}}</td>
    </tr>
     @endforeach
   
 </tbody>
    </table>

</body>
</html>