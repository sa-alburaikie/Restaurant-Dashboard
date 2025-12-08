<!-- ***** Menu Area Starts ***** -->
<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of cakes with quality taste</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">

                @foreach ($food as $food)
                    <form action="{{ url('add-to-cart',$food -> id) }}" method="POST">
                        @csrf
                        <div class="item">
                            <div style="background-image: url('/foodimage/{{ $food->image }}')" class='card'>
                                <div class="price">
                                    <h6>{{ $food->price }}</h6>
                                </div>
                                <div class='info'>
                                    <h1 class='title'>{{$food->title}}</h1>
                                    <p class='description'>{{ $food->description }}</p>
                                    <div class="main-text-button">
                                        <div class="scroll-to-section"><a href="#reservation">Make Reservation <i
                                                    class="fa fa-angle-down"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div style="margin: 0 auto;width:50%;">
                                    <input type="number" name="quantity" min="1" id="" value="1" class="form-control"
                                        style="border-radius:30px;margin:5px 0;">
                                    <input type="submit" class="form-control"
                                        style="background-color: #0f0d0dff;padding:3px 30px;color:white;border-radius:10px;"
                                        value="add to cart">
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- ***** Menu Area Ends ***** -->