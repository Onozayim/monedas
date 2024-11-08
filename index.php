<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);

$sql = "SELECT * FROM monedas;";
$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) 
        $data[] = $row;

} else {
    echo "0 results";
}

$sql2 = "SELECT SUM(moneda) as total FROM monedas;";
$result = $conn->query($sql2);
$total = 0;

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc())
        $total = $row['total'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONEDAS</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <style>
        html,
        body,
        .intro {
            height: 100%;
        }

        table td,
        table th {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        thead th {
            color: #fff;
        }

        .card {
            border-radius: .5rem;
        }

        .table-scroll {
            border-radius: .5rem;
        }

        .table-scroll table thead th {
            font-size: 1.25rem;
        }

        thead {
            top: 0;
            position: sticky;
        }
    </style>
    <section class="intro">
        <div class="bg-image h-100" style="background-color: #f5f7fa;">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <h1>DINERO TOTAL: <?= $total; ?></h1>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; max-height: 700px">
                                        <table class="table table-striped mb-0">
                                            <thead style="background-color: #002d72;">
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Moneda Ingresada</th>
                                                    <th scope="col">Hora</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($data as $moneda): ?>
                                                    <tr>
                                                        <td><?= $moneda['id']; ?></td>
                                                        <td><?= $moneda['moneda']; ?></td>
                                                        <td><?= $moneda['created_at']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>