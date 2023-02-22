<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('../resources/css/app.css')
</head>
<body>

<section class="text-gray-600 body-font overflow-hidden">

    @foreach($tasks as $task)

    @auth


{{auth()->user()->name}}
{{auth()->user()->role}}
<form class="inline" method="POST" action="/logout">
    @csrf
    <button type="submit">
      <i class="fa-solid fa-door-closed"></i> Logout
    </button>
  </form>
  @endauth
    <div class="container px-5 py-24 mx-auto">
      <div class="-my-8 divide-y-2 divide-gray-100">
        <div class="py-8 flex flex-wrap md:flex-nowrap">
          <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
            <span class="font-semibold title-font text-gray-700">Date</span>
            <span class="mt-1 text-gray-500 text-sm">{{$task->date}}</span>
          </div>
          <div class="md:flex-grow">
            <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{$task->name}}</h2>
            <p class="leading-relaxed">{{$task->description}}</p>
            <a class="text-green-500 inline-flex items-center mt-4">Learn More
              <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>

      </div>
    </div>
    @endforeach
  </section>
</body>
</html>
