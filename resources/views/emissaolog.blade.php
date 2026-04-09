@extends('layout.admin')

@section('title')
Emissoes    
@endsection

@section('table')
    Sector de emissoes.
@endsection

@section('botao')

  


    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown " type="button" style="text-align: right; font-size: 18px; font-weight: bold;">
                    <a class="nav-link dropdown-toggle text-light" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Opcoes</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" >
                        <li><a href="{{route('emissao')}}" class="dropdown-item">Registo de emissao</a></li>
                       <li><a href="{{route('programa')}}" class="dropdown-item">Registo de Programa</a></li>
                        <li><a href="{{route('jornalista')}}" class="dropdown-item">Registar Jornalista ou Locutor</a></li>
                        
                        
                    </ul>
                </li>
            </ul>    
@endsection


@section('content')
    <h1>A radiodifusao em Mocambique!</h1>

    <p style="text-align: justify; text-justify: inter-word; line-height: 1.5; font-size: 16px;">
        A radiodifusão em Moçambique tem uma história rica e diversificada, refletindo a evolução do país ao longo dos anos. Desde os primeiros dias da rádio até a era digital, a radiodifusão desempenhou um papel crucial na comunicação, educação e entretenimento para o povo moçambicano.

        A história da radiodifusão em Moçambique remonta à década de 1930, quando a primeira estação de rádio foi estabelecida em Lourenço Marques (atual Maputo) durante o período colonial português. A rádio tornou-se uma ferramenta importante para a disseminação de informações e propaganda colonial.

        Após a independência de Moçambique em 1975, a radiodifusão passou por mudanças significativas. O governo moçambicano nacionalizou as estações de rádio e estabeleceu a Rádio Moçambique como a principal emissora estatal. A rádio desempenhou um papel fundamental na promoção da cultura moçambicana, na educação e na disseminação de informações sobre o desenvolvimento do país.

        Com o avanço da tecnologia, a radiodifusão em Moçambique também evoluiu. A introdução da televisão e, posteriormente, da internet trouxe novas formas de comunicação e entretenimento para os moçambicanos. Hoje, existem várias estações de rádio privadas e comunitárias que oferecem uma variedade de programas, desde notícias até música e entretenimento.

        A radiodifusão continua a ser uma parte vital da vida cotidiana em Moçambique, conectando as pessoas, promovendo a cultura local e fornecendo informações essenciais para o desenvolvimento do país.
    </p>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Radio Mocambique</h5>
            <h6 class="card-subtitle mb-2 text-muted">Radio Mocambique</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
    </div>


     <div class="card" style="width: 18rem; position: absolute; left: 300px; top: 1px;">
        <div class="card-body">
            <h5 class="card-title">Radio Mocambique</h5>
            <h6 class="card-subtitle mb-2 text-muted">Radio Mocambique</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
    </div>

     <div class="" style="width: 28rem; position: absolute; left: 700px; top: 90px; color:#FF0000;">
        <p>
            A redação para rádio exige textos curtos, diretos e orais, 
            focados na clareza para o ouvinte entender de primeira. 
            Use frases na ordem direta (sujeito + verbo + complemento), 
            voz ativa, linguagem simples, preferencialmente no presente, e 
            evite adjetivos desnecessários ou números complexos para garantir impacto e fluidez. 
        </p>

     </div>

     

@endsection