@php
    $images = App::get_images();
@endphp

@if ( !empty($images) )

    <section class="images-module">
        @php $images_module_title = get_field('images_module_title', 'option'); @endphp
        @if ( !empty($images_module_title) )
            <div class="o-container --pb-lg">
                <h4 class="images-module__title h2">{!! $images_module_title !!}</h4>
            </div>
        @endif

        <div class="images-module__bubbles-wrapper">
            @foreach ( $images as $el )
                @if ( !empty($el['image_file']['url']) )
                    <div class="images-module__bubble">
                        <img src="{!! $el['image_file']['url'] !!}" alt="{!! $el['image_title'] !!}">
                    </div>
                @endif
            @endforeach
        </div>
    </section>

@endif