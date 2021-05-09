@extends('templete.templateadmin')

@section('title', 'Base page')
<title>Clinic</title>

@section('content')
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <div class="container mt-2">
        <div class="card text-info bg-warning mb-3" style="max-width: 80rem;">
            <div class="card-header bg-white">
                <h5>ติดต่อเรา</h5>
            </div>
            <div class="card-body">

                <div class="card mb-3" style="max-width: 1000px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ asset('img/line2.jpg') }}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">คลินิกโรคผิวหนัง แพทย์หญิง ปิยะรัตน์</h5>
                                <p class="card-text">ที่อยู่ : ตำบล ในเมือง อำเภอเมืองอุบลราชธานี อุบลราชธานี 34000</p>
                                <p class="card-text">โทร : 0655639744 (เฉพาะเวลาทำการ)</p>
                                <p class="card-text">ไลน์ : คลินิกโรคผิวหนัง พญ.ปิยะรัตน์</p>
                                <p class="card-text">Line : 0655639744s </p>
                                <p class="card-text">facebook : คลินิกโรคผิวหนัง พญ.ปิยะรัตน์</p>
                                <p class="card-text">Email : piyaratskinclinic@gmail.com</p>
                                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                            </div>
                        </div>
                    </div>


                    <div class="card mb-3" style="max-width: 1000px;">
                        <div class="row no-gutters">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a href="https://www.facebook.com/%E0%B8%84%E0%B8%A5%E0%B8%B4%E0%B8%99%E0%B8%B4%E0%B8%81%E0%B9%82%E0%B8%A3%E0%B8%84%E0%B8%9C%E0%B8%B4%E0%B8%A7%E0%B8%AB%E0%B8%99%E0%B8%B1%E0%B8%87-%E0%B8%9E%E0%B8%8D%E0%B8%9B%E0%B8%B4%E0%B8%A2%E0%B8%B0%E0%B8%A3%E0%B8%B1%E0%B8%95%E0%B8%99%E0%B9%8C-Piyarat-Skin-Clinic-2009492859162305/"
                                        class="fab fa-facebook btn-primary btn-lg disabled" role="button"
                                        aria-disabled="true">Facebook</a>
                                    <a href="https://accounts.google.com/signin/v2/identifier?hl=th&&flowName=GlifWebSignIn&flowEntry=ServiceLogin"
                                        class="fas fa-envelope btn-danger btn-lg disabled" role="button"
                                        aria-disabled="true">Email</a>
                                    <a href="#" class="fab fa-line btn-success btn-lg disabled" role="button"
                                        aria-disabled="true">Line</a>
                                    <a href="{{ route('location') }}"
                                        class="fas fa-map-marker-alt btn-danger btn-lg disabled" role="button"
                                        aria-disabled="true">Google Map</a>
                                    <br><br>
                                    <img src="{{ asset('img/38832.jpg') }}" class="card-img" alt="...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('img/line3.jpg') }}" class="card-img" alt="..." height="330"
                                    width="320">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    @endsection
</div>
