<div class="qa-message-list" id="wallmessages">
    <div class="message-item" id="m16">
        <br>
        <div class="message-inner">
            <a href="#" class="fill-div" data-toggle="modal" data-target="#favoritesModal"></a>

            <div class="message-head clearfix">

                @if($post->status == false)
                <div class="bg-danger text-white p-2 my-1 rounded">THIS POST WAS HIDDEN!</div>
                @endif

                @if(isset($caffe))
                <div class="user-detail">
                    <div id="postheader">
                        <img src="{{$post->user->foto_url}}" alt="Logo" class="rounded-circle img-thumbnail logo-small" />
                        <h5 class="handle" style="padding-top:2px"><a class="fill-div" href="/users/{{$post->user->id}}">{{$post->user->name}}</a></h5>
                    </div>

                    <div class="post-meta">
                        <div class="asker-meta">
                            <span class="qa-message-what"></span>
                            <span class="qa-message-when">
                                <span class="qa-message-when-data">{{$post->created_at}}</span>
                            </span>

                            </span>
                        </div>
                    </div>
                </div>

                @else
                <div class="user-detail">
                    <div id="postheader">
                        <img src="{{$post->caffe->logo_url}}" alt="Logo" class="rounded-circle img-thumbnail logo-small" />
                        <h5 class="handle" style="padding-top:2px"><a class="fill-div" href="/caffes/{{$post->caffe->id}}">{{$post->caffe->name}}</a></h5>
                    </div>

                    <div class="post-meta">
                        <div class="asker-meta">
                            <span class="qa-message-what"></span>
                            <span class="qa-message-when">
                                <span class="qa-message-when-data">{{$post->created_at}}</span>
                            </span>
                            <span class="qa-message-who">
                                <span class="qa-message-who-pad">by </span>
                                <span class="qa-message-who-data"><a href="/users/{{$post->user->id}}">{{
                                        $post->user->name}}</a></span>
                            </span>
                        </div>
                    </div>
                </div>
                @endif

            </div>
 
            <div class="qa-message-content" style="padding:3%">
                <a href="#" class="fill-div" data-toggle="modal" data-target="#favoritesModal{{$post->id}}" style="text-decoration: none">
                    @if( $post->source_caffe != null)

                    <div class="repost_txt">
                        <p>Origanaly posted by</p><a href="/users/{{$post->user->id}}">{{$post->user->name}}</a> @ <a href="#">{{$post->OriginalCaffe()->name or ''}}</a></p>
                        <p>{{$post->created_at}}</p>
                    </div>

                    @endif                   
                

                <p>{{$post->content}}</p>
            </a>
                <hr />
                @foreach($post->tags as $tag)
                <a href="/tags/{{$tag->id}}" class="tag m-1 p-1">{{$tag->tag}}</a>
                @endforeach
            </div>

            
            <button type="button" class="btn btn-light text-dark" data-toggle="modal" data-target="#tipsModal_{{$post->id}}"> 
                    <i class="fas fa-star text-warning"></i>
                {{$post->likes()->count()}}
                @if($post->likes()->count() == 1)
                tip
                @else
                tips
                @endif
            </button>
                                    
            {{-- Modal para mostrar quem deu uma tip a este post. --}}
            <div class="modal" tabindex="-1" role="dialog" id="tipsModal_{{$post->id}}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">These customers tipped <strong>{{$post->user->name}}</strong>:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                        </div>

                        <div class="modal-body text-center">                            
                            @if($post->likes()->count() == 0)
                            <em>Oh... nobody tipped yet <i class="far fa-sad-cry mx-2"></i></em>
                            <img src="https://upload.wikimedia.org/wikipedia/en/8/86/Bragolin_Crying_Boy.JPG" class="img-fluid rounded my-3" />
                            @else
                            <div class="row">
                            @foreach($post->likes()->get() as $like)
                                <div class="col-md-3">
                                    <a href="/users/{{$like->id}}">
                                        <div class="center rounded-circle logo-small photo-div" style="background-image: URL({{$like->foto_url}});"></div>
                                        <p>{{$like->name}}</p>                         
                                    </a>
                                </div>
                            @endforeach
                            </div>
                            @endif                        
                        </div>                
                    </div>
                </div>
            </div>

            {{-- Verifica se o utilizador está autenticado e é cliente do café original do post. --}}
            @if(Auth::check() && Auth::user()->follows()->find($post->caffe->id))

            {{-- Verifica se o utilizador autenticado já deu uma tip a este post. --}}
            @if(!Auth::user()->likes()->find($post->id))
            <a href="{{ route('posts.tip', $post->id) }}" class="btn btn-success " >
                    <i class="fas fa-smile"></i> Tip
            </a>            
            @else
            <a href="{{ route('posts.untip', $post->id) }}" class="btn btn-danger">
                    <i class="fas fa-frown"></i> UnTip
            </a>
            @endif            

            <button type="button" id="button" class="btn btn-primary" data-toggle="modal" data-target="#repost{{$post->id}}">
                    <i class="fas fa-sync-alt"></i> Repost
            </button>                        
            @endif    
            @if($post->repost_counter == 1)
                Reposted {{$post->repost_counter}} time
            @elseif($post->repost_counter > 1)
                Reposted {{$post->repost_counter}} times
            @elseif($post->repost_counter = 0)
                                    
            @endif

            {{-- Botão para ocultar post por donos, staf e admin --}}
            @if(isset($staff))
            @foreach($staff as $s)
                @foreach($s as $members)
                    @if($members[0] == 1)

                    @endif
                @endforeach
            @endforeach
                
            @if(Auth::check() && isset($caffe) && ($caffe->user_id == Auth::User()->id || Auth::User()->isAdmin == true || $members[0] == 1 ))            
                @if($post->status == true)
                <a href="{{ route('posts.status', $post->id) }}" class="btn btn-danger float-right mx-2">
                        <i class="fas fa-eye-slash"></i> Hide Post
                @else
                <a href="{{ route('posts.status', $post->id) }}" class="btn btn-success float-right mx-2">
                        <i class="fas fa-eye"></i> Show Post
                @endif
                </a>
            @endif
            @endif

            <a href="#" data-toggle="modal" data-target="#favoritesModal{{$post->id}}" style="text-decoration: none">
            <h4 style="float:right">{{count($post->comments()->with('user')->get() )}} Comments</h4>
            </a>

        </div>
    </div>
</div>

    <div class="modal hide fade" id="repost{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel"><img src="{{$post->user->foto_url}}" alt="Logo" class="rounded-circle img-thumbnail logo-small" /> {{$post->user->name}} @ {{$post->caffe->name}}</h4>                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">                
                    <p>{{$post->content}}</p>
                </div>
                <div class="modal-footer">
                    
                    @if(Auth::check())
                        <h6>Repost to : </h6><br>
                        @foreach(auth()->user()->follows as $follow)
                            <div id="repostoptions">
                                <a href="/repost/{{$post->caffe_id}}/{{$post->id}}/{{$follow->id}}/{{auth()->user()->id}}" >
                                    <div class="center rounded-circle logo-small photo-div " style="text-decoration:none;background-image: URL({{$follow->logo_url}});"></div>
                                    <p>{{$follow->name}}</p>                 
                                </a>
                            </div>
                        @endforeach
                    @endif               
                </div>
            </div>
      </div>
    </div>


<div class="modal fade" id="favoritesModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="mcontent">
            <div class="modal-header">
                <h4 class="modal-title" id="favoritesModalLabel"><img src="{{$post->user->foto_url}}" alt="Logo" class="rounded-circle img-thumbnail logo-small" /> {{$post->user->name}} @ {{$post->caffe->name}}</h4>                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">                
                <p>{{$post->content}}</p>                
            </div>

            <div class="modal-footer">
                <span id="cmtbox">
                @if(Auth::check())
                <form action="/comment/store" method="post">
                @csrf()
                    <textarea id="txt" rows="3" cols="70" name="comment" placeholder="What are you doing right now?"></textarea><br>
                    <input type="hidden" name="tags" value="comment => ['required', 'regex:/^[#.*]">
                    <button type="submit" style="float:right;margin-right:5%" class="btn btn-success green"><i class="fa fa-share"></i>
                        Comment</button>
                    <input type="hidden" name="post_id" value={{$post->id}}>
                    <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
                </form>
                @endif
                </span>
            </div>

            @foreach($comments = $post->comments()->with('user')->get() as $cmt)
            <div id="modalcomments" class="modal-body">
                <h6>Posted by {{$cmt->user->name}}</h5>
                <h6>{{$cmt->created_at}}</h6>
                <p>{{$cmt->content}}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>