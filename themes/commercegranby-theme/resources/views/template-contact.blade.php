{{--
  Template Name: Contact Template
--}}

@php
  $content_block = $call_to_action;
@endphp

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')

    <div class="o-main-container">

      <section class="contact-form -t-animate">
        
        <div class="o-container --pb-xl">

          <div class="row">
            <div class="col-12 col-lg-8">
              <div class="o-wrapper --pt-md">
                <h2 class="u-pb">{!! $form->title !!}</h2>
                @if( !empty($form->intro) )
                  <p class="lead">
                    {!! $form->intro !!}
                  </p>
                @endif
              </div>

              <div class="o-wrapper">
                <div class="contact-form__element">
                  @if ( !empty($form->contact_form) )
                    {!! do_shortcode($form->contact_form) !!}
                  @endif
                </div>
              </div>
            </div>
            
            <div class="col-12 col-lg-4 -t-animate">
              <div class="o-wrapper --pt-md">
                @if ( !empty($form->bloc_1_text) )
                  <div class="content-block">
                    @if( !empty($form->bloc_1_title) )
                      <h3>{!! $form->bloc_1_title !!}</h3>
                    @endif  
                    {!! $form->bloc_1_text !!}
                  </div>
                @endif

                @if ( !empty($form->bloc_2_text) )
                  <div class="content-block">
                    @if( !empty($form->bloc_2_title) )
                      <h3>{!! $form->bloc_2_title !!}</h3>
                    @endif    
                    {!! $form->bloc_2_text !!}
                  </div>
                @endif
              </div>

            </div>
            

          </div>

        </div>

      </section>

    </div>

  @endwhile
@endsection
