@extends("dashboard.admin")

@section('content')

    {{ Breadcrumbs::render('admin.blog.index') }}

    <div class="row">
        <div class="card col-lg-3 col-md-4 col-12">
            <div class="card-header bg-primary text-white">
                <i class="fa fa-info mr-2"></i> {{ trans_choice('site.Category',2) }}
            </div>

            <div class="card-body justify-content-between align-content-center pt-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-sm btn-block btn-outline-success" data-toggle="modal" data-target="#storeCategoy">
                            <i class="fa fa-plus"></i> {{ __('actions.Add_New_Item', ['item' => trans_choice('site.Category',1)]) }}
                        </button>
                    </li>
                    @foreach($categories as $category)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="row">
                                {{ $category->name }}
                                <span class="badge badge-pill mr-2">
                                    <i class="fa fa-newspaper"></i> {{ count($category->blog_posts) }}
                                </span>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary updateCategory" data-toggle="modal" data-target="#editCategory" data-id="{{ $category->id }}" data-name="{{ $category->name }}" data-description="{{ $category->description }}">
                                <i class="fa fa-pen"></i>
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="card col-lg-9 col-md-8 col-12">
            <div class="card-header d-flex justify-content-between align-content-center bg-primary text-white">
                <h5>{{ trans_choice('site.Blog',2) }}</h5>
                <a type="button" class="btn btn-sm btn-outline-success text-white" href="{{route('blog.create')}}">
                    <i class="fa fa-plus"></i> {{ __('actions.Add_New_Item', ['item' => trans_choice('site.Blog',1)]) }}
                </a>
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
            <div class="card-footer d-flex justify-content-around align-items-center text-center">
                {{ $blogs->render() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="storeCategoy" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="storeCategoyLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="storeCategoyLabel">
                        <i class="fa fa-plus"></i> {{ __('actions.Add_New_Item', ['item' => trans_choice('site.Category',1)]) }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['route' => ['blog.store_category', 'method' => 'post']]) !!}
                <div class="modal-body">
                    {!! Form::customInput('text', 'name', 'name', null, 'form-group', 'form-control form-control-sm', __('site.Item_Name', ['item' => trans_choice('site.Category',1)]), 'control-label', ['required'] ) !!}
                    {!! Form::customInput('textarea', 'description', 'description', null, 'form-group', 'form-control form-control-sm', __('site.Description'), 'control-label', ['required'] ) !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        {{ __('actions.Close') }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        {{ __('actions.Save') }}
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="modal fade" id="editCategory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryLabel">
                        <i class="fa fa-pen"></i> {{ __('actions.Update') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::open(['route' => array('blog.update_category'),'method' => 'put', 'files' => false]) !!}
                <div class="modal-body">
                    {!! Form::bsHidden('id','update_id', null, []) !!}
                    {!! Form::customInput('text', 'update_name', 'update_name', null, 'form-group', 'form-control form-control-sm', __('site.Item_Name', ['item' => trans_choice('site.Category',1)]), 'control-label', ['required'] ) !!}
                    {!! Form::customInput('textarea', 'update_description', 'update_description', null, 'form-group', 'form-control form-control-sm', __('site.Description'), 'control-label', ['required'] ) !!}
                </div>
                <div class="modal-footer d-flex justify-content-between align-content-center">
                    <button type="button" class="btn btn-sm btn-outline-danger deleteCategory" data-id="">
                        <i class="fa fa-trash"></i> {{__('actions.Delete')}}
                    </button>
                    <div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            {{ __('actions.Close') }}
                        </button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('actions.Save') }}
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {!! Form::open(['route' => array('blog.delete_category'),'method' => 'delete', 'id' => 'deleteCategoryForm']) !!}
        {!! Form::bsHidden('id','delete_id', null, []) !!}
    {!! Form::close() !!}
@endsection

@section('custom-scripts')
    <script>
        $(".updateCategory").click(function (){

            let id = $(this).data('id');
            let name = $(this).data('name');
            let description = $(this).data('description')

            $('.deleteCategory').data('id', id);

            $("#update_name").val(name);
            $("#update_description").val(description);
            $("#update_id").val(id);
            $('#editCategoryLabel').html('<i class="fa fa-pen mr-2"></i>' + name)
        });

        $(".deleteCategory").click(function (){
            let id = $(this).data('id');
            $("#delete_id").val(id);
            $("#deleteCategoryForm").submit();
        });
    </script>
@endsection
