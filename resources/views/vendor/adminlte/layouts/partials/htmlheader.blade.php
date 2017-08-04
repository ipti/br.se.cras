<head>
    <meta charset="UTF-8">
    <title> CRAS </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ url('/js/sweetalert.min.js') }}" type="text/javascript"></script>

    <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />

  <link href="{{ asset('/plugins/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />


    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />

    <script>
        window.trans = @php
            $lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
            $trans = [];
            foreach ($lang_files as $f) {
                $filename = pathinfo($f)['filename'];
                $trans[$filename] = trans($filename);
            }
            $trans['adminlte_lang_message'] = trans('adminlte_lang::message');
            echo json_encode($trans);
        @endphp
    </script>
</head>
