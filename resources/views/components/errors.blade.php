{{--Компонент вывода всех ошибок по списку--}}
@if($errors->any())
    <div class="alert alert-danger small pb-3 mb-4">
        <ul class="mb-0">
            @foreach($errors->all() as $message)
                <li>
                    {{$message}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
