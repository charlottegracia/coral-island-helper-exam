<div class="recipes">
    <div class="back-to-frontpage"> 
        <a href="{{ url('/') }}">
            <img src="{{ URL::to('/') }}/images/icons8-arrow-50.png" alt="">
        </a>
    </div>
    <div class="header">
        <h1>Recipes</h1>
        <div class="actions">
            <input wire:model="query" wire:input="search" type="text" placeholder="Search for recipes...">
            <p>or</p>
            <button wire:click="findRandomRecipe">Find random recipe</button>
        </div>
    </div>

    @if(empty($query) && $randomRecipe)
        <div class="random animate__animated animate__bounceInLeft">
            <div class="recipe">
                <div class="info">
                    <h2>Random recipe: {{ $randomRecipe['item']['displayName'] }}</h2>
                    <img src="{{ URL::to('/') }}/images/icons/{{ $randomRecipe['item']['iconName'] }}.webp" alt="">
                    <h4>Description</h4>
                    <p>{{ $randomRecipe['item']['description'] }}</p>
                    <h4 onclick="toggle(event)" class="accordion"><span>Sell prices</span><span class="arrow">&#8249;</span></h4>
                    <div class="sellPrices">
                        <div class="quality-recipe">
                            <div class="quality-img">
                                <img src="{{ URL::to('/') }}/images/icons/{{ $randomRecipe['item']['iconName'] }}.webp" alt="">
                            </div>
                            <div class="quality-price">
                                <p>sells for {{ $randomRecipe['item']['sellPrice'] }}</p>
                                <img src="{{ URL::to('/') }}/images/icons/T_IconCoin.webp" alt="">
                            </div>
                        </div>
                        @foreach($randomRecipe['item']['qualities'] as $qualityName => $quality)
                        <div class="quality-recipe">
                            <div class="quality-img">
                                <img src="{{ URL::to('/') }}/images/icons/{{ $randomRecipe['item']['iconName'] }}.webp" alt="">
                                <img class="quality" src="{{ URL::to('/') }}/images/quality-stars/star-{{ $qualityName }}.png" alt="">
                            </div>
                            <div class="quality-price">
                                <p>sells for {{ $quality['sellPrice'] }}</p>
                                <img src="{{ URL::to('/') }}/images/icons/T_IconCoin.webp" alt="">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="howTo">
                    <h3>How to make</h3>
                    <div class="utensils">
                        <h4>Utensil</h4>
                        <div class="utensil">
                            <p>Use <i>{{ $randomRecipe['utensils'][0] }}</i></p>
                            <img src="{{ URL::to('/') }}/images/icons/{{ $randomRecipe['utensils'][0] }}.webp" alt="">
                        </div>
                    </div>
                    <div class="ingredients">
                        <h4>Ingredients</h4>
                        @foreach($randomRecipe['genericIngredients'] as $ingredient)
                        <div class="ingredient">
                            <p>{{ $ingredient['amount'] }} x <i>{{ $ingredient['genericItem']['displayName'] }}</i></p>
                            <img src="{{ URL::to('/') }}/images/icons/{{ $ingredient['genericItem']['iconName'] }}.webp" alt="">
                        </div>
                        @endforeach
                        @foreach($randomRecipe['ingredients'] as $ingredient)
                        <div class="ingredient">
                            <p>{{ $ingredient['amount'] }} x <i>{{ $ingredient['item']['displayName'] }}</i></p>
                            <img src="{{ URL::to('/') }}/images/icons/{{ $ingredient['item']['iconName'] }}.webp" alt="">
                        </div>
                        @endforeach
                        @foreach($randomRecipe['eitherOrIngredients'] as $ingredients)
                        <p class="eitherOrIngredient">
                            @foreach($ingredients as $index => $ingredient)
                            <img src="{{ URL::to('/') }}/images/icons/{{ $ingredient['item']['iconName'] }}.webp" alt="">
                            {{ $ingredient['amount'] }} x <i>{{ $ingredient['item']['displayName'] }}</i>
                                @if ($index < count($ingredients) - 1)
                                    or
                                @endif
                            @endforeach
                        </p>
                        @endforeach 
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @endif

    <div class="results">
        @if(!empty($results))
            @foreach($results as $recipe)
            <div class="recipe">
                <div class="info">
                    <!--<pre><?php print_r($recipe) ?></pre>-->
                    <h2>{{ $recipe['item']['displayName'] }}</h2>
                    <img src="{{ URL::to('/') }}/images/icons/{{ $recipe['item']['iconName'] }}.webp" alt="">
                    <h4>Description</h4>
                    <p>{{ $recipe['item']['description'] }}</p>
                    <h4 onclick="toggle(event)" class="accordion"><span>Sell prices</span><span class="arrow">&#8249;</span></h4>
                    <div class="sellPrices">
                        <div class="quality-recipe">
                            <div class="quality-img">
                                <img src="{{ URL::to('/') }}/images/icons/{{ $recipe['item']['iconName'] }}.webp" alt="">
                            </div>
                            <div class="quality-price">
                                <p>sells for {{ $recipe['item']['sellPrice'] }}</p>
                                <img src="{{ URL::to('/') }}/images/icons/T_IconCoin.webp" alt="">
                            </div>
                        </div>
                        @foreach($recipe['item']['qualities'] as $qualityName => $quality)
                        <div class="quality-recipe">
                            <div class="quality-img">
                                <img src="{{ URL::to('/') }}/images/icons/{{ $recipe['item']['iconName'] }}.webp" alt="">
                                <img class="quality" src="{{ URL::to('/') }}/images/quality-stars/star-{{ $qualityName }}.png" alt="">
                            </div>
                            <div class="quality-price">
                                <p>sells for {{ $quality['sellPrice'] }}</p>
                                <img src="{{ URL::to('/') }}/images/icons/T_IconCoin.webp" alt="">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="howTo">
                    <h3>How to make</h3>
                    <div class="utensils">
                        <h4>Utensil</h4>
                        <div class="utensil">
                            <p>Use <i>{{ $recipe['utensils'][0] }}</i></p>
                            <img src="{{ URL::to('/') }}/images/icons/{{ $recipe['utensils'][0] }}.webp" alt="">
                        </div>
                    </div>
                    <div class="ingredients">
                        <h4>Ingredients</h4>
                        @foreach($recipe['genericIngredients'] as $ingredient)
                        <div class="ingredient">
                            <p>{{ $ingredient['amount'] }} x <i>{{ $ingredient['genericItem']['displayName'] }}</i></p>
                            <img src="{{ URL::to('/') }}/images/icons/{{ $ingredient['genericItem']['iconName'] }}.webp" alt="">
                        </div>
                        @endforeach
                        @foreach($recipe['ingredients'] as $ingredient)
                        <div class="ingredient">
                            <p>{{ $ingredient['amount'] }} x <i>{{ $ingredient['item']['displayName'] }}</i></p>
                            <img src="{{ URL::to('/') }}/images/icons/{{ $ingredient['item']['iconName'] }}.webp" alt="">
                        </div>
                        @endforeach
                        @foreach($recipe['eitherOrIngredients'] as $ingredients)
                        <p class="eitherOrIngredient">
                            @foreach($ingredients as $index => $ingredient)
                            <img src="{{ URL::to('/') }}/images/icons/{{ $ingredient['item']['iconName'] }}.webp" alt="">
                            {{ $ingredient['amount'] }} x <i>{{ $ingredient['item']['displayName'] }}</i>
                                @if ($index < count($ingredients) - 1)
                                    or
                                @endif
                            @endforeach
                        </p>
                        @endforeach 
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="noResults">
                <p>Sorry! No results found ｡°(°.◜ᯅ◝°)°｡</p>
            </div>
        @endif
    </div>
</div>

<script>
    function toggle(e) {
        let sellPrices = e.currentTarget.nextElementSibling;
        let arrow = e.currentTarget.querySelector('.arrow');
        sellPrices.classList.toggle('show');
        arrow.classList.toggle('show');
        e.currentTarget.classList.toggle('show');
    }
</script>