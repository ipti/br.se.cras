@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <form method="GET">
        <div class="container-fluid">
            <div class="box box-info" style="padding-left: 20px; padding-right: 20px;">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                        <div class="col-md-6">
                            <h3 class="box-title"> Relatório</h3>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12 form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                Data Inicial
                            </div>
                            <input
                                type="text"
                                value="{{ $data_inicial }}"
                                name="data_inicial"
                                class="form-control date-mask"
                                placeholder="00/00/0000"
                                required
                            />
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                Data Final
                            </div>
                            <input
                                type="text"
                                value="{{ $data_final }}"
                                name="data_final"
                                class="form-control date-mask"
                                placeholder="00/00/0000"
                                required
                            />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <button type="submit" class="form-control btn btn-primary">
                            Consultar
                        </button>
                    </div>
                </div>
                @if (count($atendimentos) > 0)
                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Encaminhamento</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($atendimentos as $atendimento)
                                        <tr>
                                            <td>{{ $atendimento->encaminhamento }}</td>
                                            <td>{{ $atendimento->total }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </form>
@endsection

@section('page-script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.date-mask').mask('00/00/0000');
        });
    </script>
@endsection

