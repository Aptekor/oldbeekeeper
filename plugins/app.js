// app.js
import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';
import Essentials from '@ckeditor/ckeditor5-essentials/src/essentials';
//import UploadAdapter from '@ckeditor/ckeditor5-adapter-ckfinder/src/uploadadapter';
import Autoformat from '@ckeditor/ckeditor5-autoformat/src/autoformat';
import Bold from '@ckeditor/ckeditor5-basic-styles/src/bold';
import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic';
import BlockQuote from '@ckeditor/ckeditor5-block-quote/src/blockquote';
import Heading from '@ckeditor/ckeditor5-heading/src/heading';
import Image from '@ckeditor/ckeditor5-image/src/image';
import ImageCaption from '@ckeditor/ckeditor5-image/src/imagecaption';
import ImageStyle from '@ckeditor/ckeditor5-image/src/imagestyle';
import ImageToolbar from '@ckeditor/ckeditor5-image/src/imagetoolbar';
import ImageUpload from '@ckeditor/ckeditor5-image/src/imageupload';
import Link from '@ckeditor/ckeditor5-link/src/link';
//import CKEditorInspector from '@ckeditor/ckeditor5-inspector';
import List from '@ckeditor/ckeditor5-list/src/list';
import Paragraph from '@ckeditor/ckeditor5-paragraph/src/paragraph';




class MyUploadAdapter {
    constructor(loader, options) {
        // The file loader instance to use during the upload.
        this.loader = loader;
    }

    // Starts the upload process.
    upload() {
        return  this.loader.file
        .then(file => new Promise((resolve, reject) => {
            this.uploadFile(file, resolve);
            }));
    }

    uploadFile(file, resolve) {
        let formData = new FormData();
        formData.append('file', file);
        let url2 = window.location.pathname
        $.ajax({
            url: url2,
            type: 'POST',
            dataType:'JSON',
            processData: false,
            contentType : false,
            data: formData,

            /*beforeSend: function (request) {
               request.setRequestHeader("Content-Type", file.type);
            },*/

            success: function (respJson) {
              if (respJson.answer == true){
                  resolve({
                      default: respJson.files[0]
                  });
              } else {
                  console.log(respJson.msg);
              }

            },
        });
    }
    // Aborts the upload process.
    abort() {
        // Reject the promise returned from the upload() method.
        server.abortUpload();
    }
}



function MyCustomUploadAdapterPlugin( editor ) {
    editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
        return new MyUploadAdapter( loader );
    };
}


ClassicEditor
    .create( document.querySelector('#editor'), {
        plugins: [
            Essentials,
          //  UploadAdapter,
            Autoformat,
            Bold,
            Italic,
            BlockQuote,
            Heading,
            Image,
            ImageCaption,
            ImageStyle,
            ImageToolbar,
            ImageUpload,
            Link,
            List,
            Paragraph,

        ],

        extraPlugins: [ MyCustomUploadAdapterPlugin ],

        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                'uploadImage',
                'blockQuote',
                'undo',
                'redo'
            ]
        },
        image: {
            toolbar: [
                'imageStyle:inline',
                'imageStyle:block',
                'imageStyle:side',
                '|',
                'toggleImageCaption',
                'imageTextAlternative'
            ]
        },
    })

    .then(editor => {
        console.log( 'Editor was initialized', editor );
  //      CKEditorInspector.attach( editor );
    })

    .catch( error => {
    console.error( error.stack );
    });