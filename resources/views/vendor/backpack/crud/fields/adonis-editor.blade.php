{{--<!-- textarea -->--}}
@include('crud::fields.inc.wrapper_start')
<label>{!! $field['label'] !!}</label>
@include('crud::fields.inc.translatable_icon')
<textarea
    name="{{ $field['name'] }}"
    id="{{$field["name"]}}"
        @include('crud::fields.inc.attributes')
    	>{{ old(square_brackets_to_dots($field['name'])) ?? $field['value'] ?? $field['default'] ?? '' }}</textarea>
@if (isset($field['hint']))
    <p class="help-block">{!! $field['hint'] !!}</p>
@endif
@include('crud::fields.inc.wrapper_end')
@push('crud_fields_styles')
@endpush
@push('crud_fields_scripts')
    <script src="https://cdn.tiny.cloud/1/v9a3hkc5xsw542n1csexyl6eaveglb8el5zminkjlklbn3v4/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#{{$field['name']}}',
            height: "100vh",
            resize: 'both',
            image_title: true,
            images_upload_url: '{{route("api.uploads.ckeditor")}}',

            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
@endpush
