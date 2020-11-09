<div class="{{ $parent_class }}">
    {{ Form::label($name, $label_name, ['class' => $label_class]) }}

    {!! Form::select($name, $list, $value, array_merge(['id' => $id, 'class' =>  $errors->has($name) ? $class.' is-invalid' : $class], $attributes)) !!}
    @if ($errors->has($name))
        <span class="invalid-feedback">
            <small>{{ $errors->first($name) }}</small>
        </span>
    @endif
</div>
