{{-- Verificar si hay un elemento de breadcrumn --}}
@if(count($breadcrumbs))
    {{--Margin bottom--}}
    <nav class="mb-2 block">
        <ol class="flex flex-wrap text-slate-700 text-sm">
            {{--Recorrer elementos de breadcrumb--}}
            @foreach ($breadcrumbs as $item)
                <li class="flex items-center">
                    {{--ITMÉRIDA/CAmpus Poniente/DSC/EdificioH/H8--}}
                    {{--Si NO ES EL primer elemento, ponle separador antes--}}
                    @unless ($loop->first)
                        <span class="px-2 text-gray-400">/</span>
                    @endunless
                    {{--Revisar si tiene un href--}}
                    @isset($item['href'])
                        <a href="{{ $item['href'] }}"class="opacity-6 
                        hover:opacity-100 transition">
                            {{ $item['name'] }}
                        </a>
                    @else
                        {{ $item['name'] }}
                    @endisset

                </li>
            @endforeach
        </ol>
        {{--El último elemento en negritas--}}
        @if (count($breadcrumbs) > 1)
            {{--MT: Margin Top--}}
            <h6 class="font-bold mt-2">
                {{ end($breadcrumbs)['name'] }}
            </h6>
        @endif
    </nav>    
@endif