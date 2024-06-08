<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{env('APP_NAME')}}</title>
</head>
<body>
   <main class="d-flex flex-column min-vh-100">
        <div class="sticky-top">
            <x-navbar />
        </div>
  
    <!-- Slot -->
        <div class="container">
            {{$slot}}
        </div>
    
        <div class="mt-auto">
            <x-footer />
        </div>
    </main>
 
</body>
</html>