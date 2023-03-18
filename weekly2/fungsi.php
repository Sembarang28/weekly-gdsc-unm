<?php

//built in function
echo pi(). "<br>";

function luasLingkaran ($jariJari){
    return pi() * pow($jariJari, 2);
}

echo luasLingkaran(10);