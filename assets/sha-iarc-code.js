var app = new Vue({
    el: '#mountCalc',
    data: {
        widthA: 0,
        heightA: 0,
        widthB: 0,
        heightB: 0,
        imgSrc: ''
    },
    methods: {
        gcd: function(width, height){
            return (height == 0) ? width : this.gcd(height, width%height)
        },
        onDrop(e){       
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;
            this.createImage(files[0]);
        },
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;
            this.createImage(files[0]);
        },
        createImage(file) {
            let img = new Image();
            var reader = new FileReader();
            var vm = this;
  
            reader.onload = (e) => {
                vm.imgSrc = e.target.result;
                img.src = e.target.result;
            };
            img.onload = function(){
                vm.widthA = this.width;
                vm.heightA = this.height;
            }
            reader.readAsDataURL(file);
        },
        removeImage: function () {
            this.imgSrc = '';
            this.widthA = 0;
            this.heightA = 0;
            this.widthB = 0;
            this.heightB = 0;
        }
        
    },
    computed: {
        ratio: function(){
            if(this.width1 != 0 && this.height1 != 0 ){
                var r = this.gcd(this.width1, this.height1)
                return 'Ratio is '+(this.width1/r)+' : '+(this.height1/r)
            }
        },
        fullRatio: function(){
            if(this.widthB != 0 && this.heightB != 0 ){
                return this.widthB + 'x' + this.heightB
            }
        },
        width1: {
            get(){
                return this.widthA
            },
            set(newWidth){
                this.widthA = newWidth;
                if (this.widthB !=0 ){
                    this.heightB = Math.round((this.heightA/this.widthA)*this.widthB);
                }
            }
        },
        height1: {
            get(){
                return this.heightA
            },
            set(newHeight){
                this.heightA = newHeight;
                if (this.widthB !=0 ){
                    this.heightB = Math.round((this.heightA/this.widthA)*this.widthB);
                }
            }
        },
        width2: {
            get(){
                return this.widthB
            },
            set(newWidth){
                this.widthB = newWidth;
                this.heightB = Math.round((this.heightA/this.widthA)*newWidth);
            }
        },
        height2: {
            get(){
                return this.heightB
            },
            set(newHeight){
                this.heightB = newHeight;
                this.widthB = Math.round((this.widthA/this.heightA)*newHeight);
            }
        },
        url: {
            get(){
                if(/\.(jpg|gif|jpeg)$/.test(this.imgSrc)){
                    return this.imgSrc;
                }
            },
            set(newUrl){
                if(/\.(jpg|gif|jpeg)$/.test(newUrl)){
                    let img = new Image();
                    var vm = this;
                    img.src = newUrl;
                    img.onload = function(){
                        vm.widthA = this.width;
                        vm.heightA = this.height;
                        vm.imgSrc = newUrl;
                    }
                }
            }
        }
    }
  })

  function toast() {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar");
  
    // Add the "show" class to DIV
    x.className = "show";
  
    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  }