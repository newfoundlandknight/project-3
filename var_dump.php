
<details>
    <summary>$_POST</summary>
    <p class="username_black">
        <?php  //var_dump($_POST); 
            echo "<h3> PHP List All POST Variables</h3>";
            foreach ($_POST as $key=>$val)
                {
                echo $key.' = <i>'.$val."</i><br>\n";
                }
        ?>
    </p>
</details>

<details>
    <summary>$_SESSION</summary>
    <p class="username_black">
        <?php
            echo "<h3> PHP List All Session Variables</h3>";
            foreach ($_SESSION as $key=>$val)
                {
                echo $key.' = <i>'.$val."</i><br>\n";
                }
        ?>
    </p>
</details>

<details>
    <summary>$_COOKIES</summary>
    <p class="username_black">
        <?php
            echo "<h3> PHP List All Cookies Variables</h3>";
            foreach ($_COOKIE as $key=>$val)
                {
                echo $key.' = <i>'.$val."</i><br>\n";
                }
        ?>
    </p>
</details>

<details>
    <summary>LOCALSTORAGE</summary>
    <p class="username_black">
        <h3> PHP List All local storage Variables</h3>
            <!-- echo "";
            foreach ($localStorage as $key=>$val)
                {
               echo $key.' is '.$val."<br>\n";
               } -->
<div id ="local_storage"></div>
            <script>
            paired ="";
            for (let i = 0; i < localStorage.length; i++) {
                const key = localStorage.key(i);
                const value = localStorage.getItem(key);
                let paired = i +" "+ key + " = <i>"+value +"</i><br>";
                document.getElementById("local_storage").innerHTML = document.getElementById("local_storage").innerHTML + paired;
                console.log({key, value})
            }
            </script>
    </p>
</details>

