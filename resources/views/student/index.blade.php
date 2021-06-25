<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Students <a href="#" class="btn btn-success" data-toggle="modal" data-target="#studentModal" style="float: right;">+ Add New Student</a>
                        </div>
                        <div class="card-body">
                            <table id="studentTable" class="table">
                                <thead>
                                    <tr>
                                        <th>First name </th>
                                        <th>Last name </th>
                                        <th>Email name </th>
                                        <th>Phone name </th>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{$student->firstname}}</td>
                                        <td>{{$student->lastname}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->phone}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <!-- Modal -->
  <div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="studentForm">
              @csrf
              <div class="form-group">
                  <label for="firstname">First Name</label>
                  <input type="text" class="form-control" id="firstname"/>
              </div>
              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email"/>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone"/>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
      $("#studentForm").submit(function(e){
          e.preventDefault();

          let firstname = $('#firstname').val();
          let lastname = $('#lastname').val();
          let email = $('#email').val();
          let phone = $('#phone').val();
          let _token = $("input[name=_token").val();

          $.ajax({
              url: "{{route('student.add')}}",
              type: "POST",
              data:{
                  firstname:firstname,
                  lastname:lastname,
                  email:email,
                  phone:phone,
                  _token:_token
              },
              success: function(response)
              {
                  if(response){
                      $("#studentTable tbody").prepend('<tr><td>'+ response.firstname +'</td><td>'+ response.lastname +'</td><td>'+response.email+'</td><td>'+response.phone+'</td></tr>');
                      $("#studentForm")[0].reset();
                      $("#studentModal").modal('hide');
                    }
              }
          })

      })
  </script>
</body>
</html>