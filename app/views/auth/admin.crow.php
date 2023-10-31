<!--exemplar acesso admin-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CarVision - Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/style.css" rel="stylesheet">
<link rel="shortcut icon" href="../../assets/images/icon_aba.ico" type="image/x-icon">
</head>

<body>
<div class="diagonal-menor">
</div>
<section>
    @if (isset($error))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Aviso: </strong> {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @endif
    @if (isset($success))
  <div class="container-box5">
    @foreach ($vehicles as $vehicle)
      <div class="vehicle-container">
        <div class="vehicle-info">
          <div class="info-item">
            <strong>Placa:</strong> {{ $vehicle->license_plate }}
          </div>
          <div class="info-item">
            <strong>Marca:</strong> {{ $vehicle->brand }}
          </div>
          <div class="info-item">
            <strong>Modelo:</strong> {{ $vehicle->model }}
          </div>
          <div class="info-item">
            <strong>Ano:</strong> {{ $vehicle->year }}
          </div>
          <div class="info-item">
            <strong>Cor:</strong> {{ $vehicle->color }}
          </div>
        </div>
        <div class="vehicle-status">
          <strong>Status:</strong> {{ $vehicle->status }}
        </div>
        <div class="driver-info">
          @foreach ($drivers as $driver)
            @if ($driver->vehicle_id == $vehicle->id)
              <strong>Condutor:</strong> {{ $driver->name }}
            @endif
          @endforeach
        </div>
      </div>
    @endforeach
  </div>

  <div class="container2-box5">
    <img src="../../assets/images/icon.png" class="icon-profile">
    <br>
    <img src="../../assets/images/cadastro-edita.png" class="option">
    <button class="btn btn-primary btn-veiculo">Veículo</button><br><br>
    <button class="btn btn-primary btn-veiculo">Motorista</button><br><br>
    <br>
    <img src="../../assets/images/excluir.png" class="option">
    <button class="btn btn-primary btn-veiculo">Veículo</button><br><br>
    <button class="btn btn-primary btn-veiculo">Motorista</button><br><br>
  </div>
    @endif
</section>
</body>
</html>