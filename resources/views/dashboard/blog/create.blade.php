@extends("dashboard.admin")

@section('content')

    {{ Breadcrumbs::render('admin.blog.create') }}

    <div class="row">
        <div class="card col-12">
            {!! Form::open(['route' => ['blog.store', 'method' => 'post']]) !!}
            <div class="card-header text-center bg-success text-white">
                {{ __('site.Create', ['item' => trans_choice('site.Blog', 1)]) }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        {!! Form::bsSelect('blog_owner', 'blow_owner', __('site.Author'), $users, null, 'form-group', 'form-control form-control-sm' , 'control-label',['required']) !!}
                        {!! Form::customInput('text', 'name', 'name', null, 'form-group', 'form-control form-control-sm', __('site.Title'), 'control-label', ['required'] ) !!}
                    </div>
                    <div class="col-7">
                        {!! Form::customInput('textarea', 'description', 'description', null, 'form-group', 'form-control form-control-sm', __('site.Description'), 'control-label', ['required'] ) !!}
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fa fa-save"></i> {{ __('actions.Save') }}
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row mt-4">
        <div class="card col-12">
            <div class="card-header text-center bg-info text-white">
                {{ __('site.Other_Item', ['item' => trans_choice('site.Blog',2)]) }}
            </div>
            <div class="card-body">
                <div class="row">
                    <ul class="list-group col-12">
                        @foreach($blogs as $blog)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    {{ $blog -> name }}
                                    <a href="{{ route('blog.edit', $blog->id) }}" class="font-italic ml-3">
                                        <small>{{ __('actions.Edit') }}</small>
                                    </a>
                                </div>
                                <div>
                                    <small>
                                        <i class="fa fa-user"></i> {{ $blog -> user -> name }}
                                    </small>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-scripts')
            <!--
            <script type="application/javascript">
                $(document).ready(function () {
                    ClassicEditor
                        .create( document.querySelector( '#content' ) )
                        .catch( error => {
                            console.log( error );
                        } );
                });
            </script>

            -->
@endsection
