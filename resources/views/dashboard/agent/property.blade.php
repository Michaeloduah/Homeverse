@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="#">My Properties</a>
                    </li>
                </ul>
            </div>
        </div>

        Total Number of Properties: {{ $total }}  

        @foreach ($properties as $property)
            <div id="content-wrapper">
            

                <div class="column">
                    <img id=featured src="{{asset('storage/property/'.$property->images[0])}}">
        
                    <div id="slide-wrapper" >
                        <img id="slideLeft" class="arrow" src="{{ asset('assets/images/arrow-left.png') }}">
                        
                        <div id="slider">
                            @foreach ($property->images as $image)
                                <img class="thumbnail" width="10%" src="{{asset('storage/property/'.$image)}}" alt="">
                            @endforeach
                        </div>
        
                        <img id="slideRight" class="arrow" src="{{ asset('assets/images/arrow-right.png') }}">
                    </div>
                </div>
        
                <div class="column">
                    <p class="property-text">Status:{{$property->status}}</p>
                    <h1 class="property-text">{{$property->name}}</h1>
                    <hr>
                    <h3 class="property-text">Price:{{$property->price}}</h3>
                    <h3 class="property-text">Location:{{$property->location}}</h3>
        
                    <p class="property-text">{{$property->description}}</p>
        
                    {{-- <input value=1 type="number"> --}}
                    <div class="edit-property">
                        <a class="btn-info" href="{{ route('dashboard.agent.editproperty', $property->id) }}">Edit</a>
                        <a class="btn-danger" href="{{ route('dashboard.agent.deleteproperty', $property->id) }}">Delete</a>
                    </div>

                </div>
        
            </div>
            <div class="paginator">
                {{ $properties->links() }}
            </div>

            {{-- <br>
            <hr>
            <br> --}}
        @endforeach
    </main>
    <script type="text/javascript">
		let thumbnails = document.getElementsByClassName('thumbnail')

		let activeImages = document.getElementsByClassName('active')

		for (var i=0; i < thumbnails.length; i++){

			thumbnails[i].addEventListener('click', function(){
				console.log(activeImages)
				
				if (activeImages.length > 0){
					activeImages[0].classList.remove('active')
				}
				

				this.classList.add('active')
				document.getElementById('featured').src = this.src
			})
		}


		let buttonRight = document.getElementById('slideRight');
		let buttonLeft = document.getElementById('slideLeft');

		buttonLeft.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft -= 180
		})

		buttonRight.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft += 180
		})


	</script>
@endsection