<div class="{{ $parent_class}}">
    @if($label_name !== null)
        {{ Form::label($name, $label_name, ['class' => $label_class]) }}
    @endif
    <div id="{{$name}}">
        @foreach($items as $item)
            <div class="form-check form-check-inline">
                {{ Form::radio(
                $name,
                $item["name"],
                $item["name"] === $value ? 'checked' : null,
                 array_merge([
                 'class' => $errors->has($name) ? 'form-check-input is-invalid' : 'form-check-input',
                 'id' => $id
                  ],
                  $attributes)) }}
                @if($item["label"] !== null)
                    {{ Form::label($name, $item["label"], ['class' => 'form-check-label ml-1']) }}
                @endif
            </div>
        @endforeach
    </div>
    @if ($errors->has($name))
        <span class="invalid-feedback">
            <small>{{ $errors->first($name) }}</small>
        </span>
    @endif
</div>
