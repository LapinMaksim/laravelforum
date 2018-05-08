<a href="#" title="{{__('Reply')}}" class="lf_reply"><i class="fa fa-reply"></i></a>
<div id="lf_comment_reply" class="lf_modal modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body ">
                <form action="{{route('topic.comment.create',$topic->id)}}" class="form" method="post">
                    {{csrf_field()}}
                    {{method_field('POST')}}
                    <div class="postinfobot">
                        <textarea class="form-control" id="body" rows="5" name="body" data-provide="markdown" data-iconlibrary="fa" data-hidden-buttons="cmdPreview">{{old('body')}}</textarea>
                        <div class="pull-right postreply">
                            <div class="pull-left"><button type="submit" class="btn btn-primary">{{__('Post Comment')}}</button></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>