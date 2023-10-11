<div class="auth-card">
    <div class="row">
        <div class="col-xl-6 col-lg-7 col-md-8 mx-auto">
            <br />
            <div class="rounded shadow-sm border my-5">
                @isset($logo)
                    <div class="logo text-center py-4 bg-light border-bottom"> {{ $logo }} </div>
                @endisset
                <div class="p-md-5 p-sm-4 p-3 bg-white">
                    {{ $slot }}
                </div>
            </div>
            <br />
        </div>
    </div>
</div>
