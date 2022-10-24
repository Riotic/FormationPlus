<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>
        @include('link')
    </head>
        <body>
                <div class="flexVertical">
                    @include('layouts.header')
                    <div class="flex flx8 flx-grow2 flexVertical">
                        @yield('main')
                    </div>
                    @include('layouts.footer')
                </div>
        </body>
</html>
