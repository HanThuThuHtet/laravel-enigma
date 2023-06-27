<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Enigma</title>
    <link href="./img/e.png" rel="icon" type="image/png"  />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
  </head>

  <body id="home">

    <x-navbar/>
    {{$slot}}
    <x-footer />

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    {{-- CKeditor --}}
        <script src="/ckeditor/ckeditor.js"></script>
	        <script>
                ClassicEditor.create( document.querySelector( '.editor' ), {
					licenseKey: '',
				} )
				.then( editor => {
					window.editor = editor;
				} )
				.catch( error => {
					console.error( 'Oops, something went wrong!' );
					console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
					console.warn( 'Build id: eucamibllt8y-vgerpv3c2fqz' );
					console.error( error );
				} );
		    </script>

  </body>
</html>
