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

    fornecedor: {{ $fornecedores[1]['nome'] }}<br>
    Status: {{ $fornecedores[1]['status'] }}<br>
    @isset($fornecedores[1]['cnpj'])
        CNPJ: {{ $fornecedores[1]['cnpj'] }}<br>
    @endisset
    {{-- Telefone: {{ $fornecedores[0]['ddd'] }} {{ $fornecedores[0]['telefone'] }}<br>
    E-mail: {{ $fornecedores[0]['email'] }}<br> --}}

@endisset


