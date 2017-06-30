<html>
<head>
  <title>Users Page</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/app.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="/js/main.js"></script>
</head>
<body>
<div class='notifications top-left'></div>
<center><table class="table-bordered">
<thead>
    <tr>
    <td>Name</td>
    <td>Surname</td>
    <td>Age</td>
    <td>Bank_account</td>
    <td>Edit</td>
    <td>Delete</td>
    </tr>
</thead>
<tbody>
@foreach($users as $user)
<tr>
<td>{{$user->name}}</td>
<td>{{$user->surname}}</td>
<td>{{$user->age}}</td>
<td>{{$user->bank_account}}</td>
<td>    
    <button class="btn-warning" data-toggle="modal" data-target="#edit">Edit</button>
    </td>
<td>      
      {{ Form::open(['method' => 'DELETE', 'url' => '/api/user', $user->_id]) }}
                {{ Form::hidden('id', $user->_id) }}
                {{ Form::submit('Delete',['class'=>'btn-danger']) }}
            {{ Form::close() }}
    </td>
</tr>
@endforeach
</tbody>
</table>

<br><br><br>
    <form method="POST" action="/api/user">
    <input type="text" name="name" placeholder="Enter username"/>
    <input type="text" name="surname" placeholder="Enter surname"/>
    <input type="text" name="age" placeholder="Enter age"/>
    <input type="text" name="bank_account" placeholder="Enter bank_account"/>
    <button class="btn-primary" id="create"> Create</button>
    </form>

    <div id="edit" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit user</h4>
          </div>
       <div class="modal-body">
                {{ Form::open(['method' => 'UPDATE', 'url' => '/api/user', $user->_id]) }}
                {{ Form::hidden('id', $user->_id) }}
                {{ Form::text('name', $user->name) }}
                {{ Form::text('surname', $user->surname) }}
                {{ Form::text('age', $user->age) }}
                {{ Form::text('bank_account', $user->bank_account) }}
                {{ Form::submit('Save',['class'=>'btn-success']) }}
            {{ Form::close() }}
         </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</center>
</body>
</html>