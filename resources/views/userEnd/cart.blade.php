@extends('userEnd.layouts.master')
@section('content')
<!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Foodie</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
                                    <img class="img-fluid" src="pics/c3img.jpg" alt="" />
                                </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                    Crispy Chicken
                                </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>Rs 450 1kg</p>
                                    </td>
                                    <td class="quantity-box"><input type="number" size="4" value="1" min="0" step="1" class="c-input-text qty text"></td>
                                    <td class="total-pr">
                                        <p>Rs 450</p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="#">
                                    <i class="fas fa-times"></i>
                                </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
                                    <img class="img-fluid" src="pics/applejuice.jpg" alt="" />
                                </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                    Apple Juice
                                </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>Rs 120</p>
                                    </td>
                                    <td class="quantity-box"><input type="number" size="4" value="2" min="0" step="1" class="c-input-text qty text"></td>
                                    <td class="total-pr">
                                        <p>Rs 240</p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="#">
                                    <i class="fas fa-times"></i>
                                </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
                                    <img class="img-fluid" src="pics/chickentika.jpg" alt="" />
                                </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                    Chicken Tikka Boti
                                </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>Rs 650</p>
                                    </td>
                                    <td class="quantity-box"><input type="number" size="4" value="12" min="0" step="1" class="c-input-text qty text"></td>
                                    <td class="total-pr">
                                        <p>Rs 650</p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="#">
                                    <i class="fas fa-times"></i>
                                </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                    <div class="update-box">
                        <input value="Update Cart" type="submit">
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold">Rs 1340</div>
                        </div>
                        <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold">Rs 0</div>
                        </div>
                        <hr class="my-1">
                       
                        <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold">Rs 5 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5">Rs 1345</div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="checkouts" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
@endsection