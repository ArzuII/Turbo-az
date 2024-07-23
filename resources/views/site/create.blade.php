@extends('site.core.layout')

@section('content')
<main>
    <section class="headerBottom p-4">
      <div class="header d-flex justify-content-between">
        <span class="fw-bold">ELAN YERLƏŞDİRMƏK</span>
      </div>
    </section>
    <section class="p-4">
      <div>
        <ul>
          <li>
            Üç ay ərzində bir nəqliyyat vasitəsi yalnız bir dəfə pulsuz dərc
            oluna bilər.
          </li>
          <li>
            Üç ay ərzində təkrar və ya oxşar elanlar (marka/model, rəng)
            ödənişlidir.
          </li>
          <li>
            Elanınızı saytın ön sıralarında görmək üçün "İrəli çək"
            xidmətindən istifadə edin.
          </li>
        </ul>
      </div>
      <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="car_id">Maşınlar</label>
              <select name="car_id" id="car_id" class="form-control">
                <option value="">Seçin</option>
                @foreach($cars as $car)
                    <option value="{{ $car->id}}">{{ $car->name}}</option>                  
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="fuel_type_id">Yanacaq növü</label>
              <select name="fuel_type_id" id="fuel_type_id" class="form-control">
                <option value="">Seçin</option>
                @foreach($fuels as $fuel)
                    <option value="{{ $fuel->id}}">{{ $fuel->name}}</option>                  
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="model_id">Model</label>
              <select name="model_id" id="model_id" class="form-control">
                <option value="">Seçin</option>
                {{-- @foreach($fuels as $fuel)
                    <option value="{{ $fuel->id}}">{{ $fuel->name}}</option>                  
                @endforeach --}}
              </select>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="gear_id">Ötürücü</label>
              <select name="gear_id" id="gear_id" class="form-control">
                <option value="">Seçin</option>
                @foreach($gears as $gear)
                    <option value="{{ $gear->id}}">{{ $gear->name}}</option>                  
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="ban_id">Ban növü</label>
              <select name="ban_id" id="ban_id" class="form-control">
                <option value="">Seçin</option>
                @foreach($bans as $ban)
                    <option value="{{ $ban->id}}">{{ $ban->name}}</option>                  
                @endforeach
              </select>
            </div>
          </div>

          
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="color_id">Rəng</label>
              <select name="color_id" id="color_id" class="form-control">
                <option value="">Seçin</option>
                @foreach($colors as $color)
                    <option value="{{ $color->id}}">{{ $color->name}}</option>                  
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="year">İl</label>
              <select name="year" id="ban_id" class="form-control">
                <option value="">Seçin</option>
                @for($i = date('Y'); $i > 1904; $i--) 
                    <option value="{{ $i }}">{{ $i }}</option>                   
                @endfor
              </select>
            </div>
          </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="price">Qiymət</label>
                      <input type="number" name="price" id="price" class="form-control">
                  </div>

                  <div class="form-group">
                      <label for="currency_id">Valyuta</label>
                      <select name="currency_id" id="currency_id" class="form-control">
                          <option value="">Seçin</option>
                          @foreach($currencies as $currency)
                          <option value="{{ $currency->id }}">{{ $currency->name }}</option>    
                          @endforeach
                      </select>
                  </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
              <div class="form-group">
                  <label for="distance">Sürüş məsafəsi(km)</label>
                  <input type="number" name="distance" id="distance" class="form-control">
              </div>
            </div>

            <div class="col-12 col-md-6">
              <div class="form-group">
                  <label for="vin_code">Vin kod</label>
                  <input type="text" name="vin_code" id="vin_code" class="form-control">
              </div>
            </div>

        </div>



          <div class="col-12">
            <div class="form-group">
              <label for="body">Haqqında</label>
              <textarea name="body" id="body" cols="30" rows="5" class="form-control"></textarea>
            </div>
          </div>

        </div>
   

        <div class="autoSupply mt-5">
          <div class="autoSupplyName">Avtomobilin təchizatı</div>
          <div class="row autoSupplyBlock">
            @foreach($supplies as $supply)
            <div class="col-12 col-md-3">
              <div class="form-check">
                <input type="checkbox" name="supply_ids[]" id="{{ $supply->id }}" class="form-check-input" value="{{ $supply->id }}" >
                <label for="{{ $supply->id }}">{{ $supply->name }}</label>
              </div>
            </div> 
            @endforeach


            <div class="col-12 col-md-3">
              <div class="form-group">
                <input type="checkbox" name="autosupply" class="form-control" id="" value="" />
                <label for="">Yüngül lehimli disklər</label>
              </div>
            </div>
          </div>
            
        </div>

        <div class="col-12">
          <div class="photos">
            <div class="form-group">
              <label for="photos"><h5>Avtomobilin şəkilləri</h5></label>
              <input type="file" name="photos[]" class="form-control" multiple>
            </div>
          </div>
        </div>


        <div class="contactInfo">
          <div class="contactInfoName">Əlaqə</div>
          <p>
            Elan dərc olunduqdan sonra əlaqə məlumatları ilə bağlı heç bir
            dəyişiklik həyata keçirilmir.
          </p>
          <div class="contactInfoBlock">     

            <div class="contactInfoDesign">
              <label for="city_id">Şəhər </label>
              <select name="city_id" id="city_id" class="form-control">
                <option value="">Seçin</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id}}">{{ $city->name}}</option>                  
                @endforeach
              </select>
            </div>

            <div class="addAutoSubButtonBlock">
              <button type="submit" class="addAutoSubButton">
                Davam et
              </button>
            </div>
          </div>
        </div>
      </form>
    </section>
  </main>

  <script>
    $(document).on('change', '#car_id', function(e){
      let car_id = e.target.value;

      $.ajax({
        url: "/api/car-models/" + car_id,
        type: 'GET',
        dataType: 'json',
        success: function(response){
          $.each(response, function(key, value)
          {
            console.log(value)
            $("#model_id").append('<option value=' + value['id'] + '>' + value['name'] + '</option>');
          });
        }
      });
    });
  
  </script>
@endsection