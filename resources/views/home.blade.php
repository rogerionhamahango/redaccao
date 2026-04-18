@extends('layout.home')

@section('title')
    Home
@endsection

@section('content')

<div class="w-90 h-80  mb-5">

        <a href="{{route('rede')}}" class="btn btn-danger">Entrar</a>
         <a href="{{route('escala')}}" class="btn btn-danger">Escala Semanal</a>
         <a href="{{route('vencida_corrente_futura')}}" class="btn btn-danger">Escala Detalhada</a>
       
         <a href="{{route('escala_edicoes')}}" class="btn btn-danger">Escala Edicoes</a>
        
         <a href="{{route('edicao_detalhada')}}" class="btn btn-danger">Escala de Edicoes Detalhada</a>         
         <a href="{{route('s_programa')}}" class="btn btn-danger">Programas</a>
         <!--
         <a href="{{route('s_g_reportagem')}}" class="btn btn-danger">Grande Reportagem</a>

            -->
        
         <a href="{{route('s_folgas')}}" class="btn btn-danger">Folgas Semanais</a>

         <a href="{{route('s_jornalistas')}}" class="btn btn-danger">Locutores e Jornalistas</a>

        <div class="d-flex justify-content-between">
            <div class="p-4 w-50 h-50 mb-3 text-white">
            
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('img/epg_1.jpg')}}" class="d-block w-75" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/epg_2.jpg')}}" class="d-block w-75" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/epg_3.jpg')}}" class="d-block w-75" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/epg_4.jpg')}}" class="d-block w-75" alt="...">
                        </div>
                         <div class="carousel-item">
                            <img src="{{asset('img/epg_5.jpg')}}" class="d-block w-75" alt="...">
                        </div>
                         <div class="carousel-item">
                            <img src="{{asset('img/epg_6.jpg')}}" class="d-block w-75" alt="...">
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    
                </div>




            
        </div>
            <div class="p-4 w-50 h-40 mb-3 text-dark" >
                <h5 class="card-header"></h5>
                <div >
                <h5 class="card-title">Sistema de Gestao do Sector de Producao</h5>
                <p class="card-text">Sistema de Gestao do Sector de Producao, visa auxiliar na organizacao e gerenciamento das atividades do setor de producao.
                        Organiza escalas, por categorias.
                        O SGSP é uma ferramenta essencial para otimizar a eficiência e a produtividade do setor de produção, garantindo que as atividades sejam realizadas de forma coordenada e eficaz.</p>
                <p class="card-text" >O SGSP é projetado para atender às necessidades específicas do setor de produção, oferecendo recursos como:
                        - Gerenciamento de Escalas: Permite criar e gerenciar escalas de trabalho para diferentes categorias, garantindo que as atividades sejam distribuídas de maneira eficiente.
                        - Acompanhamento de Atividades: Facilita o acompanhamento das atividades em andamento, permitindo que os gestores monitorem o progresso e identifiquem possíveis gargalos.
                        - Comunicação Eficiente: Oferece ferramentas de comunicação para facilitar a colaboração entre os membros da equipe, garantindo que todos estejam alinhados e informados sobre as atividades em andamento.
                        - Relatórios e Análises: Fornece relatórios detalhados e análises para ajudar os gestores a tomar decisões informadas e melhorar continuamente os processos de produção.</p>
                <p class="card-text">O SGSP é uma solução abrangente que visa melhorar a eficiência e a organização do setor de produção, contribuindo para o sucesso e crescimento da empresa.</p>
                 <p class="card-text">
                </p>
                <a href="{{route('rede')}}">Entrar...</a>
            </div>
        </div>

    </div>

    

    
@endsection