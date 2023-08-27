@extends('layouts/app')

@section('title', '投稿詳細')

@section('content')
              @if (session('flash_message'))
                 <p class="text-success">{{ session('flash_message') }}
              @endif
 
                 <div class="mb-2">    
                     <a href="{{ route('undex') }}" class="text-decoration-none">&lt; 戻る</a>                              
                 </div>
 
                 <div class="card mb-3">
                     <div class="card-body">
                         <h2>{{ $post->title }}</h2>
                         <p>{{ $post->content }}</p>

                         <div class="d-flex">
                          <a href="{{ route('unkoedit', $post) }}" class="btn btn-outline-primary d-block me-1">編集</a>
                         
                         <form action="{{ route('undesu', $post) }}" method="post">
                            @csrf
                            @method('delete')                                        
                         <button type="submit" class="btn btn-outline-danger">削除</button>
                         </form>
                     </div>
                 </div>                 
             </div>
@endsection