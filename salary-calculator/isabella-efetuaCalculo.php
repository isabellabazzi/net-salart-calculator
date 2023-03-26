<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>

  <body class="text-bg-light">
    <div class="container text-center">
        <div class="col mt-5">
            <h3>Calculadora de Salário Líquido com dedução de INSS, Dependentes e IRRF</h3>
        </div>

        <div class="row-4">
            <div class="col mt-5">
            <form method="GET">
                    <div class="mb-4">
                        <label for="salario" class="form-control-label pb-3">Salário</label>
                        <input type="number" class="form-control" id="salario" name="salario" placeholder="Digite o seu salário">
                    </div>
                    <div class="mb-4">
                        <label for="dependentes" class="form-control-label pb-3">Número de Dependentes</label>
                        <input type="number" class="form-control" id="dependentes" name="dependentes" placeholder="Digite o número de dependentes">
                    </div>
                    <button type="submit" class="btn btn-dark mb-4">Calcular</button>
                </form>

                <?php
                include "./isabella-calculosalario.php";
                if (isset($_GET['salario'])){
                    echo calcularINSS();
                }
                ?>
         </div>
            </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>

</html>
                