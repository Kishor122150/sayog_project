<?php include 'auth_check.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Donor Dashboard | Jibon Sahayog</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>

        body {
            background: #f4f7fb;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            background: #0f172a;
            color: white;
            padding: 20px;
        }

        .sidebar a {
            display: block;
            color: #cbd5e1;
            padding: 12px;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .sidebar a:hover {
            background: #1e293b;
            color: white;
        }

        .main-content {
            margin-left: 270px;
            padding: 20px;
        }

        .card-box {
            border-radius: 15px;
            padding: 20px;
            color: white;
        }

        .bg1 { background: #16a34a; }
        .bg2 { background: #2563eb; }
        .bg3 { background: #f97316; }
        .bg4 { background: #dc2626; }

    </style>

</head>

<body>