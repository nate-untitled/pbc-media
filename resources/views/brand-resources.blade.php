@extends('layouts.main')

@section('content')
    <div class="page-width">
        <div class="section-block">
            <h1 class="section-header__title">Brand Resources</h1>
            <p>We take a great deal of pride in our brand and go to great lengths to protect and oversee its usage and stewardship.</p>
            <p>Please take a moment to download and read our PBC Styleguide for detailed guidelines and feel free to download and use the accompanying assets at your discretion. As always, please contact us with any questions or additional branding needs.</p>

            <h3>Notes:</h3>

            <ul>
            <li>
                <p>Preview images do not reflect the actual image size and resolution.</p>
            </li>
            <li>
                <p>Vector and/or high-resolution assets may be available upon request.</p>
            </li>
            </ul>

            <files-container :files='{!! json_encode($files) !!}'></files-container>

            <galleries-container
                :gallery_media='{!! json_encode($gallery_media) !!}'
            ></galleries-container>

        </div>
    </div>
@endsection

