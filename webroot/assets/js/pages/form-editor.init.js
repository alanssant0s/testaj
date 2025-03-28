/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Form editor Js File
*/

// ckeditor

// import {Base64UploadAdapter} from "../../libs/@ckeditor/ckeditor5-upload";



function initEditors() {
    var ckClassicEditor = document.querySelectorAll(".ckeditor-classic");
    ckClassicEditor.forEach(function () {
        ClassicEditor.create(document.querySelector(".ckeditor-classic"), {
        }).then(function (e) {
            editor = e;
            e.ui.view.editable.element.style.height = "200px";
        }).catch(function (e) {
                console.error(e);
        });
    });


    return ckClassicEditor;
}

// Snow theme
var snowEditor = document.querySelectorAll(".snow-editor");
if (snowEditor) {
    snowEditor.forEach(function (item) {
        var snowEditorData = {};
        var issnowEditorVal = item.classList.contains("snow-editor");
        if (issnowEditorVal == true) {
            snowEditorData.theme = 'snow',
                snowEditorData.modules = {
                    'toolbar': [
                        [{
                            'font': []
                        }, {
                            'size': []
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'script': 'super'
                        }, {
                            'script': 'sub'
                        }],
                        [{
                            'header': [false, 1, 2, 3, 4, 5, 6]
                        }, 'blockquote', 'code-block'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }, {
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }],
                        ['direction', {
                            'align': []
                        }],
                        ['link', 'image', 'video'],
                        ['clean']
                    ]
                }
        }
        new Quill(item, snowEditorData);
    });
}

//buuble theme
var bubbleEditor = document.querySelectorAll(".bubble-editor")
if (bubbleEditor) {
    bubbleEditor.forEach(function (element) {
        var bubbleEditorData = {};
        var isbubbleEditorVal = element.classList.contains("bubble-editor");
        if (isbubbleEditorVal == true) {
            bubbleEditorData.theme = 'bubble'
        }
        new Quill(element, bubbleEditorData);
    });
}