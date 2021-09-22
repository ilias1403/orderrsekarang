<!DOCTYPE html>
<html>
<head>
    <!-- <title>How to create url shortener using Laravel? - ItSolutionStuff.com</title> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">
   
    <div class="card">
      <div class="card-header">
      </div>
      <div class="card-body">
   
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
   
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borang as $row)
                        <tr>
                            <td><a href="{{ route('url', $row->phone_number) }}" target="">{{ route('url', $row->phone_number) }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>
   
</div>
    
</body>
</html>