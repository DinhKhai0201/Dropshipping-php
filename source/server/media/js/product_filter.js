var isFilter = false;
var currentPage = 'categories';

jQuery(document).ready(function () {
    var url = new URL(window.location.href);
    // if ((/.*viec-lam-trong-ngay.*/g).test(window.location.href)) {
    //     currentPage = "viec-lam-trong-ngay"
    // }
    // if ((/.*viec-lam-tuyen-gap.*/g).test(window.location.href)) {
    //     currentPage = "viec-lam-tuyen-gap"
    // }
    // if ((/.*viec-lam-hap-dan.*/g).test(window.location.href)) {
    //     currentPage = "viec-lam-hap-dan"
    // }
    // if ((/.*tuyen-dung-viec-lam.*/g).test(window.location.href)) {
    //     currentPage = "tuyen-dung-viec-lam"
    // }

    cat_search = url.searchParams.get('cat');
    advanced_search_cat = url.searchParams.get('advanced_search_cat');
    advanced_search_location = url.searchParams.get('advanced_search_location');
    keyword_search = url.searchParams.get('keyword');
    location_search = url.searchParams.get('location');
    rank_search = url.searchParams.get('rank');
    salary_search = url.searchParams.get('salary');
    var trang = (/page-(\d+).html/g).exec(url.href);
    page = trang && trang[1] || 1;

    if (rank_search || salary_search) {
        jQuery('.filter-advance').css('display', 'block');
    }

    jQuery('#search-page-form input[name="keyword"]').val(keyword_search);
    jQuery('#search-page-form [name="location"]').val(location_search);
    jQuery('#search-page-form [name="rank"]').val(rank_search);
    jQuery('#search-page-form [name="salary"]').val(salary_search);
    if (cat_search) {
        cat_search = cat_search.split('-');
        jQuery.each(cat_search, function (i, e) {
            jQuery('#search-page-form [name="cat"] option[value="' + e + '"]').prop("selected", true);
        });
    } else {
        cat_search = [];
    }

    catSearchV2 = window.location.href.split('/');
    _catSearchV2 = catSearchV2[catSearchV2.length - 2];
    __catSearchV2 = catSearchV2[catSearchV2.length - 1].split('-');
    ___catSearchV2 = __catSearchV2[__catSearchV2.length - 1];
    __catSearchV2.pop();
    ____categoryName = __catSearchV2.join('-');

    if (!advanced_search.cat && _catSearchV2 == 'tuyen-dung' && parseInt(___catSearchV2)) {
        advanced_search.cat = [___catSearchV2];
        categoryName = ____categoryName;
    } else if (!advanced_search.cat && _catSearchV2 == 'tuyen-dung') {
        advanced_search.location = [catSearchV2[catSearchV2.length - 1].replace(/-/g, ' ')];
        locationName = catSearchV2[catSearchV2.length - 1].replace(/-/g, ' ');
    }

    if (advanced_search_cat && advanced_search_cat !== '') {
        advanced_search.cat = advanced_search_cat.split(',');
        categoryName = '';
    }

    if (advanced_search_location && advanced_search_location !== '') {
        advanced_search.location = [advanced_search_location];
        locationName = '';
    }
    searchData();

    jQuery('#search-page-form').submit(function (e) {
        e.preventDefault();
        page = 1;
        cat_search = jQuery('#search-page-form [name="cat"]').val();
        catselected = cat_search;

        keyword_search = jQuery('#search-page-form input[name="keyword"]').val();
        location_search = jQuery('#search-page-form [name="location"]').val();
        rank_search = jQuery('#search-page-form [name="rank"]').val();
        salary_search = jQuery('#search-page-form [name="salary"]').val();

        jQuery("html, body").animate({
            scrollTop: jQuery("#post-jobs").offset().top - 90
        }, 1000);

        page = 1;
        jQuery('#pagination-demo').twbsPagination('destroy');
        if (cat_search) {
            advanced_search.cat = cat_search;
            categoryName = '';
        }
        if (location_search) {
            advanced_search.location = [location_search];
            locationName = '';
        } else {
            advanced_search.location = [];
            locationName = '';
        }

        searchData();
    });

    jQuery('.sorting-data-job').change(function () {
        page = 1;
        order_by = jQuery(this).val();
        page = 1;
        jQuery('#pagination-demo').twbsPagination('destroy');
        searchData();
    });

    jQuery('.sidebar-jobs-1 input[type="checkbox"]').change(function () {
        var value = jQuery(this).val();
        isFilter = true;
        categoryName = '';

        var type_for_search = jQuery(this).attr('search-for');
        if (type_for_search === 'cat') {
            categoryName = '';
            if (catselected.includes(value)) {
                catselected = catselected.filter(item => {
                    return (item !== value);
                })
            } else {
                catselected.push(value);
            }
            advanced_search.cat = catselected;
        }
        if (type_for_search === 'location') {
            locationName = '';
            if (locationselected.includes(value)) {
                locationselected = locationselected.filter(item => {
                    return (item !== value);
                })
            } else {
                locationselected.push(value);
            }
            advanced_search.location = locationselected;
        }
        if (type_for_search === 'rank') {
            rankName = '';
            if (rankselected.includes(value)) {
                rankselected = rankselected.filter(item => {
                    return (item !== value);
                })
            } else {
                rankselected.push(value);
            }
            advanced_search.rank = rankselected;
        }
        if (jQuery(this).is(":checked")) {
            if (!advanced_search[type_for_search]) {
                advanced_search[type_for_search] = [];
            }
            if (advanced_search[type_for_search].indexOf(value) < 0) {
                advanced_search[type_for_search].push(value);
                if (type_for_search === 'cat') {
                    categoryName = '';
                }
                if (type_for_search === 'location') {
                    locationName = '';
                }
            }
        } else {
            var index = advanced_search[type_for_search].indexOf(value);
            if (index >= 0) {
                advanced_search[type_for_search].splice(index, 1);
            }
        }
        jQuery('#clear-job-filter-btn').css('display', 'block');
        page = 1;
        jQuery('#pagination-demo').twbsPagination('destroy');
        searchData();
    });

    jQuery('.salary-advanced').click(function () {
        isFilter = true;
        categoryName = '';
        jQuery('#clear-job-filter-btn').css('display', 'block');
        advanced_search.salary = jQuery(this).val();
        page = 1;
        jQuery('#pagination-demo').twbsPagination('destroy');
        searchData();
    });

    jQuery('#clear-job-filter-btn button').click(function () {
        isFilter = false;
        categoryName = '';

        jQuery('.sidebar-jobs-1 input[type="checkbox"]').prop('checked', false);
        jQuery('.salary-advanced').prop('checked', false);
        advanced_search = {};
        jQuery('#clear-job-filter-btn').css('display', 'none');
        page = 1;
        jQuery('#pagination-demo').twbsPagination('destroy');
        locationselected = [];
        catselected = [];
        rankselected = [];
        salary = 0;
        searchData();
    });
});

function formatDollar(num) {
    var p = num.toFixed(2).split(".");
    return p[0].split("").reverse().reduce(function (acc, num, i, orig) {
        return num == "-" ? acc : num + (i && !(i % 3) ? "." : "") + acc;
    }, "");
}
function searchData() {

    jQuery('#loading-job').removeClass('hide');
    ////------------------------------------20.5
    let str = '';
    advanced_search.location = locationselected;
    advanced_search.cat = catselected;
    advanced_search.rank = rankselected;
    if (salaryselected != '0')
        advanced_search.salary = salaryselected;

    let dt = {
        [`${keyword_search ? 'keyword' : ''}`]: keyword_search,
        [`${location_search ? 'location' : ''}`]: location_search,
        [`${rank_search ? 'rank' : ''}`]: rank_search,
        [`${salary_search ? 'salary' : ''}`]: salary_search,
        [`${order_by ? 'order_by' : ''}`]: order_by,
        [`${advanced_search ? 'advanced_search' : ''}`]: advanced_search,
        [`${categoryName ? 'categoryName' : ''}`]: categoryName,
        [`${locationName ? 'locationName' : ''}`]: locationName,
        [`${isJobinday ? 'isJobinday' : ''}`]: isJobinday
    }
    delete dt[''];
    str = jQuery.param(dt);
    var msgDetail = '';

    if (keyword_search) msgDetail += ` với <b class="text-msg">từ khóa</b> "<b class="text-msg2">${keyword_search}</b>"`;
    if (location_search) msgDetail += ` ở <b class="text-msg">địa điểm</b> <b class="text-msg2">${mDistricts[location_search]}</b>`;
    if (advanced_search && advanced_search.cat.length == 1) msgDetail += ` cho <b class="text-msg">ngành</b> <b class="text-msg2">${mCategories[advanced_search.cat[0]]}</b>`;
    if (advanced_search && advanced_search.rank.length == 1) msgDetail += ` cho <b class="text-msg">cấp bậc</b> <b class="text-msg2">${mPositions[advanced_search.rank[0]]}</b>`;
    if (advanced_search && advanced_search.salary) msgDetail += ` với <b class="text-msg">mức lương</b> từ <b class="text-msg2">${advanced_search.salary} triệu</b>`;
    if (advanced_search && advanced_search.location && advanced_search.location.length == 1 && !location_search) msgDetail += ` ở <b class="text-msg">địa điểm</b> <b class="text-msg2">${mDistricts[advanced_search.location[0]]}</b>`;

    let wlocation = { ...window.location };
    let wlink = wlocation.pathname
    if ((/tuyen-dung\/.*-\d+$/g).test(wlink) && !isFilter) {
        let idCat = (/tuyen-dung\/.*-(\d+)$/g).exec(wlink);
        advanced_search.cat = [idCat[1]];
        if (mCategories[idCat[1]]) msgDetail = ` cho <b class="text-msg">ngành</b> <b class="text-msg2">${mCategories[idCat[1]]}</b>`;
    } else if ((/tuyen-dung-viec-lam\/.*-\d+\.html$/g).test(wlink) && !isFilter) {
    } else if ((/tuyen-dung\/.*$/g).test(wlink) && !isFilter) {
        let location = (/tuyen-dung\/(.*)$/g).exec(wlink);
        if (location) location = location[1];
        location = location.replace(/-/g, ' ');
        if (mDistricts[location]) msgDetail = ` tại <b class="text-msg2">${mDistricts[location]}</b>`;

    } else if ((/viec-lam-trong-ngay$/g).test(wlink) && !isFilter) {
        msgDetail = ` ở <b class="text-msg">việc làm trong ngày</b>`;
    } else {
        let old = window.location.pathname + window.location.search;
        let cur = (`${rootURL}${currentPage}/trang-${page}.html?${str}`).replace(/ /g, '%20');
        cur = cur.replace(/(\?=$)*(\?$)*/g, '');
        cur = cur.replace(/\/trang-1.html$/g, '');
        cur = cur.replace(/\?=&/g, '?');
        cur = cur.replace(/\?&/g, '?');
        cur = cur.replace(/&=$/g, '');
        isJobinday = 0;
        if ((old) != cur)
            window.history.pushState('', '', cur);
    }
    ////------------------------------------20.5

    jQuery('.wrapper-msg-result').empty();

    jQuery.ajax({
        url: rootURL + 'jobs/search_jobs',
        data: {
            page: page,
            // cat: cat_search,
            keyword: keyword_search,
            location: location_search,
            rank: rank_search,
            salary: salary_search,
            order_by: order_by,
            advanced_search: advanced_search,
            categoryName,
            locationName,
            isJobinday,
            currentPage

        },
        dataType: 'json'
    }).done(function (result) {
        jQuery('#list-item').empty();
        jQuery('#pagination-demo').twbsPagination({
            totalPages: Math.ceil(result.norecords / result.nopp) || 1,
            visiblePages: 5,
            onPageClick: function (event, p) {
                page = p;
                searchData();
            },
            first: '<<',
            prev: '<',
            next: '>',
            last: '>>',
            startPage: parseInt(page)
        });
        let indexAds = Math.floor(Math.random() * (7 + 1 - 3) + 3);
        let first = true;

        for (var i = 0; i < result.data.length; i++) {
            let isShowStar = false;
            if (result.data[i].job_fascinating === '1' || result.data[i].job_hot === '1' || result.data[i].job_urgent === '1') isShowStar = true;
            let color = type_of_works[result.data[i].type_of_work]['color'];
            let type = type_of_works[result.data[i].type_of_work]['type'];
            let salary = '';
            let address = '';
            if (result.data[i].district === ',0,') {
                address = 'Chưa cập nhật';
            } else {
                let arr_district = result.data[i].district && result.data[i].district.split(',');
                let _address = '';
                if (arr_district && arr_district.length - 2 >= 2) {
                    _address = "Đà Nẵng, Việt Nam";
                } else if (arr_district) {
                    arr_district.map(item => {
                        if (item !== '') {
                            _address += ' ' + `<a href="${rootURL}tuyen-dung/${item.replace(/ /g, '-')}">${districts[item]}</a>`
                        }
                    })
                }
                address = _address;

            }
            var companies_name = result.data[i].companies_name && result.data[i].companies_name.substr(0, 50) + '...';
            if (parseInt(result.data[i].salary) == 0) {
                salary = parseInt(result.data[i].salary_from) + ' - ' + parseInt(result.data[i].salary_to) + ' Triệu '
            } else if (parseInt(result.data[i].salary) == 1) {
                salary = 'Thương lượng'
            } else {
                salary = parseInt(result.data[i].salary) + ' Triệu '
            }

            var linkImage = '';
            if (result.data[i].companies_logo) {
                if (result.data[i].companies_logo.indexOf('//') >= 0) {
                    linkImage = result.data[i].companies_logo;
                } else {
                    linkImage = baseUrlAws + `companies/` + result.data[i].companies_logo;
                }
            } else {
                linkImage = baseUrlAws + 'no_picture.png';
            }

            var append = `<div class="grid-content" itemprop="JobPosting" itemscope>
                <div class="job-item featured-item">
                    <div class="job-image">
                        <div class="img-avatar thumbnail">
                            <img alt='logo' src='` + linkImage + `' class='avatar avatar-60 photo img-logo-company'/>
                        </div>
                    </div>
                    <div class="job-content-wrap">
                        <div class="job-info yes-logo">
                            <h3 class="job-title job-title-narrow" itemprop="title">
                                <a href="`+ rootURL + `tuyen-dung-viec-lam/` + result.data[i].slug + '-' + result.data[i].id + `.html">` + result.data[i].title + `</a>
                            </h3>
                            <div class="info-company">
                                <div class="address info-company-name" style="float:left;">
                                    <a href="${rootURL + result.data[i].companies_slug}.html"><span>${companies_name}</span></a>
                                </div>
                                <div class="time-ago info-company-created">
                                    <i class="fa fa-calendar theme-color"></i>
                                    <span itemprop="datePosted" content="2017-10-25T10:08:21+00:00">Ngày đăng: ${convertYMDToDMY(result.data[i].created)}</span> 
                                </div>
                            </div>
                            <div class="info-company">
                                <div class="address info-company-district" style="float:left;">
                                    <i class="ion-android-pin"></i>
                                    <span itemprop="jobLocation" itemscope >
                                        <span itemprop="address" itemscope >
                                            <span>${address}</span>
                                        </span>
                                    </span>
                                </div>
                                <div class="company info-company-salary deadline-for-job" style="float:left;">
                                    <i class="fa fa-dollar"></i>
                                    ` + salary + `
                                </div>
                                <div class="time-ago info-company-deadline">
                                    <i class="fa fa-calendar theme-color"></i>
                                    <span itemprop="validThrough" content="2017-10-25T10:08:21+00:00"></span>
                                    <span itemprop="datePosted" content="2017-10-25T10:08:21+00:00">Hạn nộp hồ sơ: <span class="deadline-for-job">${convertYMDToDMY(result.data[i].deadline)}</span></span> 
                                </div>
                            </div>
                            <div class="job-type full-time">
                                <a class="type-name" href="" style="color: ${color}; border-color: ${color}; background-color: ${color}">${type}</a>
                                <meta itemprop="employmentType" content="full-time" />
                                <button class="save-job btn-save-job ${result.data[i].isSaved ? 'unsaveJob' : 'saveJob'}" key="${result.data[i].isSaved ? result.data[i].save_id : ''}" value="${result.data[i].id},${user_id}">
                                    <i class="fa fa-heart" title="${result.data[i].isSaved ? 'Bỏ lưu' : 'Lưu công việc'}" style="${result.data[i].isSaved ? 'color:red;' : ''}"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="iwj-featured ${isShowStar ? '' : 'hide'}"></div>
                </div>
            </div>`;
            if (i % indexAds === 0 && i !== 0 && first) {
                append += ads_content;
                first = false;
            }

            jQuery('#list-item').append(append);
        }
        if (!result.data.length) {
            jQuery('#list-item').append(`<h3 class="text-center">Không có công việc được tìm thấy ${msgDetail}.</h3>`);
            jQuery('.w-pagination').addClass('hide');
        } else {
            jQuery('.w-pagination').removeClass('hide');
            var msg = `
                <div class="message-result">
                    <p>Kết quả tìm kiếm</p>
                    <span>Có <span class="number">${result.norecords}</span> việc làm được tìm thấy ${msgDetail}</span>
                </div>
            `
            jQuery('.wrapper-msg-result').html(msg);
        }
        jQuery('#loading-job').addClass('hide');
    }).fail(function (fail) {
        // window.location.href = rootURL+'page/errorpage';
        jQuery('#list-item').empty();
        jQuery('#list-item').append(`<h3 class="text-center">Không có công việc được tìm thấy ${msgDetail}.</h3>`);
        jQuery('.w-pagination').addClass('hide');
        jQuery('#loading-job').addClass('hide');
    }).always(function () {

    })
}

function convertYMDToDMY(date) {
    if (!date) return "Chưa cập nhật";
    date = date.replace(/-/g, '/');
    var formatDate = new Date(Date.parse(date));
    return formatDate.getDate() + '/' + (formatDate.getMonth() + 1) + '/' + formatDate.getFullYear();
}


/*!
 * Theia Sticky Sidebar v1.7.0
 * https://github.com/WeCodePixels/theia-sticky-sidebar
 *
 * Glues your website's sidebars, making them permanently visible while scrolling.
 *
 * Copyright 2013-2016 WeCodePixels and other contributors
 * Released under the MIT license
 */
(function ($) {
    $.fn.theiaStickySidebar = function (options) {
        var defaults = { 'containerSelector': '', 'additionalMarginTop': 0, 'additionalMarginBottom': 0, 'updateSidebarHeight': true, 'minWidth': 0, 'disableOnResponsiveLayouts': true, 'sidebarBehavior': 'modern', 'defaultPosition': 'relative', 'namespace': 'TSS' }; options = $.extend(defaults, options); options.additionalMarginTop = parseInt(options.additionalMarginTop) || 0; options.additionalMarginBottom = parseInt(options.additionalMarginBottom) || 0; tryInitOrHookIntoEvents(options, this); function tryInitOrHookIntoEvents(options, $that) { var success = tryInit(options, $that); if (!success) { console.log('TSS: Body width smaller than options.minWidth. Init is delayed.'); $(document).on('scroll.' + options.namespace, function (options, $that) { return function (evt) { var success = tryInit(options, $that); if (success) { $(this).unbind(evt); } }; }(options, $that)); $(window).on('resize.' + options.namespace, function (options, $that) { return function (evt) { var success = tryInit(options, $that); if (success) { $(this).unbind(evt); } }; }(options, $that)) } }
        function tryInit(options, $that) {
            if (options.initialized === true) { return true; }
            if ($('body').width() < options.minWidth) { return false; }
            init(options, $that); return true;
        }
        function init(options, $that) {
        options.initialized = true; var existingStylesheet = $('#theia-sticky-sidebar-stylesheet-' + options.namespace); if (existingStylesheet.length === 0) { $('head').append($('<style id="theia-sticky-sidebar-stylesheet-' + options.namespace + '">.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style>')); }
            $that.each(function () {
                var o = {}; o.sidebar = $(this); o.options = options || {}; o.container = $(o.options.containerSelector); if (o.container.length == 0) { o.container = o.sidebar.parent(); }
                o.sidebar.parents().css('-webkit-transform', 'none'); o.sidebar.css({ 'position': o.options.defaultPosition, 'overflow': 'visible', '-webkit-box-sizing': 'border-box', '-moz-box-sizing': 'border-box', 'box-sizing': 'border-box' }); o.stickySidebar = o.sidebar.find('.theiaStickySidebar'); if (o.stickySidebar.length == 0) { var javaScriptMIMETypes = /(?:text|application)\/(?:x-)?(?:javascript|ecmascript)/i; o.sidebar.find('script').filter(function (index, script) { return script.type.length === 0 || script.type.match(javaScriptMIMETypes); }).remove(); o.stickySidebar = $('<div>').addClass('theiaStickySidebar').append(o.sidebar.children()); o.sidebar.append(o.stickySidebar); }
                o.marginBottom = parseInt(o.sidebar.css('margin-bottom')); o.paddingTop = parseInt(o.sidebar.css('padding-top')); o.paddingBottom = parseInt(o.sidebar.css('padding-bottom')); var collapsedTopHeight = o.stickySidebar.offset().top; var collapsedBottomHeight = o.stickySidebar.outerHeight(); o.stickySidebar.css('padding-top', 1); o.stickySidebar.css('padding-bottom', 1); collapsedTopHeight -= o.stickySidebar.offset().top; collapsedBottomHeight = o.stickySidebar.outerHeight() - collapsedBottomHeight - collapsedTopHeight; if (collapsedTopHeight == 0) { o.stickySidebar.css('padding-top', 0); o.stickySidebarPaddingTop = 0; }
                else { o.stickySidebarPaddingTop = 1; }
                if (collapsedBottomHeight == 0) { o.stickySidebar.css('padding-bottom', 0); o.stickySidebarPaddingBottom = 0; }
                else { o.stickySidebarPaddingBottom = 1; }
                o.previousScrollTop = null; o.fixedScrollTop = 0; resetSidebar(); o.onScroll = function (o) {
                    if (!o.stickySidebar.is(":visible")) { return; }
                    if ($('body').width() < o.options.minWidth) { resetSidebar(); return; }
                    if (o.options.disableOnResponsiveLayouts) { var sidebarWidth = o.sidebar.outerWidth(o.sidebar.css('float') == 'none'); if (sidebarWidth + 50 > o.container.width()) { resetSidebar(); return; } }
                    var scrollTop = $(document).scrollTop(); var position = 'static'; if (scrollTop >= o.sidebar.offset().top + (o.paddingTop - o.options.additionalMarginTop)) {
                        var offsetTop = o.paddingTop + options.additionalMarginTop; var offsetBottom = o.paddingBottom + o.marginBottom + options.additionalMarginBottom; var containerTop = o.sidebar.offset().top; var containerBottom = o.sidebar.offset().top + getClearedHeight(o.container); var windowOffsetTop = 0 + options.additionalMarginTop; var windowOffsetBottom; var sidebarSmallerThanWindow = (o.stickySidebar.outerHeight() + offsetTop + offsetBottom) < $(window).height(); if (sidebarSmallerThanWindow) { windowOffsetBottom = windowOffsetTop + o.stickySidebar.outerHeight(); }
                        else { windowOffsetBottom = $(window).height() - o.marginBottom - o.paddingBottom - options.additionalMarginBottom; }
                        var staticLimitTop = containerTop - scrollTop + o.paddingTop; var staticLimitBottom = containerBottom - scrollTop - o.paddingBottom - o.marginBottom; var top = o.stickySidebar.offset().top - scrollTop; var scrollTopDiff = o.previousScrollTop - scrollTop; if (o.stickySidebar.css('position') == 'fixed') { if (o.options.sidebarBehavior == 'modern') { top += scrollTopDiff; } }
                        if (o.options.sidebarBehavior == 'stick-to-top') { top = options.additionalMarginTop; }
                        if (o.options.sidebarBehavior == 'stick-to-bottom') { top = windowOffsetBottom - o.stickySidebar.outerHeight(); }
                        if (scrollTopDiff > 0) { top = Math.min(top, windowOffsetTop); }
                        else { top = Math.max(top, windowOffsetBottom - o.stickySidebar.outerHeight()); }
                        top = Math.max(top, staticLimitTop); top = Math.min(top, staticLimitBottom - o.stickySidebar.outerHeight()); var sidebarSameHeightAsContainer = o.container.height() == o.stickySidebar.outerHeight(); if (!sidebarSameHeightAsContainer && top == windowOffsetTop) { position = 'fixed'; }
                        else if (!sidebarSameHeightAsContainer && top == windowOffsetBottom - o.stickySidebar.outerHeight()) { position = 'fixed'; }
                        else if (scrollTop + top - o.sidebar.offset().top - o.paddingTop <= options.additionalMarginTop) { position = 'static'; }
                        else { position = 'absolute'; }
                    }
                    if (position == 'fixed') { var scrollLeft = $(document).scrollLeft(); o.stickySidebar.css({ 'position': 'fixed', 'width': getWidthForObject(o.stickySidebar) + 'px', 'transform': 'translateY(' + top + 'px)', 'left': (o.sidebar.offset().left + parseInt(o.sidebar.css('padding-left')) - scrollLeft) + 'px', 'top': '0px' }); }
                    else if (position == 'absolute') {
                        var css = {}; if (o.stickySidebar.css('position') != 'absolute') { css.position = 'absolute'; css.transform = 'translateY(' + (scrollTop + top - o.sidebar.offset().top - o.stickySidebarPaddingTop - o.stickySidebarPaddingBottom) + 'px)'; css.top = '0px'; }
                        css.width = getWidthForObject(o.stickySidebar) + 'px'; css.left = ''; o.stickySidebar.css(css);
                    }
                    else if (position == 'static') { resetSidebar(); }
                    if (position != 'static') { if (o.options.updateSidebarHeight == true) { o.sidebar.css({ 'min-height': o.stickySidebar.outerHeight() + o.stickySidebar.offset().top - o.sidebar.offset().top + o.paddingBottom }); } }
                    o.previousScrollTop = scrollTop;
                }; o.onScroll(o); $(document).on('scroll.' + o.options.namespace, function (o) { return function () { o.onScroll(o); }; }(o)); $(window).on('resize.' + o.options.namespace, function (o) { return function () { o.stickySidebar.css({ 'position': 'static' }); o.onScroll(o); }; }(o)); if (typeof ResizeSensor !== 'undefined') { new ResizeSensor(o.stickySidebar[0], function (o) { return function () { o.onScroll(o); }; }(o)); }
                function resetSidebar() { o.fixedScrollTop = 0; o.sidebar.css({ 'min-height': '1px' }); o.stickySidebar.css({ 'position': 'static', 'width': '', 'transform': 'none' }); }
                function getClearedHeight(e) { var height = e.height(); e.children().each(function () { height = Math.max(height, $(this).height()); }); return height; }
            });
        }
        function getWidthForObject(object) {
            var width; try { width = object[0].getBoundingClientRect().width; }
                catch (err) { }
            if (typeof width === "undefined") { width = object.width(); }
            return width;
        }
        return this;
    }
})(jQuery);


if (typeof Object.create !== 'function') {
Object.create = function (obj) {
    function F() { }
    F.prototype = obj; return new F();
};
}
(function ($, window, document, undefined) {
    "use strict"; var SinglePageNav = {
        init: function (options, container) {
        this.options = $.extend({}, $.fn.singlePageNav.defaults, options); this.container = container; this.$container = $(container); this.$links = this.$container.find('a'); if (this.options.filter !== '') { this.$links = this.$links.filter(this.options.filter); }
            this.$window = $(window); this.$htmlbody = $('html, body'); this.$links.on('click.singlePageNav', $.proxy(this.handleClick, this)); this.didScroll = false; this.checkPosition(); this.setTimer();
        }, handleClick: function (e) {
            var self = this, link = e.currentTarget, $elem = $(link.hash); e.preventDefault(); if ($elem.length) {
                self.clearTimer(); if (typeof self.options.beforeStart === 'function') { self.options.beforeStart(); }
                self.setActiveLink(link.hash); self.scrollTo($elem, function () {
                    if (self.options.updateHash && history.pushState) { history.pushState(null, null, link.hash); }
                    self.setTimer(); if (typeof self.options.onComplete === 'function') { self.options.onComplete(); }
                });
            }
        }, scrollTo: function ($elem, callback) {
            var self = this; var target = self.getCoords($elem).top; var called = false; self.$htmlbody.stop().animate({ scrollTop: target }, {
                duration: self.options.speed, easing: self.options.easing, complete: function () {
                    if (typeof callback === 'function' && !called) { callback(); }
                    called = true;
                }
            });
        }, setTimer: function () { var self = this; self.$window.on('scroll.singlePageNav', function () { self.didScroll = true; }); self.timer = setInterval(function () { if (self.didScroll) { self.didScroll = false; self.checkPosition(); } }, 250); }, clearTimer: function () { clearInterval(this.timer); this.$window.off('scroll.singlePageNav'); this.didScroll = false; }, checkPosition: function () { var scrollPos = this.$window.scrollTop(); var currentSection = this.getCurrentSection(scrollPos); if (currentSection !== null) { this.setActiveLink(currentSection); } }, getCoords: function ($elem) { return { top: Math.round($elem.offset().top) - this.options.offset }; }, setActiveLink: function (href) { var $activeLink = this.$container.find("a[href$='" + href + "']"); if (!$activeLink.hasClass(this.options.currentClass)) { this.$links.removeClass(this.options.currentClass); $activeLink.addClass(this.options.currentClass); } }, getCurrentSection: function (scrollPos) {
            var i, hash, coords, section; for (i = 0; i < this.$links.length; i++) { hash = this.$links[i].hash; if ($(hash).length) { coords = this.getCoords($(hash)); if (scrollPos >= coords.top - this.options.threshold) { section = hash; } } }
            var pageBottom = $(document).height() - $(window).height(); if (scrollPos == pageBottom) { var numberOfLinks = this.$links.length; if (numberOfLinks > 0) { section = this.$links[numberOfLinks - 1].hash; } }
            return section || ((this.$links.length === 0) ? (null) : (this.$links[0].hash));
        }
    }; $.fn.singlePageNav = function (options) { return this.each(function () { var singlePageNav = Object.create(SinglePageNav); singlePageNav.init(options, this); }); }; $.fn.singlePageNav.defaults = { offset: 0, threshold: 120, speed: 400, currentClass: 'current', easing: 'swing', updateHash: false, filter: '', onComplete: false, beforeStart: false };
})(jQuery, window, document);
(function ($) {
    "use strict"; window.InwaveOpenWindow = function (url) { window.open(url, 'sharer', 'toolbar=0,status=0,left=' + ((screen.width / 2) - 300) + ',top=' + ((screen.height / 2) - 200) + ',width=650,height=380'); return false; }; window.InwaveRegisterBtn = function () { $('#iwj-register-popup').modal("show"); return false; }; window.InwaveLoginBtn = function () { $('#iwj-login-popup').modal("show"); return false; }; function InwaveHeaderSearchBtn() { $('.header .search-form .search-wrap span').on('click', function () { if ($(this).parents('.display-search-box').length && $(this).prev().val()) { $(this).parents('form').submit(); } else { $('.header .search-form-header').toggleClass('display-search-box'); $('.header .search-form-header input').focus(); } }); }
    function InwaveStickyMenu() {
        var $header = $(".header-sticky"); var $header_2 = $(".header-sticky-2"); var h_header = $('.header.header-default').outerHeight(); if ($header.length) {
            $header.data('sticky', ''); $(window).on("scroll load resize", function () {
                var fromTop = $(document).scrollTop(); if (fromTop > h_header) {
                    if ($header.data('sticky') == '') { $header.data('sticky', 'true'); $header.addClass("clone"); $('body').addClass("down"); $('.iw-header-version3').addClass("header-clone"); }
                }
                else {
                    if ($header.data('sticky') == 'true') { $header.data('sticky', ''); $header.removeClass("clone"); $('body').removeClass("down"); $('.iw-header-version3').removeClass("header-clone"); }
                }
            });
        }
        if ($header_2.length) {
            $header_2.data('sticky', ''); $(window).on("load resize", function () {
                var fromTop = $(document).scrollTop(); if ($header_2.data('sticky') == '') { $header_2.data('sticky', 'true'); $header_2.addClass("clone"); $('body').addClass("down"); }
                else { $header_2.data('sticky', ''); $header_2.removeClass("clone"); $('body').removeClass("down"); }
            });
        }
        $('.iw-menu-main ul.iw-nav-menu').singlePageNav({ currentClass: 'current', filter: ':not(.external-link)', updateHash: false, offset: 100, threshold: 100 });
    }
    function InwaveCarouselSetup() { setTimeout(function () { $(".owl-carousel").each(function () { var slider = $(this); var defaults = { direction: $('body').hasClass('rtl') ? 'rtl' : 'ltr' }; var config = $.extend({}, defaults, slider.data("plugin-options")); slider.owlCarousel(config).addClass("owl-carousel-init"); }); }, 0); $('.post-text .gallery').each(function () { var galleryOwl = $(this); var classNames = this.className.toString().split(' '); var column = 1; $.each(classNames, function (i, className) { if (className.indexOf('gallery-columns-') != -1) { column = parseInt(className.replace(/gallery-columns-/, '')); } }); galleryOwl.owlCarousel({ direction: $('body').hasClass('rtl') ? 'rtl' : 'ltr', items: column, singleItem: true, navigation: true, pagination: false, navigationText: ["<i class=\"fa fa-arrow-left\"></i>", "<i class=\"fa fa-arrow-right\"></i>"], autoHeight: true }); }); if ($('.post-gallery .gallery-carousel').length) { $('.post-gallery .gallery-carousel').owlCarousel({ direction: $('body').hasClass('rtl') ? 'rtl' : 'ltr', items: 1, singleItem: true, navigation: true, pagination: false, navigationText: ["<i class=\"fa fa-arrow-left\"></i>", "<i class=\"fa fa-arrow-right\"></i>"], autoHeight: true }); } }
    function InwaveScrollMenu() { if (typeof $.fn.enscroll === 'function') { $('.off-canvas-menu-scroll').enscroll({ showOnHover: true, verticalTrackClass: 'track3', verticalHandleClass: 'handle3', addPaddingToPane: false }); } }
    function InwaveGallarySetup() { if (typeof $.fn.fancybox === 'function') { $("a[rel=iwj-gallery]").fancybox({ 'transitionIn': 'none', 'transitionOut': 'none', 'titlePosition': 'over', 'titleFormat': function (title, currentArray, currentIndex, currentOpts) { return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>'; } }); } }
    function InwaveSelectSetup() {
        if (typeof $.fn.select2 === 'function') {
            if ($('.iwj-select-2').length) { $(".iwj-select-2").each(function () { var options = $(this).data('options'); options = options ? options : {}; $(this).select2(options); }); }
            if ($('.iwj-select-2-advance').length) { $(".iwj-select-2-advance").each(function () { var options = $(this).data('options'); options = options ? options : {}; options.dropdownCssClass = 'iwj-select-2-advance-dropdown'; $(this).select2(options); }); }
            if ($('.iwj-select-2-wsearch').length) { $(".iwj-select-2-wsearch").each(function () { var options = $(this).data('options'); options = options ? options : { 'minimumResultsForSearch': 'Infinity' }; options.dropdownCssClass = 'iwj-select-2-wsearch'; $(this).select2(options); }) }
            if ($('.iwj-find-jobs-select.style1').length) { $(".iwj-find-jobs-select.style1").select2({ dropdownCssClass: 'iwj-find-jobs-dropdown' }) }
            if ($('.iwj-find-jobs-select.style2').length) { $(".iwj-find-jobs-select.style2").select2({ dropdownCssClass: 'iwj-find-jobs-dropdown style2' }) }
            if ($('.iwj-find-jobs-select.style3').length) { $(".iwj-find-jobs-select.style3").select2({ dropdownCssClass: 'iwj-find-jobs-dropdown style2 style3' }) }
        }
    }
    function InwaveServiceBtn() { $('.buy-service-button .has-scroll').click(function (e) { e.preventDefault(); var href = $(this).attr('href'); var element = $(href); if (element.length) { $("html, body").animate({ scrollTop: element.position().top }, 1000); return false; } }); }
    function InwaveLoginRegisterBtn() { $('.top-bar-right .register-login a').hover(function () { if ($(this).hasClass('login')) { $('.top-bar-right .register-login').addClass('active-login'); } }, function () { $('.top-bar-right .register-login').removeClass('active-login'); }); }
    function InwaveStickySidebar() {
        setTimeout(function () {
            if ($('.header.header-default.clone').length) { var h_header = $('.header.header-default.clone .iw-header').outerHeight(); var h_wpadminbar = $('#wpadminbar').outerHeight(); var top = h_header + h_wpadminbar; } else { if ($('body').hasClass('admin-bar')) { var top = 30; } else { var top = 0; } }
            $('.iwj-sidebar-sticky').theiaStickySidebar({ additionalMarginTop: top });
        }, 0);
    }
    function InwavePreloadSetup() { $('#preview-area').fadeOut('slow', function () { $(this).remove(); }); }
    function InwaveHeadingSearch() { $('.iw-job-advanced_search .iw-search-add-advanced').click(function () { var that = $(this); var parent = that.closest('.iw-job-advanced_search'); parent.find('.section-filter').toggle(400); that.toggleClass('active'); }); }
    function woocommerce_init() {
    window.increaseQty = function (el, count) { var $el = $(el).parent().find('.qty'); $el.val(parseInt($el.val()) + count); }; window.decreaseQty = function (el, count) {
        var $el = $(el).parent().find('.qty'); var qtya = parseInt($el.val()) - count; if (qtya < 1) { qtya = 1; }
        $el.val(qtya);
    }; $('.add_to_cart_button').on('click', function (e) {
        if ($(this).find('.fa-check').length) { e.preventDefault(); return; }
        $(this).addClass('cart-adding'); $(this).html(' <i class="fa fa-cog fa-spin"></i> ');
    }); $('body').on('added_to_cart', function (e, f) { $('.added_to_cart.wc-forward').remove(); $('.cart-adding').html('<i class="fa fa-check"></i>'); $('.cart-adding').removeClass('cart-adding'); }); window.submitProductsLayout = function (layout) { $('.product-category-layout').val(layout); $('.woocommerce-ordering').submit(); }; if ($("#woo-tab-contents").length) { $("#woo-tab-contents .box-collateral").hide(); $("#woo-tab-buttons li:first").attr("class", "current"); $("#woo-tab-contents .box-collateral:first").show(); }
        $('#woo-tab-buttons li a').click(function (e) { e.preventDefault(); $("#woo-tab-contents .box-collateral").hide(); $("#woo-tab-buttons li").attr("class", ""); $(this).parent().attr("class", "current"); $($(this).attr('href')).fadeIn(); }); $('.add_to_cart_button').on('click', function (e) {
            if ($(this).find('.fa-check').length) { e.preventDefault(); return; }
            $(this).addClass('cart-adding'); $(this).html('<i class="fa fa-cog fa-spin"></i>');
        }); $('.add_to_wishlist').on('click', function (e) {
            if ($(this).find('.fa-check').length) { e.preventDefault(); return; }
            $(this).addClass('wishlist-adding'); $(this).find('i').removeClass('fa-star').addClass('fa-cog fa-spin');
        }); var wishlist = $('.yith-wcwl-add-to-wishlist'); wishlist.appendTo('.add-to-box'); wishlist.appendTo('.add-to-box form.cart'); if ($('.variations_form').length) { wishlist.appendTo('.variations_form .single_variation_wrap'); }
    }
    $(document).ready(function () { InwaveStickyMenu(); InwaveHeaderSearchBtn(); InwaveCarouselSetup(); InwaveGallarySetup(); InwaveSelectSetup(); InwaveServiceBtn(); InwaveLoginRegisterBtn(); InwaveStickySidebar(); InwaveHeadingSearch(); });
    $(window).on('load', function () { InwaveScrollMenu(); InwavePreloadSetup(); });
    $(window).on("load resize", function () {
        $('.navbar-nav > li').each(function () {
            var w_li = $(this).outerWidth(); var offset_left = $(this).offset().left; var w_wrapper = $('body .wrapper').width(); var ltr = (w_wrapper - offset_left); var rtl = (offset_left + w_li); if (rtl < 251 || ltr < 251) { $(this).addClass('sub-menu-position-new'); }
            else { $(this).removeClass('sub-menu-position-new'); }
            if (rtl < 501 || ltr < 501) { $(this).addClass('sub-menu2-position-new'); }
            else { $(this).removeClass('sub-menu2-position-new'); }
        });
    });
})(jQuery);
(function ($) {
    "use strict"; var Plugin = function (el, options, idx) { this.el = el; this.$el = $(el); this.options = options; this.uuid = this.$el.attr('id') ? this.$el.attr('id') : idx; this.state = {}; this.init(); return this; }; Plugin.prototype = {
        init: function () { var self = this; self._load(); self.$el.find('ul').each(function (idx) { var sub = $(this); sub.attr('data-index', idx); if (self.options.save && self.state.hasOwnProperty(idx)) { sub.parent().addClass(self.options.openClass); sub.show(); } else if (sub.parent().hasClass(self.options.openClass)) { sub.show(); self.state[idx] = 1; } else { sub.hide(); } }); var caret = $('<span></span>').prepend(self.options.caretHtml); var links = self.$el.find("li > a"); self._trigger(caret, false); self._trigger(links, true); self.$el.find("li:has(ul) > a").prepend(caret); }, _trigger: function (sources, isLink) {
            var self = this; sources.on('click', function (event) {
                event.stopPropagation(); var sub = isLink ? $(this).next() : $(this).parent().next(); var isAnchor = false; if (isLink) { var href = $(this).attr('href'); isAnchor = href === undefined || href === '' || href === '#'; }
                sub = sub.length > 0 ? sub : false; self.options.onClickBefore.call(this, event, sub); if (!isLink || sub && isAnchor) { event.preventDefault(); self._toggle(sub, sub.is(":hidden")); self._save(); } else if (self.options.accordion) { var allowed = self.state = self._parents($(this)); self.$el.find('ul').filter(':visible').each(function () { var sub = $(this), idx = sub.attr('data-index'); if (!allowed.hasOwnProperty(idx)) { self._toggle(sub, false); } }); self._save(); }
                self.options.onClickAfter.call(this, event, sub);
            });
        }, _toggle: function (sub, open) {
            var self = this, idx = sub.attr('data-index'), parent = sub.parent(); self.options.onToggleBefore.call(this, sub, open); if (open) { parent.addClass(self.options.openClass); sub.slideDown(self.options.slide); self.state[idx] = 1; if (self.options.accordion) { var allowed = self.state = self._parents(sub); allowed[idx] = self.state[idx] = 1; self.$el.find('ul').filter(':visible').each(function () { var sub = $(this), idx = sub.attr('data-index'); if (!allowed.hasOwnProperty(idx)) { self._toggle(sub, false); } }); } } else { parent.removeClass(self.options.openClass); sub.slideUp(self.options.slide); self.state[idx] = 0; }
            self.options.onToggleAfter.call(this, sub, open);
        }, _parents: function (sub, obj) {
            var result = {}, parent = sub.parent(), parents = parent.parents('ul'); parents.each(function () {
                var par = $(this), idx = par.attr('data-index'); if (!idx) { return false; }
                result[idx] = obj ? par : 1;
            }); return result;
        }, _save: function () {
            if (this.options.save) {
                var save = {}; for (var key in this.state) { if (this.state[key] === 1) { save[key] = 1; } }
                cookie[this.uuid] = this.state = save; $.cookie(this.options.cookie.name, JSON.stringify(cookie), this.options.cookie);
            }
        }, _load: function () {
            if (this.options.save) {
                if (cookie === null) { var data = $.cookie(this.options.cookie.name); cookie = (data) ? JSON.parse(data) : {}; }
                this.state = cookie.hasOwnProperty(this.uuid) ? cookie[this.uuid] : {};
            }
        }, toggle: function (open) {
            var self = this, length = arguments.length; if (length <= 1) { self.$el.find('ul').each(function () { var sub = $(this); self._toggle(sub, open); }); } else {
                var idx, list = {}, args = Array.prototype.slice.call(arguments, 1); length--; for (var i = 0; i < length; i++) { idx = args[i]; var sub = self.$el.find('ul[data-index="' + idx + '"]').first(); if (sub) { list[idx] = sub; if (open) { var parents = self._parents(sub, true); for (var pIdx in parents) { if (!list.hasOwnProperty(pIdx)) { list[pIdx] = parents[pIdx]; } } } } }
                for (idx in list) { self._toggle(list[idx], open); }
            }
            self._save();
        }, destroy: function () { $.removeData(this.$el); this.$el.find("li:has(ul) > a").unbind('click'); this.$el.find("li:has(ul) > a > span").unbind('click'); }
    }; $.fn.navgoco = function (options) {
        if (typeof options === 'string' && options.charAt(0) !== '_' && options !== 'init') { var callback = true, args = Array.prototype.slice.call(arguments, 1); } else { options = $.extend({}, $.fn.navgoco.defaults, options || {}); if (!$.cookie) { options.save = false; } }
        return this.each(function (idx) {
            var $this = $(this), obj = $this.data('navgoco'); if (!obj) { obj = new Plugin(this, callback ? $.fn.navgoco.defaults : options, idx); $this.data('navgoco', obj); }
            if (callback) { obj[options].apply(obj, args); }
        });
    }; var cookie = null; $.fn.navgoco.defaults = { caretHtml: '', accordion: false, openClass: 'open', save: true, cookie: { name: 'navgoco', expires: false, path: '/' }, slide: { duration: 400, easing: 'swing' }, onClickBefore: $.noop, onClickAfter: $.noop, onToggleBefore: $.noop, onToggleAfter: $.noop };
})(jQuery);
jQuery(document).ready(function ($) { "use strict"; $(".canvas-menu").navgoco({ caretHtml: '<span class="icon-arrow"></span>', accordion: false, openClass: 'open', save: true, cookie: { name: 'navgoco', expires: false, path: '/' }, slide: { duration: 300, easing: 'swing' } }); });
!function (a, b) { "use strict"; function c() { if (!e) { e = !0; var a, c, d, f, g = -1 !== navigator.appVersion.indexOf("MSIE 10"), h = !!navigator.userAgent.match(/Trident.*rv:11\./), i = b.querySelectorAll("iframe.wp-embedded-content"); for (c = 0; c < i.length; c++) { if (d = i[c], !d.getAttribute("data-secret")) f = Math.random().toString(36).substr(2, 10), d.src += "#?secret=" + f, d.setAttribute("data-secret", f); if (g || h) a = d.cloneNode(!0), a.removeAttribute("security"), d.parentNode.replaceChild(a, d) } } } var d = !1, e = !1; if (b.querySelector) if (a.addEventListener) d = !0; if (a.wp = a.wp || {}, !a.wp.receiveEmbedMessage) if (a.wp.receiveEmbedMessage = function (c) { var d = c.data; if (d.secret || d.message || d.value) if (!/[^a-zA-Z0-9]/.test(d.secret)) { var e, f, g, h, i, j = b.querySelectorAll('iframe[data-secret="' + d.secret + '"]'), k = b.querySelectorAll('blockquote[data-secret="' + d.secret + '"]'); for (e = 0; e < k.length; e++)k[e].style.display = "none"; for (e = 0; e < j.length; e++)if (f = j[e], c.source === f.contentWindow) { if (f.removeAttribute("style"), "height" === d.message) { if (g = parseInt(d.value, 10), g > 1e3) g = 1e3; else if (~~g < 200) g = 200; f.height = g } if ("link" === d.message) if (h = b.createElement("a"), i = b.createElement("a"), h.href = f.getAttribute("src"), i.href = d.value, i.host === h.host) if (b.activeElement === f) a.top.location.href = d.value } else; } }, d) a.addEventListener("message", a.wp.receiveEmbedMessage, !1), b.addEventListener("DOMContentLoaded", c, !1), a.addEventListener("load", c, !1) }(window, document);