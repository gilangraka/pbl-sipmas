@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column gap-5">
        <div class="row pt-5 mb-3">
            <div class="m-0 p-0 row col d-flex align-items-center justify-content-between">
                <h3>Daftar Usulan</h3>
                <p class="mb-0">Home / Daftar Usulan</p>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col-12 col-md-4 card card-outline">
                <div class="card-header">
                    <h5 class="m-0 text-bold">Tahun Pelaksanaan</h5>
                </div>
                <div class="card-body">
                    <select class="form-control" id="tahunSelect">
                        <option>2024</option>
                        <option>2023</option>
                        <option>2022</option>
                        <option>2021</option>
                        <option>2020</option>
                    </select>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-12 col-md-7 card card-outline">
                <div class="card-header">
                    <h5 class="m-0 text-bold">Usulan Skema Baru</h5>
                </div>
                <div class="card-body d-flex flex-row flex-wrap" style="gap: 10px;">
                    @foreach (json_decode(MenuHelper::getUsulanSkema()) as $item)
                        <button type="button"
                            class="col-sm-12 col-md btn btn-{{ $item->skema_color }} d-flex flex-column align-items-center"
                            data-toggle="modal" data-target="#Modal{{ $item->skema_id }}">
                            <i class="fas fa-{{ $item->skema_icon }}"></i>
                            <span>{{ $item->skema_nama }}</span>
                        </button>

                        <div class="modal fade" id="Modal{{ $item->skema_id }}" tabindex="-1"
                            aria-labelledby="{{ $item->skema_id }}ModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ $item->skema_nama }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body d-flex flex-column" style="gap: 10px">
                                        @foreach ($item->trx_skema as $skema)
                                            <button class="btn btn-info">{{ $skema[0] }}</button>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 card card-outline">
                <div class="card-body" style="overflow: auto">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Skema</th>
                                <th scope="col">Anggota</th>
                                <th scope="col">Pendanaan</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center" style="background-color: #F6F6F6">
                                <td colspan="100%">Belum ada usulan yang dibuat.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection