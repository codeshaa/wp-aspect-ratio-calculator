<?php


namespace Sha_IARC_Inc;


class Sha_Iarc_Shortcode{


    public static function sha_Aspect_Ratio_Calculator(){

        wp_enqueue_script('wp_vuejs');
        wp_enqueue_script('sha_iarc_script');
        wp_enqueue_style('sha_iarc_style');
        ?>

        <div id="mountCalc" @dragenter.stop.prevent @dragexit.stop.prevent @dragover.stop.prevent @drop.prevent="onDrop">
            <div class="row">
                <h3>Image Aspect Ratio Calculator</h3>
                <div class="column image1">
                    <h5>Provide the dimension of the first image</h5>
                    <input type="number" name="width1" onfocus="this.select();" v-model.number="width1"><span class="cross">x</span> 
                    <input type="number" name="height1" onfocus="this.select();" v-model.number="height1">
                    <h6 v-if="width1 == 0 && height1 ==0">OR</h6>
                    <div v-if="width1 == 0 && height1 ==0" class="drop-section">
                        <div class="dropzone-area">
                        <div class="dropzone-text">
                            <span class="dropzone-title">Click to select OR drag n drop anywhere on grey area</span>
                        </div>
                            <input type="file" @change="onFileChange">
                        </div>
                    </div>
                    <h6 v-if="width1 == 0 && height1 ==0">OR</h6>
                    <div v-if="width1 == 0 && height1 ==0" class="paste-section">
                        <div class="paste-area">
                            <input type="url" name="imagesrc" v-model="url" placeholder="Paste an image URL here...">
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
                <button class="reset-button" @click="removeImage" v-if="imgSrc || (width1 != 0 && height1 !=0)">Reset</button>
                <div v-if="imgSrc">
                    <img class="image-preview" :src="imgSrc" />
                </div>         
            </div>

            <div id="snackbar">Copied to clipboard...</div>
    
        </div>
    
    
        <?php
    }


}





?>