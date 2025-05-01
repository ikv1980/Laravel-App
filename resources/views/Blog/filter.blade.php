{{--Фильтрация постов --}}
<x-form action="{{ route('blog') }}" method="get">
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="mb-3">
                <x-input name="search" value="{{request('search')}}" placeholder="{{__('Поиск')}}"/>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="mb-3">
                <x-input
                    type="date"
                    value="{{request('from_date')}}"
                    name="from_date"/>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="mb-3">
                <x-input
                    type="date"
                    value="{{request('to_date')}}"
                    name="to_date"/>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="mb-3">
                <x-button type="submit">
                    {{__('Фильтр')}}
                </x-button>
            </div>
        </div>
    </div>
</x-form>
