<div class="form-group">
    <label class="custom_label" for="{{$name}}">
        <i class="fas fa-sync-alt"></i>
        {{ $label_name }}
    </label>
    {{ Form::file($name, array_merge(['id' =>$id, 'class' => $errors->has($name) ? 'form-control has-error' : 'form-control'], $attributes)) }}
    @if ($errors->has($name))
        <span class="invalid-feedback">
            <small>{{ $errors->first($name) }}</small>
        </span>
    @endif
</div>

<style>
    input[type=file] {
        opacity: 0;
        height: 3rem;
        overflow: hidden;
        cursor: pointer;
        margin-top: -3.5rem;
    }

    .custom_label{
        height: 3rem;
        align-content: center;
        padding: 1.2rem 0.5rem;
        font-size: x-small;
        box-shadow: 1px 1px 1px 0 #999999;
        width: 75%;
    }
</style>
