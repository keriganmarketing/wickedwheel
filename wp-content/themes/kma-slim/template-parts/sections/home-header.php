<?php
use Includes\Modules\Slider\BulmaSlider;
?>
<div class="home-header">
    <slider>
        <?php
        $slider = new BulmaSlider();
        $slides = $slider->getSlides('home-page-slider');
        $slider = '';

        $i = 0;
        foreach($slides as $slide){
            $slider .= '<slide :id="'.number_format($i).'" image="'.$slide['photo'].'" >
                        <section class="slide-content">'
                            . ($slide['headline'] != '' ? '<h2 class="title is-1 is-primary">'.$slide['headline'].'</h2>' : '')
                            . ($slide['caption'] != '' ? '<p class="slider-subtitle">'.$slide['caption'].'</p>' : '')
                            . ($slide['description'] != '' ? '<div class="slider-description">'.$slide['description'].'</div>' : '')
                            . ($slide['link'] != '' ? '<a class="button is-primary is-rounded" href="'.$slide['link'].'">MORE INFO</a>' : '') .
                        '</section>
                        </slide>';
            $i++;
        }
        echo $slider;

        ?>
    </slider>
</div>