@foreach($comments as $comment)
   <div class="display-comment">
     <div class="row">
       <div class="col-2">
          <div class="user-btn">
          <a href="{{route('profile.index', $post->user->id)}}">
               <div class="row">
                 <img src="/images/cats_blue_eyes_animals_pets_4288x2848.jpg" class="user-img-btn-cmt" alt=" ">
                 <p class="user-name-btn">
                   {{ $post->user->name }}
                 </p>
               </div>
             </a>
           </div>
         </div>
         <div class="col cmt-description bg-secondary">
           <p>{{ $comment->description }}</p>
         </div>
         <div class="col-3">

         </div>
       </div>
       <form method="post" action="{{ route('reply.add') }}">
           @csrf
           <div class="row form-group">
             <div class="col-2">

             </div>
             <div class="col reply-block">
               <input type="text" name="cmt-text" class="form-control" placeholder=" Reply this comment"/>
               <input type="hidden" name="post_id" value="{{ $post->id }}" />
               <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
             </div>
             <div class="col-2">
               <input type="submit" class="btn btn-warning" value="Reply" />
             </div>
           </div>
       </form>
       @include('posts.comments_replies', ['comments' => $comment->replies])
   </div>
@endforeach
