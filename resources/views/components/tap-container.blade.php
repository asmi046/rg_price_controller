<details class="my-3 group">
    <summary class="list-none w-full">
        <span class="
        w-full
        px-5
        py-3
        bg-white
        w-fill
        block
        text-black
        border
        border-gray-300
        rounded-xl
        relative
        before:absolute
        before:w-3
        before:h-3
        before:bg-arrow-bg
        before:bg-cover
        before:right-5
        before:top-5
        group-open:before:rotate-180
        ">{{$name}}</span>
    </summary>
    <div class="p-5">
        {{$slot}}
    </div>
</details>
