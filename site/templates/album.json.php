<?php

$images = $page->images();


$data = "<article>
            <div class='project__container'><div class='project__text'>
            <span class='project__headline'>".$page->headline()->value()."</span><p class='project__sub'>".$page->subheading()->value()."</p><p class='project__desc'>".$page->description()->value()."</p></div>
            <div class='project__images main-carousel'>";

foreach ($images as $img):

$data .= "<img class='carousel-cell-image' data-flickity-lazyload='".$img->url()."'>";
    
endforeach;

$data .= "</div>
            </div>
        </article>";
//  ['head' => $page->headline()->value(),
//  'sub'  => $page->subheading()->value(),
//  'desc'  => $page->description()->value(),
//  'cover'  => $page->cover()->url(),
//  'images' => $page->images()]


echo $data;
    
//$data = "<article>"      
//          if ($projHead = $page->headline() ){
//          "<p>".$projHead."</p>"}
//          endif 
//              
//          if ($projSub = $page->subheading()):
//            "<p>".$projSub."</p>"
//          endif
//                
//          if ($projDesc = $page->description()):
//             "<p>".$projDesc."</p>" 
//          endif
//                 
//          "<ul class='album-gallery'" attr(['data-even' => $gallery->isEven(), 'data-count' => $gallery->count()], ' ') ">" 
//          foreach ($gallery as $image): 
//            "<li>
//        <figure>
//          <a href='".$image->link()->or($image->url())."'>"
//            .$image->crop(800, 1000).
//          "</a>
//        </figure>
//      </li>"
//      endforeach
//    "</ul></article>";
//
//echo json_encode($data);

?>
