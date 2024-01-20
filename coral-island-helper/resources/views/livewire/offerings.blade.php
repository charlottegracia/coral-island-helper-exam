<section class="offerings">
    <div class="back-to-frontpage">
        <a href="{{ url('/') }}">
            <img src="{{ URL::to('/') }}/images/icons8-arrow-50.png" alt="">
        </a>
    </div>
    <h1>Lake Temple</h1>
    <div class="nav">
        @foreach ($altars as $altar)
        <?php
        $altarKey = $altar['key'];
        ?>
        <button class="nav-btn <?php echo $altarKey ?>" onclick="openTab('<?php echo $altarKey ?>')">{{ $altar['offeringGroupTitle'] }}</button>
        @endforeach
    </div>

    @foreach ($altars as $altar)
    <?php $altarKey = $altar['key']; ?>
    <section class="altar" id="<?php echo $altarKey ?>">
        <h2 class="altar-reward">{{ $altar['offeringGroupTitle'] }} {{ $altar['offeringGroupRewardText'] }}</h2>
        <section class="altar-categories">
            @foreach ($altar['offerings'] as $category)
            <section class="altar-category">
                <img class="category-icon" src="{{ URL::to('/') }}/images/offering/{{ $category['imageName'] }}.png" alt="">
                <h3>{{ $category['title'] }}</h3>
                <section class="category-reward">
                    <p>Reward: {{ $category['rewards']['items'][0]['amount'] }} x {{ $category['rewards']['items'][0]['item']['displayName'] }}</p>
                    <img src="{{ URL::to('/') }}/images/icons/{{ $category['rewards']['items'][0]['item']['iconName'] }}.webp" alt="">
                </section>
                @if($category['numOfItemRequired'] != -1)
                <p>No. of items required: {{ $category['numOfItemRequired'] }}</p>
                @else
                <p>No. of items required: All items</p>
                @endif
                <section class="items">
                    @foreach ($category['requiredItems'] as $item)
                    <div class="item">
                        <input class="item-checkbox" type="checkbox" id=" {{ $item['item']['iconName']}}" name="checkbox">
                        <div class="item-icons">
                            @if($item['quality'] != 'base')
                            <img class="item-quality-icon" src="{{ URL::to('/') }}/images/quality-stars/star-{{ $item['quality'] }}.png" alt="">
                            @endif
                            <img class="item-icon" src="{{ URL::to('/') }}/images/icons/{{ $item['item']['iconName'] }}.webp" alt="">
                        </div>
                        <div class="item-text">
                            <h5>{{ $item['amount']}} {{ $item['item']['displayName']}}</h5>
                            @if($altarKey == 'CatchingBased')
                                <div class="how-to-find">
                                <?php $foundMatch = false; ?>
                                @foreach($fish as $singleFish)
                                    @if ($singleFish['item']['id'] == $item['item']['id'])
                                        @if (!$foundMatch)
                                            <?php $foundMatch = true; ?>
                                            <div>
                                                <p>Location:</p>
                                                <p>
                                                    @foreach($singleFish['spawnLocation'] as $location)
                                                        {{ $location }},
                                                    @endforeach
                                                </p>
                                            </div>
                                            <div>
                                                <p>Weather:</p>
                                                <p>
                                                    @if (in_array(0, $singleFish['spawnWeather']))
                                                        @foreach($singleFish['spawnWeather'] as $condition => $value)
                                                            @if ($value)
                                                                {{ $condition }},
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        Any
                                                    @endif
                                                </p>
                                            </div>
                                            <div>
                                                <p>Season:</p>
                                                <p>
                                                    @if (in_array(0, $singleFish['spawnSeason']))
                                                        @foreach($singleFish['spawnSeason'] as $season => $value)
                                                            @if ($value)
                                                                {{ $season }},
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        Any
                                                    @endif
                                                </p>
                                            </div>
                                            <div>
                                                <p>Time of day:</p>
                                                <p>
                                                    @if (in_array(0, $singleFish['spawnTime']))
                                                        @foreach($singleFish['spawnTime'] as $time => $value)
                                                            @if ($value)
                                                                {{ $time }},
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        Any
                                                    @endif
                                                </p>
                                            </div>
                                        @else
                                            <p>Can also be found in <i>{{$singleFish['spawnLocation'][0]}}</i></p>
                                        @endif
                                    @endif
                                @endforeach
                                @foreach($insects as $insect)
                                    @if ($insect['item']['id'] == $item['item']['id'])
                                        @if (!$foundMatch)
                                        <?php $foundMatch = true; ?>
                                            <div>
                                                <p>Location:</p>
                                                <p>
                                                    @foreach($insect['spawnLocation'] as $location)
                                                        {{ $location }},
                                                    @endforeach
                                                </p>
                                            </div>
                                            <div>
                                                <p>Weather:</p>
                                                <p>
                                                    @if (in_array(0, $insect['spawnWeather']))
                                                        @foreach($insect['spawnWeather'] as $condition => $value)
                                                            @if ($value)
                                                                {{ $condition }},
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        Any
                                                    @endif
                                                </p>
                                            </div>
                                            <div>
                                                <p>Season:</p>
                                                <p>
                                                    @if (in_array(0, $insect['spawnSeason']))
                                                        @foreach($insect['spawnSeason'] as $season => $value)
                                                            @if ($value)
                                                                {{ $season }},
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        Any
                                                    @endif
                                                </p>
                                            </div>
                                            <div>
                                                <p>Time of day:</p>
                                                <p>
                                                    @if (in_array(0, $insect['spawnTime']))
                                                        @foreach($insect['spawnTime'] as $time => $value)
                                                            @if ($value)
                                                                {{ $time }},
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        Any
                                                    @endif
                                                </p>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                                @foreach($critters as $critter)
                                    @if ($critter['item']['id'] == $item['item']['id'])
                                        @if (!$foundMatch)
                                            <?php $foundMatch = true; ?>
                                            <div>
                                                <p>Location:</p>
                                                <p>
                                                    @foreach($critter['spawnLocation'] as $location)
                                                        {{ $location }},
                                                    @endforeach
                                                </p>
                                            </div>
                                            
                                            <div>
                                                <p>Weather:</p>
                                                <p>
                                                @if (in_array(1, $critter['spawnWeather']))
                                                    @foreach($critter['spawnWeather'] as $condition => $value)
                                                        @if ($value)
                                                            {{ $condition }},
                                                        @endif
                                                    @endforeach
                                                @else
                                                    Any
                                                @endif
                                            </p>
                                            </div>
                                            <div>
                                                <p>Season:</p>
                                                <p>
                                                    @if (in_array(0, $critter['spawnSeason']))
                                                        @foreach($critter['spawnSeason'] as $season => $value)
                                                            @if ($value)
                                                                {{ $season }},
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        Any
                                                    @endif
                                                </p>
                                            </div>
                                            <div>
                                                <p>Time of day:</p>
                                                <p>
                                                    @if (in_array(0, $critter['spawnTime']))
                                                        @foreach($critter['spawnTime'] as $time => $value)
                                                            @if ($value)
                                                                {{ $time }},
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        Any
                                                    @endif
                                                </p>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </section>
            </section>
            @endforeach
        </section>
    </section>
    @endforeach
</section>
<script>

    //tabs
    document.querySelector('.nav-btn.CropBased').classList.add('active');

    function openTab(altar) {
        let i;
        let altars = document.getElementsByClassName("altar");
        let nav = document.getElementsByClassName("nav-btn");
        for (i = 0; i < altars.length; i++) {
            altars[i].style.display = "none";
            nav[i].classList.remove('active');
        }

        let element = document.getElementById(altar);
        element.style.display = "block";
        let button = document.querySelector(`.nav-btn.${altar}`);
        button.classList.add('active');
    }



    //saving checkboxes checked in local storage 
    let items = Array.from(document.getElementsByClassName('item-checkbox'));

    function save() {
        items.forEach(item => {
            localStorage.setItem(item.id, item.checked);
        });
    }

    //for loading
    items.forEach(item => {
        if (localStorage.getItem(item.id)) {
            let checked = JSON.parse(localStorage.getItem(item.id));
            document.getElementById(item.id).checked = checked;
        }
    });

    window.addEventListener('change', save);

</script>
