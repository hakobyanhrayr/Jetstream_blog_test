@extends('user.app')

@section('bg-img',Storage::disk('local')->url($post->image))
@section('title', $post->title)
@section('sub-heading', $post->subtitle)


@section('main-content')
{{--    -------}}
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v15.0" nonce="MVSlysdz">
</script>
{{--    -------}}
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
{{--            <div  class="row mb-2 m-auto" style="width: 60%">--}}
{{--                @include('includes.messages')--}}
{{--            </div>--}}
            <div class="row gx-4 gx-lg-5 justify-content-center">
             <div class="col-lg-6 m-auto p-5" style="border: 1px solid black" data-postid="{{ $post->id }}" id="tt">
{{--                 @dd($post->id);--}}
                 <small>Created: <b>{{ $post->created_at }}</b></small><br>
                 <hr>
{{--                 @dd($post->categories);--}}
                  @foreach($post->categories as $category)
                     <a href="#" class="pull-right">Category: <b>{{$category->name}}</b></a>
                 @endforeach
                 <hr>
                 @foreach($post->tags as $tag)
{{--                     @dd($post->tags);--}}
                     <a href="#" class="pull-right">Tag: <b>{{$tag->name}}</b></a>
                 @endforeach
                 <hr>
                 <p>Content: <br>{!! htmlspecialchars_decode($post->body) !!}</p>
                 <div style="display: flex;justify-content: space-between;align-items: center;margin-bottom: 15px">
                      <div>
                          <span>Status:{{ $post->status }}</span>
                      </div>
{{--                     <div style="display: flex;justify-content: space-between;align-items: center;width: 300px;">--}}
{{--                         ---------}}
{{--                         <div style="padding-bottom: 10px; display: flex;align-items: center;width: 100px;justify-content: space-between">--}}
{{--                             <small>Like:  {{ $post->likes->count() }} </small>--}}
{{--                             <form action="#" method="POST">--}}
{{--                                 {{route('likes')}}--}}
{{--                                 @csrf--}}
{{--                                 <input type="hidden" name="post" value="{{ $post->id }}">--}}
{{--                                 <button type="submit" href="" id="#" data-id="{{ $post->id }}"  style="background: none;border: none"><i class="fa-solid fa-thumbs-up"></i></button>--}}
{{--                             </form>--}}
{{--                         </div>--}}
{{--                         ---------}}
{{--                         <div style="padding-bottom: 10px; display: flex;align-items: center;width: 120px;justify-content: space-between">--}}
{{--                             <small>Dislike:  {{ $post->dislikes->count() }} </small>--}}
{{--                             <form action="#" method="POST">--}}
{{--                                 {{route('dislike')}}--}}
{{--                                 @csrf--}}
{{--                                 <input type="hidden" name="post" value="{{ $post->id }}">--}}
{{--                                 <button type="submit" href="" id="#" data-id="{{ $post->id }}"  style="background: none;border: none"><i class="fa-solid fa-thumbs-down"></i></button>--}}
{{--                             </form>--}}
{{--                         </div>--}}
{{--                         -----------}}
{{--                     </div>--}}
                 </div>
             </div>
                <div class="fb-comments" data-href="{{ Request::url() }}"  data-numposts="2" style="padding-left: 7px"></div>
            </div>
        </div>
    </article>
@endsection
