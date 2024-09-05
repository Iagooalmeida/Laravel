<h3>Fornecedor</h3>

@php

@endphp

{{-- @dd($fornecedores) --}}

{{-- @if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif (count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif --}}

{{-- @if ( !($fornecedores[0]['status'] == 'S') )
    Fornecedor inativo
@endif
<br>
@unless ($fornecedores[0]['status'] == 'S') <!-- Inverte a condição do if acima -->
    Fornecedor inativo
@endunless
<br> --}}

@isset($fornecedores)

    Fornecedor: {{ $fornecedores[1]['nome'] }}<br>
    Status: {{ $fornecedores[1]['status'] }}<br>
    <!-- $variavel ?? '' => Se a variável não existir, não dá erro, apenas exibe vazio -->
    CNPJ: {{ $fornecedores[1]['cnpj'] ?? 'Dados não preenchidos' }}<br>

    {{-- @isset($fornecedores[0]['cnpj'])
        CNPJ: {{ $fornecedores[0]['cnpj'] }}<br>
        @empty($fornecedores[0]['cnpj'])
            O campo CNPJ não foi preenchido
        @endempty
    @endisset --}}

    Telefone: {{ $fornecedores[1]['ddd'] ?? '' }} {{ $fornecedores[1]['telefone']  ?? '' }}<br>
    @switch($fornecedores[1]['ddd'])
        @case('11')
            São Paulo - SP
            @break
        @case('32')
            Juiz de Fora - MG
            @break
        @case('85')
            Fortaleza - CE
            @break
        @default
            Estado não identificado

    @endswitch
    <br>


    E-mail: {{ $fornecedores[1]['email'] ?? ''}}<br>

@endisset


