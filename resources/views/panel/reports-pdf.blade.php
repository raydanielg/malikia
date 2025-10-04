<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <title>Ripoti | {{ $from }} - {{ $to }}</title>
    <style>
        body { font-family: DejaVu Sans, Arial, sans-serif; font-size: 12px; color: #111; }
        h1 { font-size: 20px; margin: 0 0 10px; }
        h2 { font-size: 16px; margin: 18px 0 8px; }
        .muted { color: #555; }
        .cards { display: flex; gap: 10px; margin: 15px 0; }
        .card { border: 1px solid #ddd; border-radius: 6px; padding: 10px; flex: 1; text-align: center; }
        .card .num { font-size: 18px; font-weight: 700; }
        table { width: 100%; border-collapse: collapse; margin-top: 12px; }
        th, td { border: 1px solid #e5e7eb; padding: 8px; text-align: left; }
        th { background: #f3f4f6; font-size: 12px; }
        .footer { margin-top: 20px; font-size: 11px; color: #666; }
        .bar { background: #e5e7eb; height: 8px; border-radius: 4px; overflow: hidden; }
        .bar > span { display: inline-block; height: 8px; background: #7c3aed; }
        .grid { display: table; width: 100%; table-layout: fixed; }
        .col { display: table-cell; vertical-align: top; padding-left: 8px; }
        .col:first-child { padding-left: 0; }
    </style>
    <?php $totalSafe = max(1, (int)($total ?? 0)); ?>
    <?php
      $status = $byStatus ?? [];
      $priority = $byPriority ?? [];
      $stage = $byStage ?? [];
    ?>
</head>
<body>
    <h1>Ripoti ya Majibu ya Fomu</h1>
    <div class="muted">Kipindi: {{ $from }} mpaka {{ $to }}</div>

    <!-- Summary Cards -->
    <div class="cards">
        <div class="card">
            <div class="muted">Jumla ya Majibu</div>
            <div class="num">{{ $total }}</div>
        </div>
        <div class="card">
            <div class="muted">Zimekamilika</div>
            <div class="num">{{ $completed }}</div>
        </div>
        <div class="card">
            <div class="muted">Imepitiwa</div>
            <div class="num">{{ $reviewed }}</div>
        </div>
    </div>

    <!-- Breakdown Section (Status / Priority / Stage) -->
    <h2>Mgawanyo wa Majibu</h2>
    <div class="grid">
        <div class="col">
            <table>
                <thead><tr><th colspan="3">Hali</th></tr></thead>
                <tbody>
                @foreach($status as $k => $v)
                <?php $pct = round((($v ?? 0) / $totalSafe) * 100); ?>
                <tr>
                    <td style="width: 28%">{{ ucfirst(str_replace('_',' ', $k)) }}</td>
                    <td style="width: 22%">{{ $v }}</td>
                    <td>
                        <div class="bar"><span style="width: {{ $pct }}%"></span></div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col">
            <table>
                <thead><tr><th colspan="3">Kipaumbele</th></tr></thead>
                <tbody>
                @foreach($priority as $k => $v)
                <?php $pct = round((($v ?? 0) / $totalSafe) * 100); ?>
                <tr>
                    <td style="width: 28%">{{ ucfirst($k) }}</td>
                    <td style="width: 22%">{{ $v }}</td>
                    <td>
                        <div class="bar"><span style="width: {{ $pct }}%"></span></div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col">
            <table>
                <thead><tr><th colspan="3">Safari</th></tr></thead>
                <tbody>
                @foreach($stage as $k => $v)
                <?php $pct = round((($v ?? 0) / $totalSafe) * 100); ?>
                <tr>
                    <td style="width: 28%">{{ ucfirst($k) }}</td>
                    <td style="width: 22%">{{ $v }}</td>
                    <td>
                        <div class="bar"><span style="width: {{ $pct }}%"></span></div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Timeseries -->
    <h2>Mtiririko wa Kila Siku</h2>
    <table>
        <thead>
        <tr>
            <th style="width:30%">Siku</th>
            <th style="width:20%">Idadi</th>
            <th>Muonekano</th>
        </tr>
        </thead>
        <tbody>
        @foreach(($labels ?? []) as $i => $day)
            <?php $val = $series[$i] ?? 0; $pct = $totalSafe ? min(100, round(($val / max($series)) * 100)) : 0; ?>
            <tr>
                <td>{{ $day }}</td>
                <td>{{ $val }}</td>
                <td><div class="bar"><span style="width: {{ $pct }}%"></span></div></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Recent Reviewed -->
    <h2>Majibu Yaliyopitiwa (Hivi Karibuni)</h2>
    <table>
        <thead>
        <tr>
            <th>Jina</th>
            <th>Simu</th>
            <th>Tarehe</th>
        </tr>
        </thead>
        <tbody>
        @forelse(($recentReviewed ?? []) as $item)
            <tr>
                <td>{{ $item->full_name }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ optional($item->created_at)->format('Y-m-d H:i') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="muted">Hakuna rekodi zilizopitiwa katika kipindi hiki.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="footer">
        Imetengenezwa: {{ now()->format('Y-m-d H:i') }} | Malkia Konnect
    </div>
</body>
</html>
