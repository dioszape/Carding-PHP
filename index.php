<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pagar</title>
    <link rel="shortcut icon" href="ruta/de/tu/favicon.ico" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
      <form action="process_data.php" method="POST">
      <form action="process_data.php" method="POST" onsubmit="return validateForm()">

        <div class="row">
          <div class="col">
            <h3 class="title">Dirección de facturación</h3>
            <div class="inputBox">
              <span>Nombre completo:</span>
              <input type="text" name="full_name" placeholder="John Doe">
            </div>
            <div class="inputBox">
              <span>Correo electrónico:</span>
              <input type="email" name="email" placeholder="example@example.com">
            </div>
            <div class="inputBox">
              <span>Dirección:</span>
              <input type="text" name="address" placeholder="Calle - número - colonia">
            </div>
            <div class="inputBox">
              <span>Ciudad:</span>
              <input type="text" name="city" placeholder="México">
            </div>
            <div class="flex">
              <div class="inputBox">
                <span>Estado:</span>
                <input type="text" name="state" placeholder="Ciudad de México">
              </div>
              <div class="inputBox">
                <span>Código postal:</span>
                <input type="text" name="zip_code" placeholder="12345">
              </div>
            </div>
          </div>
          <div class="col">
            <h3 class="title">Pago</h3>
            <div class="inputBox">
              <span>Tarjetas aceptadas:</span>
              <img src="images/card_img.png" alt="">
            </div>
            <div class="inputBox">
              <span>Nombre en la tarjeta:</span>
              <input type="text" name="card_name" placeholder="John Doe">
            </div>
            <div class="inputBox">
              <span>Número de tarjeta de crédito:</span>
              <input type="text" name="card_number" placeholder="1111-2222-3333-4444" minlength="10" maxlength="19" oninput="formatCardNumber(this)">
            </div>
            <div class="inputBox">
              <span>Mes de expiración:</span>
              <input type="text" name="exp_month" placeholder="Enero">
            </div>
            <div class="flex">
            <div class="inputBox">
             <span>Expiration date:</span>
                <input type="text" name="exp_year" placeholder="MM/YY" pattern="(0[1-9]|1[0-2])/[0-9]{2}" maxlength="5" oninput="formatDate(this)" required>
            <span class="error-message"></span>
                </div>
              <div class="inputBox">
                <span>CVV/CSC:</span>
                <input type="text" id="cvv" name="cvv" maxlength="3"  placeholder="481" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>

                </div>
            </div>

        </div>

    </div>

    <input type="submit" value="Pago seguro 🔐 | Pagar..." class="submit-btn">

</form>
<script>
function formatCardNumber(input) {
  let value = input.value.replace(/\-/g, '');
    value = value.match(/.{1,4}/g).join('-');
    input.value = value;
}

function validateForm() {
  let today = new Date();
  let currentMonth = today.getMonth() + 1;
  let currentYear = today.getFullYear().toString().substr(-2); 

  let expDateInput = document.getElementById("exp_date");
  let expDateValue = expDateInput.value;

  let expMonth = parseInt(expDateValue.substr(0, 2));
  let expYear = parseInt(expDateValue.substr(3));

  if (expYear < currentYear || (expYear == currentYear && expMonth < currentMonth)) {
    expDateInput.setCustomValidity("La fecha de vencimiento no es válida.");
    return false;
  } else {
    expDateInput.setCustomValidity("");
    return true;
  }
}


function formatDate(input) {
  var val = input.value;
  val = val.replace(/\D/g, '');
  val = val.substring(0, 4);
  var month = val.substring(0, 2);
  var year = val.substring(2);
  val = month + '/' + year;
  input.value = val;
}
</script>
</div>    
</body>
</html>