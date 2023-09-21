<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica de la Sesion 5</title>

    <!-- Estilos bootstrap y css  -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <style>
        #frm_datos {
            margin: 0 auto;
            width: 30%;
            padding: 10px;
            border: 2px solid #000;
            border-radius: 10px;
            background-color: #fff;
        }

        body {
            background-color: gray;
        }

        h2 {
            font-size: 20px;
        }
    </style>

    <script>

        function ValidaFormulario() {

            var box = document.getElementById("BoxNumbers").value;


            if (box == "00") {
                alert("Seleccione un Numero");
                return false;
            }
            return true;
        }

    </script>
</head>

<body>

    <div class="conatiner text-center ">

        <div class="row">

            <div class="col-12 ">
                <h1>Formulario</h1>

                <form action="funciones_usuario_2023b.php" method="post" id="frm_datos"
                    onsubmit="return ValidaFormulario()">
                    <h2>Captura de Datos de un Numero Entero</h2>
                    <select name="BoxNumbers" id="BoxNumbers">

                        <option value="00"> -- Selecione un Numero -- </option>
                        <option value="10"> 10 </option>
                        <option value="20"> 20 </option>
                        <option value="30"> 30 </option>
                        <option value="40"> 40 </option>
                        <option value="50"> 50 </option>

                    </select>

                    <br><br>

                    <input type="hidden" id="jesus" name="emmanuel" value="Jesus Santos">

                    <input type="submit" value="Enviar Datos" id="btn_grabar">
                </form>

            </div>

        </div>


    </div>

</body>

        

</html>