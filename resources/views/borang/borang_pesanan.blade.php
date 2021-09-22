<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    .center 
    {
      margin: auto;
      width: 80%;
    }
  </style>

  </head>
<body>

<div class="container center">
  <h2>Borang Pesanan</h2>

  <form action="{{ route('send_borang') }}" method="POST">
    @csrf
    <label for="fname">Nama:</label><br>
    <input class="form-control" type="text" id="name" name="name" value="{{ isset($borang->name) ? $borang->name : '' }}"><br><br>

    <label for="lname">Number Telefon:</label><br>
    <input class="form-control" type="text" id="phone" name="phone" value="{{ isset($borang->phone_number) ? $borang->phone_number : '' }}"><br><br>

    <label for="lname">Alamat:</label><br>
    <textarea class="form-control" type="text" id="address" name="address" rows="4" cols="50" value="">{{ isset($borang->address_1) ? $borang->address_1 : '' }}</textarea><br><br>

    <label for="lname">Poskod:</label><br>
    <input class="form-control" type="text" id="postcode" name="postcode" value="{{ isset($borang->postcode) ? $borang->postcode : '' }}"><br><br>

    <label for="lname">Bandar:</label><br>
    <input class="form-control" type="text" id="city" name="city" value="{{ isset($borang->city) ? $borang->city : '' }}"><br><br>

    <label for="lname">Negeri</label><br>
    <input class="form-control" type="text" id="state" name="state" value="{{ isset($borang->state) ? $borang->state : '' }}"><br><br>

    <label for="lname">Negara</label><br>
    <input class="form-control" type="text" id="country" name="country" value="{{ isset($borang->country) ? $borang->country : '' }}"><br><br>

    <div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">Olive Tin</label>
      <select class="form-control" id="inputGroupSelect01" name="set_code">
        <option value="set_percubaan">Pakej Percubaan - RM 50</option>
        <option value="set_special">Pakej Special -  RM 110</option>
        <option value="set_borong">Pakej Borong - RM150</option>
      </select>
    </div>

    <br>

    <button type="submit" class="btn btn-primary float-right">Hantar</button>
  </form> 
</div>



</body>
</html>