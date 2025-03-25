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
                <x-select name="category_id" :options="$categories" value="{{request('category_id')}}"/>
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

