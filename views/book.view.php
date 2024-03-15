<?php require "components/head.php" ?>

    <?php require "components/navbar.php" ?>

    <h1>Library</h1>

    <form>
    <input name='id'/>
    <button>Filter by ID</button>
    </form>



    <?php foreach($posts as $post){ ?>

        <?php if($post["availability"] == 1){
            $post["availability"]="Piejams";
            
        }else{
            $post["availability"]="Nav Piejams";
        } ?>
        

       <li> <?= $post["title"]." / ".$post["author"]." / ".$post["publication_year"]." / ".$post["availability"]
        ?> </li><br>
    <?php } ?>
    </ol>

<?php require "components/footer.php" ?>