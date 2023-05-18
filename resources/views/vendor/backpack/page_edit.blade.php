@php
    use App\ViewModels\Page\PageEditViewModel;
    /**
    * @var PageEditViewModel $pageEditViewModel;
    */
    $old=$pageEditViewModel->getPage();
@endphp
@extends(backpack_view("blank"))
@section("after_styles")
    <style>
        #container {
            width: 1000px;
            margin: 20px auto;
        }

        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 100vh;
        }

        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }

        #img_preview_change {
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <form action="{{route("page.update",$old->getId())}}" method="POST" enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <div class="row bg-white my-1 p-2 justify-content-end">
                <button class="btn btn-success">
                    <i class="las la-save"></i>Cập nhật trang
                </button>
            </div>
            <div class="row bg-white mb-5">
                <div class="col-lg-12 col-12 py-3">
                    <div class="form-group">
                        <label for="title">Tiêu đề</label>
                        <input class="form-control border" value="{{$old->getTitle()}}" name="title"
                               placeholder="Tiêu đề">
                        @error("title")
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div id="editor">
                        {!! $old->getBody() !!}
                    </div>
                    <input hidden value="" name="body" id="body">
                </div>
            </div>
        </form>
    </div>
@stop
@section("after_scripts")
    <script src="{{asset("js/ckeditor.js")}}"></script>

    <script>
        const editor = CKEDITOR.ClassicEditor
            .create(document.getElementById("editor"),
                {

                    toolbar: {
                        items: [
                            'exportPDF', 'exportWord', '|',
                            'findAndReplace', 'selectAll', '|',
                            'heading', '|',
                            'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                            'bulletedList', 'numberedList', 'todoList', '|',
                            'outdent', 'indent', '|',
                            'undo', 'redo',
                            '-',
                            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                            'alignment', '|',
                            'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                            'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                            'textPartLanguage', '|',
                            'sourceEditing'
                        ],
                        shouldNotGroupWhenFull: true
                    },
                    ckfinder: {
                        uploadUrl: '{{route("api.uploads.ckeditor")}}'
                    },
                    heading: {
                        options: [
                            {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                            {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                            {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
                            {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'},
                            {model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4'},
                            {model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5'},
                            {model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6'}
                        ]
                    },
                    placeholder: 'Chỉnh sửa nội dung bài viết tại đây',
                    fontSize: {
                        options: [10, 12, 14, 'default', 18, 20, 22],
                        supportAllValues: true
                    },
                    htmlSupport: {
                        allow: [
                            {
                                name: /.*/,
                                attributes: true,
                                classes: true,
                                styles: true
                            }
                        ]
                    },
                    htmlEmbed: {
                        showPreviews: true
                    },
                    removePlugins: [
                        // 'EasyImage',
                        'RealTimeCollaborativeComments',
                        'RealTimeCollaborativeTrackChanges',
                        'RealTimeCollaborativeRevisionHistory',
                        'PresenceList',
                        'Comments',
                        'TrackChanges',
                        'TrackChangesData',
                        'RevisionHistory',
                        'Pagination',
                        'WProofreader',
                        // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                        // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                        'MathType',
                        // The following features are part of the Productivity Pack and require additional license.
                        'SlashCommand',
                        'Template',
                        'DocumentOutline',
                        'FormatPainter',
                        'TableOfContents'
                    ],
                }).then(editor => {
                editor.model.document.on('change:data', (e) => {
                    $("#body").val(editor.getData())
                });
            });

    </script>
    <script>
        $(document).ready(function () {
            $(".ck-content").on("change", function () {
                console.log(this)
            })
            $("#img_preview_change").on("click", function () {
                $("#thumbnail_file").click()
            })
            $("#thumbnail_file").on("change", function (e) {
                const file = e.target.files[0];
                const reader = new FileReader();
                reader.onloadend = () => {
                    $("#img_preview").attr("src", reader.result)
                };
                reader.readAsDataURL(file);
            })
        })
    </script>
@endsection
