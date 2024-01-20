<div class="characters">
    <div class="back-to-frontpage"> 
        <a href="{{ url('/') }}">
            <img src="{{ URL::to('/') }}/images/icons8-arrow-50.png" alt="">
        </a>
    </div>
    <div class="header">
        <h1>Characters</h1>
        <input wire:model="query" wire:input="search" type="text" placeholder="Search for characters...">
    </div>
    <div class="results">
        @if(!empty($results))
            @foreach($results as $result)
            <div class="character">
                    <div class="info">
                        <h2 class="name">{{ $result['name'] }}</h2>
                        @foreach($npcs as $npc)
                            @if($npc['key'] == $result['name'])
                                <img src="{{ URL::to('/') }}/images/head-portraits/{{ $result['name'] }}/T_Relationship{{ $result['name'] }}.webp" alt="">
                                <h4>Description</h4>
                                <p>{{ $npc['description'] }}</p>
                                @if(isset($npc['birthday']))
                                <?php
                                    $birthday = $npc['birthday'];
                                    $formatted_birthday = $birthday['day'] . ' ' . $birthday['season']; ?>
                                    <div class="birthdayTitle">
                                        <h4>Birthday</h4>
                                        <img src="{{ URL::to('/') }}/images/T_Icon_Birthday.png" alt="">
                                    </div>
                                    <p class="birthday">{{ $formatted_birthday }}</p>
                                @endif
                            @endif
                        @endforeach
                    </div>
                    <div class="preferences">
                        <?php
                            $hasPreferences = false;
                            foreach ($result['preferences'] as $preference) {
                                if (!empty($preference)) {
                                    $hasPreferences = true;
                                    break;
                                }
                            }
                        ?>
                        @if($hasPreferences)
                            <h3>Gifting</h3>
                            @foreach($result['preferences'] as $title => $preference)
                                <?php $remove = "Preferences";
                                $parts = explode($remove, $title);
                                ?>
                                @if (!empty($preference))
                                <div class="preference">
                                    <div class="title">
                                        <h4>{{ ucfirst($parts[0]) }} preferences</h4>
                                        <img class="item-icon" src="{{ URL::to('/') }}/images/preferences/T_Icon_{{ $parts[0] }}.png" alt="">
                                    </div>
                                    <div class="preference-items">
                                    @foreach($preference as $item)
                                        @if (isset($item['item']))
                                            <div class="single">
                                                <img class="item-icon" src="{{ URL::to('/') }}/images/icons/{{ $item['item']['iconName'] }}.webp" alt="">
                                                <p>{{ $item['item']['displayName'] }}</p>
                                            </div>
                                        @elseif (isset($item['categoryName']))
                                            <p class="category">All {{ strtolower($item['categoryName']) }}</p>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="noResults">
                <p>Sorry! No results found ｡°(°.◜ᯅ◝°)°｡</p>
                <div class="images">
                    <img src="{{ URL::to('/') }}/images/characters-no-results/Surya_Concerned_Spring.webp" alt="">
                    <img src="{{ URL::to('/') }}/images/characters-no-results/Millie_Sad_Spring.webp" alt="">
                    <img src="{{ URL::to('/') }}/images/characters-no-results/Macy_Sad_Spring.webp" alt="">
                    <img src="{{ URL::to('/') }}/images/characters-no-results/Eva_Sad_Spring.webp" alt="">
                    <img src="{{ URL::to('/') }}/images/characters-no-results/Sunny_Sad_Spring.webp" alt="">
                    <img src="{{ URL::to('/') }}/images/characters-no-results/Betty_Sad_Spring.webp" alt="">
                    <img src="{{ URL::to('/') }}/images/characters-no-results/Connor_Surprised_Spring.webp" alt="">
                    <img src="{{ URL::to('/') }}/images/characters-no-results/Yuri_Sad_Spring.webp" alt="">
                </div>
            </div>
        @endif
    </div>
</div>
