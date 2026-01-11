<table class="table table-bordered">
    <thead>
        <tr class="bg-danger">
            <th>Hora</th>
            <th>Dia</th>
            <th>Dia da Semana</th>
            <th>Nome do Locutor</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($escalas as $emissao)
            <tr class="text-nowrap text-dark" style="font-size: 18px; font-weight: bold;">
                <td>{{ $emissao->hora_inicial }} - {{ $emissao->hora_final }}</td>
                <td>{{ $emissao->dia }}</td>
                <td>{{ $dias_semana[Carbon\Carbon::parse($emissao->dia)->dayOfWeek] }}</td>
                <td>{{ $emissao->jornalista->nome_completo }}</td>
               
            </tr>
        @endforeach
    </tbody>
</table>
