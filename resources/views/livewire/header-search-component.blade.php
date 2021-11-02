<div class="main-search-form ml-1" >
    <form action="{{ route('recipe.search')}}">
    @csrf
        <input name="search" placeholder="Search" type="text">
        <button class="search-btn" type="submit">
            <i class="fa fa-search" aria-hidden="true"></i>
        </button>
    </form>

</div>