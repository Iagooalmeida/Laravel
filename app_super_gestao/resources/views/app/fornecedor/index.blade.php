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

    @for ($i = 0; isset($fornecedores[$i]); $i++)
        Fornecedor: {{ $fornecedores[$i]['nome'] }}<br>
        Status: {{ $fornecedores[$i]['status'] }}<br>
        <!-- $variavel ?? '' => Se a variável não existir, não dá erro, apenas exibe vazio -->
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dados não preenchidos' }}<br>

        {{-- @isset($fornecedores[0]['cnpj'])
            CNPJ: {{ $fornecedores[0]['cnpj'] }}<br>
            @empty($fornecedores[0]['cnpj'])
                O campo CNPJ não foi preenchido
            @endempty
        @endisset --}}

        Telefone: {{ $fornecedores[$i]['ddd'] ?? '' }} {{ $fornecedores[$i]['telefone']  ?? '' }}<br>
        <hr>
    @endfor

@endisset

{{-- Blade switch case --}}
{{-- @isset($fornecedores)
    @switch($fornecedores[0]['ddd'])
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
@endisset --}}


{{-- Blade While --}}
{{-- @isset($fornecedores)
    @php
        $i = 0;
    @endphp
    @while (isset($fornecedores[$i]))
        Fornecedor: {{ $fornecedores[$i]['nome'] }}<br>
        Status: {{ $fornecedores[$i]['status'] }}<br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dados não preenchidos' }}<br>
        Telefone: {{ $fornecedores[$i]['ddd'] ?? '' }} {{ $fornecedores[$i]['telefone']  ?? '' }}<br>
        <hr>
        @php
            $i++;
        @endphp
    @endwhile
@endisset --}}
{{-- Fim do while --}}

{{-- Blade Foreach --}}
{{-- @isset($fornecedores)
    @foreach ($fornecedores as $indice => $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }}<br>
        Status: {{ $fornecedor['status'] }}<br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Dados não preenchidos' }}<br>
        Telefone: {{ $fornecedor['ddd'] ?? '' }} {{ $fornecedor['telefone']  ?? '' }}<br>
        <hr>
    @endforeach
@endisset --}}

{{-- Blade Forelse --}}
{{-- @isset($fornecedores)
    @forelse ($fornecedores as $indice => $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }}<br>
        Status: {{ $fornecedor['status'] }}<br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Dados não preenchidos' }}<br>
        Telefone: {{ $fornecedor['ddd'] ?? '' }} {{ $fornecedor['telefone']  ?? '' }}<br>
        <hr>
    @empty
        <h3>Não existem fornecedores cadastrados</h3>
    @endforelse
@endisset --}}

{{-- Blade variavel loop --}}
{{-- @isset($fornecedores)
    @foreach ($fornecedores as $indice => $fornecedor)
        Iteração: {{ $loop->iteration }}<br>
        Fornecedor: {{ $fornecedor['nome'] }}<br>
        Status: {{ $fornecedor['status'] }}<br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Dados não preenchidos' }}<br>
        Telefone: {{ $fornecedor['ddd'] ?? '' }} {{ $fornecedor['telefone']  ?? '' }}<br>
        @if ($loop->first)
            Primeira iteração<br>
        @endif
        @if ($loop->last)
            Última iteração<br>

            <br>
            Total de registros: {{ $loop->count }}<br>
        @endif
        <hr>
    @endforeach
@endisset --}}
