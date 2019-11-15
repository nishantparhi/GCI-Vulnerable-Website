module.exports = function (grunt) {
    'use strict';

    grunt.initConfig({
        wiredep:{
            task:{
                src:['bower_includes.html']
            }
        },
        pkg: grunt.file.readJSON('package.json'),

        sprite: {
            all: {
                // Include all normal and `-2x` (retina) images
                //   e.g. `github.png`, `github-2x.png`
                src: 'ivc/images/sprites/*.png',

                algorithm: 'diagonal',
                // Filter out `-2x` (retina) images to separate spritesheet
                //   e.g. `github-2x.png`, `twitter-2x.png`
                retinaSrcFilter: 'ivc/images/sprites/*@2x.png',

                // Generate a normal and a `-2x` (retina) spritesheet
                dest: 'images/spritesheet.png',
                retinaDest: 'images/spritesheet@2x.png',

                // Generate SCSS variables/mixins for both spritesheets
                destCss: 'scss/_sprites.scss'
            }
        },
        qunit: {
            files: ['test/**/*.html']
        },
        jshint: {
            files: ['Gruntfile.js', 'js/*.js'],
            options: {
                // options here to override JSHint defaults
                globals: {
                    jQuery: true,
                    console: true,
                    module: true,
                    document: true
                }
            }
        },
        compass: {
            dist: {
                options: {
                    sassDir: 'scss/',
                    cssDir: 'ivc/css/'
                }
            }
        },


        watch: {
            options: {
                livereload: true
            },
            css: {
                files: [
                    'scss/*.scss',
                    'scss/*/*.scss',
                    'ivc/js/*.js'
                ],
                tasks: ['compass']
            },
            files: ['bower_components/*','**/*.php'],
            tasks: ['wiredep']
        },
        connect: {
            all: {
                options: {
                    port: 9000,
                    hostname: "0.0.0.0"
                    // keepalive: true,
                }
            }
        },


        php: {
            dist: {
                options: {
                    port: 9000,
                    base: '',
                    hostname: "0.0.0.0"
                }
            }
        },


        open: {
            all: {
                path: 'http://localhost:<%= php.dist.options.port%>'
            }
        },
        useminPrepare: {
            html: 'bower_includes.html',
            options: {
                dest: 'ivc/js'
            }
        },
        concat: {
            options: {
                separator: ';'
            },
            dist: {}
        },
        uglify: {
            dist: {}
        }
    });
    grunt.loadNpmTasks('grunt-usemin');
    grunt.loadNpmTasks('grunt-wiredep');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-qunit');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-connect');
    grunt.loadNpmTasks('grunt-sassdoc');
    grunt.loadNpmTasks('grunt-contrib-yuidoc');
    grunt.loadNpmTasks('grunt-open');
    grunt.loadNpmTasks('grunt-php');
    grunt.loadNpmTasks('grunt-spritesmith');


    grunt.registerTask('test', ['jshint', 'qunit']);

    grunt.registerTask('default', ['jshint', 'concat', 'uglify', 'sprite','wiredep']);

    grunt.registerTask('buildjs', ['useminPrepare', 'concat', 'uglify', 'usemin']);

    grunt.registerTask('default', function (target) {
        grunt.log.warn('Default task set to Serve for development');
        grunt.task.run([target ? ('serve:' + target) : 'serve']);
    });

    grunt.registerTask('server', function (target) {
        grunt.log.warn('The "server" task has been deprecated. Use "grunt serve" to start a server.');
        grunt.task.run([target ? ('serve:' + target) : 'serve']);
    });


    grunt.registerTask('serve', [
        'php',
        'open',
        'watch'
    ]);

};