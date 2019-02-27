<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<style>.overall {
    transform: translate(-5%,-20%) rotateY(180deg);
    display: inline-flex;
}
.overall input{
    display: none;
}
.overall label{
    display: block;
    cursor: pointer;
    width:22px;
    
}
.overall label:before{
    content: '\f005';
    font-family: "Font Awesome 5 Free";
    position:relative;
    display: block;
    font-size: 20px;
    color:rgb(197, 197, 197); 
    
}
.overall label:after{
    content: '\f005';
    font-weight: 800;
    font-family: "Font Awesome 5 Free";
    position:absolute;
    display: block;
    font-size: 20px;
    color:yellow;
    top:0;
    opacity: 0; 
    transition:.5s;
    text-shadow:0 2px 5px rgba(0,0,0,.5)
}
.overall label:hover:after,
.overall label:hover ~ label:after,
.overall input:checked ~ label:after
{
    opacity:1;
}
</style>
<div class="overall">
    <input type="radio" name="star" id="star5" value="5">
        <label for="star5"></label>
    <input type="radio" name="star" id="star4" value="4">
        <label for="star4"></label>
    <input type="radio" name="star" id="star3" value="3">
        <label for="star3"></label>
    <input type="radio" name="star" id="star2" value="2">
        <label for="star2"></label>
    <input type="radio" name="star" id="star1" value="1">
        <label for="star1"></label>
    
    
</div>