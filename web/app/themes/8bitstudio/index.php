<?php
/*
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since 8bitstudio 1.0
 */

 get_header();
?>
    <h2 class="home_title">Tout les articles</h2>

    <ul id="list_articles" ></ul>

    <div class="btn_block">
       <button class="btn_update_list" type="button" id="btn_plus_articles">Plus d articles</button>
    </div>
   
    <script type="text/javascript" >
      const listArticles = document.querySelector("#list_articles");
      const btnPlus = document.querySelector("#btn_plus_articles"); 
      let articles = [];
      let skipList = 2;

       btnPlus.addEventListener('click', (e) => {   
        skipList += 2;
        fetchApi(skipList, true);
       })

        const insertHtmlData = (data, skip = 2) => {
        const articlesSliced = data.slice(0, skip);

        listArticles.innerHTML = articlesSliced.map((item) => `<li class="item_list"><div>
          <h3>${item.title.rendered}</h3>
          <p>${item.excerpt.rendered}</p>
        </div></li>`).join('');
      }

      const fetchApi = async (skip = 2, firstCall = false) => {
        if(!firstCall) {
          const response = await fetch("http://localhost:8000/wp-json/wp/v2/posts");
          const data = await response.json();
          articles = data;

          insertHtmlData(data, skip);
        }
          insertHtmlData(articles, skip);
        };

      fetchApi(); 
    </script>
    </body>
</html>















