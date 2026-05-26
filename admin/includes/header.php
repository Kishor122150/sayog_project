<?php include 'auth_check.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel | Jibon Sahayog</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #0f172a;
            color: white;
            padding: 20px;
        }

        .sidebar a {
            display: block;
            color: #cbd5e1;
            padding: 10px;
            text-decoration: none;
            border-radius: 8px;
        }

        .sidebar a:hover {
            background: #1e293b;
            color: white;
        }

        .main {
            margin-left: 260px;
            padding: 20px;
        }

        .card-box {
            border-radius: 12px;
            padding: 20px;
            color: white;
        }

        .bg-green { background: #16a34a; }
        .bg-blue { background: #2563eb; }
        .bg-orange { background: #f97316; }
        .bg-red { background: #dc2626; }
    </style>
</head>
<body>