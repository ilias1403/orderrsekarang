<!DOCTYPE html>
<html>
<body>

<h2>Borang Pesanan</h2>

<form action="">
  <label for="fname">Nama:</label><br>
  <input type="text" id="fname" name="fname" value="{{ isset($borang->name) ? $borang->name : '' }}"><br><br>
  <label for="lname">Number Telefon:</label><br>
  <input type="text" id="lname" name="lname" value="{{ isset($borang->phone_number) ? $borang->phone_number : '' }}"><br><br>
  <label for="lname">Alamat:</label><br>
  <textarea type="text" id="lname" name="lname" rows="4" cols="50" value="">{{ isset($borang->address_1) ? $borang->address_1 : '' }}</textarea><br><br>
  <label for="lname">Poskod:</label><br>
  <input type="text" id="lname" name="lname" value="{{ isset($borang->postcode) ? $borang->postcode : '' }}"><br><br>
  <label for="lname">Bandar:</label><br>
  <input type="text" id="lname" name="lname" value="{{ isset($borang->city) ? $borang->city : '' }}"><br><br>
  <label for="lname">Negeri</label><br>
  <input type="text" id="lname" name="lname" value="{{ isset($borang->state) ? $borang->state : '' }}"><br><br>
  <input type="submit" value="Submit">
</form> 


</body>
</html>