@extends('site.core.layout')

@section('content')

<section class="filter p-4">
    <form class="row" action="{{ route('index') }}" method="GET">
      <div class="col-12 col-md-3">
        <select name="car" class="form-element">
          <option value="" >Marka</option>
          @foreach($cars as $car)
          <option value="{{ $car->id }}">{{ $car->name }}</option>
            
          @endforeach
        </select>
      </div>
      <div class="col-12 col-md-3">
        <select class="form-element">
          <option value="1">Mercedes</option>
          <option value="2">BWM</option>
        </select>
      </div>
      <div class="col-12 col-md-3">
        <div class="d-flex checkboxes">
          <input type="radio" name="type" value="1" id="all" />
          <label for="all" class="form-element"> Hamsı </label>
          <input type="radio" name="type" value="2" id="new" />
          <label for="new" class="form-element"> Yeni </label>
          <input type="radio" name="type" value="3" id="secondary" />
          <label for="secondary" class="form-element"> Sürülmüş </label>
        </div>
      </div>
      <div class="col-12 col-md-3">
        <select class="form-element">
          <option value="1">Mercedes</option>
          <option value="2">BWM</option>
        </select>
      </div>
      <div class="col-12 col-md-3">
        <div class="filterFlexDes">
          <div class="filterFlexDes50">
            <input
              type="number"
              class="form-element"
              placeholder="Qiymet, min."
            />
          </div>
          <div class="filterFlexDes50">
            <input type="number" class="form-element" placeholder="maks" />
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3">
        <div class="filterFlexDes">
          <div class="filterFlexDes33">
            <select class="form-element">
              <option value="1">AZN</option>
              <option value="2">USD</option>
            </select>
          </div>
          <div class="filterFlexDes33">
            <input
              type="checkbox"
              name="autoloan"
              value="autoloan"
              id="autoloan"
            />
            <label for="autoloan" class="form-element"> Kredit </label>
          </div>
          <div class="filterFlexDes33">
            <input
              type="checkbox"
              name="autobarter"
              value="autobarter"
              id="autobarter"
            />
            <label for="autobarter" class="form-element"> Barter </label>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3">
        <select class="form-element">
          <option value="0">Ban novu</option>
          <option value="1">Mercedes</option>
          <option value="2">BWM</option>
        </select>
      </div>

      <div class="col-12 col-md-3">
        <div class="filterFlexDes">
          <div class="filterFlexDes50">
            <select class="form-element" placeholder="bos">
              <option value="0">Il, min</option>
              <option value="1">Mercedes</option>
              <option value="2">BWM</option>
            </select>
          </div>
          <div class="filterFlexDes50">
            <select class="form-element">
              <option value="0">maks</option>
              <option value="1">Mercedes</option>
              <option value="2">BWM</option>
            </select>
          </div>
        </div>
      </div>

      <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-danger">Axtar</button>
      </div>
    </form>
  </section>
  <main>
    <section class="announcement p-4">
      <div class="header d-flex justify-content-between">
        <span class="fw-bold">PREMİUM ELANLAR</span>
      </div>
      <div class="row mt-4">
        @foreach($advertisements as $advertisement)
                  <div class="col-12 col-md-3">
          <a href="{{ route('show', $advertisement->id) }}" target="_blank" class="card">
            <div class="position-relative">
              <img
                src="https://turbo.azstatic.com/assets/application/sprites/main-81621bca022dacba82baf03eb6a48661caa4cadfcac266156ebeadeb662d1b14.svg#bookmarks--favorite-unselected"
                class="like-icon"
              />
              <span class="robbin">Salon</span>
              <img class="card-img-top" src="{{ $advertisement->photo->photo }}" alt="" />
            </div>
            <div class="card-body">
              <div class="gap-1">
                <span class="price">{{ $advertisement->price }}</span>
                <span class="model">{{ $advertisement->car }}</span>
                <span class="info">{{ $advertisement->year . ' '. $advertisement->distance. ' km' }}</span>
                <span class="location-info"> {{ $advertisement->city . ' '. $advertisement->updated_at }} </span>
              </div>
            </div>
          </a>
        </div>
          
        @endforeach  
      </div>
      {{ $advertisements->links() }}
    </section>
  </main>

@endsection