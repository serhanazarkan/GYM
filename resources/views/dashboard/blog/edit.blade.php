@extends("dashboard.admin")

@section('content')

    {{ Breadcrumbs::render('admin.blog.edit', $blog) }}

    <div class="row">
        <div class="card col-lg-8 col-md-7 col-12 px-0">
            {!! Form::open(['route' => array('blog.update', $blog->id),'method' => 'put', 'files' => false]) !!}
            <div class="card-header text-center">
                {{ __('site.Create', ['item' => trans_choice('site.Blog', 1)]) }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        {!! Form::bsSelect('blog_owner', 'blow_owner', __('site.Author'), $users, $blog->user->id, 'form-group', 'form-control form-control-sm' , 'control-label',['required']) !!}
                        {!! Form::customInput('text', 'name', 'name', $blog->name, 'form-group', 'form-control form-control-sm', __('site.Title'), 'control-label', ['required'] ) !!}
                    </div>
                    <div class="col-7">
                        {!! Form::customInput('textarea', 'description', 'description', $blog->description, 'form-group', 'form-control form-control-sm', __('site.Description'), 'control-label', ['required'] ) !!}
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fas fa-pen"></i> {{ __('actions.Update') }}
                </button>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="card col-lg-4 col-md-5 col-12 px-0">
            <div class="card-header text-center">
                {{ __('site.Information') }}
            </div>
            <div class="card-body">
                <div class="row">
                    <ul class="list-group col-12">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ __('site.Author') }}
                            <span class="badge badge-pill">{{ $blog->user->name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ __('site.Creation_Date') }}
                            <span class="badge badge-pill">{{ $blog->created_at }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ __('site.Total_Post') }}
                            <span class="badge badge-pill">{{ count($blog->blog_posts) }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ __('site.Last_Post_Date') }}
                            <span class="badge badge-pill">{{ count($blog->blog_posts) ? $blog->blog_posts->first()->created_at : "-" }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-footer text-right">
                {!! Form::open(['route' => array('blog.destroy', $blog->id),'method' => 'delete', 'id' => 'DeleteForm']) !!}
                <button type="button" class="btn btn-danger btn-sm" id="DeleteButton" data-message="{{ __('messages.Blog_Delete_Confirmation', ['item' => $blog->name]) }}">
                    <i class="fas fa-trash"></i> {{ __('actions.Delete') }}
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('custom-scripts')

            <script type="application/javascript">

                $(document).ready(function () {
                    ClassicEditor
                        .create( document.querySelector( '#content' ) )
                        .catch( error => {
                            console.log( error );
                        } );
                });

                $('#DeleteButton').click(function (){
                    let msg = $(this).data('message');
                    if(confirm(msg)){
                        $('#DeleteForm').submit();
                    }
                });


            </script>


@endsection
