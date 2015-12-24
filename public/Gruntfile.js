//Gruntfile
    module.exports = function(grunt) {

    //Initializing the configuration object
      grunt.initConfig({
        // Task configuration
        less: {
            development: {
                options: {
                    compress: true,  //minifying the result
                },
                files: {
                    "./assets/css/style.css":"./assets/css/style.less"
                }
            },
        },
        concat: {
            
        },
        uglify: {
            js_frontend : {
                files : {
                    './assets/js/site.js' :   [
                        './assets/js/jquery-1.11.3.js',
                        './assets/js/bootstrap.js',
                        './assets/js/bootstrap-datepicker.js',
                        './assets/js/dropzone.js',
                        './assets/js/app.js'
                    ]
                }
            }
        },
        cssmin: {
            options: {
                    shorthandCompacting: false,
                    roundingPrecision: -1
            },
            css_frontend: {
                files: {
                    './assets/css/site.css': [
                        './assets/css/bootstrap.css',
                        './assets/css/datepicker.css',
                        './assets/css/style.css'
                    ]
                }
            }
        },
        phpunit: {
          //...
        },
        watch: {
          //...
        }
      });
        grunt.loadNpmTasks('grunt-contrib-concat');
        grunt.loadNpmTasks('grunt-contrib-less');
        grunt.loadNpmTasks('grunt-contrib-uglify');
        //grunt.loadNpmTasks('grunt-phpunit');
        grunt.loadNpmTasks('grunt-contrib-cssmin');

        grunt.registerTask('default', ['less','uglify','cssmin']);
  };
