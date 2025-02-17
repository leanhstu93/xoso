var Main = function () {
    return Main.fn.init();
};

Main.fn = Main.prototype = {
    config: {
        selectorSliderReview : '.js__slider-review',
        // selectorMenu: '.wrapper-menu',
        // selectorScroll: '.js__scroll_read_multi',
        selectorBackToTop: '.js_scroll-top',
        // selectorStickyAnchor: '#rightsticky',
        // selectorSticky: '#rightsticky',
        // selectorStopSticky: '#stop-sticky'
        selectorBannerHome: '.js__main-banner',
        selectorBannerMenuItem: '.js__menu-banner-item',
        selectorBannerContentItem: '.js__content-banner-item',
        selectorBannerMember: '.js__slide-member',
        selectorSlideNewsHome: '.js__slide-news',
        selectorSlideReview: '.js__slider-review',
        selectorModalRegisterTemplate: '#js__form-register-template',
        selectorButtonRegisterTemplate: '.js__btn-register-template',
        selectorButtonSubmitRegisterTemplate: '.js__submit-register-template'
    },

    init: function () {
         //this.initSlider();
         this.handleLoadResultXoso();
       
    },

    sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    },

     /**
     *  load kqxs
     */
   async handleLoadResultXoso()
   {
    
        if ($('.js__table-load-kqsx').length > 0) {
            let type = $('.js__table-load-kqsx').data('type');

            // Check khung thoi gian xo so            
            if (await this.handleCheckTimeXoso(type)) {
                
                setTimeout(function() {                
                }, 1000); // Độ trễ 1 giây

                let result = true;

                do {
                    let resp = await new Promise(async (resolve, reject) => {                    
                        await this.sleep(10000);
                        
                        $.ajax({
                            url: '/site/get-kqsx',
                            method: 'GET',
                            dataType: 'json', // Đảm bảo nhận về JSON
                            data : {
                                type
                            },
                            success: function(data) {                            
                                resolve(data); // Thành công thì resolve
                            },
                            error: function() {
                                reject('Lỗi khi tải dữ liệu 1');
                            }
                        });
                    })
                    
                    if (resp.code == 200) {
                        let html = '';
                        let contentHead = '';

                        for (let i = 0 ; i < resp.data.length; i++) {
                            contentHead += `
                                <td class="number col3">
                                    <span title="${resp.data[i]['label']}" class="title-ttp textlotoblue">
                                        ${resp.data[i]['label']}
                                    </span>
                                </td>                  
                            `;
                        }

                        let htmlHead = `<tr class="bgedf2fa"><td class="giai-txt"> G </td>${contentHead}</tr>`;
                        
                        for (let i = (resp['data'][0]['data']['length'] - 1); i >= 0; i--) {
                            let item = resp['data'][0]['data'][i];
                            let item2 = resp['data'][1]['data'][i];
                            let item3 = resp['data'][2]['data'][i];
                            
                            
                            let classCol = 'col' + resp['data']['length'];
                            let classRed = i == 8 || i == 0 ? 'colorred' : '';
                            let labelGiai = i == 0 ? 'ĐB' : i;

                            let funcTmp = (dataTmp) => {
                                let htmlTmp = '';

                                if (Array.isArray(dataTmp)) {
                                    dataTmp.map((itemTmp, keyTmp) => {
                                        htmlTmp += `
                                        <span class="item  xshover font24" id="TG_prize4_item0">
                                        ${itemTmp}
                                        </span>
                                        `; 
                                    });
                                } else {
                                    htmlTmp = `<span class="item  xshover font24 ${classRed}" id="TG_prize4_item0">
                                    ${dataTmp}
                                    </span>`;
                                }

                                return htmlTmp;
                            }
                            htmlNumber = funcTmp(item);
                            htmlNumber2 = funcTmp(item2);
                            htmlNumber3 = funcTmp(item3);
                            
                            let htmlNumber4 = '';
                            if (resp['data'].length == 4) {
                                let item4 = resp['data'][3]['data'][i];
                                htmlNumber4 = funcTmp(item4);
                                htmlNumber4 = `
                                    <td class="number ${classCol}">               
                                        ${htmlNumber4}
                                    </td>
                                `;
                                
                            }
                            
                            html += `
                                <tr class="${i + 1 % 2 == 0 ? 'bgedf2fa' : ''}">
                                    <td class="giai-txt"> 
                                        ${labelGiai}
                                    </td>
                                    <td class="number ${classCol}">               
                                        ${htmlNumber}
                                    </td>
                                    <td class="number ${classCol}">               
                                        ${htmlNumber2}
                                    </td>
                                    <td class="number ${classCol}">               
                                        ${htmlNumber3}
                                    </td>
                                    ${htmlNumber4}
                                </tr>
                            `;
                        }

                        html = `${htmlHead} ${html}`;
                        
                        $('.js__table-load-kqsx tbody').html(html);
                    }
                } while(result)
            }
        }
   },

   /**
    * Kiem tra thoi gian xo so
    */
   async handleCheckTimeXoso(type) 
   {
        let resp = await new Promise(async (resolve, reject) => {                    
            $.ajax({
                url: '/site/check-range-time-xo-so',
                method: 'GET',
                dataType: 'json', // Đảm bảo nhận về JSON
                data : {
                    type
                },
                success: function(data) {                            
                    resolve(data); // Thành công thì resolve
                },
                error: function() {
                    reject('Lỗi khi tải dữ liệu 1');
                }
            });
        })

        if (resp.code == 200) {
            return resp.data;
        }

        return false;
   },

    handleSaveFormRegisterTemplate()
    {
        let self = this;

        $(this.config.selectorButtonSubmitRegisterTemplate).click(function () {
            console.log('a');
        });
    },

    /**
     * Đăng ky template
     */
    handleRegisterTemplate()
    {
        let self = this;
        $(this.config.selectorButtonRegisterTemplate).click(function(){
            let id = parseInt($(this).data('id'));
            if (id > 0) {
                $(self.config.selectorModalRegisterTemplate).modal('show');
            }
            return false;
        });
    },

    handleToggleTextBanner()
    {
        let self = this;
        $(this.config.selectorBannerMenuItem).click(function() {
            $(self.config.selectorBannerMenuItem).removeClass('active');
            $(this).addClass('active');
            let index = $(this).index();
            let $ItemContent = $(self.config.selectorBannerContentItem+':eq('+index+')');

            $(self.config.selectorBannerContentItem).removeClass('active');
            $($ItemContent).addClass('active');
        });
        $(this.config.selectorBannerMenuItem+ ':first').trigger('click');
    },

    handleScrollToTop: function() {
        var t = this;
        $(this.config.selectorBackToTop).hide();
        var o = $(window).scrollTop();
        $(window).scroll(function() {
            var e = $(window).scrollTop();
            o < e || e < 150 ? $(t.config.selectorBackToTop).fadeOut() : $(t.config.selectorBackToTop).fadeIn(),
                o = e
        }),
            $(this.config.selectorBackToTop).click(function() {
                return $("html, body").animate({
                    scrollTop: 0
                }, 800),
                    !1
            })
    },

    // handleSticky: function(){
    //     let self = this;
    //     var rightboxtop,rightboxbot,mytop,rightstickyheight;
    //     var ismobile = $(window).width() < 1200;
    //     let width = $(self.config.selectorSticky).width();
    //     rightstickyheight = $(self.config.selectorSticky).height();
    //     rightboxtop = $(self.config.selectorStickyAnchor).position().top - 51;
    //     rightboxbot = $(self.config.selectorStopSticky).position().top - rightstickyheight - 51;
    //
    //     if((!ismobile)){
    //         $(window).scroll(function () {
    //             mytop = $(window).scrollTop();
    //             //console.log(mytop);
    //             //floating right box
    //             console.log("=========");
    //             console.log(rightboxtop);
    //             console.log(rightboxbot);
    //             console.log(mytop);
    //             if (mytop >= rightboxtop) {
    //                 if (mytop <= rightboxbot - 51) {
    //                     if($(self.config.selectorSticky).css('position') != 'fixed') {$(self.config.selectorSticky).css({ 'position': 'fixed', 'top': '40px' }).width(width);}
    //                 }
    //                 else
    //                 {
    //                     if($(self.config.selectorSticky).css('position') != 'relative') {$(self.config.selectorSticky).css({ 'position': 'relative', 'top': rightboxbot + 'px' });}
    //                 }
    //             }
    //             else {
    //                 console.log(1);
    //                 if($(self.config.selectorSticky).css('position') != '') {$(self.config.selectorSticky).css('position', '');}
    //             }
    //         });
    //     }
    // },

    initSlideReview: function() {
        new Swiper(this.config.selectorSliderReview, {
            speed: 400,
            slidesPerView: 1,
            pagination: {
                el: $(this.config.selectorSliderReview).parent().find('.swiper-pagination')[0]
            },

            navigation: {
                nextEl: $(this.config.selectorSliderReview).parent().find('.swiper-button-next')[0],
                prevEl:  $(this.config.selectorSliderReview).parent().find('.swiper-button-prev')[0],
            },
        });
    },

    initSlideMember: function() {
        new Swiper(this.config.selectorBannerMember, {
            speed: 400,
            spaceBetween: 30,
            slidesPerView: 3,
            pagination: {
                el: $(this.config.selectorBannerMember).parent().find('.swiper-pagination')[0]
            },

            // Navigation arrows
            navigation: {
                nextEl: $(this.config.selectorBannerMember).parent().find('.swiper-button-next')[0],
                prevEl:  $(this.config.selectorBannerMember).parent().find('.swiper-button-prev')[0],
            },
        });
    },
    initSlideNews: function() {
        new Swiper(this.config.selectorSlideNewsHome, {
            speed: 400,
            spaceBetween: 30,
            slidesPerView: 3,
            pagination: {
                el: $(this.config.selectorSlideNewsHome).parent().find('.swiper-pagination')[0]
            },

            // Navigation arrows
            navigation: {
                nextEl: $(this.config.selectorSlideNewsHome).parent().find('.swiper-button-next')[0],
                prevEl:  $(this.config.selectorSlideNewsHome).parent().find('.swiper-button-prev')[0],
            },
        });
    },
    initSlider :function() {
       $(this.config.selectorSliderReview).slick({
           centerPadding: '60px',
           slidesToShow: 1,
           // slidesToScroll: 3,
           // arrows: false,
           autoplay:true,
           dots: true,
           speed: 500,
           // responsive: [
           //     {
           //         breakpoint: 1024,
           //         settings: {
           //             slidesToShow: 3,
           //             slidesToScroll: 3,
           //             infinite: true,
           //             dots: true
           //         }
           //     },
           //     {
           //         breakpoint: 660,
           //         settings: {
           //             centerPadding: '10px',
           //             slidesToShow: 2,
           //             slidesToScroll: 3,
           //             infinite: true,
           //             dots: true
           //         }
           //     },
           // ]
       });
    },
    //
    // fixScrollMenu: function() {
    //     let self = this;
    //
    //     $(window).scroll(function(){
    //         if($(this).scrollTop()>250){
    //             $(self.config.selectorMenu).addClass("fix-scroll");
    //         }
    //         else{
    //             $(self.config.selectorMenu).removeClass("fix-scroll");
    //         }
    //     });
    // },
    //
    // initScrollReadMulti: function() {
    //     $(this.config.selectorScroll).slimScroll({
    //         allowPageScroll: true,
    //         height: '450px',
    //     });
    // },
    // handleScrollToTop: function() {
    //     var t = this;
    //     $(this.config.selectorBackToTop).hide();
    //     var o = $(window).scrollTop();
    //     $(window).scroll(function() {
    //         var e = $(window).scrollTop();
    //         o < e || e < 150 ? $(t.config.selectorBackToTop).fadeOut() : $(t.config.selectorBackToTop).fadeIn(),
    //             o = e
    //     }),
    //         $(this.config.selectorBackToTop).click(function() {
    //             return $("html, body").animate({
    //                 scrollTop: 0
    //             }, 800),
    //                 !1
    //         })
    // },

}

var main = new Main();