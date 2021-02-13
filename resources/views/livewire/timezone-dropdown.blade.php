<div>
    <section>
        <input
            name="person-timezone"
            type="text"
            autocomplete="off"
            required
            value="{{ $timezone }}"
            wire:model="timezone"
            class="m-2 p-2 form-input w-3/4"
            id="searchbox"
            placeholder="Timezone"
        />

        @if(!empty($typeahead) && $typeahead[0] !== $timezone)
            <ul class="ml-4 w-3/4 border border-gray-200 rounded">
                @foreach($typeahead as $key => $something)
                    <li class="p-2 cursor-pointer"
                        wire:click="$emitSelf('typeaheadClicked', '{{ $something }}')">

                        {!! preg_replace('@' . $timezone . '@', '<b>' . $timezone . '</b>' , $something) !!}

                    </li>
                @endforeach
            </ul>
        @endif
    </section>

    <script>
        let index = 0;
        let items = document.getElementsByTagName('li');
        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('message.processed', () => {
                index = 0;
                items = document.getElementsByTagName('li');
                if (items.length > 0) {
                    items[index].classList.toggle('bg-blue-300');
                }
            });
        });

        document.getElementById('searchbox').addEventListener('keydown', function (e) {
            if (e.keyCode === 13 && items.length > 0) {
                console.log('enter');
                e.preventDefault();
                items[index].click();
            }

            if (e.keyCode == 38) {
                e.preventDefault();
                items[index].classList.toggle('bg-blue-300');
                index--;
                if (index < 0) {
                    index = 0;
                }
                items[index].classList.toggle('bg-blue-300');
            }

            if (e.keyCode == 40) {
                e.preventDefault();
                items[index].classList.toggle('bg-blue-300');
                index++;
                if (index > (items.length - 1)) {
                    index = items.length - 1;
                }
                items[index].classList.toggle('bg-blue-300');
            }
        });

    </script>

</div>
