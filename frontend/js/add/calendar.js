var сalendar = {
    $month: $('[data-calendar-area="month"]'),
    $next:  $('[data-calendar-toggle="next"]'),
    $previous: $('[data-calendar-toggle="previous"]'),
    $labelMonth: $('[data-calendar-label="month"]'),
    $labelYear: $('[data-calendar-label="year"]'),
    $activeDates: null,
    date: new Date(),
    todaysDate: new Date(),

    init: function (options) {
        this.options = options;
        this.date.setDate(1);
        this.createMonth();
        this.createListeners();
        this.getEvents(this.todaysDate.getMonth(), this.date.getFullYear());
    },

    createListeners: function () {
        var _ = this;
        this.$next.click(function () {
            _.clearCalendar();
            var nextMonth = _.date.getMonth() + 1;
            _.date.setMonth(nextMonth);
            _.createMonth();
            _.getEvents(_.date.getMonth(), _.date.getFullYear());
        });
        this.$previous.click(function () {
            _.clearCalendar();
            var prevMonth = _.date.getMonth() - 1;
            _.date.setMonth(prevMonth);
            _.createMonth();
            _.getEvents(_.date.getMonth(), _.date.getFullYear());
        });
    },

    getEvents : function(month, year){
        var _ = this;
        var color = ['#d24a43', '#3eb5f1', '#fff343', '#74b65f', '#f550e7', '#f7be10', '#8582bc'];
        $.ajax({
           url:   $("#cal input:hidden[name=ajax]").val(),
           type: 'post',
           data: {month : month + 1, year : year},
           dataType: 'json',
           success: function (data) {
               var amount = 0;
               if(data['events']){
                    var eventsLength = data['events'].length;
                    for(var i = 0; i < eventsLength; ++i){
                        var event = data['events'][i];
                        if(event['day']){
                            amount += 1;
                            var rndColor = Math.floor(Math.random() * color.length);
                            for(var j = 0; j < event['day'].length; ++j){
                                var day = event['day'][j];
                                var $dayItem = $('.cal-date[data-calendar-date]').eq(day - 1);
                                $dayItem.css({"color" : color[rndColor], 'border-color' :  color[rndColor]});
                                var $title = $(document.createElement("div")).addClass('d-none cal-date-tip');
                                $title.html('<span>' + _.getDate(day, month, year) +  ' </span><span> ' + event['title'] +  ' </span>');

                                $dayItem.append($title);
                                $dayItem.hover(function (event) {
                                    if(($('.cal-date').index($(this)) + 1) % 7 === 0){
                                        $(this).find('.cal-date-tip').css({"left" : "auto", "right" : "50%"});
                                    }
                                    $(this).find('.cal-date-tip').toggleClass('d-none');
                                });
                            }
                            color.splice(rndColor,1);
                            $("#cal .event-date").append("<span>" + event['day'][0] + " " + _.monthsAsString(month) + "</span>");
                            $("#cal .event-name").append("<span>" + event['title'] + "</span>");
                        }
                    }
               }
               if(amount === 0){
                   $("#cal .events").addClass("d-none");
               }else{
                   $("#cal .events").removeClass("d-none");
                   var str = _.monthsAsString(month);
                   if(str.match(/[ьй]/)){
                       str = str.replace(/[ьй]/, 'е');
                   } else{
                       str = str + 'е';
                   }
                   $("#cal #month_name_events").html(str + ":");
               }
               $("span#eventsAmount").html(amount);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    },
    createDay: function (num, day, year) {
        var $newDay = $(document.createElement('div'));
        var $dateEl = $(document.createElement('span'));
        $dateEl.html(num);
        $newDay.addClass('cal-date');
        $newDay.attr('data-calendar-date', this.date);

        if (num === 1) {
            day = (day === 0)? 6 : day - 1;
            for(var i = 0; i < day; ++i){
                this.$month.append("<div class='cal-date cal-date-empty' ></div>");
            }
        }

        if (this.options.disablePastDays && this.date.getTime() <= this.todaysDate.getTime() - 1) {
            $newDay.addClass('cal-date-disabled');
        } else {
            $newDay.addClass('cal-date-active');
            $newDay.attr('data-calendar-status', 'active');
        }

        if (this.date.toString() === this.todaysDate.toString()) {
            $newDay.addClass('cal-date-today');
        }
        $newDay.append($dateEl);
        this.$month.append($newDay);
    },

    dateClicked: function () {
        var _ = this;
        this.$activeDates = $("[data-calendar-status='active']");

        this.$activeDates.each(function (ind, val) {
            $(this).click(function () {
                var picked = document.querySelectorAll(
                    '[data-calendar-label="picked"]'
                )[0];
                picked.innerHTML = this.dataset.calendarDate;
                _.removeActiveClass();
                $(this).addClass('cal-date--selected');
            });
        });
    },

    getDate : function(day, month, year){
            var d = new Date(year, month, day),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [ day, month, year].join('.');
    },

    createMonth: function () {
        var currentMonth = this.date.getMonth();
        while (this.date.getMonth() === currentMonth) {
            this.createDay(
                this.date.getDate(),
                this.date.getDay(),
                this.date.getFullYear()
            );
            this.date.setDate(this.date.getDate() + 1);
        }
        this.date.setDate(this.date.getDate() - 1);

        var day = this.date.getDay() ;

        day = (day===0)? 0 : 7 - day;

        for(var i = 0; i < day; ++i){
            this.$month.append("<div class='cal-date cal-date-empty'></div>");
        }

        this.date.setDate(1);
        //this.date.setMonth(this.date.getMonth());

        this.$labelMonth.html(this.monthsAsString(this.date.getMonth()));
        this.$labelYear.html(this.date.getFullYear());
        this.dateClicked();
    },

    monthsAsString: function (monthIndex) {
        return [
            'Январь',
            'Февраль',
            'Март',
            'Апрель',
            'Май',
            'Июнь',
            'Июль',
            'Август',
            'Сентябрь',
            'Октябрь',
            'Ноябрь',
            'Декабрь'
        ][monthIndex];
    },

    clearCalendar: function () {
        this.$month.html('');
        $("#cal .event-name").html('');
        $("#cal .event-date").html('');
    },

    removeActiveClass: function () {
        this.$activeDates.each(function () {
            $(this).removeClass('cal-date--selected');
        });
    }
};

$(document).ready(function () {
    if(document.getElementById("cal") !== null){
        сalendar.init({
            disablePastDays: true
        });
    }
});