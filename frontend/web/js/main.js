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
         this.handleLoadResultXoso(1);
         this.handleLoadResultXoso(2);
         this.handleLoadResultXoso(3);
         
         new Mmenu(document.querySelector("#menumobile"));
    },

    sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    },

    handleLiveXoSo(data)
    {
        try {
            console.log(data);
            let kqxs = {};
            console.log(eval(data));
       } catch (e) {    
        console.log("loi", e);
       }
    },

    getLabelTinh(type)
    {
        let label = '';

        if (type == 1) {
            label = "Hồ Chí Minh";
        } else if (type == 16) {
            label = "Vĩnh Long";
        } else if (type == 17) {
            label = "Trà Vinh";
        } else if (type == 18) {
            label = "Bình Dương";
        } else if (type == 19) {
            label = "Long An";
        } else if (type == 20) {
            label = "Bình Phước";
        } else if (type == 21) {
            label = "Hậu Giang";
        } else if (type == 22) {
            label = "Đà Lạt";
        }

        return label;
    },

    /**
     * Kiểm tra thời gian xổ số 16h15 -> 16h40
     */
    checkTimeXoSoMienNam() {
        const now = new Date();
        const start = new Date();
        const end = new Date();

        // Thiết lập thời gian bắt đầu là 16:15
        start.setHours(16, 15, 0, 0);

        // Thiết lập thời gian kết thúc là 16:40
        end.setHours(16, 40, 0, 0);
       

        // Kiểm tra nếu thời gian hiện tại nằm trong khoảng từ 16:15 đến 16:40
        return now >= start && now <= end;
    },

    checkTimeXoSoMienBac() {
        const now = new Date();
        const start = new Date();
        const end = new Date();

        // Thiết lập thời gian bắt đầu là 16:15
        start.setHours(18, 15, 0, 0);

        // Thiết lập thời gian kết thúc là 16:40
        end.setHours(18, 40, 0, 0);
       

        // Kiểm tra nếu thời gian hiện tại nằm trong khoảng từ 16:15 đến 16:40
        return now >= start && now <= end;
    },

    /**
     * Kiểm tra thời gian xổ số 16h15 -> 16h40
     */
    checkTimeXoSoMienTrung() {
        const now = new Date();
        const start = new Date();
        const end = new Date();

        // Thiết lập thời gian bắt đầu là 16:15
        start.setHours(17, 15, 0, 0);

        // Thiết lập thời gian kết thúc là 16:40
        end.setHours(17, 40, 0, 0);
       

        // Kiểm tra nếu thời gian hiện tại nằm trong khoảng từ 16:15 đến 16:40
        return now >= start && now <= end;
    },

     /**
     *  load kqxs
     * type: 1: Mien nam, 2: mien trung, 3: mien bac
     */
   async handleLoadResultXoso(type)
   {
        let self = this;
        let result = true;
        
        let urlXoSo = 'https://live.xosodaiphat.com/lotteryLive/2/2025021009243111111111';
        let boxHtmlXoSo = 'js__list-table-xo-so-mien-nam';
        let title = 'Kết quả xổ số Miền Nam - KQXS MN';
        let titleSub = 'XSMN';
        let passCheckType = this.checkTimeXoSoMienNam() && $( '.' + boxHtmlXoSo).length > 0;

        if (type == 2) {
            // Mien trung
            titleSub = 'XSMT';
            title = 'Kết quả xổ số Miền Trung - KQXS MT';
            boxHtmlXoSo = 'js__list-table-xo-so-mien-trung';
            passCheckType = this.checkTimeXoSoMienTrung() && $( '.' + boxHtmlXoSo).length > 0 ;
            
            urlXoSo = 'https://live.xosodaiphat.com/lotteryLive/3/2025021009243111111111';
        } else if (type == 3 ) {
            titleSub = 'XSMB';
            title = 'Kết quả xổ số Miền Bắc - KQXS MB';
            boxHtmlXoSo = 'js__list-table-xo-so-mien-bac';
            urlXoSo = 'https://live.xosodaiphat.com/lotteryLive/1/2025021009243111111111';
            passCheckType = this.checkTimeXoSoMienBac() && $( '.' + boxHtmlXoSo).length > 0 ;
        } 

        if (passCheckType) {
            do {
                let resp = await new Promise(async (resolve, reject) => {
                    $.ajax({
                        url: urlXoSo,
                        method: 'GET',
                        dataType: 'json', // Đảm bảo nhận về JSON
                       
                        success: function(data) {
                            try {
                                resolve(data);
                            
                            } catch(e) {
                                console.log(e);
                            }               
                            //   resolve(data); // Thành công thì resolve
                        },
                        error: function() {
                            reject('Lỗi khi tải dữ liệu 1');
                        }
                    });
                })
                   
                if (resp) {
                    if (type == 3) {
                        this._renderTableXoSoMienBacLive(resp, boxHtmlXoSo, title, titleSub)
                    } else {
                        this._renderTableXoSoLive(resp, boxHtmlXoSo, title, titleSub)
                    }
                }

                await this.sleep(1000);
            } while(result)
        }
   },

   _renderTableXoSoLive(resp, boxHtmlXoSo, title, titleSub) {
        let html = '';
        let contentHead = '';
    

        for (let i = 0 ; i < resp.length; i++) {
            let lb = resp[i]['LotteryName'];
            contentHead += `
                <td class="number col3">
                    <span title="${lb}" class="title-ttp textlotoblue">
                        ${lb}
                    </span>
                </td>                  
            `;
        }

        let htmlHead = `<tr class="bgedf2fa"><td class="giai-txt"> G </td>${contentHead}</tr>`;
    
        for (let i = 0; i <= 8; i++) {
            
            let item = resp[0];
            let item2 = resp[1] ? resp[1] : null;
            let item3 = resp[2] ? resp[2] : null;
            
            
            let classCol = 'col' + resp['length'];
            let classRed = i == 8 || i == 0 ? 'colorred' : '';
            let labelGiai = i == 0 ? 'ĐB' : i;

            let funcTemp = (value) => {
                if (value.indexOf("...") != -1) {
                    return '<img src="/images/xo_so_truc_tiep.gif" />';
                } else {
                    return value;
                }
            }

            let funcTmp = (dataTmp) => {
            
                let htmlTmp = '';
                let rowTmp = dataTmp.LotPrizes[i];

                if (rowTmp.Range.indexOf('-') == -1) {
                    htmlTmp = `<span class="item  xshover font24 ${classRed}" id="TG_prize4_item0">
                    ${funcTemp(rowTmp.Range)} 
                    </span>`;                               
                } else {
                
                    let rowTmpArr = rowTmp.Range.split(' - ');

                    rowTmpArr.map((itemTmp, keyTmp) => {
                        htmlTmp += `
                        <span class="item  xshover font24" id="TG_prize4_item0">
                        ${funcTemp(itemTmp)}
                        </span>
                        `; 
                    });
                }

                return htmlTmp;
            }
            
            htmlNumber = funcTmp(item);
            htmlNumber2 = item2 ? funcTmp(item2) : null;
            htmlNumber3 = funcTmp(item3);
            
            let htmlNumber4 = '';
            if (resp.length == 4) {
                let item4 = resp[3];
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
            
        html = `<div class="box-ketqua"><table class="table table-bordered text-center"><tbody>${htmlHead} ${html}</tbody></table></div>`;

        let dateXoSo = resp[0]['CrDateTime']; 
        let dateXoSoArr = dateXoSo.split(',');
        let htmlTitle = `<div class="tieude_xs text-center">
                            <h2 class="title-post">
                                <a href="javascript:;" title="${title}">${title} </a></h2>
                            <h3 class="title-xsmb-item" id="ketquamnlivehead">
                                <a href="javascript:;" title="${titleSub}">${titleSub}</a> » 
                                <a href="javascript:;">${titleSub} ${dateXoSoArr[0]}</a> » 
                                <a href="javascript:;">${titleSub} ${dateXoSoArr[1]}</a>
                            </h3>
                        </div>`;
        $('.js__box-html-xo-so-live').remove();
        $('.' + boxHtmlXoSo).prepend(`<div class="js__box-html-xo-so-live">${htmlTitle} ${html} </div>`);
   },

   _renderTableXoSoMienBacLive(resp, boxHtmlXoSo, title, titleSub) {
        let html = '';
        let contentHead = '';


        for (let i = 0 ; i < resp.length; i++) {
            let lb = resp[i]['LotteryName'];
            contentHead += `
                <td class="number col3">
                    <span title="${lb}" class="title-ttp textlotoblue">
                        ${lb}
                    </span>
                </td>                  
            `;
        }

     

        for (let i = 7; i >= 0; i--) {
            let item = resp[0];         
            let classCol = 'col' + resp['length'];
            let classRed = i == 7 || i == 0 ? 'colorred' : '';
            let labelGiai = i == 0 ? 'ĐB' : i;

            let funcTemp = (value) => {
                if (value.indexOf("...") != -1) {
                    return '<img src="/images/xo_so_truc_tiep.gif" />';
                } else {
                    return value;
                }
            }

            let funcTmp = (dataTmp) => {
               
                let htmlTmp = '';
                let rowTmp = dataTmp.LotPrizes[i];

                if (rowTmp.Range.indexOf('-') == -1) {
                    htmlTmp = `<span class="item  xshover font24 ${classRed}" id="TG_prize4_item0">
                    ${funcTemp(rowTmp.Range)} 
                    </span>`;                               
                } else {
                
                    let rowTmpArr = rowTmp.Range.split(' - ');

                    rowTmpArr.map((itemTmp, keyTmp) => {
                        htmlTmp += `
                        <span class="item  xshover font24 ${classRed}" id="TG_prize4_item0">
                        ${funcTemp(itemTmp)}
                        </span>
                        `; 
                    });
                }

                return htmlTmp;
            }

            let countValue = item.LotPrizes[i].Range.split(' - ').length;
            
            if (countValue > 1) {
                if (countValue == 4) {
                    classCol += ' grid-'+countValue;
                } else {
                    classCol += ' grid-3';
                }
                
            }

            htmlNumber = funcTmp(item);
            
            
            html += `
                <tr class="${i + 1 % 2 == 0 ? 'bgedf2fa' : ''}">
                    <td class="giai-txt"> 
                        ${labelGiai}
                    </td>
                    
                    <td class="number ${classCol}">               
                        ${htmlNumber}
                    </td>
                    
                </tr>
            `;
        }
            
        html = `<div class="box-ketqua"><table class="table table-bordered text-center"><tbody> ${html}</tbody></table></div>`;

        let dateXoSo = resp[0]['CrDateTime']; 
        let dateXoSoArr = dateXoSo.split(',');
        let htmlTitle = `<div class="tieude_xs text-center">
                            <h2 class="title-post">
                                <a href="javascript:;" title="${title}">${title} </a></h2>
                            <h3 class="title-xsmb-item" id="ketquamnlivehead">
                                <a href="javascript:;" title="${titleSub}">${titleSub}</a> » 
                                <a href="javascript:;">${titleSub} ${dateXoSoArr[0]}</a> » 
                                <a href="javascript:;">${titleSub} ${dateXoSoArr[1]}</a>
                            </h3>
                        </div>`;
        $('.js__box-html-xo-so-live').remove();
        $('.' + boxHtmlXoSo).prepend(`<div class="js__box-html-xo-so-live">${htmlTitle} ${html} </div>`);
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