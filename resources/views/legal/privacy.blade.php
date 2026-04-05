<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sera ya Faragha - Malkia Konnect</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-green: #2D6A4F;
            --primary-green-light: #52B788;
            --primary-green-dark: #1B4332;
            --accent-gold: #FFD700;
            --white: #FFFFFF;
            --cream: #F0FDF4;
            --warm-white: #ECFDF5;
            --text-dark: #064E3B;
            --text-mid: #065F46;
            --text-light: #10B981;
            --border: #38A169;
            --border-focus: #2F855A;
            --error: #E53E3E;
            --radius: 20px;
            --shadow-md: 0 6px 24px rgba(27, 67, 50, 0.15);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #F0FDF4 0%, #D1FAE5 100%);
            color: var(--text-dark);
            line-height: 1.6;
            padding: 40px 20px;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        header {
            background: var(--primary-green);
            color: white;
            padding: 40px 0;
            text-align: center;
            border-radius: 0 0 24px 24px;
        }

        h1 {
            font-family: 'DM Serif Display', serif;
            margin: 0;
            color: var(--primary-green-dark);
        }

        .content {
            background: white;
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.05);
            margin-top: -20px;
            border: 2px solid var(--border);
        }

        h2 {
            color: var(--primary-green-dark);
            border-bottom: 2px solid var(--cream);
            padding-bottom: 10px;
            margin-top: 30px;
        }

        .lang-toggle {
            text-align: right;
            margin-bottom: 20px;
        }

        .lang-btn {
            background: none;
            border: 1px solid var(--border);
            padding: 5px 15px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 600;
        }

        .lang-btn.active {
            background: var(--primary-green);
            color: white;
            border-color: var(--primary-green);
        }

        .en {
            display: none;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 30px;
            transition: all 0.2s ease;
        }

        .back-link:hover {
            color: var(--primary-green-dark);
            transform: translateX(-4px);
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1 class="sw">Sera ya Faragha</h1>
            <h1 class="en">Privacy Policy</h1>
        </div>
    </header>

    <div class="container">
        <div class="lang-toggle">
            <button class="lang-btn active" onclick="toggleLang('sw')">SW</button>
            <button class="lang-btn" onclick="toggleLang('en')">EN</button>
        </div>

        <div class="content">
            <div class="sw">
                <h2>1. Taarifa Tunazokusanya</h2>
                <p>Tunakusanya jina lako, namba ya WhatsApp, na hali yako ya uzazi ili kukupa ushauri sahihi.</p>
                <h2>2. Matumizi ya Taarifa</h2>
                <p>Taarifa zako zinatumiwa kukutumia ujumbe wa ushauri kupitia WhatsApp pekee.</p>
                <h2>3. Usalama wa Taarifa</h2>
                <p>Tunachukua hatua madhubuti kulinda taarifa zako dhidi ya matumizi yasiyoidhinishwa.</p>
            </div>

            <div class="en">
                <h2>1. Information We Collect</h2>
                <p>We collect your name, WhatsApp number, and maternity status to provide relevant guidance.</p>
                <h2>2. Use of Information</h2>
                <p>Your information is used solely to send you maternity advice via WhatsApp.</p>
                <h2>3. Data Security</h2>
                <p>We take strict measures to protect your information from unauthorized access.</p>
            </div>
            
            <div style="margin-top: 40px; text-align: center;">
                <a href="{{ route('intake.create') }}" style="color: var(--primary-teal); font-weight: 600; text-decoration: none;">&larr; Rudi kwenye Fomu</a>
            </div>
        </div>
    </div>

    <script>
        function toggleLang(lang) {
            document.querySelectorAll('.sw, .en').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.' + lang).forEach(el => el.style.display = 'block');
            document.querySelectorAll('.lang-btn').forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
        }
    </script>
</body>
</html>
