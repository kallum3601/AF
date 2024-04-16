document.addEventListener('DOMContentLoaded', () => {

    const searchBar = document.getElementById('find-users-search-bar');
    const searchForm = document.getElementById('search-users-search-form');

    if(searchBar){
        searchBar.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault(); 
                
                const userInput = searchBar.value.trim();
             
                searchForm.action = "search/" + userInput;
                
                searchForm.submit();
            }
        });
    }

});
