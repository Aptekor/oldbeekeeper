

ClassicEditor
    .create( document.querySelector( '#editor' ), {
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



    .then( editor => {
        console.log( 'Editor was initialized', editor );
        //CKEditorInspector.attach( editor );
    })


    .catch( error => {
        console.error( error.stack );
    });
