@foreach($properties as $property)
    <div class="property-card">
        <p>ID: {{ $property->id }}</p>
        <p>{{ $property->district_id }}</p>
        <p>{{ $property->property_type }}</p>
        <p>Room type: {{ $property->room_type }}</p>
        <p>Rental price per month: SGD {{ $property->price_month }}</p>
        <p>Included utilities: SGD {{ $property->utilities }}</p>
        <p>Address: {{ $property->address }}</p>
        <p>Latitude: {{ $property->latitude }}</p>
        <p>Longitude: {{ $property->longitude }}</p>
    </div>
@endforeach