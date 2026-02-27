<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Lotus Bungalow | Admin Dashboard</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-red: #D32F2F;
            --primary-red-hover: #B71C1C;
            --accent-gold: #FFC107;
            --text-dark: #333333;
            --text-light: #666666;
            --bg-light: #F4F7F6;
            --white: #ffffff;
            --shadow-card: 0 4px 15px rgba(0, 0, 0, 0.05);
            --shadow-hover: 0 8px 25px rgba(0, 0, 0, 0.1);
            --radius: 12px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ================= NAVBAR FIX ================= */
        .navbar {
            background-color: var(--primary-red);
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            color: #ffffff !important;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand:hover {
            color: #ffffff;
        }

        .brand-icon {
            width: 34px;
            height: 34px;
            background-color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-red);
            font-size: 1.2rem;
            font-weight: bold;
        }

        .nav-menu {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .nav-link {
            color: #ffffff !important;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 8px 16px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: rgba(255,255,255,0.18);
            color: #ffffff;
        }

        .nav-link.active {
            background-color: #ffffff;
            color: var(--primary-red) !important;
            font-weight: 600;
        }

        .menu-toggle {
            display: none;
            color: #ffffff;
            font-size: 1.6rem;
            cursor: pointer;
        }

        /* ================= MAIN CONTENT ================= */
        .main-content {
            flex: 1;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            padding: 40px 20px;
        }

        .welcome-header {
            margin-bottom: 40px;
        }

        .welcome-header h1 {
            font-size: 2rem;
            margin-bottom: 5px;
        }

        .welcome-header p {
            color: var(--text-light);
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }

            .nav-menu {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: var(--primary-red);
                padding: 20px;
            }

            .nav-menu.active {
                display: flex;
            }

            .nav-link {
                width: 100%;
                text-align: center;
                padding: 12px;
            }

            .menu-toggle {
                display: block;
            }
        }
    </style>
</head>
<body>