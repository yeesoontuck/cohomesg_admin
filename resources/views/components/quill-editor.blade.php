@props(['name', 'id', 'defaultValue', 'variables'])

<div {{ $attributes->merge(['class' => '']) }}>

    <div class="mb-10" id="{{ $id }}"></div>

    <input type="hidden" name="{{ $name }}" id="quill-editor-area-{{ $name }}"
        value="{!! $defaultValue !!}" />

    @push('scripts')
        <script defer>
            document.addEventListener('DOMContentLoaded', () => {
                if (document.getElementById('{{ $id }}')) {
                    const editor = new Quill('#{{ $id }}', {
                        theme: 'snow',
                        modules: {
                            toolbar: {
                                container: [
                                    [{
                                        'placeholder': [{!! $variables !!}]
                                    }], // my custom dropdown
                                    ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                                    // ['blockquote', 'code-block'],

                                    [{
                                        'header': 1
                                    }, {
                                        'header': 2
                                    }, {
                                        'header': 3
                                    }, {
                                        'header': 4
                                    }], // custom button values
                                    [{
                                        'list': 'ordered'
                                    }, {
                                        'list': 'bullet'
                                    }],
                                    [{
                                        'script': 'sub'
                                    }, {
                                        'script': 'super'
                                    }], // superscript/subscript
                                    // [{
                                    //     'indent': '-1'
                                    // }, {
                                    //     'indent': '+1'
                                    // }], // outdent/indent
                                    // [{
                                    //     'direction': 'rtl'
                                    // }], // text direction

                                    // [{
                                    //     'size': ['small', false, 'large', 'huge']
                                    // }], // custom dropdown
                                    // [{
                                    //     'header': [1, 2, 3, 4, 5, 6, false]
                                    // }],

                                    // [{
                                    //     'color': []
                                    // }, {
                                    //     'background': []
                                    // }], // dropdown with defaults from theme
                                    // [{
                                    //     'font': []
                                    // }],
                                    [{
                                        'align': []
                                    }],

                                    // ['clean'] // remove formatting button

                                ],
                                handlers: {
                                    "placeholder": function(value) {
                                        if (value) {
                                            const cursorPosition = this.quill.getSelection().index;
                                            this.quill.insertText(cursorPosition, value);
                                            this.quill.setSelection(cursorPosition + value.length);
                                        }
                                    }
                                }
                            }
                        },
                    });
                    const quillEditor = document.getElementById('quill-editor-area-{{ $name }}');

                    // Set default value if it's not empty
                    const defaultValue = quillEditor.value.trim();
                    if (defaultValue) {
                        editor.clipboard.dangerouslyPasteHTML(defaultValue);
                    }

                    // Sync Quill with the hidden input
                    editor.on('text-change', function() {
                        quillEditor.value = editor.root.innerHTML;
                    });

                    quillEditor.addEventListener('input', function() {
                        editor.root.innerHTML = quillEditor.value;
                    });


                    // https://github.com/slab/quill/issues/1817
                    const placeholderPickerItems = Array.prototype.slice.call(document.querySelectorAll(
                        '.ql-placeholder .ql-picker-item'));

                    placeholderPickerItems.forEach(item => item.textContent = item.dataset.value);

                    document.querySelector('.ql-placeholder .ql-picker-label').innerHTML = 'Insert variable' +
                        document
                        .querySelector('.ql-placeholder .ql-picker-label').innerHTML;
                }
            });
        </script>
    @endpush


    @push('styles')
        <style>
            .ql-editor {
                /* line-height: 1.5rem !important; */
                min-height: 10rem;
            }

            .dark .ql-editor,
            .dark #toolbar-container {
                background-color: #1d293d;
            }

            .ql-editor p {
                margin-bottom: 1rem !important;
            }

            .dark .ql-snow .ql-stroke {
                stroke: #FFF;
            }

            .dark .ql-snow .ql-fill {
                fill: #FFF;
            }

            .ql-placeholder .ql-picker-label {
                padding-right: 18px !important;
            }

            .dark .ql-placeholder .ql-picker-label {
                color: #FFF;
            }
        </style>
    @endpush
</div>
