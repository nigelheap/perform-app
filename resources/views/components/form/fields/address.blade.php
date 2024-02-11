
@include('fields.text', [
    'name' => (isset($address_id) ? 'addresses['.$address_id.'][name]' : 'name'),
    'label' => 'Address Name'  . (!empty($required) ? ' *' : ''),
    'help' => 'Example: Head Office'
])

<div class="col-md-12">
    <div class="row">
        @include('fields.text', [
            'name' => (isset($address_id) ? 'addresses['.$address_id.'][address_1]' : 'address_1'),
            'label' => 'Address 1'  . (!empty($required) ? ' *' : '')
        ])

        @include('fields.text', [
            'name' => (isset($address_id) ? 'addresses['.$address_id.'][address_2]' : 'address_2'),
            'label' => 'Address 2'
        ])

        @include('fields.text', [
            'name' => (isset($address_id) ? 'addresses['.$address_id.'][city]' : 'city'),
            'label' => 'City'  . (!empty($required) ? ' *' : ''),
            'size' => 4,
        ])

        @include('fields.text', [
            'name' => (isset($address_id) ? 'addresses['.$address_id.'][state]' : 'state'),
            'label' => 'State'  . (!empty($required) ? ' *' : ''),
            'size' => 4,
        ])

        @include('fields.text', [
            'name' => (isset($address_id) ? 'addresses['.$address_id.'][postcode]' : 'postcode'),
            'label' => 'Postcode'  . (!empty($required) ? ' *' : ''),
            'size' => 4,
        ])

        @include('fields.select', [
           'name' => (isset($address_id) ? 'addresses['.$address_id.'][country_id]' : 'country_id'),
           'label' => 'Country'  . (!empty($required) ? ' *' : ''),
           'items' => $countries,
           'size' => 12,
           'selected' => $default_country->id,
           'placeholder' => '-- Select Country --'
        ])
    </div>
</div>

