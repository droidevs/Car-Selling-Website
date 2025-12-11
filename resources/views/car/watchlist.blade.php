@props(['cars'])
<x-app-layout>
    <main>
      <!-- New Cars -->
      <section>
        <div class="container">
            <div class="flex justify-between item-center">
                <h2>My Favourite Cars</h2>
                @if ($cars->total() > 0)
                    <div class="watchlist-count">
                        You have {{ $cars->total() }} {{ Str::plural('car', $cars->total()) }} in your watchlist.
                        <br>
                        Showing {{ $cars->firstItem() }} to {{ $cars->total() }} results.
                    </div>
                @else
                    <div class="watchlist-count">
                        Your watchlist is empty.
                    </div>
                @endif
            </div>
          <div class="car-items-listing">
            @foreach ($cars as $car)
                <x-car-item :$car :isInWatchlist="true" />
            @endforeach
          </div>

          {{ $cars->onEachSide(1)->links() }}
        </div>
      </section>
      <!--/ New Cars -->
    </main>
</x-app-layout>
