@extends('global')
@section('title')CamCam | Order Now @endsection
@section('content')
</div>
<div class="spacefromhead"></div>
<div class="container">
    <div class="row">
        <!--Input data pembeli-->
        <div class="col-sm-8 p-2">
            <div class="card w-100 pb-4">
                <div class="card-header">
                    <h5>Detail Pembeli</h5>
                </div>
                <div class="card-body">
                    <div class="form-without-login">
                        <form id="form-bayar" action="" class="form-group">
                            <label class="mt-2" for="Nama">Nama</label>
                            <input type="text" class="form-control" id="Nama" value="John Doe" disabled>
                            <label class="mt-2" for="email">Email</label>
                            <input type="text" class="form-control" id="email" value="johndoe@mail.com" disabled>
                            <label class="mt-2" for="noTelp">No Telpon</label>
                            <input type="text" class="form-control" id="noTelp" value="085274119633" disabled>
                            <label class="mt-2" for="alamat">Alamat</label>
                            <textarea id="alamat" class="form-control" rows="5" disabled>Jln Sukabirus, Dayeuhkolot, Bandung, Jawa Barat</textarea>
                            <a href="#" class="btn btn-primary btn-md mt-4" id="btn-edit-address"><i
                                        class="fas fa-pencil-alt"></i>
                                Rubah Alamat </a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card w-100 pb-4">
                <div class="card-header">
                    <h5>Detail Belanja</h5>
                </div>
                <div class="card-body">
                    <div class="row" id="item">
                        <div v-for="data of item" v-if="data.title == 'A7r III Body Only'">
                            <div class="row">
                                <div class="col-4 image-item">
                                    <img class="img-thumbnail" style="width: 100%;" :src="'img/Camera/'+ data.image"
                                         :alt="data.brand +' '+ data.title ">
                                </div>
                                <div class="col-8">
                                    <h3>{{data.brand +' '+ data.title }}</h3>
                                    <h5>{{data.category}}</h5>
                                    <h5><strong>Rp. {{data.price}},00</strong></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--Ringkasan belanja-->
        <div class="col-sm-4 p-2 ">
            <div class="card total-pembayaran sticky ">
                <div class="card-header">
                    <h5>Ringkasan Belanja</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6"><strong>TOTAL</strong></div>
                        <div class="col-sm-6 text-right"><strong>Rp.27325182</strong></div>
                    </div>
                    <hr>
                    <input type="submit" class="btn btn-success w-100" value="Bayar" form="form-bayar"
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script-bawah')
    <script>
        $(document).ready(function () {

            $("#btn-edit-address").click(function(){
                $("#alamat").removeAttr("disabled");
                $(this).fadeOut();
            });

        });
    </script>
@endsection