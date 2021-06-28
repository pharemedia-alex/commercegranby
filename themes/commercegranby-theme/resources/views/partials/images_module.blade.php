@php
    $images = App::get_images();
@endphp

@if ( !empty($images) )

    <section class="images-module">
    <div class="o-container --pt-xl -t-animate">

        <div class="wave-sep"></div>
        
        <div class="m-instagram">
            <div class="container">
                <h2 class="m-instagram__title"></h2>
            </div>
    
            <div class="m-instagram__bubbles-container">
                @foreach ( $images as $el )
                    @dump($el);
                            @php 
                            //$instagram_url_image = get_field( 'instagram_url_image', $instagram_post );
                            @endphp
                            {{-- Save the image on our server 
                            <img src="{{ ImagesManager::fit( $instagram_url_image, 450, 450 )  }}" alt="image instagram ID: {{ get_field( 'instagram_id', $instagram_post ) }}">--}}
                        </div>
                    
                @endforeach
            </div>
        </div>
        

    </div>
    
    </section>

@endif