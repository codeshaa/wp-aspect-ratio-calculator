<?php


namespace Sha_IARC_Inc;


class Sha_Iarc_Shortcode{

    public function register(){
        add_shortcode( 'wparc', array( $this, 'sha_Aspect_Ratio_Calculator' ) );
    }

    public function sha_Aspect_Ratio_Calculator(){

        wp_enqueue_script('wp_vuejs');
        wp_enqueue_script('sha_iarc_script');
        wp_enqueue_style('sha_iarc_style');
        ?>

        <div id="mountCalc" @dragenter.stop.prevent @dragexit.stop.prevent @dragover.stop.prevent @drop.stop.prevent="onDrop">
            <div class="row">
                <h3>WP Aspect Ratio Calculator</h3>
                <div class="column image1">
                    <h5>Dimension of the First Image</h5>
                    <input type="number" name="width1" onfocus="this.select();" v-model.number="width1"><span class="cross">x</span> 
                    <input type="number" name="height1" onfocus="this.select();" v-model.number="height1">
                    <div v-if="!imgSrc" class="drop-section">
                        <div class="dropzone-area">
                        <div class="dropzone-text">
                            <span class="dropzone-title">Click to select</span>
                        </div>
                            <input type="file" @change="onFileChange">
                        </div>
                    </div>
                </div>
    
                <div v-if="width1 != 0 && height1 !=0" class="column image2">
                    <h5>Dimension of the Second Image</h5>
                    <input type="number" name="width2" onfocus="this.select();document.execCommand('copy');" ondblclick="this.select();document.execCommand('copy');" v-model.number="width2"><span class="cross">x</span> 
                    <input type="number" name="height" onfocus="this.select();document.execCommand('copy');" ondblclick="this.select();document.execCommand('copy');" v-model.number="height2">
                </div>
            </div>
    
    
            <div class="row-ratio">
                <p id="img-ratio">{{ratio}}</p>
            </div>
            <div v-if="width2 != 0 && height2 !=0" class="row-result">
                <h4 id="result">Your Dimension is: <span class="highlight">{{width2}} x {{height2}}</span></h4>
                <input id="full-ratio" type="text" name="fullRatio" onfocus="this.select();document.execCommand('copy');toast();" ondblclick="this.select();document.execCommand('copy');toast();" v-model="fullRatio">
            </div>
    
            <!-- Upload Image Preview  -->
            <div class="dropzone-preview">
                <img :src="imgSrc" />
                <button @click="removeImage" v-if="imgSrc">Remove</button>
            </div>

            <div id="snackbar">Copied to clipboard...</div>
    
        </div>
    
    
        <?php
    }


}





?>