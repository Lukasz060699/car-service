    $(document).ready(function () {
        $("#rating").rateYo({
            rating: 0,
            numStars: 5,
            precision: 2,
            minValue: 0,
            maxValue: 5,
            onChange: function (rating, rateYoInstance) {
                $("#rating_input").val(rating);
            }
        });
    });
