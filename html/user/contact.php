<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<title>Contactanos</title>
<link rel="icon" href="../../images/MADRIGUERA-LOGO.png">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../../css/contacto.css">
</head>

  <header class="pag1">
    <nav class="nav-bar">
      <ul id="nav-list">
      <div class="izquierda">
          <li> <img src="../../images/MADRIGUERA-LOGO.png" alt="Topos FC"></li>
          <li> <a href="#Home"> Inicio </a> </li>
          <li> <a href="#News"> Reservas </a> </li>
          <li> <a href="# About Us"> Estadísticas </a> </li>
          <li> <a href="# About Us"> Calendario </a> </li>
          <li> <a href="# About Us"> Ligas </a> </li>
          </div>
          <div id="derecha_b">
            <a class="boton_nav" href="../administrator/login.html">¿Eres administrador?</a>
          </div>
      </ul>
      
    </nav>
    </header>
    <body>
      <div class="fondo">
    <div class="container">
        <div class="box-info">
            <h1>CONTÁCTATE CON NOSOTROS</h1>
            <div class="data">
                <p><i class="fa-solid fa-phone"></i> 2461886986</p>
                <p><i class="fa-solid fa-envelope"></i> yoquienmas@gmail.com</p>
                <p><i class="fa-solid fa-location-dot"></i> ubicaciondesconocidaestoyhastamimadre</p>
            </div>
            <div class="links">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            </div>
        </div>

        <div class="row">
            <div class="column">
                <form action="../../php/mailgun.php" method="post" id="contact-form">
                  
                    <?php echo((!empty($errorMessage)) ? $errorMessage : '') ?>
                    <table>
                        
                        <tr>
                            <td class="info"><label for="name">Nombre *</label></td>
                            <td><input type="text" id="name" name="fullname" required minlength="3" maxlength="100"></td>
                        </tr>
                        <tr>
                            <td class="info"><label for="phone">Telefono</label></td>
                            <td><input type="tel" id="phone" name="phone"></td>
                        </tr>
                        <tr>
                            <td class="info"><label for="email">Correo *</label></td>
                            <td><input type="email" id="email" name="email" required></td>
                        </tr>
                        <tr>
                            <td class="info"><label for="subjec">Tema *</label></td>
                            <td><input type="text" id="subjec" name="subjec" required></td>
                        </tr>
                        <tr>
                            <td class="info"><label for="question">Mensaje *</label></td>
                            <td><textarea id="question" name="question"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="button">Enviar</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    </div>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
    <script>
        const constraints = {
            fullname: {
                presence: {allowEmpty: false}
            },
            email: {
                presence: {allowEmpty: false},
                email: true
            },
            subjec: {
                presence: {allowEmpty: false}
            },
            question: {
                presence: {allowEmpty: false}
            }
        };

        const form = document.getElementById('contact-form');
        form.addEventListener('submit', function (event) {
            const formValues = {
                fullname: form.elements.fullname.value,
                email: form.elements.email.value,
                subjec: form.elements.subjec.value,
                question: form.elements.question.value
            };

            const errors = validate(formValues, constraints);

            if (errors) {
                event.preventDefault();
                const errorMessage = Object.values(errors).map(function (fieldValues) {
                    return fieldValues.join(', ')
                }).join("\n");
                alert(errorMessage);
            }
        }, false);
    </script>
</body>
</html>