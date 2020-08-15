var customDate =  {

        date : new Date(),
        monthes : ['янв', 'фев', 'мар', 'апр' ,'май', 'июн', 'июл', 'авг', 'сен', 'окт' , 'ноя', 'дек'],

     fromString : function(str) {
        var _ = this;
        var date = str.split('-');
        _.date = new Date(date[0], date[1], date[2]);
    },

    getDay : function(){
            var _ = this;
            return _.date.getDay();
    },

    getMonthShortName : function () {
        var _ = this;
        return _.monthes[_.date.getMonth()];
    }
};

$(document).ready(function () {
    $("#news .news-item .dates ").each(function () {
        var val = $(this).text();
        customDate.fromString(val);
        $(this).html("<span>" + customDate.getDay() + "</span><span>" + customDate.getMonthShortName() + "</span>" );
    });
});