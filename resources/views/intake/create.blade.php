<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fomu ya Mama - Malkia Konnect</title>
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
    --shadow-sm: 0 2px 4px rgba(27, 67, 50, 0.1);
    --shadow-md: 0 6px 24px rgba(27, 67, 50, 0.2);
    --shadow-lg: 0 12px 48px rgba(27, 67, 50, 0.3);
    --radius: 20px;
    --radius-sm: 14px;
  }

  * { margin:0; padding:0; box-sizing:border-box; }

  body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: linear-gradient(135deg, #F0FDF4 0%, #D1FAE5 100%);
    color: var(--text-dark);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px 16px;
  }

  /* Background pattern */
  body::before {
    content: '';
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: 
      radial-gradient(ellipse at 20% 0%, rgba(45, 106, 79, 0.08) 0%, transparent 60%),
      radial-gradient(ellipse at 80% 100%, rgba(82, 183, 136, 0.05) 0%, transparent 60%);
    pointer-events: none;
    z-index: 0;
  }

  .page-wrapper {
    position: relative;
    z-index: 1;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px 16px 40px;
  }

  /* Header */
  .header {
    width: 100%;
    max-width: 480px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 20px;
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-dark) 100%);
    border-radius: 24px;
    box-shadow: var(--shadow-md);
    margin-bottom: 24px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
  }

  .logo-area {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .logo-image {
    width: 60px;
    height: 60px;
    object-fit: contain;
    filter: drop-shadow(0 2px 8px rgba(0,0,0,0.2));
    transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
  }

  .logo-image:hover {
    transform: scale(1.05);
  }

  .logo-text {
    font-family: 'DM Serif Display', serif;
    font-size: 26px;
    color: white;
    line-height: 1;
    font-weight: 400;
    letter-spacing: 0.5px;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }

  .logo-text span {
    display: block;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--accent-gold);
    margin-top: 4px;
    opacity: 0.95;
  }

  .lang-toggle {
    display: flex;
    background: white;
    border-radius: 20px;
    padding: 3px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border);
  }

  .lang-btn {
    padding: 6px 14px;
    border: none;
    background: transparent;
    border-radius: 17px;
    font-size: 12px;
    font-weight: 600;
    color: var(--text-light);
    cursor: pointer;
    transition: all 0.25s ease;
    font-family: inherit;
  }

  .lang-btn.active {
    background: var(--primary-green-light);
    color: white;
  }

  /* Card */
  .form-card {
    width: 100%;
    max-width: 480px;
    background: white;
    border-radius: 24px;
    box-shadow: var(--shadow-lg);
    overflow: hidden;
    animation: slideUp 0.5s ease;
  }

  @keyframes slideUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .card-hero {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-dark) 100%);
    padding: 36px 28px 32px;
    position: relative;
    overflow: hidden;
  }

  .card-hero::after {
    content: '';
    position: absolute;
    bottom: -30px; right: -30px;
    width: 120px; height: 120px;
    border-radius: 50%;
    background: rgba(255,255,255,0.08);
  }

  .card-hero::before {
    content: '';
    position: absolute;
    top: -20px; left: -20px;
    width: 80px; height: 80px;
    border-radius: 50%;
    background: rgba(255,255,255,0.05);
  }

  .hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(255,255,255,0.2);
    backdrop-filter: blur(10px);
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    color: white;
    letter-spacing: 0.5px;
    margin-bottom: 14px;
  }

  .hero-badge svg { width: 14px; height: 14px; }

  .hero-title {
    font-family: 'DM Serif Display', serif;
    font-size: 23px;
    color: white;
    line-height: 1.3;
    margin-bottom: 12px;
    position: relative;
  }

  .hero-sub {
    font-size: 14px;
    color: rgba(255,255,255,0.9);
    line-height: 1.6;
    position: relative;
  }

  /* Form body */
  .form-body {
    padding: 28px 24px 32px;
  }

  /* Progress indicator */
  .progress-bar {
    display: flex;
    gap: 6px;
    margin-bottom: 28px;
  }

  .progress-step {
    flex: 1;
    height: 4px;
    border-radius: 4px;
    background: var(--border);
    transition: background 0.4s ease;
  }

  .progress-step.active {
    background: var(--primary-green-light);
    box-shadow: 0 0 8px rgba(82, 183, 136, 0.5);
  }

  .progress-step.done {
    background: var(--primary-green);
  }

  /* Step containers */
  .form-step {
    display: none;
    animation: fadeIn 0.35s ease;
  }

  .form-step.active { display: block; }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .step-label {
    font-size: 12px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    color: var(--primary-green);
    margin-bottom: 4px;
  }

  .step-title {
    font-family: 'DM Serif Display', serif;
    font-size: 20px;
    color: var(--text-dark);
    margin-bottom: 20px;
  }

  /* Input groups */
  .field-group {
    margin-bottom: 18px;
  }

  .field-group label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: var(--text-mid);
    margin-bottom: 6px;
  }

  .field-group label .req {
    color: var(--primary-green);
    margin-left: 2px;
  }

  .field-group label .optional {
    font-weight: 400;
    color: var(--text-light);
    font-size: 11px;
  }

  .text-input, .select-input {
    width: 100%;
    padding: 14px 18px;
    border: 2.5px solid var(--border);
    border-radius: var(--radius-sm);
    font-size: 16px;
    font-family: inherit;
    color: var(--text-dark);
    background: white;
    transition: all 0.2s ease;
    outline: none;
    font-weight: 500;
  }

  .text-input:focus, .select-input:focus {
    border-color: var(--primary-green);
    box-shadow: 0 0 0 4px rgba(45, 106, 79, 0.25);
    background: white;
  }

  .text-input::placeholder {
    color: var(--text-light);
  }

  .phone-input-wrapper {
    display: flex;
    gap: 8px;
  }

  .phone-prefix {
    width: 85px;
    padding: 14px 12px;
    border: 2.5px solid var(--border);
    border-radius: var(--radius-sm);
    font-size: 16px;
    font-family: inherit;
    color: white;
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-dark) 100%);
    text-align: center;
    font-weight: 700;
    outline: none;
    flex-shrink: 0;
  }

  .phone-input-wrapper .text-input { flex: 1; }

  /* Stage selector cards */
  .stage-cards {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-bottom: 0;
  }

  .stage-card {
    flex: 1;
    padding: 16px 14px;
    border: 2.5px solid var(--border);
    border-radius: var(--radius);
    cursor: pointer;
    transition: all 0.25s ease;
    text-align: center;
    background: white;
  }

  .stage-card:hover {
    border-color: var(--primary-green-light);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
    background: var(--warm-white);
  }

  .stage-card.selected {
    border-color: var(--primary-green);
    background: linear-gradient(135deg, #DCFCE7, #D1FAE5);
    box-shadow: 0 0 0 4px rgba(45, 106, 79, 0.2);
  }

  .stage-card input { display: none; }

  .stage-icon {
    font-size: 28px;
    margin-bottom: 6px;
    display: block;
  }

  .stage-name {
    font-size: 13px;
    font-weight: 600;
    color: var(--text-dark);
    line-height: 1.3;
  }

  .stage-desc {
    font-size: 11px;
    color: var(--text-light);
    margin-top: 3px;
  }

  /* Due date section */
  .due-date-section {
    display: none;
    margin-top: 18px;
    animation: fadeIn 0.35s ease;
  }

  .due-date-section.visible { display: block; }

  .due-date-info {
    background: linear-gradient(135deg, rgba(45, 106, 79, 0.1), rgba(45, 106, 79, 0.05));
    border-radius: var(--radius-sm);
    padding: 14px 16px;
    margin-bottom: 14px;
    display: flex;
    gap: 10px;
    align-items: flex-start;
    border: 2px solid rgba(45, 106, 79, 0.2);
  }

  .due-date-info svg {
    width: 20px; height: 20px;
    color: var(--primary-green);
    flex-shrink: 0;
    margin-top: 1px;
  }

  .due-date-info p {
    font-size: 13px;
    color: var(--text-mid);
    line-height: 1.5;
  }

  .date-input-wrapper {
    position: relative;
  }

  .date-input-wrapper .text-input {
    cursor: pointer;
  }

  .date-input-wrapper svg {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    width: 20px; height: 20px;
    color: var(--text-light);
    pointer-events: none;
  }

  /* Pregnancy progress display */
  .pregnancy-progress {
    display: none;
    margin-top: 14px;
    background: linear-gradient(135deg, rgba(45, 106, 79, 0.1), rgba(45, 106, 79, 0.05));
    border-radius: var(--radius);
    padding: 18px;
    animation: fadeIn 0.35s ease;
    border: 2px solid rgba(45, 106, 79, 0.2);
  }

  .pregnancy-progress.visible { display: block; }

  .progress-header {
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    margin-bottom: 10px;
  }

  .progress-weeks {
    font-family: 'DM Serif Display', serif;
    font-size: 22px;
    color: var(--primary-green);
  }

  .progress-trimester {
    font-size: 12px;
    font-weight: 600;
    color: var(--text-mid);
    background: white;
    padding: 3px 10px;
    border-radius: 12px;
  }

  .progress-track {
    width: 100%;
    height: 8px;
    background: rgba(255,255,255,0.7);
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 8px;
  }

  .progress-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--primary-green), var(--primary-green-light));
    border-radius: 8px;
    transition: width 0.6s ease;
  }

  .progress-detail {
    font-size: 12px;
    color: var(--text-mid);
  }

  .progress-detail strong {
    color: var(--text-dark);
  }

  /* Postpartum section */
  .postpartum-section {
    display: none;
    margin-top: 18px;
    animation: fadeIn 0.35s ease;
  }

  .postpartum-section.visible { display: block; }

  .months-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 8px;
  }

  .month-chip {
    padding: 12px 4px;
    text-align: center;
    border: 2px solid var(--border);
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 14px;
    font-weight: 700;
    color: var(--text-dark);
    background: white;
  }

  .month-chip:hover {
    border-color: var(--primary-green);
    background: var(--warm-white);
  }

  .month-chip.selected {
    border-color: var(--primary-green);
    background: linear-gradient(135deg, rgba(45, 106, 79, 0.15), rgba(45, 106, 79, 0.05));
    color: var(--primary-green-dark);
    font-weight: 700;
  }

  .month-chip span {
    display: block;
    font-size: 10px;
    font-weight: 400;
    color: var(--text-light);
    margin-top: 2px;
  }

  /* Trying section */
  .trying-section {
    display: none;
    margin-top: 18px;
    animation: fadeIn 0.35s ease;
  }

  .trying-section.visible { display: block; }

  .trying-options {
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  .trying-option {
    padding: 14px 18px;
    border: 2px solid var(--border);
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 15px;
    font-weight: 600;
    color: var(--text-dark);
    background: white;
  }

  .trying-option:hover { 
    border-color: var(--primary-green);
    background: var(--warm-white);
  }

  .trying-option.selected {
    border-color: var(--primary-green);
    background: linear-gradient(135deg, rgba(45, 106, 79, 0.15), rgba(45, 106, 79, 0.05));
    color: var(--text-dark);
    font-weight: 700;
  }

  /* Baby info */
  .baby-section {
    display: none;
    margin-top: 18px;
    animation: fadeIn 0.35s ease;
  }

  .baby-section.visible { display: block; }

  .inline-fields {
    display: flex;
    gap: 10px;
  }

  .inline-fields .field-group { flex: 1; }

  .select-input {
    width: 100%;
    padding: 13px 16px;
    border: 1.5px solid var(--border);
    border-radius: var(--radius-sm);
    font-size: 15px;
    font-family: inherit;
    color: var(--text-dark);
    background: var(--warm-white);
    transition: all 0.2s ease;
    outline: none;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg width='12' height='8' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1.5l5 5 5-5' stroke='%239B8A90' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 14px center;
    cursor: pointer;
  }

  .select-input:focus {
    border-color: var(--border-focus);
    box-shadow: 0 0 0 3px rgba(133,194,190,0.1);
  }

  /* Location */
  .location-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
  }

  /* Consent */
  .consent-block {
    margin-top: 8px;
    display: flex;
    align-items: flex-start;
    gap: 10px;
  }

  .consent-block input[type="checkbox"] {
    appearance: none;
    width: 20px; height: 20px;
    border: 1.5px solid var(--border);
    border-radius: 6px;
    flex-shrink: 0;
    cursor: pointer;
    transition: all 0.2s ease;
    position: relative;
    margin-top: 1px;
  }

  .consent-block input[type="checkbox"]:checked {
    background: var(--primary-green);
    border-color: var(--primary-green);
  }

  .consent-block input[type="checkbox"]:checked::after {
    content: '';
    position: absolute;
    left: 6px; top: 3px;
    width: 5px; height: 9px;
    border: solid white;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
  }

  .consent-block label {
    font-size: 13px;
    color: var(--text-mid);
    line-height: 1.5;
    cursor: pointer;
  }

  .consent-block label a {
    color: var(--primary-green);
    text-decoration: none;
    font-weight: 600;
  }

  /* Buttons */
  .btn-row {
    display: flex;
    gap: 10px;
    margin-top: 24px;
  }

  .btn {
    flex: 1;
    padding: 14px 20px;
    border: none;
    border-radius: var(--radius-sm);
    font-size: 15px;
    font-weight: 600;
    font-family: inherit;
    cursor: pointer;
    transition: all 0.25s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
  }

  .btn-back {
    background: var(--cream);
    color: var(--text-mid);
    flex: 0.4;
  }

  .btn-back:hover { background: var(--border); }

  .btn-next {
    background: linear-gradient(135deg, var(--primary-green-light) 0%, var(--primary-green) 100%);
    color: white;
    flex: 2;
    box-shadow: 0 4px 12px rgba(45, 106, 79, 0.3);
  }

  .btn-next:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(45, 106, 79, 0.4);
  }

  .btn-next:active {
    transform: translateY(0);
  }

  .btn-next:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
  }

  .btn-next svg, .btn-back svg {
    width: 16px; height: 16px;
  }

  .btn-submit {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-dark) 100%);
    color: white;
    box-shadow: 0 4px 14px rgba(45, 106, 79, 0.35);
  }

  .btn-submit:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(45, 106, 79, 0.45);
  }

  .btn-submit:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none;
  }

  /* Success state */
  .success-screen {
    display: none;
    text-align: center;
    padding: 48px 28px;
    animation: fadeIn 0.5s ease;
  }

  .success-screen.visible { display: block; }
  .form-body.hidden { display: none; }
  .card-hero.hidden { display: none; }

  .success-icon {
    width: 80px; height: 80px;
    background: linear-gradient(135deg, rgba(45, 106, 79, 0.2), rgba(45, 106, 79, 0.1));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    animation: popIn 0.5s ease 0.2s both;
    border: 2.5px solid rgba(45, 106, 79, 0.4);
  }

  @keyframes popIn {
    from { transform: scale(0); }
    50% { transform: scale(1.1); }
    to { transform: scale(1); }
  }

  .success-icon svg {
    width: 40px; height: 40px;
    color: var(--primary-green);
  }

  .success-title {
    font-family: 'DM Serif Display', serif;
    font-size: 24px;
    color: var(--text-dark);
    margin-bottom: 10px;
  }

  .success-sub {
    font-size: 14px;
    color: var(--text-mid);
    line-height: 1.6;
    max-width: 300px;
    margin: 0 auto 24px;
  }

  .success-whatsapp {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #25D366;
    color: white;
    padding: 14px 28px;
    border-radius: var(--radius-sm);
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    box-shadow: 0 4px 14px rgba(37,211,102,0.3);
    transition: all 0.25s ease;
    font-family: inherit;
    border: none;
    cursor: pointer;
  }

  .success-whatsapp:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(37,211,102,0.4);
  }

  /* Footer */
  .footer {
    margin-top: 24px;
    text-align: center;
    font-size: 12px;
    color: var(--text-light);
    max-width: 480px;
  }

  .footer a {
    color: var(--text-mid);
    text-decoration: none;
    margin: 0 8px;
  }

  /* Validation */
  .field-error {
    font-size: 12px;
    color: var(--error);
    margin-top: 4px;
    display: none;
  }

  .field-group.error .text-input,
  .field-group.error .select-input {
    border-color: var(--error);
  }

  .field-group.error .field-error { display: block; }

  /* Responsive */
  @media (max-width: 400px) {
    .form-body { padding: 22px 18px 28px; }
    .card-hero { padding: 26px 20px 22px; }
    .hero-title { font-size: 22px; }
    .stage-cards { grid-template-columns: 1fr 1fr; gap: 8px; }
    .months-grid { grid-template-columns: repeat(3, 1fr); }
  }
</style>
</head>
<body>

<div class="page-wrapper">

  <!-- Header -->
  <div class="header">
    <div class="logo-area">
      <img src="{{ asset('img/logo white hair.png') }}" alt="Malkia Konnect Logo" class="logo-image">
      <div class="logo-text">
        Malkia
        <span>Konnect</span>
      </div>
    </div>
    <div class="lang-toggle">
      <button class="lang-btn active" onclick="setLang('sw')">SW</button>
      <button class="lang-btn" onclick="setLang('en')">EN</button>
    </div>
  </div>

  <!-- Form Card -->
  <div class="form-card">
    <!-- Hero -->
    <div class="card-hero" id="cardHero">
      <div class="hero-badge">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
        <span data-i18n="badge">Mama, uko nyumbani</span>
      </div>
      <h1 class="hero-title" data-i18n="heroTitle">Huhitaji kutembea safari hii peke yako, Mama.</h1>
      <p class="hero-sub" data-i18n="heroSub">Kila mama anastahili mtu wa kumwambia "utakuwa sawa." Malkia Konnect ni rafiki yako ya uzazi, moja kwa moja kwenye WhatsApp yako. Bure. Binafsi. Kwa ajili yako.</p>
    </div>

    <!-- Form Body -->
    <div class="form-body" id="formBody">
      <!-- Progress -->
      <div class="progress-bar">
        <div class="progress-step active" id="prog1"></div>
        <div class="progress-step" id="prog2"></div>
        <div class="progress-step" id="prog3"></div>
      </div>

      <form id="mamaForm" novalidate method="POST" action="{{ route('intake.store') }}">
        @csrf
        <!-- STEP 1: Basic Info -->
        <div class="form-step active" id="step1">
          <div class="step-label" data-i18n="stepLabel1">Hatua 1 ya 3</div>
          <div class="step-title" data-i18n="stepTitle1">Tunaomba tukufahamu</div>

          <div class="field-group">
            <label data-i18n="labelName">Jina lako kamili <span class="req">*</span></label>
            <input type="text" name="full_name" class="text-input" id="fullName" placeholder="Mfano: Amina Hassan" required>
            <div class="field-error" data-i18n="errName">Tafadhali ingiza jina lako</div>
          </div>

          <div class="field-group">
            <label data-i18n="labelPhone">Nambari ya WhatsApp <span class="req">*</span></label>
            <div class="phone-input-wrapper">
              <input type="text" class="phone-prefix" value="+255" readonly>
              <input type="tel" name="phone" class="text-input" id="phone" placeholder="7XX XXX XXX" required maxlength="10">
            </div>
            <div class="field-error" data-i18n="errPhone">Ingiza nambari sahihi ya simu</div>
          </div>

          <div class="field-group">
            <label data-i18n="labelRegion">Mkoa <span class="req">*</span></label>
            <div class="select-wrapper">
              <select name="region_id" class="select-input" id="regionSelect" onchange="updateDistricts()" required>
                <option value="" data-i18n="optSelectRegion">Chagua Mkoa</option>
              </select>
            </div>
            <div class="field-error" data-i18n="errRegion">Tafadhali chagua mkoa wako</div>
          </div>

          <div class="field-group">
            <label data-i18n="labelLocation">Wilaya <span class="req">*</span></label>
            <div class="select-wrapper">
              <select name="district_id" class="select-input" id="districtSelect" required disabled>
                <option value="" data-i18n="optSelectDistrict">Chagua Wilaya</option>
              </select>
            </div>
            <div class="field-error" data-i18n="errDistrict">Tafadhali chagua wilaya yako</div>
          </div>

          <div class="btn-row">
            <button type="button" class="btn btn-next" onclick="goStep(2)">
              <span data-i18n="btnNext">Endelea</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </button>
          </div>
        </div>

        <!-- STEP 2: Pregnancy Stage -->
        <div class="form-step" id="step2">
          <div class="step-label" data-i18n="stepLabel2">Hatua 2 ya 3</div>
          <div class="step-title" data-i18n="stepTitle2">Safari yako ya uzazi</div>

          <div class="field-group">
            <label data-i18n="labelStatus">Uko katika hali gani sasa? <span class="req">*</span></label>
            <div class="stage-cards">
              <label class="stage-card" onclick="selectStage('pregnant')">
                <input type="radio" name="journey_stage" value="pregnant">
                <span class="stage-icon">🤰</span>
                <span class="stage-name" data-i18n="stagePregnant">Mjamzito</span>
                <span class="stage-desc" data-i18n="stagePregnantDesc">Nasubiri mtoto</span>
              </label>
              <label class="stage-card" onclick="selectStage('postpartum')">
                <input type="radio" name="journey_stage" value="postpartum">
                <span class="stage-icon">👶</span>
                <span class="stage-name" data-i18n="stagePostpartum">Mzazi Mpya</span>
                <span class="stage-desc" data-i18n="stagePostpartumDesc">Mtoto wangu amezaliwa</span>
              </label>
              <label class="stage-card" onclick="selectStage('trying')">
                <input type="radio" name="journey_stage" value="trying">
                <span class="stage-icon">🌱</span>
                <span class="stage-name" data-i18n="stageTrying">Natafuta mtoto</span>
                <span class="stage-desc" data-i18n="stageTryingDesc">Nataka kushika mimba</span>
              </label>
            </div>
          </div>

          <!-- Due Date (for Pregnant) -->
          <div class="due-date-section" id="dueDateSection">
            <div class="due-date-info">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
              <p data-i18n="dueDateTip">Ingiza tarehe unayotarajiwa kujifungua. Ukiwa hujui, daktari au mkunga wako anaweza kukusaidia.</p>
            </div>
            <div class="field-group">
              <label data-i18n="labelDueDate">Tarehe ya kujifungua (EDD) <span class="req">*</span></label>
              <div class="date-input-wrapper">
                <input type="date" name="due_date" class="text-input" id="dueDate" onchange="calculateProgress()">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
              </div>
              <div class="field-error" data-i18n="errDueDate">Tafadhali ingiza tarehe</div>
            </div>

            <!-- Live progress display -->
            <div class="pregnancy-progress" id="pregProgress">
              <div class="progress-header">
                <span class="progress-weeks" id="weeksDisplay">Wiki 24</span>
                <span class="progress-trimester" id="trimesterDisplay">Trimester 2</span>
              </div>
              <div class="progress-track">
                <div class="progress-fill" id="progressFill" style="width:0%"></div>
              </div>
              <div class="progress-detail" id="progressDetail">
                <span data-i18n="daysLeft">Zimebaki siku</span> <strong id="daysLeft">112</strong>
              </div>
            </div>
          </div>

          <!-- Postpartum months -->
          <div class="postpartum-section" id="postpartumSection">
            <div class="field-group">
              <label data-i18n="labelBabyAge">Mtoto wako ana umri gani? <span class="req">*</span></label>
              <input type="hidden" name="baby_weeks_old" id="babyWeeksOld">
              <div class="months-grid" id="monthsGrid"></div>
            </div>
          </div>

          <!-- Trying section -->
          <div class="trying-section" id="tryingSection">
            <div class="field-group">
              <label data-i18n="labelTryingDuration">Umekuwa ukijaribu kwa muda gani?</label>
              <input type="hidden" name="ttc_duration" id="ttcDuration">
              <div class="trying-options">
                <div class="trying-option" onclick="selectTrying(this, 'just_started')" data-i18n="tryOpt1">Nimeanza hivi karibuni</div>
                <div class="trying-option" onclick="selectTrying(this, '1-6months')" data-i18n="tryOpt2">Miezi 1 hadi 6</div>
                <div class="trying-option" onclick="selectTrying(this, '6-12months')" data-i18n="tryOpt3">Miezi 6 hadi 12</div>
                <div class="trying-option" onclick="selectTrying(this, '12+months')" data-i18n="tryOpt4">Zaidi ya mwaka 1</div>
              </div>
            </div>
          </div>

          <div class="btn-row">
            <button type="button" class="btn btn-back" onclick="goStep(1)">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
            </button>
            <button type="button" class="btn btn-next" onclick="goStep(3)">
              <span data-i18n="btnNext">Endelea</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </button>
          </div>
        </div>

        <!-- STEP 3: Confirm & Submit -->
        <div class="form-step" id="step3">
          <div class="step-label" data-i18n="stepLabel3">Hatua 3 ya 3</div>
          <div class="step-title" data-i18n="stepTitle3">Thibitisha na ujiunge</div>

          <!-- Summary card -->
          <div id="summaryCard" style="background: var(--cream); border-radius: var(--radius); padding: 18px; margin-bottom: 18px;">
            <div id="summaryContent" style="font-size: 14px; color: var(--text-mid); line-height: 1.8;"></div>
          </div>

          <div class="field-group">
            <label data-i18n="labelPriority">Uharaka wa Huduma <span class="req">*</span></label>
            <select class="select-input" id="priority" name="priority" required>
              <option value="medium" data-i18n="optMedium">Kawaida</option>
              <option value="high" data-i18n="optHigh">Haraka Sana</option>
              <option value="low" data-i18n="optLow">Sio Haraka</option>
            </select>
          </div>

          <div class="field-group">
            <label data-i18n="labelHow">Umetusikia kupitia wapi?</label>
            <select class="select-input" id="referral" name="referral">
              <option value="">Chagua</option>
              <option value="instagram">Instagram</option>
              <option value="whatsapp">WhatsApp</option>
              <option value="friend" data-i18n="refFriend">Rafiki / Familia</option>
              <option value="hospital" data-i18n="refHospital">Hospitali / Kliniki</option>
              <option value="midwife" data-i18n="refMidwife">Mkunga</option>
              <option value="other" data-i18n="refOther">Nyingine</option>
            </select>
          </div>

          <div class="consent-block">
            <input type="checkbox" id="consent" name="agree_comms" value="1">
            <input type="hidden" name="disclaimer_ack" value="1"> <!-- Implicit for now as they confirmed above -->
            <label for="consent" data-i18n="consent">Nakubali kupokea ujumbe wa ushauri wa uzazi kupitia WhatsApp kutoka Malkia Konnect. Unaweza kuondoka wakati wowote.</label>
          </div>

          <div class="btn-row">
            <button type="button" class="btn btn-back" onclick="goStep(2)">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
            </button>
            <button type="submit" class="btn btn-next btn-submit" id="submitBtn" disabled>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
              <span data-i18n="btnSubmit">Jiunge Sasa</span>
            </button>
          </div>
        </div>

      </form>
    </div>

    <!-- Success Screen -->
    <div class="success-screen" id="successScreen">
      <div class="success-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M20 6L9 17l-5-5"/></svg>
      </div>
      <h2 class="success-title" data-i18n="successTitle">Sasa uko na mtu, Mama. 💛</h2>
      <p class="success-sub" data-i18n="successSub">Safari yako ya uzazi imebadilika leo. Tutakufikia kwenye WhatsApp ndani ya masaa 24 na salamu yako ya kwanza.</p>
      <button class="success-whatsapp" onclick="openWhatsApp()">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="white"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.625.846 5.059 2.284 7.034L.789 23.492a.5.5 0 00.613.613l4.458-1.495A11.952 11.952 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-2.347 0-4.518-.8-6.243-2.143l-.436-.348-3.2 1.072 1.072-3.2-.348-.436A9.956 9.956 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
        <span data-i18n="btnWhatsApp">Fungua WhatsApp</span>
      </button>
    </div>
  </div>

  <div class="footer">
    © 2026 Malkia Konnect. <span data-i18n="footerRights">Haki zote zimehifadhiwa.</span><br>
    <a href="{{ route('terms') }}" data-i18n="footerTerms">Masharti</a>
    <a href="{{ route('privacy') }}" data-i18n="footerPrivacy">Faragha</a>
    <a href="{{ route('contact') }}" data-i18n="footerContact">Wasiliana nasi</a>
  </div>

</div>

@php
    $locationData = (isset($regions) && $regions->count() > 0)
        ? $regions->mapWithKeys(function ($region) {
            return [
                $region->name => [
                    'id' => $region->id,
                    'districts' => $region->districts->map(function ($district) {
                        return ['id' => $district->id, 'name' => $district->name];
                    })->values(),
                ],
            ];
        })->toArray()
        : [
            'Arusha' => ['id' => 1, 'districts' => [['id' => 1, 'name' => 'Arusha City'], ['id' => 2, 'name' => 'Arusha DC'], ['id' => 3, 'name' => 'Karatu'], ['id' => 4, 'name' => 'Longido'], ['id' => 5, 'name' => 'Meru'], ['id' => 6, 'name' => 'Monduli'], ['id' => 7, 'name' => 'Ngorongoro']]],
            'Dar es Salaam' => ['id' => 2, 'districts' => [['id' => 8, 'name' => 'Ilala'], ['id' => 9, 'name' => 'Kinondoni'], ['id' => 10, 'name' => 'Temeke'], ['id' => 11, 'name' => 'Ubungo'], ['id' => 12, 'name' => 'Kigamboni']]],
            'Dodoma' => ['id' => 3, 'districts' => [['id' => 13, 'name' => 'Dodoma City'], ['id' => 14, 'name' => 'Bahi'], ['id' => 15, 'name' => 'Chamwino'], ['id' => 16, 'name' => 'Chemba'], ['id' => 17, 'name' => 'Kondoa'], ['id' => 18, 'name' => 'Kongwa'], ['id' => 19, 'name' => 'Mpwapwa']]],
            'Geita' => ['id' => 4, 'districts' => [['id' => 20, 'name' => 'Geita Town'], ['id' => 21, 'name' => 'Bukombe'], ['id' => 22, 'name' => 'Chato'], ['id' => 23, 'name' => 'Geita'], ['id' => 24, 'name' => 'Mbogwe'], ['id' => 25, 'name' => 'Nyang\'hwale']]],
        ];
@endphp

<script>
// ===== REGION & DISTRICT DATA =====
const locationData = @json($locationData);

function initLocations() {
  const regSelect = document.getElementById('regionSelect');
  if (!regSelect) return;
  
  // Clear existing options except first
  regSelect.innerHTML = `<option value="">${translations[currentLang].optSelectRegion}</option>`;
  
  const regions = Object.keys(locationData).sort();
  regions.forEach(r => {
    const opt = document.createElement('option');
    opt.value = locationData[r].id;
    opt.textContent = r;
    opt.setAttribute('data-name', r);
    regSelect.appendChild(opt);
  });
}

function updateDistricts() {
  const regSelect = document.getElementById('regionSelect');
  const distSelect = document.getElementById('districtSelect');
  const selectedRegionId = regSelect.value;
  
  distSelect.innerHTML = `<option value="">${translations[currentLang].optSelectDistrict}</option>`;
  
  if (selectedRegionId) {
    const regionName = regSelect.options[regSelect.selectedIndex].getAttribute('data-name');
    const region = locationData[regionName];
    if (region && region.districts) {
      distSelect.disabled = false;
      region.districts.sort((a,b) => a.name.localeCompare(b.name)).forEach(d => {
        const opt = document.createElement('option');
        opt.value = d.id;
        opt.textContent = d.name;
        opt.setAttribute('data-name', d.name);
        distSelect.appendChild(opt);
      });
    }
  } else {
    distSelect.disabled = true;
  }
}

// ===== STATE =====
let currentStep = 1;
let currentLang = 'sw';
let selectedStage = null;
let selectedMonth = null;
let selectedTrying = null;

// ===== i18n =====
const translations = {
    labelLocation: 'Wilaya',
    labelRegion: 'Mkoa',
    optSelectRegion: 'Chagua Mkoa',
    optSelectDistrict: 'Chagua Wilaya',
    errRegion: 'Tafadhali chagua mkoa wako',
    errDistrict: 'Tafadhali chagua wilaya yako',
    labelStatus: 'Uko katika hali gani sasa?',
    stagePregnant: 'Mjamzito', stagePregnantDesc: 'Nasubiri mtoto',
    stagePostpartum: 'Mzazi Mpya', stagePostpartumDesc: 'Mtoto wangu amezaliwa',
    stageTrying: 'Natafuta mtoto', stageTryingDesc: 'Nataka kushika mimba',
    labelPriority: 'Uharaka wa Huduma',
    optHigh: 'Haraka Sana', optMedium: 'Kawaida', optLow: 'Sio Haraka',
    summaryStatus: 'Hali', summaryPriority: 'Uharaka',
    dueDateTip: 'Ingiza tarehe unayotarajiwa kujifungua. Ukiwa hujui, daktari au mkunga wako anaweza kukusaidia.',
    labelDueDate: 'Tarehe ya kujifungua (EDD)',
    daysLeft: 'Zimebaki siku',
    labelBabyAge: 'Mtoto wako ana umri gani?',
    labelHow: 'Umetusikia kupitia wapi?',
    refFriend: 'Rafiki / Familia', refHospital: 'Hospitali / Kliniki',
    refMidwife: 'Mkunga', refOther: 'Nyingine',
    consent: 'Nakubali kupokea ujumbe wa ushauri wa uzazi kupitia WhatsApp kutoka Malkia Konnect. Unaweza kuondoka wakati wowote.',
    btnNext: 'Endelea', btnSubmit: 'Jiunge Sasa',
    successTitle: 'Sasa uko na mtu, Mama. 💛',
    successSub: 'Safari yako ya uzazi imebadilika leo. Tutakufikia kwenye WhatsApp ndani ya masaa 24 na salamu yako ya kwanza.',
    btnWhatsApp: 'Fungua WhatsApp',
    errName: 'Tafadhali ingiza jina lako', errPhone: 'Ingiza nambari sahihi ya simu',
    errRegion: 'Tafadhali chagua wilaya yako',
    errDueDate: 'Tafadhali ingiza tarehe',
    footerRights: 'Haki zote zimehifadhiwa.',
    footerTerms: 'Masharti', footerPrivacy: 'Faragha', footerContact: 'Wasiliana nasi',
    monthLabel: 'mwezi',
    monthsLabel: 'miezi',
    trimester1: 'Trimester 1', trimester2: 'Trimester 2', trimester3: 'Trimester 3',
    week: 'Wiki',
    summaryName: 'Jina', summaryPhone: 'WhatsApp', summaryRegion: 'Wilaya',
    summaryStatus: 'Hali', summaryDueDate: 'Tarehe ya kujifungua',
    summaryBabyAge: 'Umri wa mtoto',
  },
  en: {
    badge: 'Mama, you belong here',
    heroTitle: "You don't have to walk this journey alone, Mama.",
    heroSub: 'Every mother deserves someone to say "you\'re going to be okay." Malkia Konnect is your maternity companion, right on your WhatsApp. Free. Personal. Just for you.',
    stepLabel1: 'Step 1 of 3', stepTitle1: 'Tell us about you',
    stepLabel2: 'Step 2 of 3', stepTitle2: 'Your motherhood journey',
    stepLabel3: 'Step 3 of 3', stepTitle3: 'Confirm and join',
    labelName: 'Your full name', labelPhone: 'WhatsApp number',
    labelRegion: 'Region',
    labelLocation: 'District',
    optSelectRegion: 'Select Region',
    optSelectDistrict: 'Select District',
    errRegion: 'Please select your region',
    errDistrict: 'Please select your district',
    labelStatus: 'What is your current status?',
    stagePregnant: 'Pregnant', stagePregnantDesc: 'Expecting a baby',
    stagePostpartum: 'New Mother', stagePostpartumDesc: 'My baby is born',
    stageTrying: 'Trying to conceive', stageTryingDesc: 'Planning a pregnancy',
    labelPriority: 'Service Priority',
    optHigh: 'High Priority', optMedium: 'Normal', optLow: 'Low Priority',
    summaryStatus: 'Status', summaryPriority: 'Priority',
    dueDateTip: "Enter your expected due date. If you don't know it, your doctor or midwife can help.",
    labelDueDate: 'Due date (EDD)',
    daysLeft: 'Days remaining',
    labelBabyAge: "How old is your baby?",
    labelHow: 'How did you hear about us?',
    refFriend: 'Friend / Family', refHospital: 'Hospital / Clinic',
    refMidwife: 'Midwife', refOther: 'Other',
    consent: 'I agree to receive maternity guidance messages via WhatsApp from Malkia Konnect. You can opt out anytime.',
    btnNext: 'Continue', btnSubmit: 'Join Now',
    successTitle: 'You have someone now, Mama. 💛',
    successSub: "Your motherhood journey changed today. We'll reach you on WhatsApp within 24 hours with your first message.",
    btnWhatsApp: 'Open WhatsApp',
    errName: 'Please enter your name', errPhone: 'Enter a valid phone number',
    errRegion: 'Please select your district',
    errDueDate: 'Please enter a date',
    footerRights: 'All rights reserved.',
    footerTerms: 'Terms', footerPrivacy: 'Privacy', footerContact: 'Contact us',
    monthLabel: 'month',
    monthsLabel: 'months',
    trimester1: 'Trimester 1', trimester2: 'Trimester 2', trimester3: 'Trimester 3',
    week: 'Week',
    summaryName: 'Name', summaryPhone: 'WhatsApp', summaryRegion: 'District',
    summaryStatus: 'Status', summaryDueDate: 'Due date',
    summaryBabyAge: 'Baby age',
  }
};

function setLang(lang) {
  currentLang = lang;
  document.querySelectorAll('.lang-btn').forEach(b => b.classList.toggle('active', b.textContent.trim() === lang.toUpperCase()));
  document.querySelectorAll('[data-i18n]').forEach(el => {
    const key = el.getAttribute('data-i18n');
    if (translations[lang][key]) {
      if (el.tagName === 'LABEL' && el.querySelector('.req')) {
        el.innerHTML = translations[lang][key] + ' <span class="req">*</span>';
      } else if (el.tagName === 'LABEL' && el.querySelector('.optional')) {
        const opt = lang === 'sw' ? '(hiari)' : '(optional)';
        el.innerHTML = translations[lang][key] + ' <span class="optional">' + opt + '</span>';
      } else {
        el.textContent = translations[lang][key];
      }
    }
  });
  buildMonthsGrid();
  if (document.getElementById('dueDate').value) calculateProgress();
}

// ===== MONTHS GRID =====
function buildMonthsGrid() {
  const grid = document.getElementById('monthsGrid');
  if (!grid) return;
  grid.innerHTML = '';
  const singleLabel = translations[currentLang].monthLabel;
  const multiLabel = translations[currentLang].monthsLabel;
  
  for (let i = 1; i <= 24; i++) {
    const chip = document.createElement('div');
    chip.className = 'month-chip' + (selectedMonth === i ? ' selected' : '');
    
    chip.textContent = i;
    const sub = document.createElement('span');
    sub.textContent = i === 1 ? singleLabel : multiLabel;
    chip.appendChild(sub);
    
    chip.addEventListener('click', () => {
      selectedMonth = i;
      document.getElementById('babyWeeksOld').value = i;
      grid.querySelectorAll('.month-chip').forEach(c => c.classList.remove('selected'));
      chip.classList.add('selected');
    });
    grid.appendChild(chip);
  }
}

// ===== NAVIGATION =====
function goStep(step) {
  if (step === 2 && !validateStep1()) return;
  if (step === 3 && !validateStep2()) return;

  // Mark previous steps as done
  for (let i = 1; i < step; i++) {
    document.getElementById('prog' + i).classList.remove('active');
    document.getElementById('prog' + i).classList.add('done');
  }
  document.getElementById('prog' + step).classList.add('active');
  for (let i = step + 1; i <= 3; i++) {
    document.getElementById('prog' + i).classList.remove('active', 'done');
  }

  document.querySelectorAll('.form-step').forEach(s => s.classList.remove('active'));
  document.getElementById('step' + step).classList.add('active');
  currentStep = step;

  if (step === 3) buildSummary();

  // Scroll to top of form
  document.querySelector('.form-card').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// ===== STAGE SELECTION =====
function selectStage(stage) {
  selectedStage = stage;
  document.querySelectorAll('.stage-card').forEach(c => c.classList.remove('selected'));
  document.querySelector('.stage-card input[value="' + stage + '"]').checked = true;
  document.querySelector('.stage-card input[value="' + stage + '"]').closest('.stage-card').classList.add('selected');

  // Show/hide sub-sections
  document.getElementById('dueDateSection').classList.toggle('visible', stage === 'pregnant');
  document.getElementById('postpartumSection').classList.toggle('visible', stage === 'postpartum');
  document.getElementById('tryingSection').classList.toggle('visible', stage === 'trying');

  if (stage === 'postpartum') buildMonthsGrid();
}

function selectTrying(el, val) {
  selectedTrying = val;
  document.getElementById('ttcDuration').value = val;
  document.querySelectorAll('.trying-option').forEach(o => o.classList.remove('selected'));
  el.classList.add('selected');
}

// ===== DUE DATE CALCULATION =====
function calculateProgress() {
  const dueDateVal = document.getElementById('dueDate').value;
  if (!dueDateVal) {
    document.getElementById('pregProgress').classList.remove('visible');
    return;
  }

  const dueDate = new Date(dueDateVal);
  const today = new Date();
  today.setHours(0,0,0,0);
  dueDate.setHours(0,0,0,0);

  // Conception date is ~280 days (40 weeks) before due date
  const conceptionDate = new Date(dueDate);
  conceptionDate.setDate(conceptionDate.getDate() - 280);

  const totalDays = 280;
  const daysPassed = Math.floor((today - conceptionDate) / (1000 * 60 * 60 * 24));
  const daysRemaining = Math.max(0, Math.floor((dueDate - today) / (1000 * 60 * 60 * 24)));
  const weeksPassed = Math.floor(daysPassed / 7);

  // Clamp
  const weeksDisplay = Math.max(1, Math.min(42, weeksPassed));
  const pct = Math.min(100, Math.max(0, (daysPassed / totalDays) * 100));

  // Trimester
  let trimester;
  const t = translations[currentLang];
  if (weeksDisplay <= 13) trimester = t.trimester1;
  else if (weeksDisplay <= 27) trimester = t.trimester2;
  else trimester = t.trimester3;

  document.getElementById('weeksDisplay').textContent = t.week + ' ' + weeksDisplay;
  document.getElementById('trimesterDisplay').textContent = trimester;
  document.getElementById('progressFill').style.width = pct + '%';
  document.getElementById('daysLeft').textContent = daysRemaining;
  document.getElementById('pregProgress').classList.add('visible');
}

// Set min date for due date to today
(function() {
  const today = new Date();
  const dd = String(today.getDate()).padStart(2, '0');
  const mm = String(today.getMonth() + 1).padStart(2, '0');
  const yyyy = today.getFullYear();
  const dateInput = document.getElementById('dueDate');
  if (dateInput) {
    dateInput.setAttribute('min', yyyy + '-' + mm + '-' + dd);
    // Max = ~10 months from now
    const maxDate = new Date(today);
    maxDate.setMonth(maxDate.getMonth() + 10);
    const dd2 = String(maxDate.getDate()).padStart(2, '0');
    const mm2 = String(maxDate.getMonth() + 1).padStart(2, '0');
    const yyyy2 = maxDate.getFullYear();
    dateInput.setAttribute('max', yyyy2 + '-' + mm2 + '-' + dd2);
  }
})();

// ===== VALIDATION =====
function validateStep1() {
  let valid = true;
  const name = document.getElementById('fullName');
  const phone = document.getElementById('phone');
  const region = document.getElementById('regionSelect');
  const district = document.getElementById('districtSelect');

  clearErrors();

  if (!name.value.trim()) { showError(name); valid = false; }
  const phoneVal = phone.value.replace(/\s/g, '');
  if (!phoneVal || phoneVal.length < 9) { showError(phone); valid = false; }
  if (!region.value) { showError(region); valid = false; }
  if (!district.value) { showError(district); valid = false; }

  return valid;
}

function validateStep2() {
  if (!selectedStage) {
    document.querySelector('.stage-cards').style.outline = '2px solid var(--error)';
    setTimeout(() => document.querySelector('.stage-cards').style.outline = 'none', 2000);
    return false;
  }
  if (selectedStage === 'pregnant' && !document.getElementById('dueDate').value) {
    showError(document.getElementById('dueDate'));
    return false;
  }
  if (selectedStage === 'postpartum' && selectedMonth === null) {
      document.getElementById('monthsGrid').style.outline = '2px solid var(--error)';
      setTimeout(() => document.getElementById('monthsGrid').style.outline = 'none', 2000);
      return false;
  }
  return true;
}

function showError(el) {
  el.closest('.field-group').classList.add('error');
}

function clearErrors() {
  document.querySelectorAll('.field-group.error').forEach(g => g.classList.remove('error'));
}

// ===== SUMMARY =====
function buildSummary() {
  const t = translations[currentLang];
  const name = document.getElementById('fullName').value;
  const phone = '+255 ' + document.getElementById('phone').value;
  const regionName = document.getElementById('regionSelect').options[document.getElementById('regionSelect').selectedIndex].getAttribute('data-name');
  const districtName = document.getElementById('districtSelect').options[document.getElementById('districtSelect').selectedIndex].getAttribute('data-name');

  const stageLabels = {
    pregnant: currentLang === 'sw' ? 'Nina mimba' : 'Pregnant',
    postpartum: currentLang === 'sw' ? 'Nimeshajifungua' : 'Postpartum',
    trying: currentLang === 'sw' ? 'Napanga kupata mimba' : 'Trying to conceive',
    parent: currentLang === 'sw' ? 'Mzazi' : 'Parent'
  };

  let html = '';
  html += '<div style="display:flex;justify-content:space-between;padding:6px 0;border-bottom:1px solid var(--border)"><span>' + t.summaryName + '</span><strong>' + name + '</strong></div>';
  html += '<div style="display:flex;justify-content:space-between;padding:6px 0;border-bottom:1px solid var(--border)"><span>' + t.summaryPhone + '</span><strong>' + phone + '</strong></div>';
  html += '<div style="display:flex;justify-content:space-between;padding:6px 0;border-bottom:1px solid var(--border)"><span>' + t.labelRegion + '</span><strong>' + regionName + '</strong></div>';
  html += '<div style="display:flex;justify-content:space-between;padding:6px 0;border-bottom:1px solid var(--border)"><span>' + t.labelLocation + '</span><strong>' + districtName + '</strong></div>';
  html += '<div style="display:flex;justify-content:space-between;padding:6px 0;border-bottom:1px solid var(--border)"><span>' + t.summaryStatus + '</span><strong>' + (stageLabels[selectedStage] || '') + '</strong></div>';
  
  const priorityLabels = {
    high: currentLang === 'sw' ? 'Haraka Sana' : 'High Priority',
    medium: currentLang === 'sw' ? 'Kawaida' : 'Normal',
    low: currentLang === 'sw' ? 'Sio Haraka' : 'Low Priority'
  };
  const priorityVal = document.getElementById('priority').value;
  html += '<div style="display:flex;justify-content:space-between;padding:6px 0;border-bottom:1px solid var(--border)"><span>' + t.summaryPriority + '</span><strong>' + (priorityLabels[priorityVal] || '') + '</strong></div>';

  if (selectedStage === 'pregnant') {
    const d = document.getElementById('dueDate').value;
    const formatted = d ? new Date(d).toLocaleDateString(currentLang === 'sw' ? 'sw-TZ' : 'en-US', { day:'numeric', month:'long', year:'numeric' }) : '';
    html += '<div style="display:flex;justify-content:space-between;padding:6px 0;border-bottom:1px solid var(--border)"><span>' + t.summaryDueDate + '</span><strong>' + formatted + '</strong></div>';
    
    // Add Pregnancy Progress to summary
    const weeks = document.getElementById('weeksDisplay').textContent;
    const trimester = document.getElementById('trimesterDisplay').textContent;
    html += '<div style="display:flex;justify-content:space-between;padding:6px 0"><span>' + (currentLang === 'sw' ? 'Maendeleo' : 'Progress') + '</span><strong>' + weeks + ' (' + trimester + ')</strong></div>';
  } else if (selectedStage === 'postpartum' && selectedMonth !== null) {
    const label = selectedMonth === 1 ? t.monthLabel : t.monthsLabel;
    html += '<div style="display:flex;justify-content:space-between;padding:6px 0"><span>' + t.summaryBabyAge + '</span><strong>' + selectedMonth + ' ' + label + '</strong></div>';
  }

  document.getElementById('summaryContent').innerHTML = html;
}

// ... (rest of the code remains the same)
document.getElementById('consent').addEventListener('change', function() {
  document.getElementById('submitBtn').disabled = !this.checked;
});

function openWhatsApp() {
  const phone = document.getElementById('phone').value.replace(/\s/g, '');
  window.open('https://wa.me/255' + phone, '_blank');
}

// Init months grid
buildMonthsGrid();
initLocations();

// Phone formatting
document.getElementById('phone').addEventListener('input', function(e) {
  let val = this.value.replace(/[^\d]/g, '');
  if (val.startsWith('0')) val = val.substring(1);
  if (val.length > 9) val = val.substring(0, 9);
  this.value = val;
});
</script>
