<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <div class="search-bar">
                    <div class="search-bar-tablecell">
                        <h3>Search For:</h3>
                        <form action="{{ route('search') }}" method="get">
                            @csrf
                         
                            <input name="keyword" type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>