<table class="table table-bordered">
    <thead>
        <tr class="bg-danger text-white">
            <th>Hora</th>
            <th>Dia</th>
            <th>Dia da Semana</th>
            <th>Nome do Editor</th>
        </tr>
    </thead>
    <tbody>
        @foreach($escalas as $escala)
    @php
        $dia = \Carbon\Carbon::parse($escala->dia)->locale('pt_PT');
    @endphp

    <tr class="fw-bold text-nowrap {{ $dia->isToday() ? 'table-success' : '' }}">
        <td>{{ $escala->horas ?? 'Sem horário' }}</td>
        <td>{{ $dia->format('d/m/Y') }}</td>
        <td>{{ $dia->dayName }}</td>
        <td>{{ $escala->jornalista->abreviatura ?? 'Sem Editor' }}</td>
    </tr>
@endforeach

    </tbody>
</table>

<!-- Paginação -->

    {{ $escalas->withQueryString()->links() }}

