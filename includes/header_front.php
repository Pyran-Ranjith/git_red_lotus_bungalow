<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Lotus Bungalow | Admin Dashboard</title>
    <!-- Using Google Fonts for a modern typography -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* --- CSS Reset & Base Variables --- */
        :root {
            --primary-red: #D32F2F; /* Deep Red matching your brand */
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

        /* --- Navigation Bar --- */
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
            color: var(--white);
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Lotus Icon Simulation */
        .brand-icon {
            width: 32px;
            height: 32px;
            background-color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-red);
            font-size: 1.2rem;
        }

        .nav-menu {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 8px 16px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            color: var(--white);
        }

        .nav-link.active {
            background-color: var(--white);
            color: var(--primary-red);
            font-weight: 600;
        }

        /* Mobile Menu Toggle */
        .menu-toggle {
            display: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* --- Main Content --- */
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
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .welcome-header p {
            color: var(--text-light);
        }

        /* --- Stats Cards --- */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

      .stat-card {
            background: var(--white);
            padding: 30px;
            border-radius: var(--radius);
            box-shadow: var(--shadow-card);
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 5px solid var(--primary-red);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .stat-info h3 {
            font-size: 0.9rem;
            text-transform: uppercase;
            color: var(--text-light);
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .stat-info .number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background-color: #FFF0F0; /* Light red bg */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-red);
        }

        .stat-icon svg {
            width: 30px;
            height: 30px;
        }

        /* --- Action Section --- */
        .actions-section {
            margin-top: 20px;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--text-dark);
            border-left: 4px solid var(--primary-red);
            padding-left: 15px;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .action-card {
            background: var(--white);
            border-radius: var(--radius);
            padding: 25px;
            box-shadow: var(--shadow-card);
            text-decoration: none;
            color: var(--text-dark);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 20px;
            border: 1px solid transparent;
        }

        .action-card:hover {
            border-color: var(--primary-red);
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }

        .action-icon {
            width: 50px;
            height: 50px;
            background-color: var(--bg-light);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-red);
        }

        .action-text h4 {
            font-size: 1.1rem;
            margin-bottom: 4px;
        }

        .action-text p {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .btn-logout {
            background-color: #ffebee;
            color: #d32f2f;
        }
        
        .btn-logout:hover {
            background-color: #ffcdd2;
        }

        /* --- Footer --- */
        footer {
            background-color: #1a1a1a;
            color: #b0b0b0;
            text-align: center;
            padding: 25px 20px;
            margin-top: auto;
            font-size: 0.9rem;
            border-top: 3px solid var(--primary-red);
        }

        /* --- Responsive Adjustments --- */
        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }
            
            .nav-menu {
                display: none; /* Hidden by default on mobile */
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: var(--primary-red);
                padding: 20px;
                box-shadow: 0 10px 10px rgba(0,0,0,0.1);
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
            
            .stat-info .number {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
