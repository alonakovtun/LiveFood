<div class="main-search-form my-auto ml-5" >
    <form action="{{ route('recipe.search')}}">
    @csrf
        <input name="search" placeholder="Find a recipe" type="text">
        <button class="search-btn" type="submit">
            <i class="fa fa-search" aria-hidden="true"></i>
        </button>
    </form>

</div>