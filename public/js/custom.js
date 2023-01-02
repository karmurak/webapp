$(function () {
  var topNav = $(".topnav");
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll > 0) {
      topNav.addClass("sticky");
    } else {
      topNav.removeClass("sticky");
    }
  });

  $(".carousel").carousel({
    touch: true,
  });

  $(".carousel .carousel-inner").swipe({
    swipeLeft: function (event, direction, distance, duration, fingerCount) {
      this.parent().carousel("next");
    },
    swipeRight: function () {
      this.parent().carousel("prev");
    },
    threshold: 0,
    tap: function (event, target) {
      window.location = $(this).find(".carousel-item.active a").attr("href");
    },
    excludedElements: "label, button, input, select, textarea, .noSwipe",
  });

  $("#inputImage").change(function () {
    let reader = new FileReader();
    reader.onload = (e) => {
      $("#preview-image-before-upload").attr("src", e.target.result);
    };
    reader.readAsDataURL(this.files[0]);
  });

  let previewImages = function (input, imgPreviewPlaceholder) {
    // console.log(input.files)
    if (input.files) {
      var filesAmount = input.files.length;
      for (i = 0; i < filesAmount; i++) {
        var reader = new FileReader();
        reader.onload = function (event) {
          $($.parseHTML("<img>"))
            .attr("src", event.target.result)
            .appendTo(imgPreviewPlaceholder);
        };
        reader.readAsDataURL(input.files[i]);
      }
    }
  };

  $("#inputImageMulti").on("change", function () {
    previewImages(this, "div.imagesPreview");
  });

  $('.input-images').imageUploader();
});
