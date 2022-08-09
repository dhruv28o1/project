<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
    @media print {
        #btn {
            display: none;
        }
    }
    </style>
</head>

<body>
    <div class="container mt-3">

        <table class="table table-bordered">
            <tr class="text-center" colspan="3">
                <th class="bg-dark text-light">
                    <img class="float-left rounded-circle" src="logo.jfif" height="100px" alt="">
                </th>
                <th class="bg-primary text-light">
                    <P>
                        GOVT. Degree College (boys)-Udhampur
                    </P>
                    <h2>REGISTRATION FORM(2021-22)</h2>
                </th>
            </tr>
        </table>
        <table class="table">

            <!-- column 2 -->
            <tr>
                <th>Name:</th>
                <td colspan="2"><?php echo $row['first_name'] . " " . $row['Last_name']; ?></td>
                <td rowspan="3"><?php echo "<img src='$image' width=100px>"; ?></td>
            </tr>
            <tr>
                <th>date of birth:</th>
                <td colspan="2"><?php echo $row['dob']; ?></td>
            </tr>
            <tr>
                <th>Gender:</th>
                <td colspan="2"><?php echo $row['gender']; ?></td>
            </tr>

            <!-- column 4 -->
            <tr>
                <th>Father's Name:</th>
                <td><?php echo $row['father_name']; ?></td>
                <th>Occupation:</th>
                <td><?php echo $row['father_occupation']; ?></td>
            </tr>

            <tr>
                <th>Mother's Name:</th>
                <td><?php echo $row['mother_name']; ?></td>
                <th>Occupation:</th>
                <td><?php echo $row['mother_occupation']; ?></td>
            </tr>
            <tr>
                <th>Religion:</th>
                <td><?php echo $row['religion']; ?></td>
                <th>Category:</th>
                <td><?php echo $row['category']; ?></td>
            </tr>
            <tr>
                <th>Income:</th>
                <td colspan="3"><?php echo $row['income']; ?></td>
            </tr>
            <tr>
                <th>Phone:</th>
                <td colspan="3"><?php echo $row['number']; ?></td>
            </tr>
        </table>
        <div class="d-flex justify-content-center">
            <button id="btn" type="button" class="btn btn-primary" onclick="window.print();">print</button>
        </div>
    </div>
</body>

</html>