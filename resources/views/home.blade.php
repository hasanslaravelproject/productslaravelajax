@extends('layouts.app')

@section('content')
 <!--====== AJAX ======-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <hr>

                    <select class="form-control form-control-lg mb-5" id="category">
                        <option>Select category</option>
                        @foreach ( App\Models\Category::all() as $category)
                        <option value="{{  $category->id }}">{{ $category->name }} </option>
                        @endforeach
                    </select>

                    <select class="form-control form-control-lg mb-5" id="sub_category">
                        {{-- Assign by ajax --}}
                    </select>

                    <div class="row" id="products">
                    {{-- Assign by ajax --}}
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<script>
   
    $(document).ready(function() {

        $("#category").change(function() {
            $.ajax({
                type: 'GET',
                url: "{{ route('getSubCategoryByCategory') }}",
                data: {
                    category_id: $("#category").val(),
                },
                //for select2 option append
                success: function(response) {
                   // console.log(response);
                     var new_options = `<option value="" disabled selected> Select your sub category </option>`;
                    response.forEach(function(sub_category) {
                        new_options += '<option value="' + sub_category.id + '">' + sub_category.name + '</option>';
                    })
                    
                    $("#sub_category").html(new_options)
                }
            });
        });
        
        $("#sub_category").change(function() {
            $.ajax({
                type: 'GET',
                url: "{{ route('getproductBySubCategory') }}",
                data: {
                    sub_category_id: $("#sub_category").val(),
                },
                //for select2 option append
                success: function(response) {
                    //console.log(response);
                     var new_product_cards = '';
                    response.forEach(function(sub_category) {
                        new_product_cards += `<div class="card m-2" style="width: 18rem;">
                                        <img class="card-img-top" src="`+sub_category.image+`" alt="">
                                        <div class="card-body">
                                            <p class="card-text">`+sub_category.name+`</p>
                                        </div>
                                        </div>
                                        `;
                    })
                    
                    $("#products").html(new_product_cards)
                }
            });
        });

    });

</script>


@endsection