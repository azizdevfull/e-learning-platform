<!-- Testimonial 1 -->
@foreach ($testimonials as $testimonial)
    <div class="bg-gray-50 p-6 rounded-lg shadow-sm testimonial-card">
        <div class="flex items-center mb-4">
            <img src="{{ $testimonial->image ? asset('storage/' . $testimonial->image) : asset('images/default-profile.png') }}"
                alt="Student" class="h-12 w-12 rounded-full mr-4">
            <div>
                <h4 class="font-medium">{{ $testimonial->name }}</h4>
                <p class="text-sm text-gray-500">{{ $testimonial->course }}</p>
            </div>
        </div>
        <p class="text-gray-600 mb-4">"{{ $testimonial->comment }}"</p>
        <div class="flex text-yellow-400">
            @for ($i = 1; $i <= 5; $i++)
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 {{ $i <= $testimonial->rating ? 'fill-current' : 'text-gray-300' }}"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3 .921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784 .57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81 .588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            @endfor
        </div>

    </div>
@endforeach
