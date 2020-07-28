<style>
/* Style the Image Used to Trigger the Modal */
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

 .myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}



#myImg:hover {opacity: 0.7;}

.myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption { 
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}

</style>



<table  border="0" class="tablest" cellpadding="3" cellspacing="0">
  <tr valign="bottom" height="149">
    <td></td>
    <td colspan="4"></td>
  </tr>
  <tr height="4"  >
    <td background="leftugol.png"></td>
    <td colspan="4"  background="bgpixel.png"></td>
    <td background="rightgol.png"></td>
  </tr>	  

  <tr>
    <td colspan="6" class="td_pic"><strong class="style6">Фотогалерея </strong></td>
  </tr>

  <tr >
    <td class="td_pic">&nbsp;</td>
    <td class="td_pic" width="25%"><img id="myImg" src="3/IMG_1904.JPG" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="3/IMG_1905.JPG" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="3/IMG_2319.JPG" alt="встановлення скла" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="3/IMG_2201.JPG" alt="скло встановлено" width="100%" border="1" /></td>   
     <td class="td_pic">&nbsp;</td>
  </tr>


  <tr >
    <td class="td_pic">&nbsp;</td>
    <td class="td_pic" width="25%"><img id="myImg" src="3/IMG_2122.JPG" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="3/IMG_2177.JPG" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="3/IMG_2179.JPG" alt="встановлення скла" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="3/IMG_2201.JPG" alt="скло встановлено" width="100%" border="1" /></td>   
     <td class="td_pic">&nbsp;</td>
  </tr>

  <tr >
    <td class="td_pic">&nbsp;</td>
    <td class="td_pic" width="25%"><img id="myImg" src="3/IMG_1913.JPG" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="3/IMG_2032.JPG" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="3/IMG_2035.JPG" alt="встановлення скла" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="3/IMG_2067.JPG" alt="скло встановлено" width="100%" border="1" /></td>   
     <td class="td_pic">&nbsp;</td>
  </tr>

  <tr >
    <td class="td_pic">&nbsp;</td>
    <td class="td_pic" width="25%"><img id="myImg" src="3/20246233_1498085823619698_5768919232995111224_n.jpg" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="3/IMG_1505.JPG" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="3/IMG_1508.JPG" alt="встановлення скла" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="3/IMG_1911.JPG" alt="скло встановлено" width="100%" border="1" /></td>   
     <td class="td_pic">&nbsp;</td>
  </tr>


  <tr >
    <td class="td_pic">&nbsp;</td>
    <td class="td_pic" width="25%"><img id="myImg" src="images/11032009393.jpg" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/11032009396.jpg" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/11032009405.jpg" alt="встановлення скла" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/11032009412.jpg" alt="скло встановлено" width="100%" border="1" /></td>   
     <td class="td_pic">&nbsp;</td>
  </tr>
  <tr >
    <td class="td_pic">&nbsp;</td>
    <td class="td_pic" width="25%"><img src="images/21.jpg" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/22.jpg" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/31.jpg" alt="встановлення скла" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/311.jpg" alt="скло встановлено" width="100%" border="1" /></td>
    <td class="td_pic">&nbsp;</td>
  </tr>
  <tr >
    <td class="td_pic">&nbsp;</td>
    <td class="td_pic" width="25%"><img src="images/32.jpg" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/33.jpg" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/34.jpg" alt="встановлення скла" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/35.jpg" alt="скло встановлено" width="100%" border="1" /></td>
    <td class="td_pic">&nbsp;</td>
  </tr>
  <tr >
    <td class="td_pic">&nbsp;</td>
    <td class="td_pic" width="25%"><img src="images/36.jpg" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/37.jpg" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/38.jpg" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/39.jpg" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic">&nbsp;</td>
  </tr>
  <tr >
    <td class="td_pic">&nbsp;</td>
    <td class="td_pic" width="25%"><img src="images/41.jpg" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/42.jpg" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/51.jpg" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/52.jpg" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic">&nbsp;</td>
  </tr>
   <tr >
    <td class="td_pic">&nbsp;</td>
    <td class="td_pic" width="25%"><img src="images/61.jpg" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/62.jpg" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="3/IMG_2319.JPG" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/64.jpg" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic">&nbsp;</td>
  </tr>
<tr >
    <td class="td_pic">&nbsp;</td>
    <td class="td_pic" width="25%"><img src="images/71.jpg" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/72.jpg" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/73.jpg" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/74.jpg" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic">&nbsp;</td>
  </tr>
<tr >
    <td class="td_pic">&nbsp;</td>
    <td class="td_pic" width="25%"><img src="images/75.jpg" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/76.jpg" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/77.jpg" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/78.jpg" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic">&nbsp;</td>
  </tr>
<tr >
    <td class="td_pic">&nbsp;</td>
    <td class="td_pic" width="25%"><img src="images/83.jpg" class="myImg" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/84.jpg" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/85.jpg" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/82.jpg" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic">&nbsp;</td>
  </tr>

<tr >
    <td class="td_pic">&nbsp;</td>
    <td class="td_pic" width="25%"><img src="images/79.jpg" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/80.jpg" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img src="images/81.jpg" alt="автоскло" width="100%" border="1" /></td>
    <td class="td_pic" width="25%"><img class="myImg" src="images/86.jpg" alt="скло" width="100%" border="1" /></td>
    <td class="td_pic">&nbsp;</td>
  </tr>



  <tr>
    <td class="td_pic"></td>
    <td colspan="4" class="td_pic"></td>
    <td class="td_pic"></td>
  </tr>
  
  
  
  
  

</table>


<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>

var elements = document.querySelectorAll('table');
var elimg = elements[2].querySelectorAll('img');
console.log("elimg 2 .length  " + elimg.length);
for (var i=0;i<elimg.length;i++){
//console.log("i "+ i); 
//elimg[i].classList.add("myImg");
elimg[i].className = "myImg";
elimg[i].id = "myImg"+[i];

}

var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
//var img = document.getElementById('myImg');


for (i=0;i<elimg.length;i++){
	var img = document.getElementById("myImg"+i);
           img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
	}  
}	


var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}

</script>                
                                                          