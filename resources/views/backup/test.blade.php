<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box
        }

        .mySlides {
            display: none
        }

        img {
            vertical-align: middle;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 500px;
            position: relative;
            margin: auto;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a grey background color */
        .prev:hover,
        .next:hover {
            background-color: #f1f1f1;
            color: black;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

    </style>
</head>

<body>
    <form method="post" action="{{ route('images.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="file" name="images[]" multiple class="form-control" accept="image/*">
            @if ($errors->has('images'))
                @foreach ($errors->get('images') as $error)
                    <span>
                        <strong>{{ $error }}</strong>
                    </span>
                @endforeach
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>

    <hr>
    {{-- <img src="{{ asset('storage/'. $restaurant->image) }}"> --}}
    {{-- <img src="{{ asset('storage/1/restaurant_1/1622264489_BG.png') }}"> --}}
    {{-- @for ($i = 0; $i < 3; $i++)
        <div class="slideshow-container" id="test{{ $i }}">
            <div class="mySlides">
                <img src="{{ asset('img/img_band_chicago.jpg') }}" style="width:100%">
                <div class="text">1 / 3</div>
            </div>

            <div class="mySlides">
                <img src="{{ asset('img/img_band_la.jpg') }}" style="width:100%">
                <div class="text">2 / 3</div>
            </div>

            <div class="mySlides">
                <img src="{{ asset('img/img_band_ny.jpg') }}" style="width:100%">
                <div class="text">3 / 3</div>
            </div>

            <a class="prev" onclick="plusSlides(-1, {{ $i }})">&#10094;</a>
            <a class="next" onclick="plusSlides(1, {{ $i }})">&#10095;</a>
        </div><br>
    @endfor --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

    {{-- <script>
        var slideIndex = [];
        @for ($i = 0; $i < 3; $i++)
            slideIndex.push(1);
        @endfor

        @for ($i = 0; $i < 3; $i++)
            showSlides(1, {{ $i }});
        @endfor

        function plusSlides(n, no) {
            showSlides(slideIndex[no] += n, no);
        }

        function showSlides(n, no) {
            var i;
            var x = document.getElementById("test" + no).getElementsByClassName("mySlides");
            if (n > x.length) {
                slideIndex[no] = 1
            }
            if (n < 1) {
                slideIndex[no] = x.length
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex[no] - 1].style.display = "block";
        }

    </script> --}}
</body>

</html>
