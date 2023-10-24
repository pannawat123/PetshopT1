@extends('layouts.master') {{-- การสืบทอดโฟลเดอร์ --}}
@section('title') Petshop @stop {{-- หัวข้อ title html --}}
@section('content')

    <div ng-app="app" ng-controller="ctrl">

        <div class="row">
            <div class="col-md-3">
                <h1 style="margin: 0 0 30px 0">สินค้าในร้าน</h1>
            </div>
            <div class="col-md-9">
                <div class="pull-right" style="margin-top:10px">
                    <input type="text" class="form-control" ng-model="query" ng-keyup="searchPet($event)"
                        style="width:190px" placeholder="พิมพ์ชื่อสินค้าเพื่อค้นหา">
                </div>
            </div>
        </div>

         <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item" ng-class="{'active': pettype == null}"
                        ng-click="getPetList(null)">ทั้งหมด</a>
                    <a href="#" class="list-group-item" ng-repeat="c in pettype" ng-click="getPetList(c)"
                        ng-class="{'active': pettype.id == c.id}">@{c.type_pet}</a>
                </div>
            </div> 
        
            <div class="col-md-9">
                <div class="row">
                    <h3 ng-if="!pet.length" style="text-align: center">ไม่พบข้อมูลสินค้า </h3>
                    <div class="col-md-3" ng-repeat="p in pet">
                        <div class="panel panel-default bs-product-card">
                            <img ng-src="@{p.image_url}" class="img-responsive">
                            <div class="panel-body">
                                <h4><a href="#">@{p.petname }</a></h4>

                                <div class="form-group">
                                    <div>คงเหลือ: @{p.gender}</div>
                                    <div>ราคา <strong>@{p.price}</strong> บาท</div>
                                </div>

                                
                                <a href="#" class="btn btn-success btn-block" ng-click="addToCart(p)">
                                    <a href="#" class="btn btn-success btn-block"> @guest 
                                        <i class="fa fa-shopping-cart"></i> หยิบใส่ตะกร้า</a> @else
                                        <a href="#" class="btn btn-success btn-block" ng-click="addToCart(p)">
                                            <i class="fa fa-shopping-cart"></i> หยิบใส่ตะกร้า</a> @endguest

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        var app = angular.module('app', []).config(function($interpolateProvider) {
            $interpolateProvider.startSymbol('@{').endSymbol('}');
        });

        app.service('petService', function($http) {
            this.getPetList = function(pettype_id) {
                if (pettype_id) {
                    return $http.get('/api/pet/' + pettype_id);
                }
                return $http.get('/api/pet');
            };

            this.getPettypeList = function() {
                return $http.get('/api/pettype');
            }

            this.searchPet = function(query) {
                return $http({
                    url: '/api/pet/search',
                    method: 'post',
                    data: {
                        'search_query': query
                    },
                });
            }

        });

        app.controller('ctrl', function($scope, petService) {

            $scope.pet = []; //นศ.ลบข้อมูล mockup ที่ สร้างเป็น array ทิ้งไปก่อน แล้วแทนที่
            $scope.pettype = {};
            $scope.getPetList = function(pettype) {

                $scope.pettype = pettype;
                pettype_id = pettype != null ? pettype.id : '';
                petService.getPetList(pettype_id)
                    .then(function(res) {
                        if (!res.data.ok) return;
                        $scope.pet = res.data.pet; //ชื่อข้อมูล JSON ดูหน้า 1
                    });
            };
            $scope.getPetList(null); //< เรียกใช้ ฟังก์ชัน getProductList()

            $scope.pettype = [];
            $scope.getPettypeList = function() {
                petService.getPettypeList().then(function(res) {
                    if (!res.data.ok) return;
                    $scope.pettype = res.data.pettype;
                });
            };
            $scope.getPettypeList();

            $scope.searchPet = function(e) {
                petService.searchPet($scope.query).then(function(res) {
                    if (!res.data.ok) return;
                    $scope.pet = res.data.pet;
                });
            };

            
            $scope.addToCart = function (p) {
                window.location.href = '/cart/add/' + p.id;
            };
            
        }); 
       
    </script>

@endsection {{-- ปิด title html --}}















