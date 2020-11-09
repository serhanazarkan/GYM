<div class="{{$parent_class}}">

    @if($label_name !== null)

        {{ Form::label($name, $label_name, ['class' => $label_class]) }}

    @endif

    @if($type === 'text')

        {{ Form::text($name, $value, array_merge(['class' => $errors->has($name) ? $class.' is-invalid' : $class,  'id' => $id], $attributes)) }}

    @elseif($type === 'email')

        {{ Form::email($name, $value, array_merge(['class' => $errors->has($name) ? $class.' is-invalid' : $class,  'id' => $id], $attributes)) }}

    @elseif($type === 'password')

        {{ Form::password($name, array_merge(['class' => $errors->has($name) ? $class.' is-invalid' : $class,  'id' => $id], $attributes)) }}

    @elseif($type === 'date')

        {{ Form::date($name, $value, array_merge(['class' => $errors->has($name) ? $class.' is-invalid' : $class,  'id' => $id], $attributes)) }}

    @elseif($type === 'textarea')

        {{ Form::textarea($name, $value, array_merge(['class' => $errors->has($name) ? $class.' is-invalid' : $class,  'id' => $id], $attributes)) }}

    @elseif($type === 'file')

        {{ Form::file($name, array_merge(['class' => $errors->has($name) ? $class.' is-invalid' : $class,  'id' => $id], $attributes)) }}

    @elseif($type === 'url')

        {{ Form::url($name, $value, array_merge(['class' => $errors->has($name) ? $class.' is-invalid' : $class,  'id' => $id], $attributes)) }}

    @elseif($type === 'number')

        {{ Form::number($name, $value, array_merge(['class' => $errors->has($name) ? $class.' is-invalid' : $class,  'id' => $id], $attributes)) }}

    @endif

    @if ($errors->has($name))
        <span class="invalid-feedback">
          <small>{{ $errors->first($name) }}</small>
        </span>
    @endif
</div>
