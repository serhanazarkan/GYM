<div class="form-group">
    <label class="custom_label" for="{{$name}}"><i class="flaticon-photo font_1x"></i> {{ $label_name }}</label>
    {{ Form::file($name, array_merge(['id' =>$id, 'class' => $errors->has($name) ? 'form-control has-error' : 'form-control'], $attributes)) }}
    @if ($errors->has($name))
        <span class="invalid-feedback">
            <small>{{ $errors->first($name) }}</small>
        </span>
    @endif
</div>

<style>
    input[type=file] {
        position: absolute;
        left: 1rem;
        top: 0;
        opacity: 0;
        width: 100%;
        height: 5rem;
        overflow: hidden;
        cursor: pointer;
    }

    .custom_label{
        width: 100%;
        background: azure;
        height: 5rem;
        align-content: center;
        padding: 1.3rem 0.5rem;
        font-size: x-small;
        border: 2px dashed;
    }
</style>
