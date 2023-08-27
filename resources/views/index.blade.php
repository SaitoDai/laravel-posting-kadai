@extends('layouts/app')   

@section('title', '投稿一覧')

@section('content')
                 @if (session('flash_message'))
                    <p class="text=success">{{ session('flash_message') }}</p>
                 @endif

                 <div class="mb-2">
                    <a href="{{ route('uncreate') }}"  class="text-decoration-none">新規投稿</a>                                   
                </div>

                 @foreach($posts as $post)
                 <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title fs-5"> {{ $post->title }}</h2>
                        <p class="card-text">{{ $post->content }}</p>
                        <p>{{ $post->created_at }}</p>
                    </div>

                    <div class="d-flex">
                        <a href="{{ route('unkoshow', $post->id) }}" class="btn btn-outline-primary d-block me-1">詳細</a>
                        <a href="{{ route('unkoedit', $post->id) }}" class="btn btn-outline-primary d-block me-1">編集</a>

                        <form action="{{ route('undesu', $post->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger">削除</button>
                        </form>
                    </div>
                </div>
                @endforeach
@endsection