

function InfoBox(opt_opts) {
    opt_opts = opt_opts || {}, google.maps.OverlayView.apply(this, arguments), this.content_ = opt_opts.content || "", this.disableAutoPan_ = opt_opts.disableAutoPan || !1, this.maxWidth_ = opt_opts.maxWidth || 0, this.pixelOffset_ = opt_opts.pixelOffset || new google.maps.Size(0, 0), this.position_ = opt_opts.position || new google.maps.LatLng(0, 0), this.zIndex_ = opt_opts.zIndex || null, this.boxClass_ = opt_opts.boxClass || "infoBox", this.boxStyle_ = opt_opts.boxStyle || {}, this.closeBoxMargin_ = opt_opts.closeBoxMargin || "2px", this.closeBoxURL_ = opt_opts.closeBoxURL || "http://www.google.com/intl/en_us/mapfiles/close.gif", "" === opt_opts.closeBoxURL && (this.closeBoxURL_ = ""), this.infoBoxClearance_ = opt_opts.infoBoxClearance || new google.maps.Size(1, 1), "undefined" == typeof opt_opts.visible && ("undefined" == typeof opt_opts.isHidden ? opt_opts.visible = !0 : opt_opts.visible = !opt_opts.isHidden), this.isHidden_ = !opt_opts.visible, this.alignBottom_ = opt_opts.alignBottom || !1, this.pane_ = opt_opts.pane || "floatPane", this.enableEventPropagation_ = opt_opts.enableEventPropagation || !1, this.div_ = null, this.closeListener_ = null, this.moveListener_ = null, this.contextListener_ = null, this.eventListeners_ = null, this.fixedWidthSet_ = null
}
InfoBox.prototype = new google.maps.OverlayView, InfoBox.prototype.createInfoBoxDiv_ = function () {
    var i, events, bw, me = this, cancelHandler = function (e) {
        e.cancelBubble = !0, e.stopPropagation && e.stopPropagation()
    }, ignoreHandler = function (e) {
        e.returnValue = !1, e.preventDefault && e.preventDefault(), me.enableEventPropagation_ || cancelHandler(e)
    };
    if (!this.div_) {
        if (this.div_ = document.createElement("div"), this.setBoxStyle_(), "undefined" == typeof this.content_.nodeType ? this.div_.innerHTML = this.getCloseBoxImg_() + this.content_ : (this.div_.innerHTML = this.getCloseBoxImg_(), this.div_.appendChild(this.content_)), this.getPanes()[this.pane_].appendChild(this.div_), this.addClickHandler_(), this.div_.style.width ? this.fixedWidthSet_ = !0 : 0 !== this.maxWidth_ && this.div_.offsetWidth > this.maxWidth_ ? (this.div_.style.width = this.maxWidth_, this.div_.style.overflow = "auto", this.fixedWidthSet_ = !0) : (bw = this.getBoxWidths_(), this.div_.style.width = this.div_.offsetWidth - bw.left - bw.right + "px", this.fixedWidthSet_ = !1), this.panBox_(this.disableAutoPan_), !this.enableEventPropagation_) {
            for (this.eventListeners_ = [], events = ["mousedown", "mouseover", "mouseout", "mouseup", "click", "dblclick", "touchstart", "touchend", "touchmove"], i = 0; i < events.length; i++)this.eventListeners_.push(google.maps.event.addDomListener(this.div_, events[i], cancelHandler));
            this.eventListeners_.push(google.maps.event.addDomListener(this.div_, "mouseover", function (e) {
                this.style.cursor = "default"
            }))
        }
        this.contextListener_ = google.maps.event.addDomListener(this.div_, "contextmenu", ignoreHandler), google.maps.event.trigger(this, "domready")
    }
}, InfoBox.prototype.getCloseBoxImg_ = function () {
    var img = "";
    return "" !== this.closeBoxURL_ && (img = '<md-button class="md-icon-button infoBox-close" aria-label="More"><img src="img/close.svg"/></md-button>'), img
}, InfoBox.prototype.addClickHandler_ = function () {
    var closeBox;
    "" !== this.closeBoxURL_ ? (closeBox = this.div_.firstChild, this.closeListener_ = google.maps.event.addDomListener(closeBox, "click", this.getCloseClickHandler_())) : this.closeListener_ = null
}, InfoBox.prototype.getCloseClickHandler_ = function () {
    var me = this;
    return function (e) {
        e.cancelBubble = !0, e.stopPropagation && e.stopPropagation(), google.maps.event.trigger(me, "closeclick"), me.close()
    }
}, InfoBox.prototype.panBox_ = function (disablePan) {
    var map, bounds, xOffset = 0, yOffset = 0;
    if (!disablePan && (map = this.getMap(), map instanceof google.maps.Map)) {
        map.getBounds().contains(this.position_) || map.setCenter(this.position_), bounds = map.getBounds();
        var mapDiv = map.getDiv(), mapWidth = mapDiv.offsetWidth, mapHeight = mapDiv.offsetHeight, iwOffsetX = this.pixelOffset_.width, iwOffsetY = this.pixelOffset_.height, iwWidth = this.div_.offsetWidth, iwHeight = this.div_.offsetHeight, padX = this.infoBoxClearance_.width, padY = this.infoBoxClearance_.height, pixPosition = this.getProjection().fromLatLngToContainerPixel(this.position_);
        if (pixPosition.x < -iwOffsetX + padX ? xOffset = pixPosition.x + iwOffsetX - padX : pixPosition.x + iwWidth + iwOffsetX + padX > mapWidth && (xOffset = pixPosition.x + iwWidth + iwOffsetX + padX - mapWidth), this.alignBottom_ ? pixPosition.y < -iwOffsetY + padY + iwHeight ? yOffset = pixPosition.y + iwOffsetY - padY - iwHeight : pixPosition.y + iwOffsetY + padY > mapHeight && (yOffset = pixPosition.y + iwOffsetY + padY - mapHeight) : pixPosition.y < -iwOffsetY + padY ? yOffset = pixPosition.y + iwOffsetY - padY : pixPosition.y + iwHeight + iwOffsetY + padY > mapHeight && (yOffset = pixPosition.y + iwHeight + iwOffsetY + padY - mapHeight), 0 !== xOffset || 0 !== yOffset) {
            map.getCenter();
            map.panBy(xOffset, yOffset)
        }
    }
}, InfoBox.prototype.setBoxStyle_ = function () {
    var i, boxStyle;
    if (this.div_) {
        this.div_.className = this.boxClass_, this.div_.style.cssText = "", boxStyle = this.boxStyle_;
        for (i in boxStyle)boxStyle.hasOwnProperty(i) && (this.div_.style[i] = boxStyle[i]);
        this.div_.style.WebkitTransform = "translateZ(0)", "undefined" != typeof this.div_.style.opacity && "" !== this.div_.style.opacity && (this.div_.style.MsFilter = '"progid:DXImageTransform.Microsoft.Alpha(Opacity=' + 100 * this.div_.style.opacity + ')"', this.div_.style.filter = "alpha(opacity=" + 100 * this.div_.style.opacity + ")"), this.div_.style.position = "absolute", this.div_.style.visibility = "hidden", null !== this.zIndex_ && (this.div_.style.zIndex = this.zIndex_)
    }
}, InfoBox.prototype.getBoxWidths_ = function () {
    var computedStyle, bw = {top: 0, bottom: 0, left: 0, right: 0}, box = this.div_;
    return document.defaultView && document.defaultView.getComputedStyle ? (computedStyle = box.ownerDocument.defaultView.getComputedStyle(box, ""), computedStyle && (bw.top = parseInt(computedStyle.borderTopWidth, 10) || 0, bw.bottom = parseInt(computedStyle.borderBottomWidth, 10) || 0, bw.left = parseInt(computedStyle.borderLeftWidth, 10) || 0, bw.right = parseInt(computedStyle.borderRightWidth, 10) || 0)) : document.documentElement.currentStyle && box.currentStyle && (bw.top = parseInt(box.currentStyle.borderTopWidth, 10) || 0, bw.bottom = parseInt(box.currentStyle.borderBottomWidth, 10) || 0, bw.left = parseInt(box.currentStyle.borderLeftWidth, 10) || 0, bw.right = parseInt(box.currentStyle.borderRightWidth, 10) || 0), bw
}, InfoBox.prototype.onRemove = function () {
    this.div_ && (this.div_.parentNode.removeChild(this.div_), this.div_ = null)
}, InfoBox.prototype.draw = function () {
    this.createInfoBoxDiv_();
    var pixPosition = this.getProjection().fromLatLngToDivPixel(this.position_);
    this.div_.style.left = pixPosition.x + this.pixelOffset_.width + "px", this.alignBottom_ ? this.div_.style.bottom = -(pixPosition.y + this.pixelOffset_.height) + "px" : this.div_.style.top = pixPosition.y + this.pixelOffset_.height + "px", this.isHidden_ ? this.div_.style.visibility = "hidden" : this.div_.style.visibility = "visible"
}, InfoBox.prototype.setOptions = function (opt_opts) {
    "undefined" != typeof opt_opts.boxClass && (this.boxClass_ = opt_opts.boxClass, this.setBoxStyle_()), "undefined" != typeof opt_opts.boxStyle && (this.boxStyle_ = opt_opts.boxStyle, this.setBoxStyle_()), "undefined" != typeof opt_opts.content && this.setContent(opt_opts.content), "undefined" != typeof opt_opts.disableAutoPan && (this.disableAutoPan_ = opt_opts.disableAutoPan), "undefined" != typeof opt_opts.maxWidth && (this.maxWidth_ = opt_opts.maxWidth), "undefined" != typeof opt_opts.pixelOffset && (this.pixelOffset_ = opt_opts.pixelOffset), "undefined" != typeof opt_opts.alignBottom && (this.alignBottom_ = opt_opts.alignBottom), "undefined" != typeof opt_opts.position && this.setPosition(opt_opts.position), "undefined" != typeof opt_opts.zIndex && this.setZIndex(opt_opts.zIndex), "undefined" != typeof opt_opts.closeBoxMargin && (this.closeBoxMargin_ = opt_opts.closeBoxMargin), "undefined" != typeof opt_opts.closeBoxURL && (this.closeBoxURL_ = opt_opts.closeBoxURL), "undefined" != typeof opt_opts.infoBoxClearance && (this.infoBoxClearance_ = opt_opts.infoBoxClearance), "undefined" != typeof opt_opts.isHidden && (this.isHidden_ = opt_opts.isHidden), "undefined" != typeof opt_opts.visible && (this.isHidden_ = !opt_opts.visible), "undefined" != typeof opt_opts.enableEventPropagation && (this.enableEventPropagation_ = opt_opts.enableEventPropagation), this.div_ && this.draw()
}, InfoBox.prototype.setContent = function (content) {
    this.content_ = content, this.div_ && (this.closeListener_ && (google.maps.event.removeListener(this.closeListener_), this.closeListener_ = null), this.fixedWidthSet_ || (this.div_.style.width = ""), "undefined" == typeof content.nodeType ? this.div_.innerHTML = this.getCloseBoxImg_() + content : (this.div_.innerHTML = this.getCloseBoxImg_(), this.div_.appendChild(content)), this.fixedWidthSet_ || (this.div_.style.width = this.div_.offsetWidth + "px", "undefined" == typeof content.nodeType ? this.div_.innerHTML = this.getCloseBoxImg_() + content : (this.div_.innerHTML = this.getCloseBoxImg_(), this.div_.appendChild(content))), this.addClickHandler_()), google.maps.event.trigger(this, "content_changed")
}, InfoBox.prototype.setPosition = function (latlng) {
    this.position_ = latlng, this.div_ && this.draw(), google.maps.event.trigger(this, "position_changed")
}, InfoBox.prototype.setZIndex = function (index) {
    this.zIndex_ = index, this.div_ && (this.div_.style.zIndex = index), google.maps.event.trigger(this, "zindex_changed")
}, InfoBox.prototype.setVisible = function (isVisible) {
    this.isHidden_ = !isVisible, this.div_ && (this.div_.style.visibility = this.isHidden_ ? "hidden" : "visible")
}, InfoBox.prototype.getContent = function () {
    return this.content_
}, InfoBox.prototype.getPosition = function () {
    return this.position_
}, InfoBox.prototype.getZIndex = function () {
    return this.zIndex_
}, InfoBox.prototype.getVisible = function () {
    var isVisible;
    return isVisible = "undefined" != typeof this.getMap() && null !== this.getMap() && !this.isHidden_
}, InfoBox.prototype.show = function () {
    this.isHidden_ = !1, this.div_ && (this.div_.style.visibility = "visible")
}, InfoBox.prototype.hide = function () {
    this.isHidden_ = !0, this.div_ && (this.div_.style.visibility = "hidden")
}, InfoBox.prototype.open = function (map, anchor) {
    var me = this;
    anchor && (this.position_ = anchor.getPosition(), this.moveListener_ = google.maps.event.addListener(anchor, "position_changed", function () {
        me.setPosition(this.getPosition())
    })), this.setMap(map), this.div_ && this.panBox_()
}, InfoBox.prototype.close = function () {
    var i;
    if (this.closeListener_ && (google.maps.event.removeListener(this.closeListener_), this.closeListener_ = null), this.eventListeners_) {
        for (i = 0; i < this.eventListeners_.length; i++)google.maps.event.removeListener(this.eventListeners_[i]);
        this.eventListeners_ = null
    }
    this.moveListener_ && (google.maps.event.removeListener(this.moveListener_), this.moveListener_ = null), this.contextListener_ && (google.maps.event.removeListener(this.contextListener_), this.contextListener_ = null), this.setMap(null)
};


google.maps.event.addDomListener(window, 'load', init);
var map, markersArray = [];

function bindInfoWindow(marker, map, location) {
    google.maps.event.addListener(marker, 'click', function() {
        function close(location) {
            location.ib.close();
            location.infoWindowVisible = false;
            location.ib = null;
        }

        if (location.infoWindowVisible === true) {
            close(location);
        } else {
            markersArray.forEach(function(loc, index){
                if (loc.ib && loc.ib !== null) {
                    close(loc);
                }
            });

            var boxText = document.createElement('div');
            boxText.style.cssText = 'background: #fff;';
            boxText.classList.add('md-whiteframe-2dp');

            function buildPieces(location, el, part, icon) {
                if (location[part] === '') {
                    return '';
                } else if (location.iw[part]) {
                    switch(el){
                        case 'photo':
                            if (location.photo){
                                return '<div class="iw-photo" style="background-image: url(' + location.photo + ');"></div>';
                            } else {
                                return '';
                            }
                            break;
                        case 'iw-toolbar':
                            return '<div class="iw-toolbar"><h3 class="md-subhead">' + location.title + '</h3></div>';
                            break;
                        case 'div':
                            switch(part){
                                case 'email':
                                    return '<div class="iw-details"><span><a href="mailto:' + location.email + '" target="_blank">' + location.email + '</a></span></div>';
                                    break;
                                case 'web':
                                    return '<div class="iw-details"><span><a href="' + location.web + '" target="_blank">' + location.web_formatted + '</a></span></div>';
                                    break;
                                case 'desc':
                                    return '<label class="iw-desc" for="cb_details"><input type="checkbox" id="cb_details"/><h3 class="iw-x-details">Details</h3><i class="material-icons toggle-open-details"><img src="//cdn.mapkit.io/v1/icons/' + icon + '.svg"/></i><p class="iw-x-details">' + location.desc + '</p></label>';
                                    break;
                                default:
                                    return '<div class="iw-details"><span>' + location[part] + '</span></div>';
                                    break;
                            }
                            break;
                        case 'open_hours':
                            var items = '';
                            for (var i = 0; i < location.open_hours.length; ++i) {
                                if (i !== 0){
                                    items += '<li><strong>' + location.open_hours[i].day + '</strong><strong>' + location.open_hours[i].hours +'</strong></li>';
                                }
                                var first = '<li><label for="cb_hours"><input type="checkbox" id="cb_hours"/><strong>' + location.open_hours[0].day + '</strong><strong>' + location.open_hours[0].hours +'</strong><i class="material-icons toggle-open-hours"><img src="img/keyboard_arrow_down.svg"/></i><ul>' + items + '</ul></label></li>';
                            }
                            return '<div class="iw-list"><i class="material-icons first-material-icons" style="color:#4285f4;"><img src="//cdn.mapkit.io/v1/icons/' + icon + '.svg"/></i><ul>' + first + '</ul></div>';
                            break;
                    }
                } else {
                    return '';
                }
            }

            boxText.innerHTML =
                buildPieces(location, 'photo', 'photo', '') +
                buildPieces(location, 'iw-toolbar', 'title', '') +
                buildPieces(location, 'div', 'address', 'location_on') +
                buildPieces(location, 'div', 'web', 'public') +
                buildPieces(location, 'div', 'email', 'email') +
                buildPieces(location, 'div', 'tel', 'phone') +
                buildPieces(location, 'div', 'int_tel', 'phone') +
                buildPieces(location, 'open_hours', 'open_hours', 'access_time') +
                buildPieces(location, 'div', 'desc', 'keyboard_arrow_down');

            var myOptions = {
                alignBottom: true,
                content: boxText,
                disableAutoPan: true,
                maxWidth: 0,
                pixelOffset: new google.maps.Size(-140, -40),
                zIndex: null,
                boxStyle: {
                    opacity: 1,
                    width: '280px'
                },
                closeBoxMargin: '0px 0px 0px 0px',
                infoBoxClearance: new google.maps.Size(1, 1),
                isHidden: false,
                pane: 'floatPane',
                enableEventPropagation: false
            };

            location.ib = new InfoBox(myOptions);
            location.ib.open(map, marker);
            location.infoWindowVisible = true;
        }
    });
}

function init() {
    var mapOptions = {
        center: new google.maps.LatLng(45.426015624621186,36.80222990712895),
        zoom: 12,
        gestureHandling: 'auto',
        fullscreenControl: false,
        zoomControl: true,
        disableDoubleClickZoom: true,
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        },
        scaleControl: true,
        scrollwheel: true,
        streetViewControl: true,
        draggable : true,
        clickableIcons: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: [{"featureType":"water","elementType":"geometry","stylers":[
            {"color":"#96a25b"},
            {"lightness":17}]},
            {"featureType":"landscape","elementType":"geometry","stylers":[
                {"color":"#e1cb68"},
                {"lightness":20}
            ]},
            {"featureType":"road.highway","elementType":"geometry.fill","stylers":[
                {"color":"#b19c4d"},
                {"lightness":17}
            ]},
            {"featureType":"road.highway","elementType":"geometry.stroke","stylers":[
                {"color":"#b19c4d"},
                {"lightness":29},
                {"weight":0.2}
            ]},
            {"featureType":"road.arterial","elementType":"geometry","stylers":[
                {"color":"#b19c4d"},
                {"lightness":18}
            ]},
            {"featureType":"road.local","elementType":"geometry","stylers":[
                {"color":"#b19c4d"},
                {"lightness":16}
            ]},
            {"featureType":"poi","elementType":"geometry","stylers":[
                {"color":"#e1b148"},
                {"lightness":21}
            ]},
            {"featureType":"poi.park","elementType":"geometry","stylers":[
                {"color":"#e1b148"},
                {"lightness":21}
            ]},{"elementType":"labels.text.stroke","stylers":[
                {"visibility":"on"},
                {"color":"#e1cb68"},
                {"lightness":16}
            ]},{"elementType":"labels.text.fill","stylers":[
                {"saturation":36},
                {"color":"#000000"},
                {"lightness":40}
            ]},
            {"elementType":"labels.icon","stylers":[
                {"visibility":"on"}
            ]},{"featureType":"transit","elementType":"geometry","stylers":[
                {"color":"#fff"},
                {"lightness":19}
            ]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[
                {"color":"#fff"},
                {"lightness":20}
            ]},
            {"featureType":"administrative","elementType":"geometry.stroke","stylers":[
                {"color":"#fff"},
                {"lightness":17},
                {"weight":1.2}
            ]}]
    }

    var mapElement = document.getElementById('mapkit-4515');
    var map = new google.maps.Map(mapElement, mapOptions);
    var locations = [
        {"title":"","address":"наб. ул., Ильич, Краснодарский край, Россия, 353548","desc":"","tel":"","int_tel":"","email":"","web":"","web_formatted":"","open":"","time":"","lat":45.4250518,"lng":36.768927599999984,"vicinity":"Ильич","open_hours":"","marker":{"url":"img/marker.png","scaledSize":{"width":152,"height":180,"j":"px","f":"px"},"origin":{"x":0,"y":0},"anchor":{"x":76,"y":180}},"iw":{"address":true,"desc":true,"email":true,"enable":true,"int_tel":true,"open":true,"open_hours":true,"photo":true,"tel":true,"title":true,"web":true}}
    ];

    var layer = new google.maps.BicyclingLayer();
    layer.setMap(map);

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            icon: locations[i].marker,
            position: new google.maps.LatLng(locations[i].lat, locations[i].lng),
            map: map,
            title: locations[i].title,
            address: locations[i].address,
            desc: locations[i].desc,
            tel: locations[i].tel,
            int_tel: locations[i].int_tel,
            vicinity: locations[i].vicinity,
            open: locations[i].open,
            open_hours: locations[i].open_hours,
            photo: locations[i].photo,
            time: locations[i].time,
            email: locations[i].email,
            web: locations[i].web,
            iw: locations[i].iw
        });

        markersArray.push(marker);

        if (locations[i].iw.enable === true){
            bindInfoWindow(marker, map, locations[i]);
        }
    }
}