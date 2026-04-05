<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masharti ya Huduma - Malkia Konnect</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-teal: #85C2BE;
            --primary-teal-dark: #6AB0AC;
            --text-dark: #1E293B;
            --text-mid: #475569;
            --border: #CBD5E1;
            --white: #FFFFFF;
            --cream: #F8FAFC;
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--cream); color: var(--text-dark); line-height: 1.6; margin: 0; padding: 0; }
        .container { max-width: 800px; margin: 40px auto; padding: 0 20px; }
        header { background: var(--primary-teal); color: white; padding: 40px 0; text-align: center; border-radius: 0 0 24px 24px; }
        h1 { font-family: 'DM Serif Display', serif; margin: 0; }
        .content { background: white; padding: 40px; border-radius: 24px; box-shadow: 0 4px 16px rgba(0,0,0,0.05); margin-top: -20px; }
        h2 { color: var(--primary-teal); border-bottom: 2px solid var(--cream); padding-bottom: 10px; margin-top: 30px; }
        .lang-toggle { text-align: right; margin-bottom: 20px; }
        .lang-btn { background: none; border: 1px solid var(--border); padding: 5px 15px; border-radius: 20px; cursor: pointer; font-weight: 600; }
        .lang-btn.active { background: var(--primary-teal); color: white; border-color: var(--primary-teal); }
        .en { display: none; }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1 class="sw">Masharti ya Huduma</h1>
            <h1 class="en">Terms of Service</h1>
        </div>
    </header>

    <div class="container">
        <div class="lang-toggle">
            <button class="lang-btn active" onclick="toggleLang('sw')">SW</button>
            <button class="lang-btn" onclick="toggleLang('en')">EN</button>
        </div>

        <div class="content">
            <div class="sw">
                <h2>1. Utangulizi</h2>
                <p>Karibu Malkia Konnect. Kwa kutumia huduma zetu, unakubaliana na masharti haya.</p>
                <h2>2. Huduma Zetu</h2>
                <p>Malkia Konnect hutoa taarifa na ushauri wa afya ya uzazi kupitia WhatsApp na mitandao mingine.</p>
                <h2>3. Faragha</h2>
                <p>Taarifa zako ni siri. Tunatumia namba yako ya simu kukutumia ujumbe tu.</p>
            </div>

            <div class="en">
                <h2>1. Introduction</h2>
                <p>Welcome to Malkia Konnect. By using our services, you agree to these terms.</p>
                <h2>2. Our Services</h2>
                <p>Malkia Konnect provides maternal health information and guidance via WhatsApp and other platforms.</p>
                <h2>3. Privacy</h2>
                <p>Your information is confidential. We only use your phone number to send you messages.</p>
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
