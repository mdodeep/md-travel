<div class="col-md-4">
                                <div class="card-box">
                                    <i class="fa fa-info-circle text-muted float-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Jumlah Total Transaksi Lunas"></i>
                                    <h6 class="mt-0 text-dark">Total Pemasukan</h6>
                                    <?php 
                                    $total = 0;
                                    while ($datainvoice = mysqli_fetch_array($invoice)){
                                        if ($datainvoice['status'] == "Lunas"){
                                            $total += $datainvoice['tagihan'];
                                        }
                                    } ?>
                                    <h2 class="text-primary text-center mt-4 mb-4">Rp <span><?php echo number_format($total,0,',','.');?></span></h2>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card-box">
                                    <i class="fa fa-info-circle text-muted float-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Total Jumlah User"></i>
                                    <h6 class="mt-0 text-dark">Total User Terdaftar</h6>
                                    <?php $totaluser = mysqli_num_rows($invoice); ?>
                                    <h2 class="text-pink text-center mt-4 mb-4"><span><?php echo $totaluser; ?></span></h2>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card-box">
                                    <i class="fa fa-info-circle text-muted float-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Jumlah Penjualan Tiket"></i>
                                    <h6 class="mt-0 text-dark">Total Tiket Terjual</h6>
                                    <?php $totaltiket = mysqli_num_rows($tiket); ?>
                                    <h2 class="text-success text-center mt-4 mb-4"><span><?php echo $totaltiket; ?></span></h2>
                                </div>
                            </div>

                        </div>
                        <!-- end -->

                        <div class="text-center h1">
                            Selamat Datang <?php echo $userdata['nama_lengkap']; ?>
                        </div>