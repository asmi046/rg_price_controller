
@extends('layouts.all')


@section('title', "Контроль цен")
@section('description', "Контроль цен конкурентов")

@section('content')

<section class="w-full border-b flex border-gray-500 h-16">
    <div class="w-11/12 max-w-7xl my-auto mx-auto flex justify-between">
        <img class="my-auto h-12 ml-0" src="{{asset('img/logo.svg')}}" alt="">
        <a class="my-auto pi rg_exit hover:text-sred hover:before:text-sred " href="{{route('logout')}}">Выход</a>
    </div>
</section>

<section class="w-full flex">
    <div class="w-11/12 max-w-7xl my-3 mx-auto flex flex-col justify-between">
        <h2 class="text-xl font-bold mb-3">Аналоги RubEx IRRIGATION</h2>
        <div class="w-full overflow-x-scroll lg:overflow-x-visible">
            <x-table>
                <thead>
                    <tr>
                        <x-th>Бренд</x-th>

                        @foreach ($IRRIGATION['marcetplaces'] as $item)
                            <x-th>{{$item}}</x-th>
                        @endforeach

                        <x-th>Среднее</x-th>
                    </tr>
                </thead>

                <tbody>
                    <x-marketplace-sred-line :pricelist="$IRRIGATION['price_list']" :marcetplaces="$IRRIGATION['marcetplaces']" :width="50"></x-marketplace-sred-line>
                    <x-brand-line :pricelist="$IRRIGATION['price_list']" :marcetplaces="$IRRIGATION['marcetplaces']" :width="50"></x-brand-line>

                    <x-marketplace-sred-line :pricelist="$IRRIGATION['price_list']" :marcetplaces="$IRRIGATION['marcetplaces']" :width="75"></x-marketplace-sred-line>
                    <x-brand-line :pricelist="$IRRIGATION['price_list']" :marcetplaces="$IRRIGATION['marcetplaces']" :width="75"></x-brand-line>

                    <x-marketplace-sred-line :pricelist="$IRRIGATION['price_list']" :marcetplaces="$IRRIGATION['marcetplaces']" :width="100"></x-marketplace-sred-line>
                    <x-brand-line :pricelist="$IRRIGATION['price_list']" :marcetplaces="$IRRIGATION['marcetplaces']" :width="100"></x-brand-line>

                </tbody>
            </x-table>
        </div>

        <h2 class="text-xl font-bold  mb-3">Аналоги RubEx CLEAN NORD</h2>

        <div class="w-full overflow-x-scroll lg:overflow-x-visible">
            <x-table>
                <thead>
                    <tr>
                        <x-th>Бренд</x-th>

                        @foreach ($CLEAN_NORD['marcetplaces'] as $item)
                            <x-th>{{$item}}</x-th>
                        @endforeach

                        <x-th>Среднее</x-th>
                    </tr>
                </thead>

                <tbody>
                    <x-marketplace-sred-line :pricelist="$CLEAN_NORD['price_list']" :marcetplaces="$CLEAN_NORD['marcetplaces']" :width="50"></x-marketplace-sred-line>
                    <x-brand-line :pricelist="$CLEAN_NORD['price_list']" :marcetplaces="$CLEAN_NORD['marcetplaces']" :width="50"></x-brand-line>

                    <x-marketplace-sred-line :pricelist="$CLEAN_NORD['price_list']" :marcetplaces="$CLEAN_NORD['marcetplaces']" :width="75"></x-marketplace-sred-line>
                    <x-brand-line :pricelist="$CLEAN_NORD['price_list']" :marcetplaces="$CLEAN_NORD['marcetplaces']" :width="75"></x-brand-line>

                    <x-marketplace-sred-line :pricelist="$CLEAN_NORD['price_list']" :marcetplaces="$CLEAN_NORD['marcetplaces']" :width="100"></x-marketplace-sred-line>
                    <x-brand-line :pricelist="$CLEAN_NORD['price_list']" :marcetplaces="$CLEAN_NORD['marcetplaces']" :width="100"></x-brand-line>

                </tbody>
            </x-table>
        </div>

        <h2 class="text-xl font-bold  mb-3">Аналоги RubEx TRANS FOOD</h2>

        <div class="w-full overflow-x-scroll lg:overflow-x-visible">
            <x-table>
                <thead>
                    <tr>
                        <x-th>Бренд</x-th>

                        @foreach ($TRANS_FOOD['marcetplaces'] as $item)
                            <x-th>{{$item}}</x-th>
                        @endforeach

                        <x-th>Среднее</x-th>
                    </tr>
                </thead>

                <tbody>
                    <x-marketplace-sred-line :pricelist="$TRANS_FOOD['price_list']" :marcetplaces="$TRANS_FOOD['marcetplaces']" :width="50"></x-marketplace-sred-line>
                    <x-brand-line :pricelist="$TRANS_FOOD['price_list']" :marcetplaces="$TRANS_FOOD['marcetplaces']" :width="50"></x-brand-line>

                    <x-marketplace-sred-line :pricelist="$TRANS_FOOD['price_list']" :marcetplaces="$TRANS_FOOD['marcetplaces']" :width="75"></x-marketplace-sred-line>
                    <x-brand-line :pricelist="$TRANS_FOOD['price_list']" :marcetplaces="$TRANS_FOOD['marcetplaces']" :width="75"></x-brand-line>

                    <x-marketplace-sred-line :pricelist="$TRANS_FOOD['price_list']" :marcetplaces="$TRANS_FOOD['marcetplaces']" :width="100"></x-marketplace-sred-line>
                    <x-brand-line :pricelist="$TRANS_FOOD['price_list']" :marcetplaces="$TRANS_FOOD['marcetplaces']" :width="100"></x-brand-line>

                </tbody>
            </x-table>
        </div>

    </div>
</section>

@endsection
