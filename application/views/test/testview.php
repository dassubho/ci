<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <title>Angularjs Login Script using PHP MySQL and Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
</head>

<body ng-app="" ng-init='data=<?php echo $value; ?>'>
    <div class="container">
        <table class="table" id="suplier_table">
            <thead>
                <tr>
                    <th scope="col">State ID</th>
                    <th scope="col">State Code</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="datas in data">
                    <td>{{ datas.id }}</td>
                    <td>{{ datas.state_name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>