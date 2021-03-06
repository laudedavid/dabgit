@extends('layout')

@section('content')

<div class="bar">
    <div class="filter">
        <span class="filter__label">Filter: </span>
        <button class="action filter__item filter__item--selected" data-filter="*">All</button>
        <button class="action filter__item" data-filter=".jackets">
            <i class="icon icon--jacket"></i>
            <span class="action__text">Jackets</span>
        </button>
        <button class="action filter__item" data-filter=".shirts">
        	<i class="icon icon--shirt"></i>
        	<span class="action__text">Shirts</span>
        </button>
        <button class="action filter__item" data-filter=".dresses">
        	<i class="icon icon--dress"></i>
        	<span class="action__text">Dresses</span>
        </button>
        <button class="action filter__item" data-filter=".trousers">
        	<i class="icon icon--trousers"></i>
        	<span class="action__text">Trousers</span>
        </button>
        <button class="action filter__item" data-filter=".shoes">
        	<i class="icon icon--shoe"></i>
        	<span class="action__text">Shoes</span>
        </button>
    </div>
    <button class="cart">
        <i class="cart__icon fa fa-shopping-cart"></i>
        <span class="text-hidden">Shopping cart</span>
        <span class="cart__count">0</span>
    </button>
</div>
<!-- Main view -->
<div class="view">
    <!-- Grid -->
    <section class="grid">
	<!-- Loader -->
	<img class="grid__loader" src="images/grid.svg" width="60" alt="Loader image" />
        <!-- Grid sizer for a fluid Isotope (Masonry) layout -->
        <div class="grid__sizer"></div>
        <!-- Grid items -->
        <div class="grid__item shirts">
            <div class="slider">
                <div class="slider__item"><img src="images/product1/1.png" alt="product1_1" /></div>
                <div class="slider__item"><img src="images/product1/2.png" alt="product1_2" /></div>
                <div class="slider__item"><img src="images/product1/3.png" alt="product1_3" /></div>
            </div>
            <div class="meta">
                <h3 class="meta__title">Miriam Classic</h3>
                <span class="meta__brand">Miriam</span>
                <span class="meta__price">$79</span>
            </div>
            <button class="action action--button action--buy">
                <i class="fa fa-shopping-cart"></i>
                <span class="text-hidden">Add to cart</span>
            </button>
        </div>
        <div class="grid__item grid__item--size-a jackets">
            <!-- ... -->
        </div>
        <div class="grid__item shoes">
            <!-- ... -->
        </div>
        <div class="grid__item dresses">
            <!-- ... -->
        </div>
        <div class="grid__item trousers">
            <!-- ... -->
        </div>
    </section>
    <!-- /grid-->
</div>
<!-- /view -->
<script src="FilterableProductGrid/js/isotope.pkgd.min.js"></script>
<script src="FilterableProductGrid/js/flickity.pkgd.min.js"></script>
<script src="FilterableProductGrid/js/main.js"></script>