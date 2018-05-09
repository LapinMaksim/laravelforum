<div class="post beforepagination">
    <div class="topwrap">
        <div class="userinfo pull-left">
            <div class="avatar">
                <img src="{{ Gravatar::fallback(url('uploads/avater.png'))->get($topic->user->email) }}" alt="{{$topic->user->name}}">
                <div class="status green">&nbsp;</div>
                <p class="lf_points">{{ count($topicsCount) }}</p>
            </div>
            @if(Auth::check() && Auth::user()->id == $topic->user->id)
                <div class="lf_icons">
                    <div class="lf_edit">
                        <a href="{{route('topic.edit',$topic->id)}}" title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                    </div>
                    <div class="lf_del">
                        <form action="{{route('topic.destroy',$topic->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" onclick="return confirm('{{$sureDelete}}')"><i class="fa fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
        <div class="posttext pull-left">
            <h2 class="lf_topic_title">{{$topic->title}}</h2>
            {!! Michelf\Markdown::defaultTransform(strip_tags($topic->details))  !!}
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="postinfobot">

        <div class="likeblock pull-left">
                @if( $liked_user != Auth::id())
                <a href="#" class="up" title="{{__('Unlike It')}}" onclick="event.preventDefault();like
                        ('{{$topic->id}}',this)"><i class="fa fa-thumbs-o-up"></i> {{$topic->likes()->count()}}</a>
                @else
                <a href="#" class="up" title="{{__('Like It')}}" onclick="event.preventDefault();like('{{$topic->id}}',
                        this)"><i class="fa fa-thumbs-up"></i> {{$topic->likes()->count()}}</a>
                @endif
        </div>
        <div class="likeblock pull-left">
            <span>    </span>
        </div>

        <div class="likeblock pull-left">
            <a href="#lf_comments_wrap" class="up"><i class="fa fa-comment"></i>{{$topic->comments()->count()}}</a>
        </div>

        <div class="next pull-right">

            <i class="fa fa-eye"></i>  {{$topic->getPageViews()}} <span> | </span>
            <i class="fa fa-clock-o"></i>  {{ $topic->created_at->diffForHumans()}}
        </div>

        <div class="clearfix"></div>
    </div>
</div>