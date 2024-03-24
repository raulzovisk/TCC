@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">{{ __('Oops, parece que algo deu errado.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>Parece que seu login ou senha não está certo</li>
            @endforeach
        </ul>
    </div>
@endif
